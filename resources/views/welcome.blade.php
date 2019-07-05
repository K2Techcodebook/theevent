@include('sitelayout.header')

   @yield('content')

   <!--==========================
       Intro Section
     ============================-->
     <section id="intro">
       <div class="intro-container wow fadeIn">
         <h1 class="mb-4 pb-0">The Annual<br><span>Marketing</span> Conference</h1>
         <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p>
         <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
           data-autoplay="true"></a>
         <a href="#about" class="about-btn scrollto">About The Event</a>
       </div>
     </section>

     <main id="main">

       <!--==========================
         About Section
       ============================-->
       <section id="about">
         <div class="container">
           <div class="row">
                  @foreach($data as $item)
             <div class="col-lg-6">
               <h2>About {{$item->title }}</h2>
               <p>{{ $item->body }}</p>
             </div>
                @endforeach
             <!-- <div class="col-lg-3">
               <h3>Where</h3>
               <p>Downtown Conference Center, New York</p>
             </div>
             <div class="col-lg-3">
               <h3>When</h3>
               <p>Monday to Wednesday<br>10-12 December</p>
             </div> -->
           </div>
         </div>
       </section>

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
               @foreach($data2 as $item)
             <div class="col-lg-4 col-md-6">
               <div class="speaker">
                 <img src="{{$item->body}}" alt="Speaker 1" class="img-fluid">
                 <div class="details">
                   <h3><a href="speaker-details.html">{{$item->title }}</a></h3>
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

       <!--==========================
         Schedule Section
       ============================-->
       <section id="schedule" class="section-with-bg">
         <div class="container wow fadeInUp">
           <div class="section-header">
             <h2>Upcoming Event</h2>
             <p>Here is our event schedule</p>
           </div>

           <ul class="nav nav-tabs" role="tablist">
             <li class="nav-item">
               <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Day 1</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Day 2</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Day 3</a>
             </li>
           </ul>

           <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
             necessitatibus voluptatem quis labore perspiciatis quia.</h3>

           <div class="tab-content row justify-content-center">

             <!-- Schdule Day 1 -->
             <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

               <div class="row schedule-item">
                 <div class="col-md-2"><time>09:30 AM</time></div>
                 <div class="col-md-10">
                   <h4>Registration</h4>
                   <p>Fugit voluptas iusto maiores temporibus autem numquam magnam.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>10:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/1.jpg" alt="Brenden Legros">
                   </div>
                   <h4>Keynote <span>Brenden Legros</span></h4>
                   <p>Facere provident incidunt quos voluptas.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>11:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/2.jpg" alt="Hubert Hirthe">
                   </div>
                   <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                   <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>12:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/3.jpg" alt="Cole Emmerich">
                   </div>
                   <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                   <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>02:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/4.jpg" alt="Jack Christiansen">
                   </div>
                   <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                   <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>03:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/5.jpg" alt="Alejandrin Littel">
                   </div>
                   <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                   <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>04:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/6.jpg" alt="Willow Trantow">
                   </div>
                   <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                   <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                 </div>
               </div>

             </div>
             <!-- End Schdule Day 1 -->

             <!-- Schdule Day 2 -->
             <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

               <div class="row schedule-item">
                 <div class="col-md-2"><time>10:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/1.jpg" alt="Brenden Legros">
                   </div>
                   <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                   <p>Facere provident incidunt quos voluptas.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>11:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/2.jpg" alt="Hubert Hirthe">
                   </div>
                   <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                   <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>12:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/3.jpg" alt="Cole Emmerich">
                   </div>
                   <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                   <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>02:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/4.jpg" alt="Jack Christiansen">
                   </div>
                   <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                   <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>03:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/5.jpg" alt="Alejandrin Littel">
                   </div>
                   <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                   <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>04:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/6.jpg" alt="Willow Trantow">
                   </div>
                   <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                   <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                 </div>
               </div>

             </div>
             <!-- End Schdule Day 2 -->

             <!-- Schdule Day 3 -->
             <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

               <div class="row schedule-item">
                 <div class="col-md-2"><time>10:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/2.jpg" alt="Hubert Hirthe">
                   </div>
                   <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                   <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>11:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/3.jpg" alt="Cole Emmerich">
                   </div>
                   <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                   <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>12:00 AM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/1.jpg" alt="Brenden Legros">
                   </div>
                   <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                   <p>Facere provident incidunt quos voluptas.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>02:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/4.jpg" alt="Jack Christiansen">
                   </div>
                   <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                   <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>03:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/5.jpg" alt="Alejandrin Littel">
                   </div>
                   <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                   <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
                 </div>
               </div>

               <div class="row schedule-item">
                 <div class="col-md-2"><time>04:00 PM</time></div>
                 <div class="col-md-10">
                   <div class="speaker">
                     <img src="img/speakers/6.jpg" alt="Willow Trantow">
                   </div>
                   <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                   <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                 </div>
               </div>

             </div>
             <!-- End Schdule Day 2 -->

           </div>

         </div>

       </section>






     </main>


@yield('footer')


@include('sitelayout.footer')

@include('sitelayout.footerscript')
@yield('js')
