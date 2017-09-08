<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// PARTIAL :: MOBILE
// ----------------------------------------------------------
/////////////////////////////////////////////////////////////

// Read assets json
$root_url = ((c::get('ssl') == false && (c::get('url') != false) && c::get('url') != '/') ? c::get('url') . '/' : '/');
$assets_css = f::read(server::get('document_root') . $root_url . 'assets/stylesheets/min/hash.css.json');
$assets_js = f::read(server::get('document_root') . $root_url . 'assets/javascript/min/hash.js.json');

// Set assets based on environment
if(c::get('environment') == 'local'):
	$env_suffix = 'dev';
	$mobile_css = 'main.dev';
	$print_css = 'print.dev';
	$head_js = 'head.scripts.dev';
	$mobile_js = 'mobile.scripts.dev';
else:
	$env_suffix = 'min';
	$mobile_css = json_decode($assets_css)->main;
	$print_css = json_decode($assets_css)->print;
	$head_js = json_decode($assets_js)->head;
	$mobile_js = json_decode($assets_js)->mobile;
endif;

// Variabel to set language locale on html element
$language_locale = (c::get('language.multi', false)) ? $site->language()->locale() : c::get('language.locale', 'en');

// Variable to set page template name to html element for styling purpose.
$page_template = ($page->intendedTemplate()) ? ' template-' . $page->intendedTemplate() : '';

// Check for the presence of Font Face Observer cookie (e.g. `fonts-loaded`)
// and if so adds `fonts-loaded` class to html element, to avoid re-downloading
// web fonts over and over again.
$fontobserver = (isset($_COOKIE['fonts-loaded']) && $_COOKIE['fonts-loaded'] == 'true') ? ' fonts-loaded' : '';

////////////////////////////////////////////////////////// ?>

<!doctype html>
<html class="no-js<?php echo $page_template . $fontobserver ?>" lang="<?php echo $language_locale; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php /* <link rel="dns-prefetch" href="https://maps.googleapis.com"> */ ?>
	<link rel="dns-prefetch" href="https://www.google-analytics.com">

	<link rel="preload" href="<?php echo $site->url(); ?>/assets/fonts/kawak/kawak-bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo $site->url(); ?>/assets/fonts/kawak/kawak-light.woff2" as="font" type="font/woff2" crossorigin>

	<title><?php echo $page->page_title(); ?></title>
	<meta name="description" content="<?php echo $page->meta_description(); ?>">

	<meta name="robots" content="<?php if(c::get('environment') == 'local' || c::get('environment') == 'stage'): echo 'noindex, nofollow'; else: echo 'index, follow'; endif; ?>">
	<?php if($site->app_name()->isNotEmpty()): ?><meta name="apple-mobile-web-app-title" content="<?php echo $site->app_name()->smartypants(); ?>"><?php endif; ?><?php // Custom iOS bookmark title ?>
	<meta name="theme-color" content="<?php echo ($site->theme_color()->isNotEmpty()) ? $site->theme_color() : '#141414' ; ?>"><?php // Task bar backrgound collor in switcher, Chrome 39+ for Android (http://j.mp/1xVyGVc) ?>

	<link rel="home" href="<?php echo $site->url(); ?>">
	<?php if(c::get('tinyurl.enabled') && !$page->isHomepage()): ?><link rel="shortlink" href="<?php echo $page->tinyurl(); ?>"><?php endif; ?><?php // Shortlink, enable tinyurl in config.php ?>
	<link rel="author" href="<?php echo $site->url(); ?>/humans.txt">
	<link rel="sitemap" type="application/xml" title="<?php echo $site->title()->smartypants(); ?>: Sitemap" href="<?php echo (c::get('url') != '/') ? $site->url() . '/sitemap.xml' :  '/sitemap.xml'; ?>">
	<?php /* if(page('blog')): ?><link rel="alternate" type="application/rss+xml" title="<?php echo $site->title()->smartypants(); ?>: <?php echo page('blog')->title()->smartypants(); ?> Feed" href="<?php echo (c::get('url') != '/') ? $site->url() . '/blog.rss' : '/blog.rss'; ?>"><?php endif; */ ?>

	<link rel="apple-touch-icon" href="<?php echo url('/assets/images/apple-touch-icon.png'); ?>"><?php // Touch icons, iOS and Android, 180x180 pixels in size (http://j.mp/2fnrQmw, http://j.mp/2gpJVVF) ?>
	<link rel="icon" href="<?php echo url('/assets/images/favicon-192x192.png'); ?>"><?php // For Firefox, Chrome, Safari, IE 11+ and Opera, 192x192 pixels in size ?>
	<link rel="mask-icon" href="<?php echo url('/assets/images/pinned-icon.svg'); ?>" color="<?php echo ($site->theme_color()->isNotEmpty()) ? $site->theme_color() : '#141414' ; ?>"><?php // For Safari 9+ pinned tab (http://j.mp/2gpNiw9) ?>

	<link rel="canonical" href="<?php echo $page->rel_canonical($filter_value, $page_num); ?>">
	<?php echo $page->rel_prevnext($filter_key, $filter_value, $pagination, $page_num); ?>
	<?php echo $page->rel_alternate(); ?>

	<?php snippet('social-meta-tags') ?>

	<meta name="fullcss" content="<?php echo url('/assets/stylesheets/' . $env_suffix . '/' . $mobile_css . '.css'); ?>">
	<meta name="fulljs" content="<?php echo url('/assets/javascript/'. $env_suffix .'/' . $mobile_js . '.js'); ?>">
	<script><?php include_once(server::get('document_root') . '/assets/javascript/'. $env_suffix .'/' . $head_js . '.js'); ?></script>
	<?php if(isset($_COOKIE['fullcss']) && $_COOKIE['fullcss'] == 'true'): ?>
		<link rel="stylesheet" href="<?php echo url('/assets/stylesheets/' . $env_suffix . '/' . $mobile_css . '.css'); ?>">
	<?php else: ?>
		<style><?php if(c::get('environment') == 'local' || c::get('environment') == 'stage'): echo '/* ' . ((isset($criticalcss)) ? $criticalcss : 'default') . ' css */' . "\n"; endif; include_once(server::get('document_root') . '/assets/stylesheets/critical/' . ((isset($criticalcss)) ? $criticalcss : 'default') . '_mobile.css'); ?></style>
		<noscript><link rel="stylesheet" href="<?php echo url('/assets/stylesheets/' . $env_suffix . '/' . $mobile_css . '.css'); ?>"></noscript>
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo url('/assets/stylesheets/' . $env_suffix . '/' . $print_css . '.css'); ?>" media="print">

	<?php // Initialize JS variables for use later on ?>
	<?php // <script>var push_message = [];</script> ?>

</head>
<body>
