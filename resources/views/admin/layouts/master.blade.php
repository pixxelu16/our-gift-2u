@include('admin.layouts.head')
<!--Top Nav start-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>
</nav>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="admin-loader" style="display:none;">
      <img src="{{ url('public/admin/images/loader-img.gif') }}" class="loading-image">
   </div>
   <div class="wrapper">
   <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ url('public/admin/dist/img/AdminLTELogo.png') }}" alt="Wait.." height="60" width="60">
   </div>
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{ url('admin/all-orders') }}" class="brand-link">
         {{--<img src="{{ url('public/admin/images/logo.png') }} " alt="red3 sixty" class="brand-image img-circle elevation-3">--}} 
         <h3>Our Gift 2u <br>Dashboard</h3>
      </a>
      <div class="sidebar">
         @include('admin.sidebar.admin-sidebar')
      </div>
   </aside>
   <div class="content-wrapper ">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            </div>
         </div>
      </div>
      @yield('content')
   </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
   <script>
      $(document).ready(function() {
         $('#main_form').DataTable({
            "order": [[0, "desc"]] 
         });
         $('#example2').DataTable({
            "order": [[0, "desc"]] 
         }); 
      });
   </script>
   
   <script src="{{ url('public/admin/plugins/jquery/jquery.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <script src="{{ url('public/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <script src="{{ url('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/chart.js/Chart.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/sparklines/sparkline.js') }}"></script>
   <script src="{{ url('public/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
   <script src="{{ url('public/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/moment/moment.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <script src="{{ url('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
   <script src="{{ url('public/admin/dist/js/adminlte.js') }}"></script>
   <script src="{{ url('public/admin/plugins//bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
   <script src="{{ url('public/admin/dist/js/pages/dashboard.js') }}"></script>
   <script>
      $(function () {
        // Page Desc
        $('#page_description').summernote()
        // Page Short desc
        $('#page_short_desc').summernote()
        //technical details
        $('#technical_details').summernote()
      })
   </script>
   <!-- DataTables  & Plugins -->
   <script src="{{ url('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/jszip/jszip.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
   <!-- jquery-validation -->
   <script src="{{ url('public/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/select2/js/select2.full.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/dropzone/min/dropzone.min.js') }}"></script>
   <script src="{{ url('public/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
   <script src="{{ url('public/admin/dist/js/adminlte.min.js') }}"></script>

   <!--Call custom files-->
   <script src="{{ url('public/admin/js/custom-ajax.js') }}"></script>
   <script src="{{ url('public/admin/js/custom-script.js') }}"></script>
</body>
</html>
