<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function historyIndex () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/loans/history', ['pageConfig' => $pageConfig]);
    }

    public function depositIndex () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/loans/deposit', ['pageConfig' => $pageConfig]);
    }

    public function plansIndex () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/loans/plans', ['pageConfig' => $pageConfig]);
    }
}
