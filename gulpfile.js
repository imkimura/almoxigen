var gulp = require('gulp');
var elixir = require('laravel-elixir');

elixir.config.css.minifier.pluginOptions = {
    keepSpecialComments: 0
};

//------------------------------------------
//------------ ADMIN ---------
//------------------------------------------
elixir(function(mix) {
    mix.styles([
        'tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'icheck-bootstrap/icheck-bootstrap.min.css',
        'dist/css/adminlte.css',
        'toastr/toastr.min.css',
        'overlayScrollbars/css/OverlayScrollbars.min.css',
        'daterangepicker/daterangepicker.css',
        'datatables-bs4/css/dataTables.bootstrap4.css',
        'summernote/summernote-bs4.css',
        'fontawesome-free/css/all.min.css',
    ], 'public/css/all-admin.css', 'public/plugin')

    .scripts([
        'bootstrap/js/bootstrap.bundle.min.js',
        'sparklines/sparkline.js',
        'jquery-knob/jquery.knob.min.js',
        'moment/moment.min.js',
        'daterangepicker/daterangepicker.js',
        'tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'summernote/summernote-bs4.min.js',
        'toastr/toastr.min.js',
        'overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'datatables/jquery.dataTables.js',
        'datatables-bs4/js/dataTables.bootstrap4.js',
        'dist/js/adminlte.js',
        'admin.js',
    ], 'public/js/all-admin.js', 'public/plugin')
});

elixir(function(mix) {
    mix.version([
        'all-admin.css',
        'js/all-admin.js'
    ], 'public');
});
