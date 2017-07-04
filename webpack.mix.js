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

mix.styles(['resources/assets/css/style.css'], 'public/css/style.css');
mix.scripts(['resources/assets/js/layout/hamburger.js', 'resources/assets/js/layout/scroll.js'], 'public/js/layout.js')

if(mix.inProduction()){
	mix.version();
}