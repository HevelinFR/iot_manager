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

mix.styles(['resources/views/painel/css/style.css', 'resources/views/painel/css/reset.css', 'resources/views/painel/css/cadastro.css'], 'public/painel/css/style.css')
    .version();