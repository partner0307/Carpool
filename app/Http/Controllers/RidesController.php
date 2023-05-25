<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rides;

class RidesController extends Controller
{
    public function carpoolView()
    {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/rides/carpool', ['pageConfig' => $pageConfig]);
    }

    public function taxiIndex()
    {
        $pageConfig = ['pageHeader' => true];
        return view('/content/apps/rides/taxi', ['pageConfig' => $pageConfig]);
    }


    public function index () {
        $ret = Rides::orderByDesc('date_issue')->get();
        $arr = array();
        foreach ($ret as $p) {
            $temp = array(
                'id' => $p->id,
                'name' => $p->getUser->firstname . ' ' . $p->getUser->lastname,
                'photo' => $p->getUser->photo,
                'email' => $p->getUser->email,
                'seats' => $p->seats,
                'trip_type' => $p->trip_type,
                'amount' => $p->amount,
                'status' => $p->status
            );
            array_push($arr, $temp);
        }
        return $arr;
    }

    public function edit ($id) {
        $model = Rides::find($id);
        $model->name = $model->getUser->firstname . ' ' . $model->getUser->lastname;
        $model->photo = $model->getUser->photo;
        $model->email = $model->getUser->email;
        return $model;
    }
}
