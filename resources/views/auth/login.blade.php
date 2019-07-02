@extends('layouts.auth')

@section('content')
<br><br>
<!--==========================
  Contact Section
============================-->
<section id="contact" class="section-bg wow fadeInUp">

  <div class="container">

    <div class="section-header">
     <h2> {{ __('Login') }} to your Account</h2>
    </div>


    <div class="form">
   <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your Email here.." required autofocus>
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
<div class="form-group">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your password here..." required>
        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
          </div>
        <!-- CHECKBOX -->
       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
<!--     <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked> -->
      <label for="remember" class="label-check">
          <span class="checkbox primary primary"><span></span></span>
          Remember username and password
      </label>
        <!-- /CHECKBOX -->
      <p>Forgot your password? <a href="{{ route('password.request') }}" class="primary">Click here!</a></p>
      <button type="submit" class="button mid dark">Login <span class="primary">Now!</span></button>

    </form>
  </div>
</div>
</section><!-- #contact -->
@endsection
