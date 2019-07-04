@extends('layouts.site')

@section('title') Upload video @endsection
  @section('content')

<?php

//echo phpinfo();

?>

  <br><br>
  <!--==========================
    Contact Section
  ============================-->
  <section id="contact" class="section-bg wow fadeInUp">

    <div class="container">
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
      <div class="section-header">
       <h2>Video Upload</h2>
      </div>


      <div class="form">
        {!! Form::open(['method' => 'post','class'=>'form-horizontal','url' => 'Update_video','files'=>true])!!}
        <!-- <form action="{{ route('Update_video') }}" method="post" enctype="multipart/form-data"> -->
{{ csrf_field() }}
<div class="form-group">
<label for="Product Name">Product Name</label>
<input type="text" name="name" class="form-control"  placeholder="Product Name" >
</div>
<label for="Product Name">Product photos (can attach more than one):</label>
<br />
<input type="file" class="form-control" name="video" />
<br /><br />
  <div class="text-center"><button type="submit">{{ __('Upload') }}<span class="primary"> Now!</span></button></div>
<!-- </form> -->
{!!Form::close()!!}
      </div>

    </div>
  </section><!-- #contact -->




   @endsection




   @section ('footer')
 @endsection
