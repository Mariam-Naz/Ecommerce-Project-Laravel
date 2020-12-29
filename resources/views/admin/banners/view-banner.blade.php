@extends('admin.layouts.master')
@section('title' , 'View Banners')
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
                  <h1>Banner</h1>
                  <small>Banner List</small>
               </div>
            </section>

            <!-- Main content -->
        <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                      @if(Session::has('banner-update-message'))
            <div class="alert alert-success">
                {{session('banner-update-message')}}
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
                              <a href={{url('admin/banner')}}>
                                 <h4>View Banners</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist">
                                 <a class="btn btn-add" href={{url('admin/add-banner')}}> <i class="fa fa-plus"></i> Add Banner
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
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Text Style</th>
                                       <th>Content</th>
                                       <th>Link</th>
                                       <th>Sort Order</th>
                                       <th>Image</th>
                                       <th>Created_at</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($banners as $banner)
                                    <tr>
                                       <td>{{$banner->id}}</td>
                                        <td>{{$banner->name}}</td>
                                        <td>{{$banner->textStyle}}</td>
                                        <td>{{$banner->content}}</td>
                                        <td>{{$banner->link}}</td>
                                       <td>{{$banner->sortOrder}}</td>
                                         <td><img src="{{asset('uploads/banners/'.$banner->image)}}"alt={{$banner->image}} width="100" height="100"> </td>
                                       <td>{{$banner->created_at}}</td>
                                       <td><input type='checkbox' rel='{{$banner->id}}' class=' banner-status btn btn-success' data-toggle="toggle" data-on='Active' data-onstyle='primary' data-offstyle='secondary' @if($banner->status == 1) checked @endif ></td>
                                       <div id='myElement' hidden class='alert alert-success'>status Enabled</div>
                                       <td>
                                          <a class="btn btn-add btn-sm" data-toggle="modal" href="{{url('/admin/banner/'.$banner->id)}}" data-target="#{{$banner->id}}"><i class="fa fa-pencil"></i></a>
                                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> </a>
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
 @foreach ($banners as $banner)
               <div class="modal fade" id={{$banner->id}} tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Banner</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" method='post' enctype="multipart/form-data"  action={{url('/admin/view-banners/'.$banner->id)}}> @csrf
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-4 form-group">
                                          <label class="control-label">Banner Name</label>
                                          <input type="text" value="{{$banner->name}}" placeholder="Banner Name" class="form-control" name='banner_name'>
                                       </div>
                                        <div class='form-group col-md-4'>
                                        <label class="control-label">Text Style</label>
                                        <input type="text" value="{{$banner->textStyle}}" placeholder="Text Style" class="form-control" name='banner_textStyle'>
                                       </div>
                                         <div class='form-group col-md-4'>
                                        <label class="control-label">Sort Order</label>
                                        <input type="text" value="{{$banner->sortOrder}}" placeholder="Sort Order" class="form-control" name='banner_sortOrder'>
                                       </div>
                                        <div class='form-group col-md-6'>
                                        <label class="control-label">Link</label>
                                        <input type="url" value="{{$banner->link}}" placeholder="Link" class="form-control" name='banner_link'>
                                       </div>
                                       <div class="form-group col-md-6">
                                                    @if(!empty($banner->image))
                                                <img src="{{asset('uploads/banners/'.$banner->image)}}"alt={{$banner->image}} width="50" height="50" style='margin-bottom:5px;'>
                                                @endif
                                        <label class="control-label">Picture upload</label>
                                        <input type="file" name="image">
                                        <input type="hidden" name="current_image" value="{{$banner->image}}">
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label class="control-label">Content</label>
                                        <textarea class="form-control" name='banner_content'>{{$banner->content}}</textarea>
                                       </div>
                                       <!-- Text input-->

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
               <!-- banner Delete Model -->
            @foreach ($banners as $banner)
               <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Delete Banner</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal">
                                <fieldset>
                                    <div class="col-md-12 form-group user-form-group">
                                        <label class="control-label">Delete Banner</label>
                                        <div class="pull-right">
                                            <a type="submit" href='{{url('/admin/delete-banner/'.$banner->id)}}' class="btn btn-danger btn-sm">YES</a>
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
