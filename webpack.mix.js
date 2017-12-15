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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/
mix.styles([
    'public/css/style.css',
    'public/css/markdown.css'
],'public/css/all.css');

mix.js('public/assets/js/page/article.js','public/assets/js/page/article.min.js');
mix.js('public/assets/js/page/blog.js','public/assets/js/page/blog.min.js');
mix.js('public/assets/components/pagination/pagination.js','public/assets/components/pagination/pagination.min.js');

