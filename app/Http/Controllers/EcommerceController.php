<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function productsIndex() {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/ecommerce/products', ['pageConfig' => $pageConfig]);
    }

    public function salesIndex() {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/ecommerce/sales', ['pageConfig' => $pageConfig]);
    }
}
