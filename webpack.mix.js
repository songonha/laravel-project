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
   .js('resources/js/client.js', 'public/js')
   .js('resources/js/simple_product.js', 'public/js')
   .js('resources/js/simple_post.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/client.scss', 'public/css')
   .copyDirectory('resources/client', 'public/client')
   .copyDirectory('node_modules/admin-lte/dist', 'public/dist')
   .copyDirectory('node_modules/admin-lte/plugins', 'public/plugins')
   .copyDirectory('resources/admin', 'public/admin')
   .version();
