<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankSupport;

class BankSupportController extends Controller
{
    public function index () {
        $ret = BankSupport::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->name) return;
        if($req->id) {
            $model = BankSupport::find($req->id);
            $model->name = $req->name;
            $model->country = $req->country;
            $model->status = $req->status;
        } else {
            $model = new BankSupport;
            $model->name = $req->name;
            $model->country = $req->country;
            $model->status = $req->status;
        }
        $model->save();
        return $model->id;
    }

    public function edit ($id) {
        $ret = BankSupport::find($id);
        return $ret;
    }

    public function remove ($id) {
        $removed = BankSupport::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = BankSupport::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
