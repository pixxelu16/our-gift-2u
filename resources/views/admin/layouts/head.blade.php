<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/dataTables.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote --> 
  <link rel="stylesheet" href="{{ url('public/admin/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/admin/css/custom-style.css') }}">
  <!---custom sale--->
  <link rel="stylesheet" href="{{ url('public/admin/css/sale-custom.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ url('public/admin/plugins/dropzone/min/dropzone.min.css') }}">

 <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public/images/52-Orange-Favicon.svg') }}">

 <!--Call custom files-->
 <script src="{{ url('public/admin/cs/custom-style.css') }}"></script>
  <script>
      var base_url = '{{ url("admin/") }}'; 
  </script>
</head>