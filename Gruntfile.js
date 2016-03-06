'use strict';
module.exports = function ( grunt ) {

	// load all grunt tasks matching the `grunt-*` pattern
	// Ref. https://npmjs.org/package/load-grunt-tasks

	require( 'load-grunt-tasks' )( grunt );
	// require('jit-grunt')(grunt);

	grunt.initConfig( {
		// watch for changes and trigger sass, jshint, uglify and livereload
		watch: {
			sass: {
				files: [ 'pro/**/*.{scss,sass}', 'sass/**/*.{scss,sass}' ],
				tasks: [ 'sass' ]
			}
		},
		// sass
		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'pro/pro.css': 'pro/sass/pro.scss'
				}
			},
			mainStyle: {
				options: {
					style: 'expanded'
				},
				files: {
					'style.css': 'sass/style.scss'
				}
			}
		},
		// autoprefixer
		autoprefixer: {
			options: {
				browsers: [ 'last 2 versions', 'ie 9', 'ios 6', 'android 4' ],
				map: true
			},
			files: {
				expand: true,
				flatten: true,
				src: '*.css',
				dest: ''
			}
		},
		//https://www.npmjs.com/package/grunt-checktextdomain
		checktextdomain: {
			options: {
				text_domain: 'powen-lite', //Specify allowed domain(s)
				keywords: [ //List keyword specifications
					'__:1,2d', '_e:1,2d', '_x:1,2c,3d', 'esc_html__:1,2d', 'esc_html_e:1,2d', 'esc_html_x:1,2c,3d', 'esc_attr__:1,2d', 'esc_attr_e:1,2d', 'esc_attr_x:1,2c,3d', '_ex:1,2c,3d', '_n:1,2,4d', '_nx:1,2,4c,5d', '_n_noop:1,2,3d', '_nx_noop:1,2,3c,4d'
				]
			},
			target: {
				files: [ {
						src: [ '*.php', '**/*.php', '!node_modules/**', '!tests/**' ], //all php
						expand: true
					} ]
			}
		},
		// Make POT files for translation.
		makepot: {
			target: {
				options: {
					cwd: '.', // Directory of files to internationalize.
					domainPath: 'languages/', // Where to save the POT file.
					exclude: [ 'node_modules/*' ], // List of files or directories to ignore.
					mainFile: 'index.php', // Main project file.
					potFilename: 'powen-lite.pot', // Name of the POT file.
					potHeaders: { // Headers to add to the generated POT file.
						poedit: true, // Includes common Poedit headers.
						'Last-Translator': 'Company <support@powen-lite.com>',
						'Language-Team': 'Team <support@powen-lite.com>',
						'report-msgid-bugs-to': 'http://supernovathemes.com/powen-theme',
						'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
					},
					type: 'wp-theme', // Type of project (wp-plugin or wp-theme).
					updateTimestamp: true // Whether the POT-Creation-Date should be updated without other changes.
				}
			}
		},
	} );
	// register task
	grunt.registerTask( 'default', [ 'sass', 'autoprefixer', 'checktextdomain', 'makepot', 'watch' ] );
	//grunt.registerTask( 'default', [ 'sass', 'autoprefixer' , 'watch' ] );
};