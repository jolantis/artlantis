module.exports = function(grunt) {

	grunt.config('criticalcss', {
		default : {
			options: {
				url: 'http://jonathanvanwunnik.test',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/default.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		// default_mobile : {
		// 	options: {
		// 		url: 'http://jonathanvanwunnik.test',
		// 		width: 420, // iPhone 6 Plus is 414 points wide
		// 		height: 960, //iPhone 6 Plus is 736 points high
		// 		outputfile: '<%= project.styles_critical %>/default_mobile.css',
		// 		filename: '<%= project.styles %>/main.css',
		// 		forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
		// 		buffer: 800*1024,
		// 	},
		// },
		// home : {
		// 	options: {
		// 		url: 'http://jonathanvanwunnik.test',
		// 		width: 1440,
		// 		height: 900,
		// 		outputfile: '<%= project.styles_critical %>/home.css',
		// 		filename: '<%= project.styles %>/main.css',
		// 		forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
		// 		buffer: 800*1024,
		// 	},
		// },
		base : {
			options: {
				url: 'http://jonathanvanwunnik.test/base',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/base.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		work : {
			options: {
				url: 'http://jonathanvanwunnik.test/work',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/work.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		work_item : {
			options: {
				url: 'http://jonathanvanwunnik.test/work/portraits',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/work_item.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		blog : {
			options: {
				url: 'http://jonathanvanwunnik.test/blog',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/blog.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		blog_post : {
			options: {
				url: 'http://jonathanvanwunnik.test/blog/fair-time',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/blog_post.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		info : {
			options: {
				url: 'http://jonathanvanwunnik.test/info',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/info.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
		contact : {
			options: {
				url: 'http://jonathanvanwunnik.test/contact',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/contact.css',
				filename: '<%= project.styles %>/main.css',
				forceInclude: [], // An array of selectors that you want to guarantee will make it from the CSS file into your CriticalCSS output.
				buffer: 800*1024,
			},
		},
	});

};
