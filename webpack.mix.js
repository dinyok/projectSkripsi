const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.min.js', 'public/js')
    .js('resources/js/custom.js', 'public/js')
    .js('resources/js/jquery.min.js', 'public/js')
    .js('resources/js/owl.carousel.min.js', 'public/js')
    .js('resources/js/rellax.min.js', 'public/js')
    .js('resources/js/smoothscroll.js', 'public/js')
    .sass('resources/scss/aos.scss', 'public/css')
    .sass('resources/scss/bootstrap.min.scss', 'public/css')
    .sass('resources/scss/font-awesome.min.scss', 'public/css')
    .sass('resources/scss/owl.carousel.min.scss', 'public/css')
    .sass('resources/scss/owl.theme.default.min.scss', 'public/css')
    .sass('resources/scss/style.scss', 'public/css')
    .sass('resources/scss/templatemo-digital-trend.scss', 'public/css', [
        //
    ]);
