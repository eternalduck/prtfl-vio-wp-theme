const gulp = require("gulp");
const sass = require("gulp-sass");
const autoprefixer = require("autoprefixer");
const postcss = require("gulp-postcss");
const babel = require("gulp-babel");
const concat = require("gulp-concat");
const browsersync = require("browser-sync");

let path = {
	src: {
		php: "./**/*.php",//just for watching&reload
		css: "./src/scss/**/*.scss",
		js: ["./src/js/**/_*.js", "!./src/js/backend.js"],
		jsBackend: ["./src/js/backend.js"],
	},
	build: {
		css: "./",
		js: "./js/",
	}
};

function css() {
	return gulp
	.src(path.src.css)
	.pipe(sass({ outputStyle: "expanded" }))
	.pipe(postcss([
		autoprefixer({
			grid: "autoplace"
		}),
	]))
	.pipe(gulp.dest(path.build.css))
	.pipe(browsersync.stream())
}

function js() {
	return gulp
	.src(path.src.js)
	.pipe(concat("custom.js"))
	.pipe(babel({
		presets: ["@babel/env"]
	}))
	.pipe(gulp.dest(path.build.js))
	.pipe(browsersync.stream())
}

function jsBackend() {
	return gulp
		.src(path.src.jsBackend)
		.pipe(babel({
			presets: ["@babel/env"]
		}))
		.pipe(gulp.dest(path.build.js))
		.pipe(browsersync.stream())
}

function php() {
	return gulp
	.src(path.src.php)
	.pipe(browsersync.stream())
}

function serve(done) {
	browsersync.init({
		port: 7700,
		watch: true,
		proxy: "violet-wp:88",//for local dev hot reload
		open: false,
		notify: false,
		reloadOnRestart: true
	})
	gulp.watch(path.src.css, css)
	gulp.watch(path.src.js, js).on('change', browsersync.reload)
	gulp.watch(path.src.jsBackend, jsBackend).on('change', browsersync.reload)
	gulp.watch(path.src.php, php).on('change', browsersync.reload)
	done();
}

const build = gulp.series(css, js, jsBackend);
const buildAndStart = gulp.series(css, js, jsBackend, serve);

exports.build = build;
exports.default = buildAndStart;
