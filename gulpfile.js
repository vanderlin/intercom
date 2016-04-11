var gulp = require("gulp");
var gutil = require("gulp-util");
var webpack = require('webpack');
var WebpackDevServer = require('webpack-dev-server');
var config = require('./webpack.dev.config');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');


gulp.task("sass", function() {
	gulp.src('resources/assets/sass/*')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(concat("main.css"))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest('./public/css'))
		.on('error', function (error) {
        	console.error('' + error);
    	});
});

gulp.task("webpack", function(callback) {
	var webpackConfig = require('./webpack.production.config');
	var myConfig = Object.create(webpackConfig);
	myConfig.plugins = myConfig.plugins.concat(
		new webpack.DefinePlugin({
			"process.env": {
				"NODE_ENV": JSON.stringify("production")
			}
		}),
		new webpack.optimize.DedupePlugin(),
		new webpack.optimize.UglifyJsPlugin()
	);

	// run webpack
	webpack(myConfig, function(err, stats) {
		if(err) throw new gutil.PluginError("webpack", err);
		gutil.log("[webpack]", stats.toString({
			colors: true
		}));
		callback();
	});
});

gulp.task("webpack-dev-server", function(callback) {

	new WebpackDevServer(webpack(config), {
		publicPath: config.output.publicPath,
		stats: {
			colors: true
		},
		hot: true,
		historyApiFallback: true
	}).listen(8080, 'localhost', function (err, result) {
		if (err) {
			console.log(err);
		}
		console.log('Listening at localhost:8080');
	});

	livereload.listen();

	gulp.watch(["resources/assets/**/*", "resources/views/**/*", "app/**"], ["sass"]).on('change', function (event) {
	    livereload.changed(event.path);
    });

	/*
	// modify some webpack config options
	var myConfig = Object.create(webpackConfig);
	myConfig.devtool = "eval";
	myConfig.debug = true;

	// Start a webpack-dev-server
	new WebpackDevServer(webpack(myConfig), {
		publicPath: "/" + myConfig.output.publicPath,
		stats: {
			colors: true
		}
	}).listen(8080, "localhost", function(err) {
		if(err) throw new gutil.PluginError("webpack-dev-server", err);
		gutil.log("[webpack-dev-server]", "http://localhost:8080/webpack-dev-server/index.html");
	});*/
});







gulp.task("default", ["webpack-dev-server"]);
gulp.task("dist", ["sass", "webpack"]);

