     <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title>@yield('title') - {{config('app.name')}}</title>
    <meta name="description" content=" ">
     <meta name="Author" content=" ">
<meta name="keywords" content=" " />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<!-- Favicons -->
<link href="{{URL::asset('img/favicon.png')}}" rel="icon">
<link href="{{URL::asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap core CSS -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2"> -->

    <!-- Styles -->
   <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Scripts -->


  </head>
    <body>

      <!--==========================
  Header
============================-->
<header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <!-- Uncomment below if you prefer to use a text logo -->
      <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
      <a href="#intro" class="scrollto"><img src="{{URL::asset('img/logo.png')}}" alt="" title=""></a>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <!-- <li class="menu-active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#speakers">Service</a></li>
        <li><a href="#schedule">upcoming events</a></li> -->
            @auth

  <li>
    <a href="{{ url('/') }}"> Welcome    {{ Auth::user()->username }}</a>
  </li>
            @if(checkPermission(['user']))
  <li class="menu-active"><a href="#">Dashboard</a></li>
    <li ><a href="#">Affilate Link</a></li>
              @elseif(checkPermission(['admin']))


                @elseif(checkPermission(['superadmin']))

    <li class="menu-active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li ><a href="{{ route('videoDelete') }}">Delete Videos</a></li>
      <li ><a href="{{ route('videoUpload') }}">Upload Videos</a></li>
        <li ><a href="{{ route('verifyUser') }}">Verify Users</a></li>
          <li ><a href="{{ route('control') }}">About | Service</a></li>

                    @elseif(checkPermission(['invaliduser']))
  <li ><a href="{{route('package')}}">Select Package</a></li>

                @else
                I don't have any records!
            @endif
            @endauth
<li>  <a href="{{route('logout') }}" class="button secondary">Logout</a></li>

@unless (Auth::check())
    <li>  <a href="{{ route('register') }}" class="button primary">Register</a>  </li>
    <li>  <a href="{{ route('login') }}" class="button secondary">Login</a>  </li>



@endunless
      </ul>

    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->


   <!--==========================
       Intro Section
     ============================-->
