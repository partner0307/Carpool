<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function view()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.settings.faq.main', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = Faq::all();
        return $ret;
    }

    public function titleSave (Request $req) {
        $model = new Faq;
        $model->title = $req->title;
        $model->date = date('Y-m-d');
        $model->save();
        return json_encode(array('id' => $model->id, 'date' => $model->date));
    }

    public function messageSave (Request $req) {
        $model = Faq::find($req->title);
        $model->message = $req->message;
        $model->save();
        return json_encode(array('id' => $model->id, 'date' => $model->date));
    }
}
