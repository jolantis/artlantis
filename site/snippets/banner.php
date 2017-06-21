<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// PARTIAL
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<header role="banner" id="page-top" class="banner contain-padding">
	<h1>
		<?php if($page->isHomePage()): echo '<span'; else: echo '<a href="' . $site->url() . '" title="Return to the homepage" rel="home"'; endif; echo ' class="masthead beta-heading">'?>
			<?php echo ($site->short_title()->isNotEmpty()) ? $site->short_title()->smartypants() : $site->title()->smartypants(); ?>
		<?php if($page->isHomePage()): echo '</span>'; else: echo '</a>'; endif; ?>
	</h1>

	<?php snippet('nav-main'); ?>

	<?php /* <a href="#nav-main" class="nav-main-toggle nav-main-toggle--open js-nav-main-show">Jump to navigation</a> */ ?>
</header>

<!-- TO DO: SPLIT HOME FROM REST OF PAGES, ONLY HOMNE IS <HEADER>!  -->
