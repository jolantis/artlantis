<?php

page::$methods['canonical_rel'] = function($page, $filter_value, $page_num) {
	return '<link rel="canonical" href="' . $page->url() . (($page_num && $page_num != 1) ? '/page/' . $page_num : '') . '">' . "\n";
};

page::$methods['prevnext_rel'] = function($page, $filter_key, $filter_value, $pagination, $page_num) {

	if($pagination && $pagination->hasPages()) {
		if($page_num == 1 and $pagination->hasNextPage()) {
			return '<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/2') . '">'  . "\n";
		}
		if($page_num == 2 and $pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '')) . '">
					<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num + 1)) . '">'  . "\n";
		}
		if($pagination->hasPrevPage() and $pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num - 1)) . '">
					<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num + 1)) . '">'  . "\n";
		}
		if($page_num == 2 and !$pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '')) . '">'  . "\n";
		}
		if($pagination->hasPrevPage() and !$pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num - 1)) . '">'   . "\n";
		}
	}
};

page::$methods['get_next'] = function($page, Children $siblings, $sort = array(), $visibility = 'visible') {

	if($sort) $siblings = call(array($siblings, 'sortBy'), $sort);

	$index = $siblings->indexOf($page);

	if($index === false) return null;

	if($visibility) {
		$siblings = $siblings->offset($index+1);
		$siblings = $siblings->{$visibility}();
		return $siblings->first();
	}
	else {
		return $siblings->nth($index + 1);
	}
};

page::$methods['get_prev'] = function($page, Children $siblings, $sort = array(), $visibility = 'visible') {

	if($sort) $siblings = call(array($siblings, 'sortBy'), $sort);

	$index = $siblings->indexOf($page);

	if($index === false or $index === 0) return null;

	if($visibility) {
		$siblings = $siblings->limit($index);
		$siblings = $siblings->{$visibility}();
		return $siblings->last();
	}
	else {
		return $siblings->nth($index - 1);
	}
};

?>
