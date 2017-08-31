<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<div role="navigation" id="nav-main" class="nav-main">
	<?php /* <h2 class="is-hidden-visually">Main navigation</h2> */ ?>
	<ul class="nav nav-main__list">

		<?php /* <li class="nav-main__item"><a rel="home" href="<?php echo $site->url(); ?>">Home</a></li> */ ?>

		<?php foreach($pages->visible()->not() as $page): ?>
			<?php if($filter_key && $filter_value && $page == 'blog' && ($site->url() . '/' . kirby()->request()->path() != site()->errorPage()->url())): ?>
				<li class="nav-main__item"<?php echo ($page->isOpen()) ? ' aria-describedby="current"' : ''; ?>><a href="<?php echo url($page->url() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . $filter_value); ?>"><?php echo $page->title()->smartypants(); ?></a></li>
			<?php else: ?>
				<li class="nav-main__item"<?php echo ($page->isOpen()) ? ' aria-describedby="current"' : ''; ?>><a href="<?php echo $page->url(); ?>"><?php echo $page->title()->smartypants(); ?></a></li>
			<?php endif; ?>
		<?php endforeach; ?>

	</ul>

	<?php /* <a href="#page-top" class="nav-main-toggle nav-main-toggle--close js-nav-main-hide">Back to top</a> */ ?>
</div>
