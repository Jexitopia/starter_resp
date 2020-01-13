var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var newer = require('gulp-newer');
var autoprefixer = require('gulp-autoprefixer');

function defaultTask(cb) {
    // place code for your default task here
    cb();
  }

  gulp.task('sass', function(){
    return gulp.src('src/scss/main.scss')
       .pipe(sass())
       .pipe(cssnano())
       .pipe(autoprefixer())
       .pipe(gulp.dest('public/css'));
 });

 gulp.task('js', function(){
    return gulp.src(['src/js/*.js'])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});


gulp.task('images', function() {
    var imgSrc = 'src/images/*';
    var imgDest = 'public/images';

  return gulp.src(imgSrc)
    .pipe(newer(imgDest))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDest));

  });

gulp.task('watch', function(){
    gulp.watch('src/scss/main.scss', gulp.series('sass'));
    gulp.watch('src/js/*.js', gulp.series('js'));
    gulp.watch('src/images/*.*', gulp.series('images'));
    });
  
  exports.default = defaultTask;