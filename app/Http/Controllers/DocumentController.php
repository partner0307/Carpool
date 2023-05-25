<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequiredDocument;

class DocumentController extends Controller
{
    public function view () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/settings/required-document', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = RequiredDocument::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->name) return;
        if($req->id) {
            $model = RequiredDocument::find($req->id);
            $model->name = $req->name;
            $model->type = $req->type;
            $model->status = $req->status;
        } else {
            $model = new RequiredDocument;
            $model->name = $req->name;
            $model->type = $req->type;
            $model->status = $req->status;
        }
        $model->save();

        return $model->id;
    }

    public function edit ($id) {
        $ret = RequiredDocument::find($id);
        return $ret;
    }

    public function remove ($id) {
        $removed = RequiredDocument::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = RequiredDocument::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
