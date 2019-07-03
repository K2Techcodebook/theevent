@extends('layouts.site')

@section('title') Upload video @endsection
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
              <div class="file-field">
          <div class="btn btn-primary btn-sm float-left">
            <span>Choose file</span>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload your file">
          </div>
        </div>
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




   @section ('footer')
 @endsection
