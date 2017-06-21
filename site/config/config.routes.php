<?php

/* -----------------------------------------------------------------------------
Routes
--------------------------------------------------------------------------------

Additional route setup for Kirby's internal router.

*/

c::set('routes', array(
	// array(                                                                      // Example route
	// 	'pattern' => '(:num)/(:num)/(:num)/(:any)',
	// 	'action'  => function($year, $month, $day, $uid) {
	// 		// search for the article
	// 		$page = page('blog/' . $uid);
	// 		// redirect to the article or the error page
	// 		go($page ? $page->url($language_code) : 'error');
	// 	}
	// ),
	// array(                                                                      // Internally route sitemap.xml to sitemap (template)
	// 	'pattern' => 'sitemap.xml',
	// 	'action'  => function() {
	// 		return site()->visit('sitemap');
	// 	}
	// ),
	array(                                                                      // Redirect sitemap to sitemap.xml
		'pattern' => 'sitemap',
		'action'  => function() {
			return go('sitemap.xml');
		}
	),
	array(
		'pattern' => 'blog/(:any)',
		'action'  => function($category) {

			$data = array('category' => $category);

			// If page actually exists then return it
			$page = page('blog/' . $category);
			if($page) return site()->visit($page->uri());

			// Otherwise probably a category
			return array('blog', $data);

			// If category does not exist: 404..
		}
	),
	array(
		'pattern' => 'blog/(:any)/(:any)',
		'action'  => function($category, $project) {

			$data = array('category' => $category);

			if(isset($project)) {
				$page = page('blog/' . $project);
				if(!$page) $page = site()->errorPage();
				return array('blog/'. $project, $data);
			}

			// If page actually exists then return it
			$page = page('blog/' . $category);
			if($page) return site()->visit($page->uri());

			// Otherwise probably a category
			return array('blog', $data);

			// If category does not exist: 404..
		}
	)
));
