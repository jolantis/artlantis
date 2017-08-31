<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="beta-heading"><?php echo $page->title()->smartypants(); ?></h1>

		<div>
			<?php echo $page->intro()->kirbytext(); ?>
		</div>

		<div class="grid grid--gutter">
			<?php foreach ($page_items as $page_item) : ?>

				<?php $page_item_image = ($page_item->images()->filterBy('filename','*=','main')->first()) ? $page_item->images()->filterBy('filename','*=','main')->first() : $page_item->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell medium-1of2 wide-1of3 huge-1of5" id="<?php echo $page_item->slug(); ?>">
					<a href="<?php echo $page_item->url(); ?>">
						<h2 class="grid__title" href="<?php echo $page_item->url(); ?>"><a href="<?php echo $page_item->url(); ?>"><?php echo $page_item->title()->smartypants(); ?></a></h2>
						<?php if($page_item_image): ?>
							<figure>
								<?php echo $page_item_image->imageset('grid'); ?>
								<?php //echo $page_item_image; ?>
							</figure>
						<?php endif; ?>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

<?php snippet_detect('footer'); ?>
