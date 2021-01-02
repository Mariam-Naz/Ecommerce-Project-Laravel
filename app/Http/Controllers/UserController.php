<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userloginRegister(){
        return view('maryaaz.user.login_register');
    }
}
