<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;

class PromoCodeController extends Controller
{
    public function view () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/settings/promo-code', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = Promocode::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->promocode) return;
        if($req->id) {
            $model = Promocode::find($req->id);
            $model->promo_code = $req->promocode;
            $model->usage_limit_user = $req->usage;
            $model->description = $req->description;
            $model->min_order_amount = $req->order_amount;
            $model->max_discount_amount = $req->discount_amount;
            $model->discount = $req->discount;
            $model->expire_date = $req->expiry;
            $model->discount_type = $req->discount_type;
            $model->usertype = $req->usertype;
            $model->status = $req->status;
        } else {
            $model = new Promocode;
            $model->promo_code = $req->promocode;
            $model->usage_limit_user = $req->usage;
            $model->description = $req->description;
            $model->min_order_amount = $req->order_amount;
            $model->max_discount_amount = $req->discount_amount;
            $model->discount = $req->discount;
            $model->expire_date = $req->expiry;
            $model->discount_type = $req->discount_type;
            $model->usertype = $req->usertype;
            $model->status = $req->status;
        }
        $model->save();

        return $model->id;
    }

    public function edit ($id) {
        $ret = Promocode::find($id);
        return $ret;
    }

    public function remove ($id) {
        $removed = Promocode::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = Promocode::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
