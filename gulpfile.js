var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('app.scss');

     mix.styles([
     	'../bower/bootstrap/dist/css/bootstrap.css',
      	'main.css'
    ], 'public/css/app.css');

     mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/bootstrap/dist/js/bootstrap.js',
        '../bower/angular/angular.js',
        'api.js',
    ], 'public/js/app.js');

     mix.version(['css/app.css', 'js/app.js']);

     // mix.browserSync();
     
});
