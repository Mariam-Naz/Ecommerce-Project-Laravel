@extends('admin.layouts.master')
@section('title' , 'View Category')
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
                  <h1>Category</h1>
                  <small>Category List</small>
               </div>
            </section>

            <!-- Main content -->
        <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                      @if(Session::has('category-update-message'))
            <div class="alert alert-success">
                {{session('category-update-message')}}
            </div>
            @endif
                   @if(Session::has('deleted-message'))
            <div class="alert alert-danger">
                {{session('deleted-message')}}
            </div>
            @endif
             <div id='message_error' style='display:none;' class='alert alert-danger'>
                Status Disabled</div>
              <div id='message_success' style='display:none;' class='alert alert-success'>Status Enabled</div>
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href={{url('admin/view-categories')}}>
                                 <h4>View categories</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist">
                                 <a class="btn btn-add" href={{url('admin/add-category')}}> <i class="fa fa-plus"></i> Add Category
                                 </a>
                              </div>
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'json',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/json.png')}}" width="24" alt="logo"> JSON</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                    <img src="{{asset('admin_assets/dist/img/json.png')}}" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                 </li>
                                 <li><a href="#" onclick="$('#table_id').tableExport({type:'json',escape:'true'});">
                                    <img src="{{asset('admin_assets/dist/img/json.png')}}" width="24" alt="logo"> JSON (with Escape)</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="$('#table_id').tableExport({type:'xml',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/xml.png')}}" width="24" alt="logo"> XML</a>
                                 </li>
                                 <li><a href="#" onclick="$('#table_id').tableExport({type:'sql'});">
                                    <img src="{{asset('admin_assets/dist/img/sql.png')}}" width="24" alt="logo"> SQL</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'csv',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/csv.png')}}" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'txt',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/txt.png')}}" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'excel',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/xls.png')}}" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'doc',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/word.png')}}" width="24" alt="logo"> Word</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'powerpoint',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/ppt.png')}}" width="24" alt="logo"> PowerPoint</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" download onclick="$('#table_id').tableExport({type:'png',escape:'false'});">
                                    <img src="{{asset('admin_assets/dist/img/png.png')}}" width="24" alt="logo"> PNG</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#table_id').tableExport({type:'pdf',escape:'true' , pdfFontSize:'14'});" download='product.pdf'>
                                    <img src="{{asset('admin_assets/dist/img/pdf.png')}}" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>

                           <!-- TABLE -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>id</th>
                                       <th>Category Name</th>
                                       <th>Url</th>
                                       <th>Description</th>
                                       <th>Created_at</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($categories as $category)
                                    <tr>
                                       <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                       <td>{{$category->url}}</td>
                                       <td>{{$category->description}}</td>
                                       <td>{{$category->created_at}}</td>
                                       <td><input type='checkbox' rel='{{$category->id}}' class=' category-status btn btn-success' data-toggle="toggle" data-on='Active' data-onstyle='primary' data-offstyle='secondary' @if($category->status == 1) checked @endif ></td>
                                       <div id='myElement' hidden class='alert alert-success'>status Enabled</div>
                                       <td>
                                          <a class="btn btn-add btn-sm" data-toggle="modal" href="{{url('/admin/view-categories/'.$category->id)}}" data-target="#{{$category->id}}"><i class="fa fa-pencil"></i></a>
                                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$category->name}}"><i class="fa fa-trash-o"></i> </a>
                                       </td>
                                    </tr>
                                     @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
 @foreach ($categories as $category)
               <div class="modal fade" id={{$category->id}} tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Category</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" method='post' action={{url('/admin/view-category/'.$category->id)}}> @csrf
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Category Name</label>
                                          <input type="text" value="{{$category->name}}" placeholder="Category Name" class="form-control" name='category_name'>
                                       </div>
                                         <div class='form-group col-md-8'>
                                        <label>Url</label>
                                        <input type="url" value="{{$category->url}}" placeholder="Url" class="form-control" name='category_url'>
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-12 form-group">
                                          <label class="control-label">Description</label>
                                          <textarea placeholder="Description" class="form-control" name='category_description' value="{{$category->description}}" rows='5'>{{$category->description}}</textarea>
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="submit" class="btn btn-add" name='save'>Save</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
@endforeach
               <!-- /.modal -->
               <!-- Modal -->
               <!-- Category Delete Model -->
            @foreach ($categories as $category)
               <div class="modal fade" id="{{$category->name}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Category</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Category</label>
                                          <div class="pull-right">
                                             <a type="submit" href='{{url('/admin/delete-category/'.$category->id)}}' class="btn btn-danger btn-sm">YES</a>
                                             <button type="button" class="btn btn-add btn-sm" data-dismiss="modal">NO</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
            @endforeach
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->


@endsection
