<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewsController extends Controller
{
    //
    public function carpoolView() {
        $pageConfig = ['pageHeader' => true];
        return view('/content/reviews/carpool', ['pageConfig' => $pageConfig]);
    }

    public function taxiView() {
        $pageConfig = ['pageHeader' => true];
        return view('/content/reviews/taxi', ['pageConfig' => $pageConfig]);
    }

    public function marketplaceView() {
        $pageConfig = ['pageHeader' => true];
        return view('/content/reviews/marketplace', ['pageConfig' => $pageConfig]);
    }


    public function carpoolIndex ($role) {
        $ret = Reviews::where('roles', $role)->get();
        $arr = array();
        if(count($ret)) {
            foreach($ret as $p) {
                $temp = array(
                    'id' => $p->id,
                    'senderName' => $p->getSender->firstname . ' ' . $p->getSender->lastname,
                    'senderPhoto' => $p->getSender->photo,
                    'senderCompany' => $p->getSender->getCompany->name,
                    'receiverName' => $p->getReceiver->firstname . ' ' . $p->getReceiver->lastname,
                    'receiverPhoto' => $p->getReceiver->photo,
                    'receiverCompany' => $p->getReceiver->getCompany->name,
                    'rides' => $p->getRides->id,
                    'rating' => $p->rating,
                    'comment' => $p->comment,
                    'status' => $p->getSender->status
                );
                array_push($arr, $temp);
            }
        }
        return json_encode($arr);
    }
}
