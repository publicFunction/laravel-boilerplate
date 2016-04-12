var gulp = require("gulp");
var gulpif = require('gulp-if');
var sass = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var jsmin = require('gulp-jsmin');
var concat = require('gulp-concat');
var minimist = require('minimist');

// Determine our environment. 'dev' leaves assets unminified. 'prod' makes sure assets are minified.
var options = minimist(process.argv.slice(2), {string: 'env', default: {env: process.env.NODE_ENV || 'prod'}});

var config = {
    scssDir: './resources/assets/sass',
    jsDir: './resources/assets/js',
    publicDir: './public'
};

gulp.task('sass', function() {
    gulp.src(config.scssDir + '/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(options.env === 'prod', cssmin()))
        .pipe(gulp.dest(config.publicDir + '/dist/css'));
});

gulp.task('icons', function() {
    // Copy Bootstrap's font files to the public directory
    return gulp.src(config.bootstrapDir + '/assets/fonts/**/*')
        .pipe(gulp.dest(config.publicDir + '/dist/fonts'));
});

gulp.task('js', function() {
    return gulp.src([
            // Add the JavaScript files you want to combine and minify here
            config.jsDir + '/app.js'
        ])
        .pipe(concat('app.js'))
        .pipe(gulpif(options.env === 'prod', jsmin()))
        .pipe(gulp.dest(config.publicDir + '/dist/js'));
});

gulp.task('watch', function() {
    // Recompile SASS and JS on changes
    gulp.watch(config.scssDir + '/**/*', ['sass']);
    gulp.watch(config.jsDir + '/**/*', ['js']);
});

gulp.task('default', ['sass', 'icons', 'js', 'watch']);