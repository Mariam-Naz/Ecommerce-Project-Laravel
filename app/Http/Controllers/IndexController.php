<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class IndexController extends Controller
{
    public function index(){
        $banners = Banner::where('status' , 1)->orderby('sortOrder' , 'asc')->get();
        return view('maryaaz.index')->with(compact('banners'));
    }
}
