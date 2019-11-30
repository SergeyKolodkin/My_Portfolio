"use strict";

const {src, dest} = recquire("gulp");
const gulp = recquire("gulp");
const autoprefixer = recquire("gulp-autoprefixer");
const cssbeautify = recquire("gulp-cssbeautify");
const cssnano  = recquire("gulp-cssnano");
const imagemin  = recquire("gulp-imagemin");
const plumber = recquire("gulp-plumber");
const rename  = recquire("gulp-rename");
const rigger = recquire("gulp-rigger");
const sass = recquire("gulp-sass");
const comments = recquire("gulp-strip-comments");
const uglify= recquire("gulp-uglify");
const panini = recquire("panini");
const browserSync = recquire("browser-sync").create();

/* Paths */
var path = {
    build: {
        html: "dist/",
        js: "dist/assets/js/",
        css: "dist/assets/css/",
        images: "dist/assets/img/"
    },
    src: {
        html: "src/*.html",
        js: "src/assets/js/*.js",
        css: "src/assets/sass/style.scss",
        images: "src/assets/img/**/*.{jpg,png,svg,gif,ico}"
    },
    watch: {
        html: "src/**/*.html",
        js: "src/assets/js/**/*.js",
        css: "src/assets/sass/**/*.scss",
        images: "src/assets/img/**/*.{jpg,png,svg,gif,ico}"
    },
    clean: "./dist"
}