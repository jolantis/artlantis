module.exports = function(grunt) {

	grunt.config('hashify', {
		options: {
			basedir: '', // hashmap and dest path will be relative to this dir
			copy: false, // keep originals
			force: true, // overrides this task from blocking deletion of files outside current working dir
		},
		styles: {
			options: {
				hashmap: '<%= project.styles %>/hash.css.json', // location to put hashmap
			},
			files: [
				{
					src: '<%= project.styles %>/main.min.css', // md5 of the contents goes in hashmap
					dest: '<%= project.styles %>/{{hash}}.css', // {{hash}} will be replaced with md5 of the contents of the source
					key: 'main', // key to use in the hashmap
				},
				// {
				// 	src: '<%= project.styles %>/mobile.min.css',
				// 	dest: '<%= project.styles %>/{{hash}}.css',
				// 	key: 'mobile',
				// },
				{
					src: '<%= project.styles %>/print.min.css',
					dest: '<%= project.styles %>/{{hash}}.css',
					key: 'print',
				},
			],
		},
		scripts: {
			options: {
				hashmap: '<%= project.scripts %>/hash.js.json', // location to put hashmap
			},
			files: [
				{
					src: '<%= project.scripts %>/head.min.js',
					dest: '<%= project.scripts %>/{{hash}}.js',
					key: 'head',
				},
				{
					src: '<%= project.scripts %>/main.min.js',
					dest: '<%= project.scripts %>/{{hash}}.js',
					key: 'main',
				},
				// {
				// 	src: '<%= project.scripts %>/mobile.min.js',
				// 	dest: '<%= project.scripts %>/{{hash}}.js',
				// 	key: 'mobile',
				// },
			],
		},
	});

};
