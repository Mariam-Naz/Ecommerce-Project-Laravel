@extends('admin.layouts.master')
@section('title' , 'Add Category')
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
                  <h1>Add Category</h1>
                  <small>Category list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                       @if(Session::has('category-added-message'))
                                <div class='alert alert-success'>
                                {{session('category-added-message')}}
                            </div>
                            @endif
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist">
                              <a class="btn btn-add " href="{{url('/admin/view-categories')}}">
                              <i class="fa fa-eye"></i> View Categories</a>
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action={{url('/admin/add-category')}} method="post"> @csrf
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Category Name" name='category_name' required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select class="form-control" name='parent_id' required>
                                    <option value='0'>--Parent Category--</option>
                                    @foreach ($levels as $level)
                                         <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="url" class="form-control" placeholder="Enter Category Url" name='category_url' required>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" rows='5' placeholder="Enter Category Description" name='category_description' required></textarea>
                              </div>
                              <div class="reset-button">
                                    <input type='submit' class="btn btn-success" value='Add Category'>
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

