module.exports = function(grunt) {

	grunt.config('browserSync', {
		dev: {
			files: {
				src: [
					'<%= project.styles %>/main.css',
					// '<%= project.styles %>/mobile.css',
					'<%= project.scripts %>/head.js',
					'<%= project.scripts %>/main.js',
					// '<%= project.scripts %>/mobile.js',
					'site/templates/*.php',
					'site/snippets/*.php',
					'content/**/*.md',
				]
			},
			options: {
				watchTask: true,
				open: false, // 'external'
				host: 'jonathanvanwunnik.test',
				proxy: 'jonathanvanwunnik.test',
				port: 3000,
				// tunnel: 'jonathanvanwunnik',                                            // Attempt to use the URL "http://jonathanvanwunnik.localtunnel.me"
				// logConnections: true,
				logFileChanges: true,
				// open: false, // 'ui'
				browser: 'google chrome',
				// xip: true,
				reloadOnRestart: true,
				notify: false,
				ghostMode: {
					clicks: true,
					forms: true,
					scroll: true,
				},
			},
		},
	});

};
