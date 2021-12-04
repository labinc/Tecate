const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css');
mix.js(['resources/js/app.js'], 'public/js').sourceMaps();
mix.options({ processCssUrls: false });

// mix.browserSync({
//  proxy: 'http://tecate.camyaro'
// });
