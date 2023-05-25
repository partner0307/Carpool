<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Rewards;

class RewardsController extends Controller
{
    public function index()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.rewards.index', ['pageConfig' => $pageConfig]);
    }

    public function view () {
        $ret = Rewards::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->title) return;
        if($req->icon) {
            $req->validate([
                'icon' => 'required||mimes:jpeg,png,jpg,gif,svg|max:80000000'
            ]);
            $newIconFileName = time().'.'.$req->icon->extension();
            $icon_path = $req->icon->storeAs('images/rewards', $newIconFileName, 'public');
        }
        if($req->coupon) {
            $req->validate([
                'coupon' => 'required||mimes:xlsx,xls,csv|max:99999999'
            ]);
            $newCouponFileName = time().'.'.$req->coupon->extension();
            $coupon_path = $req->coupon->storeAs('coupons', $newCouponFileName, 'public');
        }


        if($req->id) {
            $model = Rewards::find($req->id);
            $model->title = $req->title;
            $model->description = $req->description;
            $model->points = $req->points;
            $model->amount = $req->amount;
            $model->status = $req->status;
            if($req->coupon) {
                $exist_coupon = 'public/'.$model->coupon;
                if(Storage::exists($exist_coupon)) {
                    Storage::delete($exist_coupon);
                }
                $model->coupon = $coupon_path;
            }
            if($req->icon) {
                $exist_icon = 'public/'.$model->icon;
                if(Storage::exists($exist_icon)) {
                    Storage::delete($exist_icon);
                }
                $model->icon = $icon_path;
            }
        } else {
            $model = new Rewards;
            $model->icon = $icon_path;
            $model->title = $req->title;
            $model->description = $req->description;
            $model->points = $req->points;
            $model->amount = $req->amount;
            $model->coupon = $coupon_path;
            $model->status = $req->status;
        }
        $model->save();
        return json_encode(array('id' => $model->id, 'icon' => $model->icon));
    }

    public function edit ($id) {
        $ret = Rewards::find($id);
        return $ret;
    }
}
