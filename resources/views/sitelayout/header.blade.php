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
        <li class="menu-active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#speakers">Speakers</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#venue">Venue</a></li>
        <li><a href="#hotels">Hotels</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#supporters">Sponsors</a></li>
        <li><a href="#contact">Contact</a></li>
            @auth
        <li class="buy-tickets"><a href="#buy-tickets">Buy Tickets</a></li>
          <p class="user-name">{{ Auth::user()->username }}</p>
            @if(checkPermission(['user']))

              @elseif(checkPermission(['admin']))


                @elseif(checkPermission(['superadmin']))


                @else
                I don't have any records!
            @endif
            @endauth


@unless (Auth::check())
<div class="account-actions">
    <a href="{{ route('register') }}" class="button primary">Register</a>
    <a href="{{ route('login') }}" class="button secondary">Login</a>
</div>


@endunless
      </ul>

    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->
