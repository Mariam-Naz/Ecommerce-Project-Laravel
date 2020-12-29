<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function addProduct(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();

            $product = new Products();
            $product->name = $data['product_name'];
            $product->category_id = $data['category_id'];
            $product->code = $data['product_code'];
            $product->color = $data['product_color'];
            if(!empty($data['product_description'])){
            $product->description = $data['product_description'];
            }else{
                $product->description = '';
            }
            $product->price = $data['product_price'];
            if ($req->hasFile('image')) {
                echo $imp_tmp = $req->file('image');
                if($imp_tmp->isValid()){
                $extension = $imp_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999). '.' .$extension;
                $imgPath = 'uploads/products/'.$fileName;
                Image::make($imp_tmp)->resize(500,500)->save($imgPath);
                $product->image = $fileName;
            }
        }
            $product->save();
            return redirect('/admin/add-product')->with('success-message' , "Product has been successfully added!!");

        }
        //category dropdown menu code
        $categories = Category::where(['parentId'=>0])->get();
        $category_dropdown = "<option value='0' selected disabled>Select</option>";
        foreach($categories as $cat){
            $category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parentId'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $category_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        return view('admin.product.addProduct')->with(compact('category_dropdown'));
    }

    public function viewProducts(){
        $products = DB::table('products')->join("categories", "categories.id", "=", "products.category_id")->select('products.*', 'categories.name as category_name' , 'categories.parentId as parent_cat')->get();
        $categories =  Category::get();
        $parent_categories = Category::where(['parentId' => 0])->get();
        //category dropdown menu code
        $categories_update = Category::where(['parentId' => 0])->get();
        $category_dropdown = "<option></option";
        foreach ($categories_update as $cat) {
            $category_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories_update = Category::where(['parentId' => $cat->id])->get();
            foreach ($sub_categories_update as $sub_cat) {
                $category_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
            }
        }
        return view('admin.product.viewProducts' , ['categories' =>$categories] , ['category_dropdown'=> $category_dropdown],['parent_categories'=> $parent_categories])->with(compact('products'));


    }

    public function editProduct(Request $req, $id=null){
        if ($req->isMethod('post')) {
            $data = $req->all();
            if (empty($data['product_description'])) {
               $data['product_description']='';
            }
            if ($req->hasFile('image')) {
                echo $imp_tmp = $req->file('image');
                if ($imp_tmp->isValid()) {
                    $extension = $imp_tmp->getClientOriginalExtension();
                    $fileName = rand(111, 99999) . '.' . $extension;
                    $imgPath = 'uploads/products/' . $fileName;
                    Image::make($imp_tmp)->resize(500, 500)->save($imgPath);
                }
            }else{
                $fileName = $data['current_image'];
            }
            Products::where(['id'=>$id])->update(['name'=>$data['product_name'],'category_id' => $data['category_id'], 'code'=>$data['product_code'],'color'=>$data['product_color'], 'description'=>$data['product_description'], 'price'=>$data['product_price'], 'image'=>$fileName]);
            return redirect('/admin/view-products')->with('update-message', "Product has been updated successfully!!");
        }

        return view('admin.product.viewProducts')->with(compact('category_dropdown'));

    }

    public function deleteProduct($id=null){
        Products::where(['id'=>$id])->delete();
        return redirect()->back()->with('product-deleted-message', 'Product has been deleted successfully!!');
    }

    public function updateStatus(Request $req , $id=null){
        $data = $req->all();
        Products::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
    }
}
