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

mix
    .js('resources/js/app.js', 'public/assets/js').minify('public/assets/js/app.js')
    .sass('resources/sass/app.scss', 'public/assets/css').minify('public/assets/css/app.css')
    .copy(
        'resources/images',
        'public/assets/images'
    )
    .copy(
        'node_modules/@fortawesome/fontawesome-free/webfonts',
        'public/assets/webfonts'
    );

mix.browserSync("localhost:10008");