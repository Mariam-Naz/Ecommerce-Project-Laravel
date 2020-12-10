<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $req){
        if($req->isMethod('post')){
            $data = $req->input();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect('admin/dashboard');
            }else{
                return redirect('/admin')->with('error-message' , 'Invalid Email or Password!');
            }
        }
        return view('admin.admin-login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
