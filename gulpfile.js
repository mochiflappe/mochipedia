var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var pngquant = require('imagemin-pngquant');


var dir = {
  dist: {
    css: 'assets/css/',
    images: 'assets/images/',
    js: 'assets/js/',
    jsVendor: 'assets/js/vendor/',
    fonts: 'assets/fonts/'
  },
  src: {
    html: ['**/*.html', '**/*.php'],
    css: 'assets/css/**/*.css',
    sass: 'src/sass/**/*.scss',
    images: 'src/images/**/',
    js: ['src/js/**/*.js', '!src/js/vendor/*.js'],
    jsVendor: 'src/js/vendor/**/*.js',
    fonts: 'src/fonts/**/*'
  }
};

// html
gulp.task('html', function () {
  gulp.src(dir.src.html)
    .pipe($.plumber());
});

// sass
gulp.task('sass', function () {
  return gulp.src(dir.src.sass)
    .pipe($.plumber())
    .pipe($.sass({errLogToConsole: true}))
    .pipe($.csscomb())
    .pipe($.pleeease({
      'autoprefixer': {
        'browsers': ['last 4 versions', 'Android 2.3', 'ios 6']
      },
      'rem': false,
      'minifier': true,
      'mqpacker': true
    }))
    //.pipe($.header('@charset "UTF-8";'))
    .pipe($.csslint({
      'box-sizing': false,
      'box-model': false,
      'unqualified-attributes': false,
      'outline-none': false,
      'font-sizes': false,
      'floats': false,
      'compatible-vendor-prefixes': false,
      'known-properties': false,
      'gradients': false,
      'duplicate-background-images': false,
      'text-indent': false,
      'bulletproof-font-face': false
    }))
    .pipe($.csslint.reporter())
    .pipe(gulp.dest(dir.dist.css))
});

// images
gulp.task('images', function () {
  gulp.src(dir.src.images + '*.+(jpg|jpeg|png|gif|ico|svg)')
    .pipe($.plumber())
    .pipe($.changed(dir.dist.images))
    .pipe($.imagemin({
      optimizationLevel: 7,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(dir.dist.images));
});

// JavaScript
gulp.task('js', function () {
  gulp.src(dir.src.js)
    .pipe($.plumber())
    //.pipe($.sourcemaps.init())
    //.pipe($.concat('app.min.js'))
    //.pipe($.uglify())
    //.pipe($.sourcemaps.write('./maps'))
    .pipe(gulp.dest(dir.dist.js));
});

gulp.task('jsVendor', function () {
  gulp.src(dir.src.jsVendor)
    .pipe($.plumber())
    .pipe(gulp.dest(dir.dist.jsVendor));
});

gulp.task('fonts', function () {
  gulp.src(dir.src.fonts)
    .pipe($.plumber())
    .pipe($.changed(dir.dist.fonts))
    .pipe(gulp.dest(dir.dist.fonts));
});

// webserver http://localhost:8000/
gulp.task('webserver', function () {
  gulp.src('./')
    .pipe($.webserver({
      livereload: {
        enable: true,
        filter: function (filename) {
          return !filename.match(/src/);
        }
      },
      directoryListing: true,
      open: false
    }));
});

// Watch
gulp.task('watch', function () {
  gulp.watch(dir.src.html, ['html']);
  gulp.watch(dir.src.sass, ['sass']);
  gulp.watch(dir.src.images, ['images']);
  gulp.watch(dir.src.js, ['js']);
  gulp.watch(dir.src.jsVendor, ['jsVendor']);
  gulp.watch(dir.src.fonts, ['fonts']);
});

//task
gulp.task('default', ['webserver', 'watch']);
gulp.task('build', ['sass', 'images', 'js', 'jsVendor', 'fonts']);
