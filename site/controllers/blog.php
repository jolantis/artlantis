<?php
return function($site, $pages, $page, $args) {

	$page_items     = $page->children()->visible()->flip();
	$page_num       = (isset($args['page_num'])) ? ($args['page_num']) : '1';
	$pagination     = (c::get('pagination.' . $page->intendedTemplate()) == false) ? false : true;
	$categories     = $page_items->pluck('categories', ',', true); sort($categories);
	$category       = (isset($args['category'])) ? ($args['category']) : false;
	$cat_pagination = (c::get('pagination.category') == true) ? true : false;

	# Check if there's a category in the url
	if($pagination) {
		if($category) {
			if($cat_pagination) {
				$page_items = $page_items->filterBy('categories', '==', tagunslug($category), ',')->paginate(c::get('pagination.' . $page->intendedTemplate(), 10), array('page' => $page_num));
			}
			else {
				$page_items = $page_items->filterBy('categories', '==', tagunslug($category), ',');
			}

			if($page_items->count() == 0) go(site()->errorPage()->url(), 404);
		}
		else {
			$page_items = $page_items->paginate(c::get('pagination.' . $page->intendedTemplate(), 10), array('page' => $page_num));
		}
	}
	else {
		if($category) {
			$page_items = $page_items->filterBy('categories', '==', tagunslug($category), ',');
		}
		$pagination = false;
	}

	# Filter by date to exclude future posts
	$page_items = $page_items->filterBy('date', '<', time());

	# Set pagination
	$pagination = $page_items->pagination();

	// dump($pagination);

	return compact('page_items', 'page_num', 'pagination', 'categories', 'category', 'args');

};
?>
