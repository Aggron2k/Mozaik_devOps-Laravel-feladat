const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/style.scss', 'public/css')
   .postCss('resources/css/app.css', 'public/css', [
       //
   ]);
