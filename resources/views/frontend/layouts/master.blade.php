<!DOCTYPE html>
<html lang="zh-TW">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->

    <!-- Custom fonts for this template -->
     <link rel="shortcut icon" href="{{ asset('img/sleepingcake.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style8.css') }}" rel="stylesheet">  <!-- 改成自訂模板  -->

    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> -->

  </head>

  <body>

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')


  </body>

</html>


