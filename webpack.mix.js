const {mix} = require('laravel-mix');

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

/*
 |--------------------------------------------------------------------------
 | Core
 |--------------------------------------------------------------------------
 |
 */

mix.scripts(
    [
        'node_modules/jquery/dist/jquery.js'
    ],
    'public/js/core.js').version();

/*
 |--------------------------------------------------------------------------
 | Plugins
 |--------------------------------------------------------------------------
 |
 */

mix.scripts(
    [
        'bower_components/PACE/pace.js'
    ],
    'public/js/plugins.js').version();

mix.styles(
    [
        'bower_components/PACE/themes/blue/pace-theme-minimal.css'
    ],
    'public/css/plugins.css').version();


/*
 |--------------------------------------------------------------------------
 | Gentelella Theme
 |--------------------------------------------------------------------------
 |
 */
mix.styles(
    [
        'bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.css',
        'bower_components/gentelella/vendors/font-awesome/css/font-awesome.css',
        'bower_components/gentelella/vendors/animate.css/animate.css',
        'bower_components/gentelella/build/css/custom.css'
    ],
    'public/css/theme.css').version();

mix.copy(
    [
        'bower_components/gentelella/vendors/bootstrap/dist/fonts',
        'bower_components/gentelella/vendors/font-awesome/fonts'
    ],
    'public/fonts');

/*
 |--------------------------------------------------------------------------
 | App
 |--------------------------------------------------------------------------
 |
 */
mix.styles(
    [
        'resources/assets/css/app.css'
    ],
    'public/css/app.css').version();
mix.scripts(
    [
        'resources/assets/js/app.js'
    ],
    'public/js/app.js').version();