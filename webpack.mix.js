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
    .sass('resources/sass/app.sass', 'public/css');

mix.js('app/Http/FeedbackFormWidget/src/feedback-form.js', 'public/js')
    .sass('app/Http/FeedbackFormWidget/src/feedback-form.sass', 'public/css');

mix.version();

