@extends('maryaaz.layouts.master')
@section('content')

     <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                @foreach ($categories as $cat)
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#{{$cat->id}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{$cat->name}}
								</a>
                                    <div class="collapse" id="{{$cat->id}}" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach ($cat->categories as $subcat)
                                            <a href="{{url('/category/'.$subcat->id)}}" class="list-group-item list-group-item-action active">{{$subcat->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="brand-box">
                                <ul>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios1" value="Yes" type="radio">
                                            <label for="Radios1"> Supreme </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios2" value="No" type="radio">
                                            <label for="Radios2"> A Bathing Ape </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios3" value="declater" type="radio">
                                            <label for="Radios3"> The Hundreds </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios4" value="declater" type="radio">
                                            <label for="Radios4"> Alife </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios5" value="declater" type="radio">
                                            <label for="Radios5"> Neighborhood </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios6" value="declater" type="radio">
                                            <label for="Radios6"> CLOT </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios7" value="declater" type="radio">
                                            <label for="Radios7"> Acapulco Gold </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios8" value="declater" type="radio">
                                            <label for="Radios8"> UNDFTD </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios9" value="declater" type="radio">
                                            <label for="Radios9"> Mighty Healthy </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios10" value="declater" type="radio">
                                            <label for="Radios10"> Fiberops </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--******PRODUCT SECTION*********** -->

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                      <div class="title-all text-center">
                                        <h1>{{$categoryName->name}}</h1>
                                    </div>
                                    <div class="row">
                                        @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{asset('uploads/products/'.$product->image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{url('/products/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4 style="text-transform: capitalize;">{{$product->name}}</h4>
                                                    <h5> Rs.{{$product->price}}/-</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        @foreach ($products as $product)
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="{{asset('uploads/products/'.$product->image)}}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="{{url('/products/'.$product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4 style="text-transform: capitalize;">{{$product->name}}</h4>
                                                    <h5> Rs.{{$product->price}}/-</h5>
                                                    <p>{{$product->description}}</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{asset('front_assets/images/blog-img.jpg')}}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{asset('front_assets/images/blog-img-01.jpg')}}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{asset('front_assets/images/blog-img-02.jpg')}}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-01.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-02.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-03.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-04.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-06.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-07.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-08.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-09.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
@endsection
