let mix = require('laravel-mix');

mix.postCss('resources/css/artisan-ui.css', 'resources/dist', [
    require('tailwindcss'),
])
