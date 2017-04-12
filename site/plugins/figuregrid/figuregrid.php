<?php

/**
 * Figure Grid
 *
 * @author Jonathan van Wunnuj <jonathan@artlantis.nl>
 * @version 1.0.0
 *
 * Heavily based Bastian Allgeier's columns plugin (example)
 */

kirbytext::$pre[] = function($kirbytext, $text) {

	if(page()->representation() == 'rss') {

		$text = preg_replace('!\(grid(…|.{3})\)!is', '', $text);
		$text = preg_replace('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', '', $text);
		$text = preg_replace('!\((…|\.{3})grid\)!', '', $text);

	} else {

		$text = preg_replace_callback('!\(grid(…|\.{3})\)(.*?)\((…|\.{3})grid\)!is', function($matches) use($kirbytext) {

			$columns = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
			$html    = array();

			foreach($columns as $column) {
			  $field = new Field($kirbytext->field->page, null, trim($column));
			  $html[] = '<div class="grid__cell' . ' ' . c::get('grid.break', 'small') . '-1of' . count($columns) . '">' . kirbytext($field) . '</div>';
			}

			return '<div class="figure-grid"><div class="grid">' . implode($html) . '</div></div>';
			// return '<div class="figure-grid full"><div class="grid">' . implode($html) . '</div></div>';

		}, $text);

	}

	return $text;

};
