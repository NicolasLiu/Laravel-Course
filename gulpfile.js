const elixir = require('laravel-elixir');
var gulp = require('gulp');
var del = require('del');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
gulp.task("clean:components", function () {
    del(['public/build/js/components/**/*', 'public/js/components/**/*']);
});

elixir(mix => {
    mix.sass('app.scss')
        .task('clean:components')
        .webpack('app.js')
        .version(['css/*.css', 'js/app.js'])
        .copy('public/js/components','public/build/js/components')

});
