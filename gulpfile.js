const { series, parallel, watch, src, dest } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const cmq = require('postcss-combine-media-query')
const cssnano = require('cssnano')
const rename = require('gulp-rename')
const rollup = require('gulp-better-rollup')
const { nodeResolve } = require('@rollup/plugin-node-resolve')
const { babel } = require('@rollup/plugin-babel')
const commonjs = require('@rollup/plugin-commonjs')
const { terser } = require('rollup-plugin-terser')
const del = require('del')
const browserSync = require('browser-sync').create()
const pot = require('gulp-wp-pot')

function clean() {
  return del('assets/dist')
}

function styles() {
  const plugins = [
    autoprefixer({ grid: 'autoplace' }),
    cmq
  ]

  return src('assets/src/scss/**/*.scss')
    .pipe(sass())
    .pipe(postcss(plugins))
    .pipe(dest('assets/dist'))
    .pipe(postcss([
      ...plugins,
      cssnano({
        preset: [ 'default', {
          discardComments: { removeAll: true }
        } ]
      })
    ]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('assets/dist'))
    .pipe(browserSync.stream())
}

function scripts() {
  const plugins = [
    nodeResolve(),
    babel({ babelHelpers: 'bundled' }),
    commonjs()
  ]

  return src([ 'assets/src/js/main.js', 'assets/src/js/admin.js' ])
    .pipe(rollup({ plugins }, 'iife'))
    .pipe(dest('assets/dist'))
    .pipe(rollup({ plugins: [ ...plugins, terser() ] }, 'iife'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('assets/dist'))
}

function translate() {
  return src([ '**/*.php', '!vendor/**' ])
    .pipe(pot({
      domain: 'dits',
      package: 'dits-plugin-slug-to-replace'
    }))
    .pipe(dest('languages/dits-plugin-slug-to-replace.pot'))
}

function serve() {
  browserSync.init({
    proxy: 'plugins.local',
    open: false,
    https: true
  })

  watch('assets/src/js/**/*.js', scripts).on('change', browserSync.reload)
  watch('assets/src/scss/**/*', styles)
  watch('**/*.php', translate).on('change', browserSync.reload)
}

const build = series(clean, parallel(styles, scripts, translate))

exports.translate = translate
exports.styles = styles
exports.scripts = scripts
exports.build = build
exports.serve = series(build, serve)
