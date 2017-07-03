<?php
return function($site, $pages, $page, $args) {

	$page_num     = false;
	$pagination   = false;
	$filter_key   = false;
	$filter_value = false;

	return compact('page_num', 'pagination', 'filter_key', 'filter_value');

};
?>
