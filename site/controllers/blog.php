<?php
return function($site, $pages, $page, $data) {

	// fetch the basic set of pages
	$blog_posts = $page->children()->visible()->flip();

	// add the category filter
	if(count($data) > 0) {
		$categoryparam = $data;
		$blog_posts = $blog_posts->filterBy('categories', $data['category'], ',');
	}
	else {
		$categoryparam = false;
	}

	// fetch all categories
	$categories = $site->find('blog')->children()->visible()->pluck('categories', ',', true);
	sort($categories);

	// apply pagination
	if(isset($data['category']) && !param('page')) {
		$key = (key($data) == 'tag' ? 'tags' : key($data));
		$tag = tagunslug($data['category']);
		// $blog_posts = $page->children()->visible()->filterBy($key, ($tag), ',')->flip();
		$blog_posts = $page->children()->visible()->filterBy('categories', ($tag), ',')->flip(); // Set 'categories' as key, because we need to change the content file!
		$pagination = false;
	}
	else {
		$pagination = (c::get('pagination.' . $page->intendedTemplate()) == false) ? false : true;
		$blog_posts = ($pagination) ? $page->children()->visible()->flip()->paginate(c::get('pagination.' . $page->intendedTemplate())) : $page->children()->visible()->flip();
	}

	return compact('blog_posts', 'categories', 'categoryparam', 'pagination', 'key', 'tag');

};
?>
