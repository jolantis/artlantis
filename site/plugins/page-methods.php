<?php

page::$methods['canonical_rel'] = function($page, $filter_value, $page_num) {
	return '<link rel="canonical" href="' . $page->url() . (($page_num && $page_num != 1) ? '/page/' . $page_num : '') . '">' . "\n";
/**
 * HTML head page title
 *
 * Field requirements:
 * - $site->title() *
 * - $site->tagline() *      ---> (part of) home page's title (and used to generate fallback for meta description)
 * - $page->long-title()     ---> page's title
 * - $page->title() *        ---> page's title, used to generate fallback for page's long title

Fields marked with an asterisk (*) are required and need to be filled in to
make it work. If any of the other fields are missing it should still work.

Include following line in HTML head:
`<title><?php echo $page->page_title(); ?></title>`
 */

page::$methods['page_title'] = function($page) {

	if($page->isHomePage()) {
		if(site()->tagline()->exits() && site()->tagline()->isNotEmpty()) {
			$page_title = site()->title() . ': ' . site()->tagline()->smartypants()->titlecase();
		}
		else {
			$page_title = site()->title();
		}
	}
	else {
		if($page->long_title()->exits() && $page->long_title()->isNotEmpty()) {
			$page_title = site()->title() . ': ' . $page->long_title()->smartypants()->titlecase();
		}
		else {
			$page_title = site()->title() . ': ' . $page->title()->smartypants()->titlecase();
		}
	}
	return $page_title;
};

/**
 * Meta description
 *
 * Field requirements:
 * - $page->description()    ---> page's meta description
 * - $page->intro()          ---> page's main text content, used to generate fallback for meta description
 * - $page->text()           ---> page's main text content, used to generate fallback for meta description
 * - $site->tagline() *      ---> (part of) home page's title, last resort fallback for meta description

Fields marked with an asterisk (*) are required and need to be filled in to
make it work. If any of the other fields are missing it should still work.

Include following line in HTML head:
`<meta name="description" content="<?php echo $page->meta_description(); ?>">`
 */

page::$methods['meta_description'] = function($page) {

	if($page->description()->exits() && $page->description()->isNotEmpty()) {
		$description = $page->description()->smartypants();
	}
	elseif($page->intro()->exits() && $page->intro()->isNotEmpty() ) {
		$description = $page->intro()->smartypants();
	}
	elseif($page->text()->exits() && $page->text()->isNotEmpty() ) {
		$description = $page->text()->smartypants();
	}
	else {
		$description = $site->tagline()->smartypants();
	}
	return $description->excerpt(155);
};

};

page::$methods['prevnext_rel'] = function($page, $filter_key, $filter_value, $pagination, $page_num) {

	if($pagination && $pagination->hasPages()) {
		if($page_num == 1 and $pagination->hasNextPage()) {
			return '<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/2') . '">' . "\n";
		}
		if($page_num == 2 and $pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '')) . '">
					<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num + 1)) . '">' . "\n";
		}
		if($pagination->hasPrevPage() and $pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num - 1)) . '">
					<link rel="next" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num + 1)) . '">' . "\n";
		}
		if($page_num == 2 and !$pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '')) . '">' . "\n";
		}
		if($pagination->hasPrevPage() and !$pagination->hasNextPage()) {
			return '<link rel="prev" href="' . url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_key . '/' . $filter_value : '') . '/page/' . ($page_num - 1)) . '">' . "\n";
		}
	}
};

/**
 * Alternate link(s) (for multiple languages)
 *
 * Usage example:
 * `<?php echo $page->rel_alternate(); ?>`
 */

page::$methods['rel_alternate'] = function($page) {

	if(c::get('language.multi', false)) {

		$alternate = '';

		foreach(site()->languages() as $language) {

			if(site()->languages()->count() > 1 && site()->language() != $language && isset($page->inventory()['content'][$language->code()])) {
				$alternate .= '<link rel="alternate" href="' . $page->url($language->code()) . '" hreflang="' . $language->locale() . '">'  . "\n";
			}
		}

		return $alternate;
	}
};

page::$methods['next_sibling'] = function($page, Children $siblings, $sort = array(), $visibility = 'visible') {

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
