let mix = require('laravel-mix');

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

mix.babel([
        'resources/js/_jquery.mask.js',
        'resources/js/_jquery.scrollTo.min.js',
        'resources/js/_lightbox.min.js',
        'resources/js/_owl.carousel.min.js',
        'resources/js/app.js'
    ], 'public/js/app.min.js')
    .sass('resources/sass/style.scss', 'public/css')
    .version();
