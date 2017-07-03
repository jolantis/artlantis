<?php
return function($site, $pages, $page, $args) {

	$page_items          = $page->children()->visible()->flip();
	$page_num            = (isset($args['page_num'])) ? ($args['page_num']) : 1;
	$pagination          = (c::get('pagination.' . $page->intendedTemplate()) == false) ? false : true;
	$pagination_filtered = (c::get('pagination.filtered') == true) ? true : false;
	$filter_key          = (isset($args['filter_key'])) ? ((($args['filter_key']) == 'tag') ? 'tags' : ($args['filter_key'])) : false;
	$filter_value        = (isset($args['filter_value'])) ? ($args['filter_value']) : false;

	# Check if there's a category in the url
	if($pagination) {
		if($filter_value) {
			if($pagination_filtered) {
				$page_items = $page_items->filterBy($filter_key, '==', tagunslug($filter_value), ',')->paginate(c::get('pagination.' . $page->intendedTemplate(), 10), array('page' => $page_num));
			}
			else {
				if($page_num and $page_num != 1) go(site()->errorPage()->url(), 404);

				$page_items = $page_items->filterBy($filter_key, '==', tagunslug($filter_value), ',');
			}

			if($page_items->count() == 0) go(site()->errorPage()->url(), 404);
		}
		else {
			$page_items = $page_items->paginate(c::get('pagination.' . $page->intendedTemplate(), 10), array('page' => $page_num));
		}
	}
	else {
		if($filter_value) {
			$page_items = $page_items->filterBy($filter_key, '==', tagunslug($filter_value), ',');
		}
		$pagination = false;
	}

	# Filter by date to exclude future posts
	$page_items = $page_items->filterBy('date', '<', time());

	# Set pagination
	$pagination = $page_items->pagination();

	return compact('page_items', 'page_num', 'pagination', 'filter_key', 'filter_value');

};
?>
