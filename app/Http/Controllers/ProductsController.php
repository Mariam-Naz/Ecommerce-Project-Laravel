<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductsImages;
use App\Models\ProductsAttributes;
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
        $attributes = DB::table('products_attributes')->get();
        $images = DB::table('products_images')->get();
        return view('admin.product.viewProducts' , ['categories' =>$categories] , ['category_dropdown'=> $category_dropdown],['parent_categories'=> $parent_categories])->with(compact('products','attributes','images'));


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

    public function deleteAttribute($id=null){
        ProductsAttributes::where(['id'=>$id])->delete();
        // return redirect('/admin/view-products/');
    }

    public function updateStatus(Request $req , $id=null){
        $data = $req->all();
        Products::where(['id'=>$data['id']])->update(['status'=>$data['status']]);
    }

    public function updateFeatured(Request $req, $id = null)
    {
        $data = $req->all();
        Products::where(['id' => $data['id']])->update(['featured_product' => $data['featured']]);
    }

    public function products($id=null){
        $productDetails = Products::where(['id'=>$id])->first();
        $featuredProducts = Products::where(['featured_product'=>1])->get();
        return view('maryaaz.product_details')->with(compact('productDetails','featuredProducts'));
    }

    public function addAttributes(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    //Prevent Duplicate SKU Records
                    $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                    if($attrCountSKU > 0){
                        return redirect('/admin/view-products/')->with('atrributes-add-error','SKU Already Exists');
                    }
                    //Prevent Duplicate Size Records
                    $attrCountSize = ProductsAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSize > 0){
                        return redirect('/admin/view-products/')->with('atrributes-add-error',''.$data['size'][$key].' Size Already Exists');
                    }
                    $atrribute = new ProductsAttributes;
                    $atrribute->product_id = $id;
                    $atrribute->sku = $val;
                    $atrribute->size = $data['size'][$key];
                    $atrribute->price = $data['price'][$key];
                    $atrribute->stock = $data['stock'][$key];
                    $atrribute->save();
                }
            }
            return redirect('/admin/view-products/')->with('attributes-add-success','Attributes Added Successfully');
        }
        return view('admin.product.view-product')->with(compact('productDetails'));
    }

    public function editAttribute(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            ProductsAttributes::where(['id'=>$id])->update(['sku'=>$data['sku'],'size'=>$data['size'],'price'=>$data['price'],'stock'=>$data['stock']]);
        }
    }

    public function editImages(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            ProductsAttributes::where(['id'=>$id])->update(['sku'=>$data['sku'],'size'=>$data['size'],'price'=>$data['price'],'stock'=>$data['stock']]);
        }
    }

    public function addImages(Request $request, $id=null){
        $productDetails = Products::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new ProductsImages;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
            return redirect('/admin/view-products')->with('attributes-add-success','Images Added Successfully');
        }
        return view('admin.product.viewProducts')->with(compact('productDetails'));
    }

    public function getPrice(Request $req){
        $data = $req->all();
        $proArr = explode('-',$data['sizeId']);
        $proAttr = ProductsAttributes::where(["product_id"=>$proArr[0], 'size'=>$proArr[1]])->first();
        echo $proAttr->price;
    }
}
