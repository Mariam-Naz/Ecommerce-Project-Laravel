@extends('admin.layouts.master')
@section('title' , 'Add Banner')
@section('content')
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Add Banner</h1>
                  <small>Banner</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                       @if(Session::has('banner-added-message'))
                                <div class='alert alert-success'>
                                {{session('banner-added-message')}}
                            </div>
                            @endif
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist">
                              <a class="btn btn-add " href="{{url('/admin/view-banners')}}">
                              <i class="fa fa-eye"></i> View Banners</a>
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action={{url('/admin/add-banner')}} method="post"> @csrf
                              <div class="form-group">
                                 <label>Banner Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Name" name='banner_name' required>
                              </div>
                              <div class='form-group'>
                              <label>Text Style</label>
                              <input type='text' name='text_style' placeholder="Enter Text Style" class="form-control">
                                </div>
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea class="form-control" rows='3' name='content' required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="url" class="form-control" placeholder="Enter Link" name='link' required>
                              </div>
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="number" class="form-control" placeholder="Sort Order" name='sort_order' required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                              </div>
                              <div class="reset-button">
                                    <input type='submit' class="btn btn-success" value='Add Banner'>
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

