<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliciesPrivate;
use App\Models\TC;

class PolicyTcController extends Controller
{
    public function policiesIndex()
    {
        $pageConfig = ['pageHeader' => true];
        return view('/content/settings/policies-private', ['pageConfig' => $pageConfig]);
    }

    public function tcIndex()
    {
        $pageConfig = ['pageHeader' => true];
        return view('/content/settings/tc', ['pageConfig' => $pageConfig]);
    }

    public function policiesSave (Request $req) {
        $model = new PoliciesPrivate;
        $model->title = $req->title;
        $model->content = $req->editor;
        $model->save();
        return $model->id;
    }

    public function tcSave (Request $req) {
        $model = new TC;
        $model->title = $req->title;
        $model->content = $req->editor;
        $model->save();
        return $model->id;
    }
}
