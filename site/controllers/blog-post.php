<?php
return function($site, $pages, $page, $args) {

	$page_items   = $page->siblings()->visible();
	$page_num     = false;
	$pagination   = false;
	$filter_key   = (isset($args['filter_key'])) ? ((($args['filter_key']) == 'tag') ? 'tags' : ($args['filter_key'])) : false;
	$filter_value = (isset($args['filter_value'])) ? ($args['filter_value']) : false;
	// $index      = $page_items->indexOf($page);

	if($filter_value) {
		$page_items = $page_items->filterBy($filter_key, tagunslug($filter_value), ',');

		if($page_items->count() == 0) go(site()->errorPage()->url(), 404);
	}

	// $return_url = back_to_overview_url($args, $page);

	$prev = $page->get_prev($page_items);
	$next = $page->get_next($page_items);

	return compact('page_items', 'page_num', 'pagination', 'filter_key', 'filter_value', 'next', 'prev');

};
?>
