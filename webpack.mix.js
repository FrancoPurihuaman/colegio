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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

//mix.js('resources/js/theme.js', 'public/js')
//    .sass("resources/sass/theme.scss", "public/css").options({postCss: [require("autoprefixer")] })
//	.postCss("resources/css/app.css", "public/css", [
//    	require("tailwindcss"),
//  	]);


mix.js('resources/js/app.js', 'public/js');
//mix.js('resources/js/pages/ptoventa/venta/shop.js', 'public/js');
//mix.js('resources/js/pages/inventario/reposicion/reponer.js', 'public/js');

//mix.sass("resources/sass/theme.scss", "public/css").options({postCss: [require("autoprefixer")] });
//mix.sass("resources/sass/pages/auth/access.scss", "public/css").options({postCss: [require("autoprefixer")] });
//mix.sass("resources/sass/pages/ptoventa/venta/shop.scss", "public/css").options({postCss: [require("autoprefixer")] });