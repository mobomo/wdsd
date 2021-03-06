////////////////////////////////////////////////////////////////////////////////
//
//  Declare the packages that will be required and assign each one to a variable
//
////////////////////////////////////////////////////////////////////////////////

var gulp = require('gulp');
var sass = require('gulp-sass');

////////////////////////////////////////////////////////////////////////////////
//
//  SASS CONFIGURATION
//
////////////////////////////////////////////////////////////////////////////////

var input = '../sass/**/*.scss';
var output = '../css';

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

////////////////////////////////////////////////////////////////////////////////
//
//  SERVE/SASS TASK
//
////////////////////////////////////////////////////////////////////////////////

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

  gulp.watch("../sass/**/*.scss", ['sass']);

});

gulp.task('sass', function() {
  // place code for your default task here
  return gulp.src(input)
    // Run Sass on those files
    .pipe(sass(sassOptions).on('error', sass.logError))
    // Write the resulting CSS in the output (css) folder
    .pipe(gulp.dest(output))
});

////////////////////////////////////////////////////////////////////////////////
//
//  DEFAULT TASK
//
////////////////////////////////////////////////////////////////////////////////

gulp.task('default', ['serve']);
