<?php

/**
 * Imagesgridtag
 *
 * Heavily based on some example code of Lukas Bestle's:
 * https://forum.getkirby.com/t/markdown-grid-for-images/2624/2
 *
 * Syntax:
 * 1) (images: )
 * 2) (images: )
 * 3) (images: )
 *
 * Copyright: Jonathan van Wunnik (artlantis.nl)
 * License: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 */

kirbytext::$tags['imagesgrid'] = array(
	'attr' => array(
		'class'
	),
	'html' => function($tag) {

		if(page()->representation() == 'rss') {

		} else {

			$containers = explode('|', $tag->attr('imagesgrid'));
			$class = $tag->attr('class');

			$html = '<div class="figure-grid ' . $class . '">';
			$html .= '<div class="grid">';

			foreach($containers as $container) {

				$container = trim($container); // Remove space after the comma
				list($images, $size) = explode(':', $container);
				$images = explode(',', $images); //get the image array

				$html .= '<div class="grid__cell small-' . $size . '">';

				foreach($images as $image) {
					$image = trim($image); // Remove space after the comma
					$html .= '<figure class="figure-image size-' . $size . '">' . $tag->page()->image($image)->imageset('default') . '</figure>';
				}

				$html .= '</div>';

			}

			$html .= '</div>';
			$html .= '</div>';

			return $html;

		}
	}
);
