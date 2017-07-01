<?php

/* -----------------------------------------------------------------------------
Routes
--------------------------------------------------------------------------------

Additional route setup for Kirby's internal router.

*/

c::set('routes', array(

	array(                                                                      // Redirect sitemap to sitemap.xml
		'pattern' => 'sitemap',
		'action'  => function() {
			return go('sitemap.xml');
		}
	),

	array(                                                                      // Redirect `/target/page` and `/target/page/1` to page `/target`
		'pattern' => array('(:any)/page', '(:any)/page/1'),
		'action'  => function($target) {

			$target_page = page($target);

			return go($target_page);
		}
	),

	array(                                                                      // Redirect `/target/category/category/page` and `/target/category/category/page/1` to page `/target/category`
		'pattern' => array('(:any)/category/(:any)/page', '(:any)/category/(:any)/page/1'),
		'action'  => function($target, $category) {

			$target_page = page($target);

			return go($target_page . (($category) ? '/' . $category : ''));
		}
	),

	array(                                                                      // Archive pagination (e.g. /target/page/2, /target/page/3, etc.)
		'pattern' => '(:any)/page/(:num)',
		'action'  => function($target, $num) {

			$args        = array('category' => null, 'page_num' => $num);
			$target_page = page($target);

			if(!$target_page) {
				go(site()->errorPage()->url(), 404);
			}
			else {
				return array($target, $args);
			}
		}
	),

	array(                                                                      // Filter archive pages by category (e.g. /target/category/category)
		'pattern' => '(:any)/category/(:any)',
		'action'  => function($target, $category) {

			$args        = array('category' => $category, 'page_num' => null);
			$page        = page($target . '/'. $category);
			$target_page = page($target);

			if(!$target_page) {
				go(site()->errorPage()->url(), 404);
			}
			else {
				if($page) {
					// If page actually exists then return it
					return site()->visit($page->uri());
				} else {
					// Otherwise probably a category
					return array($target, $args);
				}
			}
		}
	),

	array(                                                                      /// Filtered archive pages pagination (e.g. /target/category/category/page/2, /target/category/category/page/3, etc.)
		'pattern' => '(:any)/category/(:any)/page/(:num)',
		'action'  => function($target, $category, $num) {

			$args        = array('category' => $category, 'page_num' => $num);
			$target_page = page($target);

			if(!$target_page) {
				go(site()->errorPage()->url(), 404);
			}
			else {
				return array($target, $args);
			}
		}
	),

	array(                                                                      // Post item within category (e.g. /blog/category/category/post)
		'pattern' => '(:any)/category/(:any)/(:any)',
		'action'  => function($target, $category, $post) {

			$args = array('category' => $category, 'page_num' => null);
			// $args = page($target . '/category/' . $category);
			$target_page = page($target);

			if(isset($post)) {
				$page = page($target . '/' . $post);
				if(!$page) $page = go(site()->errorPage(), 404);
				return array($target . '/'. $post, $args);
			}

			// If page actually exists then return it
			if($page) return site()->visit($page->uri());

			// Otherwise probably a category
			return array($target, $args);
		}
	),

));
