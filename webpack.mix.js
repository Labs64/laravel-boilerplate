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

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'bower_components/PACE/pace.js',

], 'public/assets/app/js/app.js').version();

mix.styles([
    'bower_components/font-awesome/css/font-awesome.css',
    'bower_components/PACE/themes/blue/pace-theme-minimal.css',
], 'public/assets/app/css/app.css').version();

mix.copy([
    'bower_components/font-awesome/fonts/',
], 'public/assets/app/fonts');

/*
 |--------------------------------------------------------------------------
 | Auth
 |--------------------------------------------------------------------------
 |
 */

mix.styles('resources/assets/auth/css/login.css', 'public/assets/auth/css/login.css').version();
mix.styles('resources/assets/auth/css/register.css', 'public/assets/auth/css/register.css').version();
mix.styles('resources/assets/auth/css/passwords.css', 'public/assets/auth/css/passwords.css').version();

mix.styles([
    'bower_components/bootstrap/dist/css/bootstrap.css',
    'bower_components/gentelella/vendors/animate.css/animate.css',
    'bower_components/gentelella/build/css/custom.css',
], 'public/assets/auth/css/auth.css').version();

/*
 |--------------------------------------------------------------------------
 | Admin
 |--------------------------------------------------------------------------
 |
 */

mix.scripts([
    'bower_components/bootstrap/dist/js/bootstrap.js',
    'bower_components/gentelella/build/js/custom.js',
], 'public/assets/admin/js/admin.js').version();

mix.styles([
    'bower_components/bootstrap/dist/css/bootstrap.css',
    'bower_components/gentelella/vendors/animate.css/animate.css',
    'bower_components/gentelella/build/css/custom.css',
], 'public/assets/admin/css/admin.css').version();


mix.copy([
    'bower_components/gentelella/vendors/bootstrap/dist/fonts',
], 'public/assets/admin/fonts');

/*
 |--------------------------------------------------------------------------
 | Frontend
 |--------------------------------------------------------------------------
 |
 */
