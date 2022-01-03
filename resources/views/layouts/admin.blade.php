<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/admin/plugins/toastr/toastr.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/plugins/sweetalert2/sweetalert2.css')}}">
</head>
<body >

<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">





@guest
@else
    


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('public/admindist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
 @include('layouts.admin_partial.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin_partial.sidebar')
  <!-- End Main Sidebar Container -->


  
  @endguest
 


@yield('admin_contant')








  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


</div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin/dist/js/pages/dashboard2.js')}}"></script>

<script  src="{{asset('public/admin/plugins/toastr/toastr.min.js')}}"></script>
<script  src="{{asset('public/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>







<script>
  @if(Session::has('messege'))
       var type="{{Session::get('alert-type','info')}}"
       switch(type){
           case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
           case 'success':
               toastr.success("{{ Session::get('messege') }}");
               break;
           case 'warning':
              toastr.warning("{{ Session::get('messege') }}");
               break;
           case 'error':
               toastr.error("{{ Session::get('messege') }}");
               break;
       }
     @endif
</script>

 <script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
              var link = $(this).attr("href");
              swal({
               title: "Are you sure?",
               text: "You will not be able to recover this imaginary file!",
               type: "warning",
               showCancelButton: true,
               confirmButtonClass: "btn-danger",
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "No, cancel!",
             },
             function(isConfirm) {
               if (isConfirm) {
                 swal("Deleted!", "Your imaginary file has been deleted.", "success");
                 window.location.href = link;
               } else {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
               }
             });
            });
    </script>
{{-- befor logout showing alert messeage --}}
<script>
  $(document).on("click", "#logout", function(e){
      e.preventDefault();
       var link = $(this).attr("href");
       swal({
        title: "Are you want to logout?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
      },
      function(isConfirm) {
        if (isConfirm) {
          // swal("Deleted!", "Your imaginary file has been deleted.", "success");
          window.location.href = link;
        } else {
          swal("not logout");
        }
      });
     });
</script>







</body>
</html>
