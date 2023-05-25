<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{
    public function index () {
        $ret = Subscription::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->title) return;
        $newFileName = '';
        if($req->icon) {
            $req->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:80000000',
            ]);
            $newFileName = time().'.'.$req->icon->extension();
            $path = $req->icon->storeAs('images/subscription', $newFileName, 'public');
        }
        if($req->id) {
            $model = Subscription::find($req->id);
            $model->title = $req->title;
            $model->description = $req->description;
            $model->cost = $req->cost;
            $model->status = $req->status;
            if($req->icon) {
                $exist_file = 'public/'.$model->photo;
                if(Storage::exists($exist_file)) {
                    Storage::delete($exist_file);
                }
                $model->photo = $path;
            }
        } else {
            $model = new Subscription;
            $model->title = $req->title;
            $model->description = $req->description;
            $model->cost = $req->cost;
            $model->status = $req->status;
            $model->icon = $newFileName ? $path : 'images/temp/sample.png';
        }
        $model->save();
        return json_encode(array('id' => $model->id, 'icon' => $model->icon));
    }

    public function edit ($id) {
        $ret = Subscription::find($id);
        return $ret;
    }

    public function remove ($id) {
        $removed = Subscription::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = Subscription::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
