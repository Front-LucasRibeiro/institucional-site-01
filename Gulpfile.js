var gulp = require('gulp'),

  //Js
  uglify = require('gulp-uglify'),
  filesJs = './src/js/*.js',
  outputJs = './src/build/js',

  //Sass
  //sass = require('gulp-sass')(require('node-sass')),
  sass = require('gulp-sass')(require('sass')),
  filesCss = './src/sass/**/*.+(scss|sass)',
  outputCss = './src/build/css';

gulp.task('uglify', function () {
  gulp.src(filesJs)
    .pipe(uglify())
    .pipe(gulp.dest(outputJs));
});

const { watch } = require('gulp');
const watcherJS = watch([filesJs]);

gulp.task('sass', function () {
  return gulp.src(filesCss)
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(gulp.dest(outputCss));
});

gulp.task('watchFiles', function () {
  gulp.watch(filesCss, gulp.series('sass'));
  watcherJS.on('change', function (path, stats) {
    return gulp.watch(filesJs, gulp.series('uglify'));
  });
});


//Run/Watch
gulp.task('default', gulp.parallel('uglify', 'sass', 'watchFiles'));