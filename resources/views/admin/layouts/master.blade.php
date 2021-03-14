<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title') - Maryaaz</title>
       <meta name='csrf-token' content="{{csrf_token()}}">
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="{{asset('admin_assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href={{asset('admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}} rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href={{asset('admin_assets/bootstrap/css/bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href={{asset('admin_assets/bootstrap-rtl/bootstrap-rtl.min.css')}} rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href={{asset('admin_assets/plugins/lobipanel/lobipanel.min.css')}} rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href={{asset('admin_assets/plugins/pace/flash.css')}} rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href={{asset('admin_assets/font-awesome/css/font-awesome.min.css')}} rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href={{asset('admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}} rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href={{asset('admin_assets/themify-icons/themify-icons.css')}} rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins
         =====================================================================-->
      <!-- Emojionearea -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
      <link href={{asset('admin_assets/plugins/emojionearea/emojionearea.min.css')}} rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href={{asset('admin_assets/plugins/monthly/monthly.css')}} rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href={{asset('admin_assets/dist/css/stylecrm.css')}} rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href={{asset('admin_assets/dist/css/stylecrm-rtl.css')}} rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
</head>

<body class="hold-transition sidebar-mini">
         <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
    @include('admin.layouts.header')
     @include('admin.layouts.sidebar')
    @yield('content')
    @include('admin.layouts.footer')

      </div>
        <!-- /.wrapper -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- jquery-ui --->
      <script src={{asset('admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}} type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src={{asset('admin_assets/bootstrap/js/bootstrap.min.js')}} type="text/javascript"></script>
      <!-- lobipanel -->
      <script src={{asset('admin_assets/plugins/lobipanel/lobipanel.min.js')}} type="text/javascript"></script>
      <!-- Pace js -->
      <script src={{asset('admin_assets/plugins/pace/pace.min.js')}} type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src={{asset('admin_assets/plugins/slimScroll/jquery.slimscroll.min.js')}} type="text/javascript">    </script>
      <!-- FastClick -->
      <script src={{asset('admin_assets/plugins/fastclick/fastclick.min.js')}} type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src={{asset('admin_assets/dist/js/custom.js')}} type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src={{asset('admin_assets/plugins/chartJs/Chart.min.js')}} type="text/javascript"></script>

      <! =================================================================-->
      <!---------------- export file plugin ---------------->
       <script src={{asset('admin_assets/plugins/table-export/tableExport.js')}} type="text/javascript"></script>
       <script src={{asset('admin_assets/plugins/table-export/jquery.base64.js')}} type="text/javascript"></script>
       <script src={{asset('admin_assets/plugins/table-export/sprintf.js')}} type="text/javascript"></script>
         <script src="{{asset('admin_assets/plugins/table-export/jspdf.js')}}" type="text/javascript"></script>
         <script src="{{asset('admin_assets/plugins/table-export/base64.js')}}" type="text/javascript"></script>

         <script src={{asset('admin_assets/plugins/table-export/html2canvas.js')}} type="text/javascript"></script>

      <!-- Counter js -->
      <script src={{asset('admin_assets/plugins/counterup/waypoints.js')}} type="text/javascript"></script>
      <script src={{asset('admin_assets/plugins/counterup/jquery.counterup.min.js')}} type="text/javascript"></script>
      <!-- Monthly js -->
      <script src={{asset('admin_assets/plugins/monthly/monthly.js')}}  type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src={{asset('admin_assets/dist/js/dashboard.js')}} type="text/javascript"></script>
      <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready( function () {
               $('#table_id').DataTable();

    $('.product-status').change(function(){
        var id = $(this).attr('rel');
        if($(this).prop("checked") == true){
            $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-product',
                data: {status:'1' ,id:id},
                success:function(resp){
                    $('#message_success').show();
                    setTimeout(function(){
                        $('#message_success').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }else{
             $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-product',
                data: {status:'0' ,id:id},
                success:function(resp){
                    $('#message_error').show();
                    setTimeout(function(){
                        $('#message_error').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }
    });

      $('.category-status').change(function(){
        var id = $(this).attr('rel');
        if($(this).prop("checked") == true){
            $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-category',
                data: {status:'1' ,id:id},
                success:function(resp){
                    $('#message_success').show();
                    setTimeout(function(){
                        $('#message_success').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }else{
             $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-category',
                data: {status:'0' ,id:id},
                success:function(resp){
                    $('#message_error').show();
                    setTimeout(function(){
                        $('#message_error').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }
    });

     $('.banner-status').change(function(){
        var id = $(this).attr('rel');
        if($(this).prop("checked") == true){
            $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-banner',
                data: {status:'1' ,id:id},
                success:function(resp){
                    $('#message_success').show();
                    setTimeout(function(){
                        $('#message_success').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }else{
             $.ajax({
                headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-banner',
                data: {status:'0' ,id:id},
                success:function(resp){
                    $('#message_error').show();
                    setTimeout(function(){
                        $('#message_error').fadeOut('slow');
                    }, 1000)
                },error:function(){
                    alert('Error');
                }
            })
        }
    });

            } );
            //Add Fields Dynamincally
            $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div style="display: flex; margin: 10px 90px;"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 85px"/><input type="text" name="size[]" id="size" placeholder="Size" class="form-control" style="width: 85px"/><input type="text" name="price[]" id="price" placeholder="Price" class="form-control" style="width: 85px"/><input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" style="width: 85px"/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });

            //EDIT ATTRIBUTE
            $('.edit-attr').on('click',function(){
                var editId = $(this).attr('id');
                var sku = $('input[ data-id="sku'+editId+'"]').val();
                var size = $('input[data-id="size'+editId+'"]').val();
                var price = $('input[data-id="price'+editId+'"]').val();
                var stock = $('input[data-id="stock'+editId+'"]').val();
                var proId = $('input[data-id="product'+editId+'"]').val();
                 $.ajax({
                     headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/edit-attribute/'+editId,
                data: {
                    sku: sku,
                    size: size,
                    price: price,
                    stock: stock
                },
                success:function(){

                     $('#attribute'+proId).find('#message_update'+proId).show();
                    setTimeout(function(){
                        $('#message_update'+proId).fadeOut('slow');
                    }, 1000)
                },
                error:function(){
                    alert('Error');
                }
             })
            })

            //DELETE ATTRIBUTE
            $('.delete-attr').on('click',function(){
                  var deleteId = $(this).attr('data-id');
                   var proId = $('input[data-id="product'+deleteId+'"]').val();
                  console.log(deleteId);
                   $.ajax({
                     headers:{
                   'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/delete-attribute/'+deleteId,
                data: {
                   deleteId: deleteId
                },
                success:function(data){
                    data = $(data).find('#attribute'+proId+ ' #attr_table').html();

                     $('#attribute'+proId).find('#message_delete'+proId).show();
                    setTimeout(function(){
                        $('#message_delete'+proId).fadeOut('slow');
                    }, 1000)
                     $('#attribute'+proId).find('#tr'+deleteId).remove();
                },
                error:function(){
                    alert('Error');
                }
             })
            })
            });


        </script>


        <!-- =====================================================================-->
      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });

         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();
      </script>
      <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.css">
      <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js'></script>

</body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>




