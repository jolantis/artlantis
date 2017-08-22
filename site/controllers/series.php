<?php
return function($site, $pages, $page, $data) {

	// set defaults
	$page_num     = false;
	$pagination   = false;
	$filter_key   = false;
	$filter_value = false;

	// fetch the basic set of pages and define pagination
	$series = $page->children()->visible()->flip();
	$pagination = (c::get('pagination.' . $page->intendedTemplate()) == false) ? false : true;
	$series = ($pagination) ? $page->children()->visible()->flip()->paginate(c::get('pagination.' . $page->intendedTemplate())) : $page->children()->visible()->flip();

	return compact('series', 'page_num', 'pagination', 'filter_key', 'filter_value');

};
?>
