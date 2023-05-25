<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class PushNotificationController extends Controller
{
    public function view()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.settings.push-notification', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = Notification::all();
        return $ret;
    }

    public function save (Request $req) {
        $model = new Notification;
        $model->type = $req->type;
        $model->title = $req->title;
        $model->message = $req->message;
        $model->depart_time = date('Y-m-d h:i:s');
        $model->save();
        return json_encode(array('id' => $model->id, 'depart_time' => $model->depart_time));
    }
}
