@extends('layouts.auth')

@section('content')
<br><br>
<!--==========================
  Contact Section
============================-->
<section id="contact" class="section-bg wow fadeInUp">

  <div class="container">

    <div class="section-header">
     <h2>Registration</h2>
    </div>


    <div class="form">
      <form   method="POST" action="{{route('register_new_user') }}" aria-label="{{ __('Register') }}">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text"   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter your Fullname here...">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong style="color:red">{{ $errors->first('name') }}</strong>
            </span>
            <br/>
            <br/>
            @endif
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your email address here...">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong style="color:red">{{ $errors->first('email') }}</strong>
            </span>
            <br/>
            <br/>
            @endif
          </div>
        </div>
        <div class="form-group">
          <input type="text"  class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Enter your username here...">

          @if ($errors->has('username'))
          <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('username') }}</strong>
          </span>
          <br/>
          <br/>
          @endif
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="password" name="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter your password here...">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $errors->first('password') }}</strong>
            </span>
            <br/>
            <br/>
            @endif
          </div>
          <div class="form-group col-md-6">
            <input type="password"  name="password_confirmation" class="form-control" placeholder="Repeat your password here...">
            <div class="validation"></div>
          </div>
        </div>

        <div class="text-center"><button type="submit">{{ __('Register') }}<span class="primary">Now!</span></button></div>
      </form>
    </div>

  </div>
</section><!-- #contact -->

@endsection
