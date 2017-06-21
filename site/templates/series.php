<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
	'categoryparam' => $categoryparam
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="is-hidden-visually"><?php echo $page->title()->smartypants()->widont(); ?></h1>
		<?php /* <h1><?php echo $page->title()->smartypants()->widont(); ?></h1> */ ?>

		<?php // echo $page->intro()->kirbytext(); ?>
		<?php // echo $page->text()->kirbytext(); ?>

		<?php /*
		<div class="filters">
			<ul class="filterlist" id="filters">
				<?php if($categoryparam['category'] != ""): ?>
					<li class="filterlist__item"><a href="<?php echo url($page->url()); ?>" class="filterlist__button">All services</a></li>
				<?php else: ?>
					<li class="filterlist__item">All services</li>
				<?php endif; ?>
				<?php foreach($categories as $category): ?>
					<?php if(isset($categoryparam['category']) && $categoryparam['category'] == tagslug($category)): ?>
						<li class="filterlist__item"><?php echo html($category); ?></li>
					<?php else: ?>
						<li class="filterlist__item"><a href="<?php echo url($page->url() . '/' . tagslug($category)) ?>" class="filterlist__button"><?php echo html($category); ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		*/ ?>

		<div class="grid grid--gutter">
			<?php foreach ($series as $series_item) : ?>

				<?php $series_item_url   = ($categoryparam) ? $page->url() . '/' . tagslug($categoryparam['category']) . '/' . $series_item->slug() : $series_item->url(); ?>
				<?php $series_item_image = ($series_item->images()->filterBy('filename','*=','main')->first()) ? $series_item->images()->filterBy('filename','*=','main')->first() : $series_item->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell medium-1of2 wide-1of3 huge-1of5" id="<?php echo $series_item->slug(); ?>">
					<a href="<?php echo $series_item_url; ?>">
						<h2 class="grid__title" href="<?php echo $series_item->url(); ?>"><a href="<?php echo $series_item->url(); ?>"><?php echo $series_item->title()->smartypants(); ?></a></h2>
						<?php if($series_item_image): ?>
							<figure>
								<?php echo $series_item_image->imageset('grid'); ?>
								<?php //echo $series_item_image; ?>
							</figure>
						<?php endif; ?>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

<?php snippet_detect('footer'); ?>
