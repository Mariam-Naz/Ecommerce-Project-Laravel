<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userloginRegister(){
        return view('maryaaz.user.login_register');
    }

    public function userRegister(Request $req){
        if ($req->isMethod('post')) {
            $data = $req->all();

            $existEmail = User::where(['email'=>$data['email']])->count();
            if($existEmail > 0){
                return redirect()->back()->with('email-exist-message', 'Email already exist');
            }else{
                $user = new User();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Session::put('frontSession', $data['email']);
                return redirect('/');
            }
        }
        }

    }

    public function userLogin(Request $req){
        if ($req->isMethod('post')) {
            $data = $req->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Session::put('frontSession', $data['email']);
                return redirect('/');
            } else {
                return redirect()->back()->with('login-error-message', 'Invalid Email or Password!');
            }
        }
        return view('admin.admin-login');
    }

    public function userLogout(){
        Session()->forget('frontSession');
        Auth::logout();
        return redirect('/');
    }

    public function userAccount(){
        return view('maryaaz.user.account');
    }

    public function changePassword(){
        return view('maryaaz.user.change_password');
    }
}
