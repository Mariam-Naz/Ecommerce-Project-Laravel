
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='csrfToken' content="{{csrf_token()}}">
    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('front_assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('front_assets/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
@include('maryaaz.layouts.header')
@yield('content')
@include('maryaaz.layouts.footer')

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <script src="{{asset('front_assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('front_assets/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('front_assets/js/inewsticker.js')}}"></script>
    <script src="{{asset('front_assets/js/bootsnav.js.')}}"></script>
    <script src="{{asset('front_assets/js/images-loded.min.js')}}"></script>
    <script src="{{asset('front_assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('front_assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('front_assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('front_assets/js/custom.js')}}"></script>

    <script>
        $(document).ready(function(){
          $('#saleSize').change(function(){
             var sizeId = $(this).val();
              $.ajax({
                  type: 'get',
                  url: '/get-product-price',
                  data: {sizeId:sizeId},
                  success: function(resp){
                      $('.product-price').html('Rs. '+resp+'/-');
                  },error: function(){
                      alert("Error");
                  }
              })
          })
        })
    </script>
</body>

</html>
