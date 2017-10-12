<?php snippet('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="beta-heading is-hidden-visually"><?php echo $page->title()->smartypants(); ?></h1>

		<?php /*
		<div>
			<?php echo $page->intro()->kirbytext(); ?>
		</div>
		*/ ?>

		<div class="grid grid--gutter">
			<?php foreach ($page_items as $page_item) : ?>

				<?php $page_item_image = ($page_item->images()->filterBy('filename','*=','main')->first()) ? $page_item->images()->filterBy('filename','*=','main')->first() : $page_item->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell huge-1of2" id="<?php echo $page_item->slug(); ?>">
					<a href="<?php echo $page_item->url(); ?>" class="bg-image bg-image--link aligner">
						<?php if($page_item_image): ?>
							<?php // echo $page_item_image->imageset('grid'); ?>
							<?php echo $page_item_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner aligner--center">
								<h2 class="bg-text__title-plus"><?php echo $page_item->title()->smartypants()->widont(); ?></h2>
							</span>
						<?php endif; ?>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

<?php snippet('footer'); ?>
