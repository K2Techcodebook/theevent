@include('sitelayout.header0')

   @yield('content')

   <main id="main">
       @auth


  @if(checkPermission(['user']))



  @elseif(checkPermission(['admin']))



  @elseif(checkPermission(['superadmin']))
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
