@include('sitelayout.header0')

   @yield('content')

   <main id="main">
       @auth


  @if(checkPermission(['user']))

  <!--==========================
    Speakers Section
  ============================-->
  <section id="speakers" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Services</h2>
        <p>Here are some of our speakers</p>
      </div>

      <div class="row">
          @foreach($videos as $item)
          <?php $name=Str_slug($item->name);?>
        <div class="col-lg-4 col-md-6">
          <div class="speaker">
          <a href="{{route('video',['id'=>$item->id,'name'=>$name])}}">  <img src="{{ url('storage/thumbs/'.$item->thumbnail)}}" alt="Speaker 1" class="img-fluid"></a>
            <div class="details">
              <h3><a href="speaker-details.html">{{$item->name}}</a></h3>
              <!-- <p>Quas alias incidunt</p> -->
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>

  </section>

  @elseif(checkPermission(['admin']))



  @elseif(checkPermission(['superadmin']))
  <!--==========================
    Speakers Section
  ============================-->
  <section id="speakers" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Services</h2>
        <p>Here are some of our speakers</p>
      </div>

      <div class="row">
          @foreach($videos as $item)
          <?php $name=Str_slug($item->name);?>
        <div class="col-lg-4 col-md-6">
          <div class="speaker">
          <a href="{{route('video',['id'=>$item->id,'name'=>$name])}}">  <img src="{{ url('storage/thumbs/'.$item->thumbnail)}}" alt="Speaker 1" class="img-fluid"></a>
            <div class="details">
              <h3><a href="speaker-details.html">{{$item->name}}</a></h3>
              <!-- <p>Quas alias incidunt</p> -->
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>

  </section>
      @elseif(checkPermission(['invaliduser']))

      <!--==========================
        About Section
      ============================-->
      <section id="about">
         <br /><br /><br /><br />
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2>About The Event</h2>
              <p>Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet eius aut
                accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt inventore in
                est ut optio sequi unde.</p>
            </div>
            <div class="col-lg-3">
              <h3>Where</h3>
              <p>Downtown Conference Center, New York</p>
            </div>
            <div class="col-lg-3">
              <h3>When</h3>
              <p>Monday to Wednesday<br>10-12 December</p>
            </div>
          </div>
        </div>

      </section>


      @else
      I don't have any records!
    @endif
    @endauth



   </main>
<!--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!test
                </div>
            </div>
        </div>
    </div>
</div> -->
      @yield('footer')


            @include('sitelayout.footer')

@include('sitelayout.footerscript')
