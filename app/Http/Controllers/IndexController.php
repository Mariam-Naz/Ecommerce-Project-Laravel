<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Products;

class IndexController extends Controller
{
    public function index(){
        $banners = Banner::where('status' , 1)->orderby('sortOrder' , 'asc')->get();
        $categories = Category::with('categories')->where(['parentId'=>0])->get();
        $products = Products::get();
        return view('maryaaz.index')->with(compact('banners','categories','products'));
    }
}
