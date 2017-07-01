<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="is-hidden-visually"><?php echo $page->title()->smartypants(); ?></h1>

		<?php /* echo $page->intro()->kirbytext(); */ ?>

		<div class="filters">
			<ul class="filterlist" id="filters">
				<?php if($category): ?>
					<li class="filterlist__item">Blog / <a href="<?php echo url($page->url()); ?>" class="filterlist__button">Filter</a></li>
				<?php else: ?>
					<li class="filterlist__item">Blog / All services</li>
				<?php endif; ?>
				<?php foreach($categories as $cat): ?>
					<?php if($category && $category == tagslug($cat)): ?>
						<li class="filterlist__item"><?php echo html($cat) . ' / ' . tagunslug($cat); ?></li>
					<?php else: ?>
						<li class="filterlist__item"><a href="<?php echo url($page->url() . '/category/' . tagslug($cat)) ?>" class="filterlist__button"><?php echo html($cat); ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="grid grid--gutter">
			<?php foreach ($page_items as $page_item) : ?>

				<?php $page_item_url   = ($category) ? $page->url() . '/category/' . tagslug($category) . '/' . $page_item->slug() : $page_item->url(); ?>
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
