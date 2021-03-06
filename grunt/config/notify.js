module.exports = function(grunt) {

	grunt.config('notify', {
		build: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Build is done', // required
			},
		},
		develop: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Sass and Uglify finished running', // required
			},
		},
		release: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Release is ready to deploy!', // required
			},
		},
		scripts: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Uglify finished running', // required
			},
		},
		styles: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Sass finished running', // required
			},
		},
		criticalcss: {
			options: {
				title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
				message: 'Critical CSS created', // required
			},
		},
		// mobile: {
		// 	options: {
		// 		title: "Task Complete (Jonathanvanwunnik)", // optional; defaults to the name in package.json, or will use project directory's name
		// 		message: 'Mobile stylesheet created', // required
		// 	},
		// },
	});

};
