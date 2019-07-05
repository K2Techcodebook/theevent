const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
mix.styles([
    'public/lib/bootstrap/css/bootstrap.min.css',
    'public/lib/bootstrap/css/dataTables.bootstrap4.min.css',
    'public/lib/animate/animate.min.css',
    'public/lib/venobox/venobox.css',
    'public/lib/owlcarousel/assets/owl.carousel.min.css',
    'public/libs/summernote/0.8.4/summernote.css',
    'public/css/style.css'
    ],
     'public/css/all.css');
mix.scripts([
    'public/lib/jquery/jquery.min.js',
    'public/lib/bootstrap/js/bootstrap.min.js',
    'public/lib/bootstrap/js/jquery.dataTables.min.js',
    'public/lib/bootstrap/js/dataTables.bootstrap4.min.js',
    'public/libs/summernote/0.8.4/summernote.js',
   'public/lib/jquery/jquery-migrate.min.js',
   'public/lib/bootstrap/js/bootstrap.bundle.min.js',
   'public/lib/easing/easing.min.js',
   'public/lib/superfish/hoverIntent.js',
   'public/lib/superfish/superfish.min.js',
   'public/lib/wow/wow.min.js',
   'public/lib/venobox/venobox.min.js',
   'public/lib/owlcarousel/owl.carousel.min.js',
   'public/contactform/contactform.js',
   'public/js/main.js'
], 'public/js/all.js');
