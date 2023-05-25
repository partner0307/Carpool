<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\BusinessList;
use App\Models\CountryCurrency;
use App\Models\Rides;
use App\Models\Subscription;

class DashboardController extends Controller
{
  // Dashboard - Admin - Analytics
  public function adminAnalyticsView()
  {
    $pageConfigs = ['pageHeader' => false];
    $total = Subscription::sum('cost');
    return view('/content/dashboard/admin-analytics', ['pageConfigs' => $pageConfigs, 'total_earning' => $total]);
  }

  // Dashboard - Company - Analytics
  public function companyAnalyticsView()
  {
    $pageConfigs = ['pageHeader' => false];
    return view('/content/dashboard/company-analytics', ['pageConfigs' => $pageConfigs]);
  }

  // Dashboard - User
  public function userView()
  {
    $pageConfigs = ['pageHeader' => true];

    return view('/content/dashboard/dashboard-user', ['pageConfigs' => $pageConfigs, 'companies' => BusinessList::all(), 'countries' => CountryCurrency::all()]);
  }

  // Dashboard - User - Detail
  public function userDetailsView($id)
  {
    $pageConfigs = ['pageHeader' => true];

    return view('/content/dashboard/user-detail/dashboard-user-detail', ['pageConfigs' => $pageConfigs, 'countries' => CountryCurrency::all(), 'user' => Users::find($id)]);
  }



  /********************************* Analytics Controller ****************************/

  public function adminIndex () {
    $started = Rides::where('status', 1)->count();
    $pending = Rides::where('status', 2)->count();
    $cancelled = Rides::where('status', 3)->count();
    $paid = Rides::where('status', 4)->count();
    $seats = Rides::where('status', 4)->sum('seats');
    $users = Users::where('status', 1)->count();
    return json_encode(array('start' => $started, 'pending' => $pending, 'cancel' => $cancelled, 'paid' => $paid, 'users' => $users, 'seats' => $seats));
  }

  public function companyIndex () {}




  /********************************* User Controller ********************************/

  public function userIndex () {
    $ret = Users::all();
    $arr = array();
    if($ret->count()) {
        foreach($ret as $p) {
            $temp = array(
                'id' => $p->id,
                'firstname' => $p->firstname,
                'lastname' => $p->lastname,
                'photo' => $p->photo,
                'company' => $p->getCompany->name,
                'email' => $p->email,
                'phonenumber' => $p->phonenumber,
                'wallet' => $p->wallet,
                'status' => $p->status
            );
            array_push($arr, $temp);
        }
        return $arr;
    }
  }

  public function userSave (Request $req) {
    if(!$req->email) return;
    $newFileName = '';
    if($req->icon) {
        $req->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000000',
        ]);
        $newFileName = time().'.'.$req->icon->extension();
        $path = $req->icon->storeAs('images/user', $newFileName, 'public');
    }
    if($req->id) {
        $model = Users::find($req->id);
        $model->firstname = $req->firstname;
        $model->lastname = $req->lastname;
        $model->email = $req->email;
        $model->company_email = $req->company_email;
        $model->phonenumber = $req->mobile;
        $model->gender = $req->gender;
        $model->country = $req->country;
        if($req->icon) {
            $exist_file = 'public/'.$model->photo;
            if(Storage::exists($exist_file)) {
                Storage::delete($exist_file);
            }
            $model->photo = $path;
        }
    } else {
        $model = new Users;
        $model->firstname = $req->firstname;
        $model->lastname = $req->lastname;
        $model->gender = $req->gender;
        $model->birthday = $req->birthday;
        $model->email = $req->email;
        $model->company_email = $req->company_email;
        $model->password = Crypt::encryptString($req->password);
        $model->phonenumber = $req->mobile;
        $model->photo = $newFileName ? $path : 'images/temp/sample.png';
        $model->company = $req->company;
        $model->country = $req->country;
        $model->wallet = 0;
        $model->role = 1;
        $model->status = -1;
    }
    $model->save();
    return $model;
  }

  public function userEdit ($id) {
    $ret = Users::find($id);
    return $ret;
  }

  public function userChange (Request $req) {
    $model = Users::find($req->id);
    $model->password = Crypt::encryptString($req->password);
    $model->save();
    return $model->id;
  }
}
