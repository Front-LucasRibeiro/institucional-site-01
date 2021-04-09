var gulp = require('gulp'),
  //Js
  uglify = require('gulp-uglify'),
  filesJs = './assets/js/edit/*.js',
  outputJs = './assets/js',
  //Sass
  sass = require('gulp-sass'),
  filesCss = './assets/sass/**/*.+(scss|sass)',
  outputCss = './assets/css';

//Uglify
gulp.task('uglify', function () {
  gulp.src(filesJs)
    .pipe(uglify())
    .pipe(gulp.dest(outputJs));
});

const { watch } = require('gulp');

const watcherJS = watch([filesJs]);


//Sass
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
