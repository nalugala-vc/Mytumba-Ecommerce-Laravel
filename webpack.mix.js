const mix = require('laravel-mix');
mix.sass('resources/scss/newsletter.scss', 'public/css')
   .options({
       processCssUrls: false,
   });
