<?php
return function($site, $pages, $page, $args) {

	$page_items = $page->siblings()->visible();
	$page_num   = false;
	$pagination = false;
	$category   = (isset($args['category'])) ? ($args['category']) : false;
	// $index      = $page_items->indexOf($page);

	if($category) {
		$page_items = $page_items->filterBy('categories', tagunslug($category), ',');

		if($page_items->count() == 0) go(site()->errorPage()->url(), 404);
	}

	// $return_url = back_to_overview_url($args, $page);

	$prev = $page->get_prev($page_items);
	$next = $page->get_next($page_items);

	return compact('page_items', 'page_num', 'pagination', 'category', 'next', 'prev', 'args');

};
?>
