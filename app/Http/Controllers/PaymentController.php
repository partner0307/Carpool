<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PaymentSetting;
use App\Models\Payout;

class PaymentController extends Controller
{
    public function payoutView ()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.payment.payout', ['pageConfig' => $pageConfig]);
    }
    public function settingsView ()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.payment.settings', ['pageConfig' => $pageConfig]);
    }

    public function settingsIndex () {
        $ret = PaymentSetting::all();
        return $ret;
    }

    public function settingsSave (Request $req) {
        if(!$req->title) return;
        $newFileName = '';
        if($req->icon) {
            $req->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000000',
            ]);
            $newFileName = time().'.'.$req->icon->extension();
            $path = $req->icon->storeAs('images/payment-settings', $newFileName, 'public');
        }
        if($req->id) {
            $model = PaymentSetting::find($req->id);
            $model->title = $req->title;
            $model->type = $req->type;
            $model->public_key = $req->public_key;
            $model->private_key = $req->private_key;
            $model->salt_key = $req->salt_key;
            $model->merchantId = $req->merchantId;
            $model->cclw = $req->cclw;
            $model->api_key = $req->api_key;
            $model->status = $req->status;
            $model->driver_plan = $req->driver_plan;
            if($req->icon) {
                $exist_file = 'public/'.$model->icon;
                if(Storage::exists($exist_file)) {
                    Storage::delete($exist_file);
                }
                $model->icon = $path;
            }
        } else {
            $model = new PaymentSetting;
            $model->title = $req->title;
            $model->type = $req->type;
            $model->public_key = $req->public_key;
            $model->private_key = $req->private_key;
            $model->salt_key = $req->salt_key;
            $model->merchantId = $req->merchantId;
            $model->cclw = $req->cclw;
            $model->api_key = $req->api_key;
            $model->status = $req->status;
            $model->driver_plan = $req->driver_plan;
            $model->icon = $newFileName ? $path : 'images/temp/sample.png';
        }

        $model->save();
        return json_encode(array('id' => $model->id, 'icon' => $model->icon));
    }

    public function settingsEdit ($id) {
        $ret = PaymentSetting::find($id);
        return $ret;
    }

    public function settingsRemove ($id) {
        $removed = PaymentSetting::find($id)->delete();
        return $removed;
    }

    public function settingsChange ($id) {
        $model = PaymentSetting::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }




    public function payoutIndex () {
        $ret = Payout::all();
        $arr = array();
        foreach ($ret as $p) {
            $temp = array(
                'id' => $p->id,
                'photo' => $p->getUser->photo,
                'name' => $p->getUser->firstname.' '.$p->getUser->lastname,
                'company' => $p->getUser->getCompany->name,
                'amount' => $p->amount,
                'charge' => $p->charge,
                'bank' => $p->getBank->name,
                'status' => $p->status
            );
            array_push($arr, $temp);
        }
        return json_encode($arr);
    }

    public function payoutSave (Request $req) {
        if($req->id) {
            $model = Payout::find($req->id);
            $model->amount = $req->amount;
            $model->charge = $req->charge;
            $model->status = $req->status;
        } else {
            $model = new Payout;
            $model->amount = $req->amount;
            $model->charge = $req->charge;
            $model->status = $req->status;
        }
        $model->save();
        return $model->id;
    }

    public function payoutEdit ($id) {
        $ret = Payout::find($id);
        return $ret;
    }

    public function payoutChangeMany (Request $req) {
        if(count($req->ids)) {
            foreach($req->ids as $id) {
                $model = Payout::find($id);
                $model->status = $req->status;
                $model->save();
            }
        }
        return 1;
    }
}
