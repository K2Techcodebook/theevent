@extends('layouts.site')

@section('title') Upload video @endsection
  @section('content')
 <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">

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

          <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
                    controls preload="auto" height="600" width="980">

                 <source src="{{url('storage/videos/'.$data->filename)}}" type="{{$data->extension}}" />
             </video>

      </div>
      </section><!-- #contact -->


     @endsection




     @section ('footer')
    <script src="//vjs.zencdn.net/4.12/video.js"></script>
     <script>
      videojs(document.getElementById('example_video_1'), {}, function() {
          // This is functionally the same as the previous example.
      });
  </script>
   @endsection
