<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
	'categoryparam' => $categoryparam
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="is-hidden-visually"><?php echo $page->title()->smartypants(); ?></h1>

		<?php /* echo $page->intro()->kirbytext(); */ ?>

		<?php /*
		<div class="filters">
			<ul class="filterlist" id="filters">
				<?php if($categoryparam['category'] != ''): ?>
					<li class="filterlist__item">Blog / <a href="<?php echo url($page->url()); ?>" class="filterlist__button">Filter</a></li>
				<?php else: ?>
					<li class="filterlist__item">Blog / All services</li>
				<?php endif; ?>
				<?php foreach($categories as $category): ?>
					<?php if(isset($categoryparam['category']) && $categoryparam['category'] == tagslug($category)): ?>
						<li class="filterlist__item"><?php echo html($category) . ' / ' . tagunslug($category); ?></li>
					<?php else: ?>
						<li class="filterlist__item"><a href="<?php echo url($page->url() . '/' . tagslug($category)) ?>" class="filterlist__button"><?php echo html($category); ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		*/ ?>

		<div class="grid grid--gutter">
			<?php foreach ($blog_posts as $blog_post) : ?>

				<?php $blog_post_url   = ($categoryparam) ? $page->url() . '/' . tagslug($categoryparam['category']) . '/' . $blog_post->slug() : $blog_post->url(); ?>
				<?php $blog_post_image = ($blog_post->images()->filterBy('filename','*=','main')->first()) ? $blog_post->images()->filterBy('filename','*=','main')->first() : $blog_post->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell medium-1of2" id="<?php echo $blog_post->slug(); ?>">
					<a href="<?php echo $blog_post_url; ?>" class="bg-image bg-image--link aligner">
						<?php // echo $blog_post_image->imageset('grid'); ?>
						<?php echo $blog_post_image->imageset('grid', ['output' => 'bgimage']); ?>
						<span class="bg-text aligner">
							<span class="aligner__item">
								<h2 class="bg-text__title"><?php echo $blog_post->title()->smartypants(); ?></h2>
								<p class="bg-text__meta"><?php snippet('datetime', ['relative' => true, 'page' => $blog_post]); ?></p>
							</span>
						</span>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

<?php snippet_detect('footer'); ?>
