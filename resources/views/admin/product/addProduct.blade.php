@extends('admin.layouts.master')
@section('title' , 'Add Product')
@section('content')
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product</h1>
                  <small>Product list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                       @if(Session::has('success-message'))
                                <div class='alert alert-success'>
                                {{session('success-message')}}
                            </div>
                            @endif
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist">
                              <a class="btn btn-add " href="{{url('/admin/view-products')}}">
                              <i class="fa fa-eye"></i> View Products</a>
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action={{url('/admin/add-product')}} method="post"> @csrf
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Product Name" name='product_name' required>
                              </div>
                              <div class='form-group'>
                              <label>Category</label>
                              <select name='category_id' class="form-control">
                                    <?php echo $category_dropdown ?>
                                 </select>
                                </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" class="form-control" placeholder="Enter Product Code" name='product_code' required>
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="color"  placeholder="Enter Product Color" name='product_color' required>
                              </div>
                              <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea class="form-control" rows='5' placeholder="Enter Product Description" name='product_description' required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="number" class="form-control" placeholder="Enter Product Price" name='product_price' required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                              </div>
                              <div class="reset-button">
                                    <input type='submit' class="btn btn-success" value='Add Product'>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
@endsection

