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

//**************** CSS ******************** 
//main css
mix.sass('resources/sass/style.scss', 'public/css');

//************** SCRIPTS ****************** 
// general scripts
mix.copy('node_modules/@coreui/utils/dist/coreui-utils.js', 'public/js');
mix.copy('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public/js'); 

// views scripts
mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.js', 'public/js');

//*************** OTHER ****************** 
//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css');

// custom
mix.js([
        'resources/js/action.js',
    ], 'js/custom.js');