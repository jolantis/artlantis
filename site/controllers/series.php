<?php
return function($site, $pages, $page, $data) {

	// fetch the basic set of pages
	$series = $page->children()->visible()->flip();

	// add the category filter
	if(count($data) > 0) {
		$categoryparam = $data;
		$series = $series->filterBy('categories', $data['category'], ',');
	}
	else {
		$categoryparam = false;
	}

	// fetch all categories
	$categories = $site->find('series')->children()->visible()->pluck('categories', ',', true);
	sort($categories);

	// apply pagination
	if(isset($data['category']) && !param('page')) {
		$key = (key($data) == 'tag' ? 'tags' : key($data));
		$tag = tagunslug($data['category']);
		// $series = $page->children()->visible()->filterBy($key, ($tag), ',')->flip();
		$series = $page->children()->visible()->filterBy('categories', ($tag), ',')->flip(); // Set 'categories' as key, because we need to change the content file!
		$pagination = false;
	}
	else {
		$pagination = (c::get('pagination.' . $page->intendedTemplate()) == false) ? false : true;
		$series = ($pagination) ? $page->children()->visible()->flip()->paginate(c::get('pagination.' . $page->intendedTemplate())) : $page->children()->visible()->flip();
	}

	return compact('series', 'categories', 'categoryparam', 'pagination', 'key', 'tag');

};
?>
