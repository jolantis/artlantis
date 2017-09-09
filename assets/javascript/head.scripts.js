/**
 * head.script.js
 *
 * Essential scripts, to be loaded in the head of the document
 * Use gruntfile.js to include the necessary script files.
 */

// Load respimage if <picture> element is not supported
if(!window.HTMLPictureElement){
	enhance.loadJS('/assets/javascript/lib/polyfills/respimage.min.js');
}

// Load SVG 4 everybody (make sure to add `inlinesvg` check to Modernizr!)
if (!Modernizr.inlinesvg) {
	enhance.loadJS('/assets/javascript/lib/polyfills/svg4everybody.min.js');

	svg4everybody({
		nosvg: true, // shiv <svg> and <use> elements and use image fallbacks
		polyfill: true // polyfill <use> elements for external content
	});
}
