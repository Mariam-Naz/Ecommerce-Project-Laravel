@extends('admin.layouts.master')
@section('title' , 'View Product')
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
                  <h1>Product</h1>
                  <small>Product List</small>
               </div>
            </section>

            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                      @if(Session::has('update-message'))
            <div class="alert alert-success">
                {{session('update-message')}}
            </div>
            @endif
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href={{url('admin/view-products')}}>
                                 <h4>View Products</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist">
                                 <a class="btn btn-add" href={{url('admin/add-product')}}> <i class="fa fa-plus"></i> Add Product
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
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Product Name</th>
                                       <th>Category</th>
                                       <th>code</th>
                                       <th>Color</th>
                                       <th>Image</th>
                                       <th>Description</th>
                                       <th>Price</th>
                                       <th>Created at</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($products as $product)
                                    <tr>
                                       <td>{{$product->name}}</td>
                                        <td>{{$product->category_id}}</td>
                                       <td>{{$product->code}}</td>
                                       <td>{{$product->color}}</td>
                                       <td><img src="{{asset('uploads/product/'.$product->image)}}"alt={{$product->image}} width="100" height="100"> </td>
                                       <td>{{$product->description}}</td>
                                       <td>{{$product->price}}</td>
                                       <td>{{$product->created_at}}</td>
                                       <td><span class="label-custom label label-default">Active</span></td>
                                       <td>
                                          <a class="btn btn-add btn-sm" data-toggle="modal" href="{{url('/admin/view-product/'.$product->id)}}" data-target="#{{$product->id}}"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-product/'.$product->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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
 @foreach ($products as $product)
               <div class="modal fade" id={{$product->id}} tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Product</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="" method='post' enctype="multipart/form-data" action={{url('/admin/view-product/'.$product->id)}}> @csrf
                                    <fieldset>

                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Product Name</label>
                                          <input type="text" value="{{$product->name}}" placeholder="Product Name" class="form-control" name='product_name'>
                                       </div>
                                         <div class='form-group col-md-6'>
                                        <label class="control-label">Category</label>
                                        <select name='category_id' class="form-control">
                                               <option selected value='{{$product->category_id}}'> <?php echo $product->category_name ?> </option>
                                               @foreach($categories as $cat)
                                               <option value='{{$cat->id}}'><?php echo $cat->category_name ?></option>
                                               @endforeach
                                            </select>
                                        </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Code</label>
                                          <input type="text" placeholder="Code" class="form-control" name='product_code' value="{{$product->code}}">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Color</label>
                                          <input type="color" class="form-control" name='product_color' value="{{$product->color}}">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Price</label>
                                          <input type="number" placeholder="Price" class="form-control" value="{{$product->price}}" name='product_price'>
                                       </div>
                                         <div class="form-group col-md-6">
                                              @if(!empty($product->image))
                                          <img src="{{asset('uploads/product/'.$product->image)}}"alt={{$product->image}} width="50" height="50" style='margin-bottom:5px;'>
                                          @endif
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                                  <input type="hidden" name="current_image" value="{{$product->image}}">
                              </div>
                               <div class="col-md-12 form-group">
                                          <label class="control-label">Description</label><br>
                                          <textarea name="product_description" rows="5" cols='37'>{{$product->description}}</textarea>
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
               <!-- Customer Modal2 -->
               <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Customer</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
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
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->


@endsection