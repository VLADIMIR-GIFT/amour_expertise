let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue()  // Assure-toi que cette ligne est présente pour activer Vue.js
   .sass('resources/sass/app.scss', 'public/css');
