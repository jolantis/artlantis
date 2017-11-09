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

			<?php $work = $site->find('work'); ?>

			<?php $i=0; foreach($work->children()->visible()->images()->shuffle() as $work_image): ?>

				<?php if($work_image->dimensions()->landscape() && $i != 1): ?>

					<article class="grid__cell">
						<a href="<?php echo $work->url(); ?>" class="bg-image bg-image--link default-1by1 medium-3by2">
							<?php echo $work_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner aligner--center">
								<span class="aligner__item">
									<h2 class="bg-text__title-hero">Photography</h2>
									<p class="bg-text__meta">Portrait &mdash; Wedding &mdash; Real Estatet &mdash; Events</p>
									<?php /* <p class="button">View work</p> */ ?>
								</span>
							</span>
						</a>
					</article>

				<?php $i++; endif; ?>

			<?php endforeach; ?>

			<?php $blog = $site->find('blog'); ?>

			<?php foreach($blog->children()->visible()->flip()->limit(2) as $blog_post): ?>

				<?php $blog_post_image = ($blog_post->images()->filterBy('filename','*=','main')->first()) ? $blog_post->images()->filterBy('filename','*=','main')->first() : $blog_post->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell medium-1of2">
					<a href="<?php echo $blog_post->url(); ?>" class="bg-image bg-image--link default-1by1 aligner">
						<?php echo $blog_post_image->imageset('grid', ['output' => 'bgimage']); ?>
						<span class="bg-text aligner aligner--bottom">
							<span class="aligner__item">
								<h2 class="bg-text__title"><?php echo $blog_post->title()->smartypants()->widont(); ?></h2>
								<p class="bg-text__meta"><?php snippet('datetime', ['relative' => true, 'page' => $blog_post]); ?></p>
							</span>
						</span>
					</a>
				</article>

			<?php endforeach; ?>

		</div>

		<div>

			<a href="#">All blog posts</a>
			<a href="#">All work</a>


		</div>

	</main>

<?php snippet('footer'); ?>
