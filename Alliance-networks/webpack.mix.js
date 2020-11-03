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

// console.log(process.env.APP_ENV);

process.env.__basedir = __dirname;



mix.setPublicPath('./');


if (mix.inProduction()) {
    // mix.version();
    mix.options({
        processCssUrls: false,
        extractVueStyles: false,
        postCss: [
            require('autoprefixer')({
                cascade: false
            })
        ]
    });
} else {
    mix.options({
        processCssUrls: false,
        extractVueStyles: false,
        // postCss: [
        //     require('autoprefixer')({
        //         cascade: true
        //     })
        // ]
    });
}

mix.sass('./src/sass/app.scss', './assets/css/app.css');
mix.js('./src/js/app.js', './assets/js/app.js');

mix.disableSuccessNotifications();
mix.disableNotifications();


if (mix.inProduction()) {
    // mix.version();
} else {

    // В header
    // <!-- BrowserSync -->
    // <script async src="http://localhost:3000/browser-sync/browser-sync-client.js?v=2.26.4"></script>

    var browserSync = require('browser-sync');

    browserSync({
        proxy: 'localhost',

        // localOnly: true,
        // online: false,
        port: 3000,

        ghostMode: false,
        // codeSync: false,
        open: false,

        files: [
            "./**/*.html",
            "./*.html",
            "./assets/**/*.js",
            "./assets/**/*.css",
        ],
    });

}



