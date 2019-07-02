@include('sitelayout.header')

    <!-- <div class="content-wrapper"> -->
    <!-- Main content -->
         <!-- <section class="content"> -->

       @yield('content')
       <!-- About Section -->

    <!-- <section id="profile" class="signup-section">
    </section> -->
         @yield('footer')
      <!-- </section>
    </div>
    <br> -->

  @include('sitelayout.footer')

@include('sitelayout.footerscript')
