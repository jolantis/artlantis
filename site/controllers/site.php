<?php
return function($site, $pages, $page, $args) {

	$page_num   = false;
	$pagination = false;
	$category   = false;

	return compact('page_num', 'pagination', 'category');

};
?>
