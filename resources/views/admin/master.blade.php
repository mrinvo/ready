<!doctype html>
<html dir='rtl'>

    <head>

        <meta charset="utf-8" />
        <title>سدد ديونك</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

                <!-- DataTables -->
                <link href="/dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
                <link href="/dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
                <link href="/dashboard/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('dashboard/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        {{-- toaster --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


@include('admin.layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
@include('admin.layouts.left-sidbar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

@yield('content')
                <!-- End Page-content -->


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
@include('admin.layouts.right-sidbar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>


        <!-- apexcharts -->
        <script src="{{ asset('dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

               <!-- Buttons examples -->
               <script src="/dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
               <script src="/dashboard/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
               <script src="/dashboard/assets/libs/jszip/jszip.min.js"></script>
               <script src="/dashboard/assets/libs/pdfmake/build/pdfmake.min.js"></script>
               <script src="/dashboard/assets/libs/pdfmake/build/vfs_fonts.js"></script>
               <script src="/dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
               <script src="/dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
               <script src="/dashboard/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

               <script src="/dashboard/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
               <script src="/dashboard/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js') }}"></script>
                <!-- Datatable init js -->
                <script src="/dashboard/assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
        {{-- toaster --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <script>

$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'هل انت متاكد من مسح هذا المستخدم ؟',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'الغاء',
                    confirmButtonText: 'نعم امسح'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })


    });

  });
 </script>
 <script>
    document.querySelector('#rtl-mode-switch').click()
    // function changeLayoutDirection(lang){
    //     if(lang=='ar'){
    //         alert('123231132123')
    //         document.querySelector('#rtl-mode-switch').click()
    //     }else{
    //         alert('12323113212312wqqqw')
    //         document.querySelector('#light-mode-switch').click()
    //     }
    // }

 </script>
    </body>

</html>

