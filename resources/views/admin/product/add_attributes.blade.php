@extends('admin.layouts.master')
@section('title' , 'Products Attributes')
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
                  <h1>Products Attributes</h1>
                  <small>Add Product Attributes</small>
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
                           <form class="col-sm-6" enctype="multipart/form-data" action={{url('/admin/add-attributes/'.$productDetails->id)}} method="post"> @csrf
                              <div class="form-group">
                                 <label>Product Name</label> {{$productDetails->name}}
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label> {{$productDetails->code}}
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label> {{$productDetails->color}}
                              </div>
                              <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="field_name[]" value=""/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="number" class="form-control" placeholder="Enter Product Price" name='product_price' required>
                              </div>
                              <div class="reset-button">
                                    <input type='submit' class="btn btn-success" value='Add Attributes'>
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

