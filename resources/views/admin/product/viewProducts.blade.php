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
        @if(Session::has('product-deleted-message'))
            <div class="alert alert-danger">
                {{session('product-deleted-message')}}
            </div>
            @endif
            @if(Session::has('attributes-add-success'))
            <div class="alert alert-success">
                {{session('attributes-add-success')}}
            </div>
            @endif
            @if(Session::has('atrributes-add-error'))
                <div class="alert alert-danger">
                    {{session('atrributes-add-error')}}
                </div>
                @endif
        <div id='message_error' style='display:none;' class='alert alert-danger'>
        Status Disabled</div>
        <div id='message_success' style='display:none;' class='alert alert-success'>Status Enabled</div>
                <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonexport">
                        <a href={{url('admin/view-products')}}>
                            <h4>View Products</h4>
                        </a>
                    </div>
                </div>
        <div class="panel-body">

    <!------------------------Plugin content:powerpoint,txt,pdf,png,word,xl --------------->
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
                <a href="#" onclick="$('#table_id').tableExport({type:'pdf',escape:'false' , pdfFontSize:'14'});" download='product.pdf'>
                <img src="{{asset('admin_assets/dist/img/pdf.png')}}" width="24" alt="logo"> PDF</a>
                </li>
            </ul>
        </div>

    <!----------------------- TABLE ------------------------------------------------------>
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
                        @foreach ($categories as $cat)
                        @if($cat->id == $product->parent_cat)
                            <td>{{$cat->name}}, {{$product->category_name}}</td>
                            @endif
                        @endforeach
                        <td>{{$product->code}}</td>
                        <td>{{$product->color}}</td>
                        <td><img src="{{asset('uploads/products/'.$product->image)}}"alt={{$product->image}} width="100" height="100"> </td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at}}</td>
                        <td><input type='checkbox' rel='{{$product->id}}' class=' product-status btn btn-success' data-toggle="toggle" data-on='Active' data-onstyle='primary' data-offstyle='secondary' @if($product->status == 1) checked @endif ></td>
                        <div id='myElement' hidden class='alert alert-success'>status Enabled</div>
                        <td>
                            <a class="btn btn-warning btn-sm" data-toggle="modal" href="{{url('/admin/view-product/'.$product->id)}}" data-target="#attribute{{$product->id}}"><i class="fa fa-list"></i></a>
                            <a class="btn btn-add btn-sm" data-toggle="modal" href="{{url('/admin/view-product/'.$product->id)}}" data-target="#{{$product->id}}"><i class="fa fa-pencil"></i></a>
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
            <!-- Add Attribute Model -->
        @foreach ($products as $product)
                    <div class="modal fade" id="attribute{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3><i class="fa fa-user m-r-5"></i> Add Attribute</h3>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="" method='post' enctype="multipart/form-data" action={{url('/admin/add-attributes/'.$product->id)}}> @csrf
                                        

                                            <!-- Text input-->
                                            <div class="row">
                                            <div class="col-md-8">
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Product Name</label> {{$product->name}}
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Code</label> {{$product->code}}
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Color</label> {{$product->color}}
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Price</label> {{$product->price}}
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                @if(!empty($product->image))
                                            <img src="{{asset('uploads/products/'.$product->image)}}"alt={{$product->image}} width="100" height="100" style='margin-bottom:5px;'>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                            <section>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="panel panel-bd">
                                                        <div class="panel-heading">
                                                            <div class="btn-group" id="buttonexport">
                                                                <a href={{url('admin/view-products')}}>
                                                                    <h4>Attributes</h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                <div class="panel-body">
                                            <!----------------------- TABLE ------------------------------------------------------>
                                            <div>        
                                            <div class="table-responsive">
                                                        <table id="table_id" class="table table-bordered table-striped">
                                                            <thead>
                                                            <tr class="info">
                                                                <th>Category ID</th>
                                                                <th>Product ID</th>
                                                                <th>SKU</th>
                                                                <th>Size</th>
                                                                <th>Price</th>
                                                                <th>Stock</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($productDetails['attributes'] as $attribute)
                                                            <tr>
                                                                <td>{{$attribute->id}}</td>
                                                                <td>{{$attribute->product_id}}</td>
                                                                <td>{{$attribute->sku}}</td>
                                                                <td>{{$attribute->size}}</td>
                                                                <td>{{$attribute->price}}</td>
                                                                <td>{{$attribute->stock}}</td>
                                                                <td>
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
                                            </div>
                                            </section>
                                            <div class="col-md-6 form-group">
                                                <div class="field_wrapper">
                                                    <div style="display: flex;">
                                                        <input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 65px"/>
                                                        <input type="text" name="size[]" id="size" placeholder="Size" class="form-control" style="width: 65px"/>
                                                        <input type="text" name="price[]" id="price" placeholder="Price" class="form-control" style="width: 65px"/>
                                                        <input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" style="width: 65px"/>
                                                        <a href="javascript:void(0);" class="add_button" title="Add field" class="form-control">Add</a>
                                                    </div>
                                                </div>
                                              </div>
                                    <div class="col-md-12 form-group">
                                                <label class="control-label">Description</label><br> {{$product->description}}
                                            </div>
                                            <div class="col-md-12 form-group user-form-group">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-add" name='save'>Save</button>
                                                </div>
                                            </div>
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
    </section>
            <!-- /.modal -->
                <!-- Product Edit Model -->
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
                                         <?php echo $category_dropdown ?>

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
                                    <img src="{{asset('uploads/products/'.$product->image)}}"alt={{$product->image}} width="50" height="50" style='margin-bottom:5px;'>
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
</section>
<!-- /.modal -->
            <!-- Modal -->
<!-- Product Delete Model -->
            @foreach ($products as $product)
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Delete Product</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal">
                                <fieldset>
                                    <div class="col-md-12 form-group user-form-group">
                                        <label class="control-label">Delete Product</label>
                                        <div class="pull-right">
                                            <a type="submit" href='{{url('/admin/delete-product/'.$product->id)}}' class="btn btn-danger btn-sm">YES</a>
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
        </section>
        <!-- /.content -->
</div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->


@endsection
