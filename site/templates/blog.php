<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="is-hidden-visually"><?php echo $page->title()->smartypants(); ?></h1>

		<?php /* echo $page->intro()->kirbytext(); */ ?>

		<?php snippet('filter-cloud', array('filter_key' => 'tags')); ?>

		<div class="grid grid--gutter">
			<?php foreach ($page_items as $page_item) : ?>

				<?php $page_item_url   = ($filter_value) ? $page->url() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) .'/' . tagslug($filter_value) . '/' . $page_item->slug() : $page_item->url(); ?>
				<?php $page_item_image = ($page_item->images()->filterBy('filename','*=','main')->first()) ? $page_item->images()->filterBy('filename','*=','main')->first() : $page_item->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell medium-1of2" id="<?php echo $page_item->slug(); ?>">
					<a href="<?php echo $page_item_url; ?>" class="bg-image bg-image--link aligner">
						<?php // echo $page_item_image->imageset('grid'); ?>
						<?php echo $page_item_image->imageset('grid', ['output' => 'bgimage']); ?>
						<span class="bg-text aligner">
							<span class="aligner__item">
								<h2 class="bg-text__title"><?php echo $page_item->title()->smartypants(); ?></h2>
								<p class="bg-text__meta"><?php snippet('datetime', ['relative' => true, 'page' => $page_item]); ?></p>
							</span>
						</span>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

	<?php snippet('nav-pagination'); ?>

<?php snippet_detect('footer'); ?>
