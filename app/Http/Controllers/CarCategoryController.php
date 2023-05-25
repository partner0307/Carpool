<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CarCategory;

class CarCategoryController extends Controller
{
    public function view () {
        $pageConfig = ['pageHeader' => true];
        return view('/content/settings/car-category', ['pageConfig' => $pageConfig]);
    }

    public function index () {
        $ret = CarCategory::all();
        return $ret;
    }

    public function save (Request $req) {
        if(!$req->name) return;
        $newFileName = '';
        if($req->icon) {
            $req->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000000',
            ]);
            $newFileName = time().'.'.$req->icon->extension();
            $path = $req->icon->storeAs('images/car-category', $newFileName, 'public');
        }
        if($req->id) {
            $model = CarCategory::find($req->id);
            $model->name = $req->name;
            $model->speed = $req->average;
            $model->status = $req->status;
            if($req->icon) {
                $exist_file = 'public/'.$model->photo;
                if(Storage::exists($exist_file)) {
                    Storage::delete($exist_file);
                }
                $model->photo = $path;
            }
        } else {
            $model = new CarCategory;
            $model->name = $req->name;
            $model->speed = $req->average;
            $model->status = $req->status;
            $model->photo = $newFileName ? $path : 'images/temp/sample.png';
        }
        $model->save();
        return json_encode(array('id' => $model->id, 'photo' => $model->photo));
    }

    public function edit ($id) {
        $model = CarCategory::find($id);
        return $model;
    }

    public function remove ($id) {
        $removed = CarCategory::find($id)->delete();
        return $removed;
    }

    public function change ($id) {
        $model = CarCategory::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
