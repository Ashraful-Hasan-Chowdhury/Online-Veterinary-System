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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .js('public/admin/plugins/jquery/jquery.min.js', 'public/js').sourceMaps()
    .js('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js')
    .js('public/admin/custom-image.js', 'public/js')
    .js('public/admin/dist/js/adminlte.min.js', 'public/js')
    .js('public/admin/dist/js/demo.js', 'public/js');
