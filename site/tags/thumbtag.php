<?php
/**
 * Thumbtag
 * Implements a thumb generated image, by wrapping an
 * img tag inside a figure element.
 *
 * Syntac:
 * (thumb: image.jpg width: 225 height: 225 alt: Just a thumb)
 * (thumb: image.jpg width: 225 height: 225 quality: 75 alt: Thumb with quality 75)
 * (thumb: image.jpg width: 400 height: 250 crop: true alt: Thumb cropped)
 *
 * Copyright: Marijn Tijhuis (fatpixel.nl)
 * License: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 */

kirbytext::$tags['thumb'] = array(
	'attr' => array(
		'width',
		'height',
		'alt',
		'quality',
		'crop'
		),
	'html' => function($tag) {

		$url = $tag->attr('thumb');
		$file = $tag->file($url);
		$quality = $tag->attr('quality', c::get('thumbs.quality', 92));

		$image = thumb($file,array(
			'width' => $tag->attr('width'),
			'height' => $tag->attr('height'),
			'alt' => $tag->attr('alt'),
			'quality' => $quality,
			'crop' => $tag->attr('crop'),
		));

		$figure = new Brick('figure');
		$figure->append($image);

		return $figure;

	}
);
