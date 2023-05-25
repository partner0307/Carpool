<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdminUsers;
use App\Models\BusinessList;
use App\Models\Roles;

class AccountController extends Controller
{
    public function accountsView()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.account.system-accounts', ['pageConfig' => $pageConfig, 'companies' => BusinessList::all(), 'roles' => Roles::all()]);
    }
    public function settingsIndex()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.account.account-settings', ['pageConfig' => $pageConfig]);
    }
    public function passwordIndex()
    {
        $pageConfig = ['pageHeader' => true];
        return view('content.account.change-password', ['pageConfig' => $pageConfig]);
    }

    public function accountsIndex () {
        $ret = AdminUsers::all();
        return $ret;
    }

    public function accountsInfo () {
        $admins = AdminUsers::where('role_id', 3)->get();
        $company = AdminUsers::where('role_id', 2)->get();
        return json_encode(array('admins' => $admins, 'companies' => $company));
    }

    public function accountsSave (Request $req) {
        if(!$req->email) return;
        $newFileName = $req->firstname . ' ' . $req->lastname . '.png';
        if($req->icon) {
            $req->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000000',
            ]);
            $newFileName = time().'.'.$req->icon->extension();
            $path = $req->icon->storeAs('images/system-accounts', $newFileName, 'public');
        }
        if($req->id) {
            $model = AdminUsers::find($req->id);
            $model->firstname = $req->firstname;
            $model->lastname = $req->lastname;
            $model->email = $req->email;
            $model->password = Crypt::encryptString($req->password);
            $model->role_id = $req->role;
            $model->company_id = $req->company;
            $model->status = $req->status;
            if($req->icon) {
                $exist_file = 'public/'.$model->photo;
                if(Storage::exists($exist_file)) {
                    Storage::delete($exist_file);
                }
                $model->photo = $path;
            }
        } else {
            $model = new AdminUsers;
            $model->firstname = $req->firstname;
            $model->lastname = $req->lastname;
            $model->email = $req->email;
            $model->password = Crypt::encryptString($req->password);
            $model->role_id = $req->role;
            $model->company_id = $req->company;
            $model->status = $req->status;
            $model->photo = $path;
        }
        $model->save();
        return $model->id;
    }

    public function accountsEdit ($id) {
        $ret = AdminUsers::find($id);
        if($ret->password)
            $ret->password = Crypt::decryptString($ret->password);
        return $ret;
    }

    public function accountsChange ($id) {
        $model = AdminUsers::find($id);
        $model->status = $model->status * (-1);
        $model->save();
        return 1;
    }
}
