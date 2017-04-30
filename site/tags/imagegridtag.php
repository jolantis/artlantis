<?php

/**
 * Imagegridtag
 *
 * Based on some example code of Lukas Bestle:
 * https://forum.getkirby.com/t/markdown-grid-for-images/2624/2
 *
 * Syntax:
 * 1) (imagegrid: JVW_170113_141232.jpg:1of2 | JVW_170109_143327.jpg:1of2)
 * 2) (imagegrid: JVW_170128_125641.jpg:2of3 | JVW_170109_143327.jpg, JVW_170109_143514.jpg:1of3 class: full-width)
 * 3) (imagegrid: JVW_170318_150422.jpg:8of17 | JVW_170128_125641.jpg, JVW_170109_143327.jpg:9of17 caption: ...)
 * 4) (imagegrid: JVW_170318_145831.jpg:9of13 | JVW_170318_150426.jpg:4of13 class: text-width caption: ...)
 *
 * Copyright: Jonathan van Wunnik (artlantis.nl)
 * License: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 */

kirbytext::$tags['imagegrid'] = array(
	'attr' => array(
		'class',
		'caption'
	),
	'html' => function($tag) {

		if(page()->representation() == 'rss') {

			// TO DO!!!!!

		} else {

			$containers = explode('|', $tag->attr('imagegrid'));
			$class = $tag->attr('class');
			$caption = $tag->attr('caption');

			// Check for multiple (stacked) images in each container
			for($i = 0; $i < count($containers); $i++) {

				// If there is comma seperated content, it means there is
				// more than 1 image in 1 container (thus a triptych)!
				$triptych = (strpos($containers[$i],',') !== false) ? ' triptych' : '';
			}

			$html = '<figure class="figure-image ' . $class . '">';
			$html .= '<div class="grid">';

			foreach($containers as $container) {

				// Remove space after the comma
				$container = trim($container);

				// Seperate image from (size) class
				list($images, $size) = explode(':', $container);

				// Get the image array
				$images = explode(',', $images);

				$html .= '<div class="grid__cell small-' . $size . $triptych . '">';

				foreach($images as $image) {
					$image = trim($image); // Remove space after the comma
					$html .= '<div class="figure-image size-' . $size . '">' . $tag->page()->image($image)->imageset('default') . '</div>';
				}

				$html .= '</div>';

				// $i++;

			}

			if(isset($caption)) {
				$html .= '<figcaption>' . smartypants($caption) . '</figcaption>';
			}

			$html .= '</div>';
			$html .= '</figure>';

			return $html;

		}
	}
);
