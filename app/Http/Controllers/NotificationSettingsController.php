<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationSettings;

class NotificationSettingsController extends Controller
{
    public function view()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.settings.notification-settings.main', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = NotificationSettings::all();
        return $ret;
    }

    public function save (Request $req) {
        if($req->id) {
            $model = NotificationSettings::find($req->id);
            $model->provider = $req->provider;
            $model->status = $req->status;
            $model->save();
            return $model->id;
        } else {
            return 0;
        }
    }

    public function edit ($id) {
        $ret = NotificationSettings::find($id);
        return $ret;
    }

    public function change ($id) {
        $model = NotificationSettings::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
