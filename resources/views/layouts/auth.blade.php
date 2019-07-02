@include('sitelayout.header')

        <div id="app">


            <main class="py-4">
                @yield('content')
               </main>
        </div>
        @include('sitelayout.footer')

      @include('sitelayout.footerscript')
    </body>
    </html>
