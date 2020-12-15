<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $req){
        if ($req->isMethod('post')) {
            $data = $req->all();
            $category = new Category();
            $category->name = $data['category_name'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            $category->save();
            return redirect('/admin/add-category')->with('category-added-message','Category has been added successfully!!');
        }
        return view('admin.category.add_category');
    }

    public function viewCategories(){
        $categories = Category::get();
        return view('admin.category.view_category')->with(compact('categories'));
    }

    public function editCategory(Request $req, $id = null){
        if ($req->isMethod('post')) {
            $data = $req->all();
            Category::where(['id'=>$id])->update(['name' => $data['category_name'], 'url' => $data['category_url'], 'description' => $data['category_description']]);
            return redirect()->back()->with('category-update-message', "Category has been updated successfully!!");
        }
        return view('admin.category.add_category');
    }
    
}
