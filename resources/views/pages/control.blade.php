<!DOCTYPE html>
<html>
<head>
<title>Laravel 5 - Summernote Wysiwyg Editor with Image Upload Example</title>
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
   <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
   <!-- include summernote css/js-->
   <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
   <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      @auth

<li>
<a href="{{ route('dashboard') }}"> Welcome    {{ Auth::user()->username }}</a>
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
  </div>
</nav>
<!-- #nav-menu-container -->
<form method="POST" action="{{ route('summernoteeditor') }}">
  <div class="col-lg-10 col-lg-offset-2">
                  @if (session('status'))

                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger">{{ $error }}</div>

                                @endforeach

                            @endif


                  </div>
   {{ csrf_field() }}
<div class="col-xs-12 col-sm-12 col-md-12">
   <div class="col-xs-12 col-sm-12 col-md-12">
<center><h1>What would you see in Laravel 5.7 ? </h1>
<h4>Just share your idea.</h4>
</center>
<div class="form-group">
  <select id="ticket-type" name="ticket-type" class="form-control" >
    <option value="">-- Select Your Ticket Type --</option>
    <option value="service">Service</option>
    <option value="about">About</option>
      <option value="upevnet">Upcoming Event</option>
  </select>
</div>
      <div class="form-group">
 <label for="usr">Time for Event:</label>
 <input type="text" class="form-control" name="time" placeholder="10:00AM">
</div>
<div class="form-group">
 <label for="usr">Title of Feature:</label>
 <input type="text" class="form-control" name="feature" placeholder="Title">
</div>
       <div class="form-group">
           <strong>Details:</strong>
           <textarea class="form-control summernote" name="detail"></textarea>
       </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
       <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
</body>
<script type="text/javascript">
   $(document).ready(function() {
    $('.summernote').summernote({
          height: 500,
     });
  });
</script>

</html>
