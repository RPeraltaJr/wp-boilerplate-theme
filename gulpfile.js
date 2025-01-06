// Import necessary modules
import gulp from 'gulp';
import uglify from 'gulp-uglify';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import sass from 'gulp-dart-sass';
import rename from 'gulp-rename';
import browserify from 'browserify';
import babelify from 'babelify';
import source from 'vinyl-source-stream';
import buffer from 'vinyl-buffer';
import es from 'event-stream';

const paths = {
  styles: {
    scssInput: 'assets/uncompiled/scss/*.scss',
    modules: 'components/**/**/*.scss',
    cssInput: 'assets/uncompiled/css/*.css',
    cssDest: 'assets/uncompiled/css/',
    cssDestMin: 'assets/build/css/',
  },
  scripts: {
    inputs: [
      './assets/uncompiled/js/page-home.js',
    ],
    modules: 'assets/uncompiled/js/modules/*.js',
    dest: 'assets/build/js/',
  },
};

const sassOptions = {
  outputStyle: 'expanded',
};

// * Compiles Sass and minifies CSS
function styles() {
  return gulp
    .src(paths.styles.scssInput)
    .pipe(sass(sassOptions)).on('error', sass.logError)
    .pipe(autoprefixer({
      grid: true,
    }))
    .pipe(gulp.dest(paths.styles.cssDest))
    .pipe(cleanCSS())
    .pipe(rename({
      suffix: '.min',
    }))
    .pipe(gulp.dest(paths.styles.cssDestMin));
}
export { styles };

// * Compresses Scripts
async function scripts() {
  const tasks = await paths.scripts.inputs.map((entry) => {
    return (
      browserify({
        entries: [entry],
        debug: true,
      })
      .transform(babelify, {
        presets: ['@babel/preset-env'],
      })
      .bundle()
      .pipe(source(entry))
      .pipe(buffer())
      .pipe(uglify())
      .pipe(rename({
        dirname: '',
        extname: '.min.js',
      }))
      .pipe(gulp.dest(paths.scripts.dest))
    );
  });

  return es.merge.apply(null, tasks);
}
export { scripts };

// * Watch Task
function watch() {
  gulp.watch(paths.styles.scssInput, styles).on('all', (event, path, stats) => {
    console.log(`File ${path} was ${event}, running tasks...`);
  });
  gulp.watch(paths.styles.modules, styles).on('all', (event, path, stats) => {
    console.log(`File ${path} was ${event}, running tasks...`);
  });
  gulp.watch(paths.scripts.inputs, scripts).on('all', (event, path, stats) => {
    console.log(`File ${path} was ${event}, running tasks...`);
  });
  gulp.watch(paths.scripts.modules, scripts).on('all', (event, path, stats) => {
    console.log(`File ${path} was ${event}, running tasks...`);
  });
}
export { watch };

const build = gulp.parallel(styles, scripts, watch);
gulp.task('default', build);