<?php snippet('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<?php /*

		<h1><?php echo $page->title()->smartypants()->widont(); ?></h1>

		<?php echo $page->intro()->kirbytext(); ?>
		<?php echo $page->text()->kirbytext(); ?>

		*/ ?>

		<div class="grid grid--gutter">

			<?php $blog_posts = $site->find('blog')->children()->visible()->flip(); ?>

			<?php $i=1; foreach($blog_posts->limit(3) as $blog_post): ?>

				<?php $blog_post_image = ($blog_post->images()->filterBy('filename','*=','main')->first()) ? $blog_post->images()->filterBy('filename','*=','main')->first() : $blog_post->images()->sortBy('sort', 'asc')->first(); ?>

				<?php if($i == 1): ?>
					<article class="grid__cell">
						<a href="<?php echo $blog_post->url(); ?>" class="bg-image bg-image--link default-1by1 medium-3by2">
							<?php echo $blog_post_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner">
								<span class="aligner__item">
									<h2 class="bg-text__title hero-heading"><?php echo $blog_post->title()->smartypants()->widont(); ?></h2>
									<p class="bg-text__meta"><?php snippet('datetime', ['relative' => true, 'page' => $blog_post]); ?></p>
								</span>
							</span>
						</a>
					</article>
				<?php else: ?>
					<article class="grid__cell medium-1of2">
						<a href="<?php echo $blog_post->url(); ?>" class="bg-image bg-image--link default-1by1 aligner">
							<?php echo $blog_post_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner">
								<span class="aligner__item">
									<h2 class="bg-text__title"><?php echo $blog_post->title()->smartypants()->widont(); ?></h2>
									<p class="bg-text__meta"><?php snippet('datetime', ['relative' => true, 'page' => $blog_post]); ?></p>
								</span>
							</span>
						</a>
					</article>
				<?php endif; ?>

			<?php $i++; endforeach; ?>

		</div>

	</main>

<?php snippet('footer'); ?>
