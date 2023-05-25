<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryCurrency;

class CountryCurrencyController extends Controller
{
    public function index () {
        $ret = CountryCurrency::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->country) return;
        if($req->id) {
            $model = CountryCurrency::find($req->id);
            $model->country = $req->country;
            $model->code = $req->code;
            $model->rate_to_usd = $req->rate_to_usd;
            $model->status = $req->status;
        } else {
            $model = new CountryCurrency;
            $model->country = $req->country;
            $model->code = $req->code;
            $model->rate_to_usd = $req->rate_to_usd;
            $model->status = $req->status;
        }
        $model->save();

        return $model->id;
    }

    public function edit ($id) {
        $ret = CountryCurrency::find($id);
        return $ret;
    }

    public function remove ($id) {
        $removed = CountryCurrency::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = CountryCurrency::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
