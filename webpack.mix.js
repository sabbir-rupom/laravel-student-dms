const mix = require('laravel-mix');

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