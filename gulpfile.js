var gulp = require("gulp");
var gulpif = require('gulp-if');
var sass = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var jsmin = require('gulp-jsmin');
var concat = require('gulp-concat');
var minimist = require('minimist');

var knownOptions = {
    string: 'env',
    default: {
        env: process.env.NODE_ENV || 'dev'
    }
};

var options = minimist(process.argv.slice(2), knownOptions);

var config = {
    bootstrapDir: './node_modules/bootstrap-sass',
    bourbonDir: './node_modules/bourbon',
    scssDir: './resources/assets/sass',
    jsDir: './resources/assets/js',
    publicDir: './public'
};

gulp.task('sass', function() {
    gulp.src(config.scssDir + '/main.scss')
        .pipe(sass({
            // Allow Twitter Bootstrap and Bourbon to be @import'ed
            includePaths: [
                config.bootstrapDir + '/assets/stylesheets',
                config.bourbonDir + '/app/assets/stylesheets'
            ]
        }).on('error', sass.logError))
        .pipe(gulpif(options.env === 'prod', cssmin()))
        .pipe(gulp.dest(config.publicDir + '/dist/css'));
});

gulp.task('icons', function() {
    // Copy Bootstrap's font files to the public directory
    return gulp.src(config.bootstrapDir + '/assets/fonts/bootstrap/**/*')
        .pipe(gulp.dest(config.publicDir + '/dist/fonts'));
});

gulp.task('js', function() {
    return gulp.src([
            config.jsDir + '/app.js'
        ])
        .pipe(concat('app.js'))
        .pipe(gulpif(options.env === 'prod', jsmin()))
        .pipe(gulp.dest(config.publicDir + '/dist/js'));
});

gulp.task('watch', function() {
    // Recompile SASS on changes
    gulp.watch(config.scssDir + '/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'icons', 'js', 'watch']);