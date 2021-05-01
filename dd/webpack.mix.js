let mix = require('laravel-mix');

mix.setPublicPath('./../public/');

mix.js("./app/resources/js/app.js", "js/app.js")
    .postCss("./app/resources/css/app.css", "css/app.css", [
        require('tailwindcss'),
        require('autoprefixer'),
]);

if (mix.inProduction()) {
    mix.version();
    mix.sourceMaps();
}