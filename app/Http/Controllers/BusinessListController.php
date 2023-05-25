<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessList;

class BusinessListController extends Controller
{
    public function view()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.settings.business-list', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = BusinessList::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->name) return;
        $newFileName = '';
        if($req->icon) {
            $req->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:80000000',
            ]);
            $newFileName = time().'.'.$req->icon->extension();
            $path = $req->icon->storeAs('images/business-list', $newFileName, 'public');
        }
        if($req->id) {
            $model = BusinessList::find($req->id);
            $model->name = $req->name;
            $model->email = $req->email;
            $model->address = $req->address;
            $model->status = $req->status;
            if($req->icon) {
                if($model->logo) {
                    $exist_file = 'public/'.$model->logo;
                    if(Storage::exists($exist_file)) {
                        Storage::delete($exist_file);
                    }
                }
                $model->logo = $path;
            }
        } else {
            $model = new BusinessList;
            $model->name = $req->name;
            $model->email = $req->email;
            $model->address = $req->address;
            $model->status = $req->status;
            $model->logo = $newFileName ? $path : 'images/temp/sample.png';
        }
        $model->save();

        return json_encode(array('id' => $model->id, 'logo' => $model->logo));
    }

    public function edit ($id) {
        $model = BusinessList::find($id);
        return $model;
    }

    public function remove ($id) {
        $removed = BusinessList::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = BusinessList::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
