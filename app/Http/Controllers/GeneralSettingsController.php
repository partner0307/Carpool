<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function index() {
        $pageConfig = ['pageHeader' => true];

        return view('/content/settings/general-settings/main', ['pageConfig' => $pageConfig]);
    }
}
