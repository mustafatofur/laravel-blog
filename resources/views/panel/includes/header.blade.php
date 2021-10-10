<!DOCTYPE html>
<html lang="tr" class="no-js">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel - {{$title}}</title>

    <link href="{{asset('admin/')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('admin/')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('admin/')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('admin/')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('admin/')}}/css/style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="{{asset('admin/')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    @if (Route::currentRouteNamed('posts') || Route::currentRouteNamed('categories') || Route::currentRouteNamed('messages'))
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="{{asset('admin/')}}/css/switch.css">
        @endif

        @if (Route::currentRouteNamed('postAdd') || Route::currentRouteNamed('postEdit'))
            <script src="{{asset('admin/')}}/css/ckeditor/ckeditor.js"></script>
        @endif
</head>

<body>
  @if (session('demo'))
    <script type="text/javascript">
      window.alert('{{session('demo')}}');
    </script>
  @endif
<div id="wrapper">
    @include('panel.includes.nav')

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">




                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
      </div>
