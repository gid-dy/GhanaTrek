<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ghana-Trek</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/frontend_images/icon.png') }}" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/prettyphoto/css/prettyphoto.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/hover/hoverex-all.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/jetmenu/jetmenu.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owl-carousel/owl-carousel.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/frontend_css/colors/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/frontend_css/colors/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('css/frontend_css/shop.css') }}">


</head>

{{--  {{ asset('css/backend_css/bootstrap.min.css') }}  --}}
    {{--  @include('layouts.frontLayout.user_topbar')
    @include('layouts.frontLayout.user_header')  --}}

    @yield('content')

    {{--  @include('layouts.frontLayout.user_subscription')--}}

    @include('layouts.frontLayout.user_footer')








<!-- JavaScript Libraries -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/php-mail-form/validate.js') }}"></script>
    <script src="{{ asset('lib/prettyphoto/js/prettyphoto.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.min.js') }}"></script>
    <script src="{{ asset('lib/hover/hoverdir.js') }}"></script>
    <script src="{{ asset('lib/hover/hoverex.min.js') }}"></script>
    <script src="{{ asset('lib/unveil-effects/unveil-effects.js') }}"></script>
    <script src="{{ asset('lib/owl-carousel/owl-carousel.js') }}"></script>
    <script src="{{ asset('lib/jetmenu/jetmenu.js') }}"></script>
    <script src="{{ asset('lib/animate-enhanced/animate-enhanced.min.js') }}"></script>
    <script src="{{ asset('lib/jigowatt/jigowatt.js') }}"></script>
    <script src="{{ asset('lib/easypiechart/easypiechart.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


    <!-- Template Main Javascript File -->
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>
    <script src="{{ asset('js/frontend_js/validate.js') }}"></script>


</html>
