let mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const WebpackShellPlugin = require('webpack-shell-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js([
 	'resources/assets/js/app.js',
 	'resources/assets/js/searcher.js',
	'resources/assets/js/libs/jquery.tagsinput.min.js',
	'resources/assets/js/libs/mention.js/bootstrap-typeahead.js',
	'resources/assets/js/libs/mention.js/mention.js'
], 'public/js')
.babel('resources/assets/js/moment.min.js', 'public/js/moment.js')
.less('resources/assets/less/style.less', '../resources/assets/css/style.css')
.styles([
	'resources/assets/css/libs/jquery.tagsinput.min.css',
	'resources/assets/css/style.css'
],'public/css/all.css');

mix.options({
	processCssUrls: false,
	uglify: {
		uglifyOptions: {
			compress: {
				drop_console: false,
			}
		}
	},
});

mix.webpackConfig({
	plugins: [
		new WebpackShellPlugin({
			// onBuildStart:['php artisan -c --quiet'], onBuildEnd:[]
		}),
		new BrowserSyncPlugin({
			files: [
				'app/**/*',
				'public/**/*',
				'resources/views/**/*',
				'resources/lang/**/*',
				'routes/**/*',
				'docs/**/*'
			],
			notify: {
				styles:  [
					"display: none",
					"padding: 15px",
					"font-family: sans-serif",
					"position: fixed",
					"font-size: 0.9em",
					"z-index: 9999",
					"bottom: 2px",
					"right: 2px",
					"border-bottom-left-radius: 5px",
					"background-color: #1B2032",
					"margin: 0",
					"color: white",
					"text-align: center",
					"border-radius: 3px"
				]
			}
		}),
	]
});