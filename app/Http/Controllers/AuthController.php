<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\AdminUsers;
use App\Models\Users;
use App\Models\BusinessList;

class AuthController extends Controller
{
    // =======================================================
    // ----------------- Admin Signin & Signup ---------------
    // =======================================================

    public function signin(Request $req)
    {
        return view('content.authentication.signin');
    }

    public function signup()
    {
        return view('content.authentication.signup');
    }



    // =============================================================
    // ------------------ Company Login @ Register -----------------
    // =============================================================
    public function login()
    {
        return view('content.authentication.login');
    }

    public function register()
    {
        return view('content.authentication.register');
    }



    // ==============================================================
    // --------------------- Forgot Password ------------------------
    // ==============================================================
    public function forgotPassword($flag)
    {
        return view('content.authentication.forgot-password', ['flag' => $flag]);
    }



    // ==============================================================
    // ---------------------- Reset Password ------------------------
    // ==============================================================
    public function resetPassword($flag)
    {
        return view('content.authentication.reset-password', ['flag' => $flag]);
    }

    public function SigninAdmin(Request $req)
    {
        $admin = AdminUsers::where('email', $req->email);

        if ($admin->count()) {
            $database_password = Crypt::decryptString($admin->get('password')[0]->password);

            if ($database_password == $req->password) {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }

    public function SignupAdmin(Request $req)
    {
        if (AdminUsers::where('email', $req->email)->count()) {
            return 0;
        } else {
            $model = new AdminUsers;

            $model->firstname       = $req->firstname;
            $model->lastname        = $req->lastname;
            $model->email           = $req->email;
            $model->password        = Crypt::encryptString($req->password);
            $model->role_id         = 3;

            $model->save();

            return 1;
        }
    }

    public function LoginUser(Request $req)
    {
        $admin = Users::where('email', $req->email);

        if ($admin->count()) {
            $database_password = Crypt::decryptString($admin->get('password')[0]->password);

            if ($database_password == $req->password) {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }

    public function RegisterUser(Request $req)
    {
        if (Users::where('email', $req->email)->count()) {
            return 0;
        } else {
            $model = new Users;

            $model->firstname       = $req->firstname;
            $model->lastname        = $req->lastname;
            $model->email           = $req->email;
            $model->password        = Crypt::encryptString($req->password);
            $model->company         = 0;
            $model->role            = 1;

            $model->save();

            return 1;
        }
    }

    public function postEmail(Request $req)
    {
        return $req->email;

        $token = Str::random(64);

        Mail::send('content.authentication.verify-email', ['token' => $token], function($message) use($req){
            $message->to($req->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}
