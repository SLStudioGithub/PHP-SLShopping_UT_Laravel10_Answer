<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap/css/bootstrap.min.css')}}" type="text/css">
  <!-- waves.css -->
  <link rel="stylesheet" href="{{ asset('/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
  <!-- themify icon -->
  <link rel="stylesheet" href="{{ asset('/icon/themify-icons/themify-icons.css')}}" type="text/css">
  <!-- font-awesome-n -->
  <link rel="stylesheet" href="{{ asset('/css/font-awesome-n.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css')}}" type="text/css">
  <!-- scrollbar.css -->
  <link rel="stylesheet" href="{{ asset('/css/jquery.mCustomScrollbar.css')}}" type="text/css">
  <!-- style.css -->
  <link rel="stylesheet" href="{{ asset('/css/style.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/admin/common.css')}}" type="text/css">

  @yield('styles')

  <!-- Required Jquery -->
  <script defer type="text/javascript" src="{{ asset('/js/jquery/jquery.min.js')}}"></script>
  <script defer type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.min.js')}}"></script>
  <script defer type="text/javascript" src="{{ asset('/js/popper.js/popper.min.js')}}"></script>
  <script defer type="text/javascript" src="{{ asset('/js/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- waves js -->
  <script defer type="text/javascript" src="{{ asset('/pages/waves/js/waves.min.js')}}"></script>
  <!-- jquery slimscroll js -->
  <script defer type="text/javascript" src="{{ asset('/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

  <!-- slimscroll js -->
  <script defer type="text/javascript" src="{{ asset('/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

  <!-- menu js -->
  <script defer type="text/javascript" src="{{ asset('/js/pcoded.min.js')}}"></script>
  <script defer type="text/javascript" src="{{ asset('/js/vertical/vertical-layout.min.js')}}"></script>

  <script defer type="text/javascript" src="{{ asset('/js/script.js')}}"></script>
  <script defer type="text/javascript" src="{{ asset('/js/admin/common.js')}}"></script>

  @yield('scripts')
</head>

<body>
  @include('admin.layouts.theme-loader')
  <div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">
      @include('admin.layouts.header')

      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('admin.layouts.sidebar')
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</body>

</html>