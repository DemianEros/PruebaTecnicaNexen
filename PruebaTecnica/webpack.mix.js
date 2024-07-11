const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

mix.autoload({
   jquery: ['$', 'window.jQuery', 'jQuery'],
   'popper.js/dist/umd/popper.js': ['Popper']
});

mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
