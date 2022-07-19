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



mix.scripts([
    'resources/assets/vendors/jquery/jquery.min.js',
    'resources/assets/js/loader.js',
    'resources/assets/vendors/popper.js/popper.min.js',
    'resources/assets/vendors/popper.js/popper.min.js',
    'resources/assets/vendors/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/vendors/aos/aos.js',
    'resources/assets/js/main.js'

], 'public/blog/js/scripts.js');

mix.scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/jquery-ui/jquery-ui.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/plugins/moment/moment.min.js',
    'resources/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/admin/dist/js/adminlte.js',
    'resources/admin/plugins/summernote/summernote.min.js',
    'resources/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
    'resources/admin/plugins/select2/js/select2.full.min.js',
], 'public/assets/admin/blog/lte/scripts.js')

mix.styles([
        'resources/admin/plugins/select2/css/select2.min.css',
        'resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'resources/admin/dist/css/adminlte.min.css',
        'resources/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'resources/admin/plugins/summernote/summernote-bs4.css',

    ],
    'public/assets/admin/blog/lte/dist/css/styles.css'
    );


mix.css('resources/admin/plugins/fontawesome-free/css/all.min.css', '')
mix.copyDirectory('resources/admin/plugins/fontawesome-free', 'public/assets/admin/plugins/fontawesome-free')
mix.copyDirectory('resources/admin/plugins/summernote/font', 'public/assets/admin/blog/lte/dist/css/font')
