<?php

/* -----------------------------------------------------------------------------
Imageset
--------------------------------------------------------------------------------

License code for Imageset should be added to the `config.license.php` file.
For a more detailed description of the (global) configuration, see:

https://github.com/fabianmichael/kirby-imageset#3-global-configuration

*/

c::set('imageset.styles.consolidate', false);
c::set('imageset.tags.image', true);
c::set('imageset.tags.image.sizes.default', 'default');
// c::set('imageset.tags.image.class', 'figure-image size-{size}');
c::set('imageset.tags.image.class', 'figure-image');
c::set('imageset.placeholder', 'color'); // false, triangles, mosaic, blurred, lqip, color
c::set('imageset.noscript', true);
c::set('imageset.lazyload', true);


/* -----------------------------------------------------------------------------
Size presets
--------------------------------------------------------------------------------

Projects' re-occuring image sizes. A set of default presets to be used
in your templates.

https://github.com/fabianmichael/kirby-imageset#44-working-with-size-presets

*/

c::set('imageset.presets', [
	'default' => [
		[ '300-2880,5' ],
	],
	'1of2' => [
		[ '320-1440,3' ],
	],
	'1of3' => [
		[ '320-960,2' ],
	],
	'hero' => [
		[ '320x180-1920x1080,5', 'media' => '(min-aspect-ratio: 3/2)' ],
		[ '320x320-1000x1000,5' ],
	],
]);
