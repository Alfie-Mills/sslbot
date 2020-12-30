var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var $ = require('gulp-load-plugins')();
var autoprefixer = require('autoprefixer');
var connect = require('gulp-connect-php');

var sassPaths = [
    'node_modules/foundation-sites/scss',
    'node_modules/motion-ui/src'
];

function sass() {
    return gulp.src('assets/styles/scss/*.scss', )
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: sassPaths,
            outputStyle: 'compressed' // if css compressed **file size**
        }).on('error', $.sass.logError))
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest('assets/styles/css'))

    .pipe(browserSync.stream());
};

function serve() {
    // Watch these files
    var files = [
        '**/*.php'
    ];

    browserSync.init(files, {
        proxy: "http://localhost/sslbot/",
        reloadDelay: 200
    });



    gulp.watch("assets/styles/scss/*.scss", sass);
    gulp.watch("**/*.php").on('change', browserSync.reload);
}

gulp.task('sass', sass);
gulp.task('serve', gulp.series('sass', serve));
gulp.task('default', gulp.series('sass', serve));