<?php snippet('html-head', array(/* 'criticalcss' => 'other_than_default' */)); ?>

	<?php snippet('banner'); ?>

	<?php $work = $site->find('work'); ?>

	<?php $i=0; foreach($work->children()->visible()->images()->filterBy('filename','!*=','exclude')->shuffle() as $work_image): ?>

		<?php if($work_image->dimensions()->landscape() && $i != 1): ?>

			<div class="hero bg-image bg-image--cover">
				<?php echo $work_image->imageset('hero', ['output' => 'bgimage']); ?>
				<span class="hero__text aligner aligner--stacked aligner--center">
					<span class="hero__title"><?php echo $page->hero_title()->smartypants(); ?></span>
					<?php if($page->hero_subtitle()->isNotEmpty()): ?>
						<p class="hero__subtitle"><?php echo $page->hero_subtitle()->smartypants(); ?></p>
					<?php endif; ?>
					<a href="<?php echo $work->url(); ?>" class="hero__button button button--border-light icon icon--right">
						View work
						<svg role="presentation" width="24" height="24" title="Right arrow">
							<use xlink:href="/assets/images/sprite.svg#arrow-right"/>
						</svg>
					</a>
					<span class="hero__meta">
						<a href="#recent-posts">Recent blog posts</a>
					</span>
				</span>
			</div>

		<?php $i++; endif; ?>

	<?php endforeach; ?>

	<div class="contain-padding space-leader-xl">

		<?php $blog = $site->find('blog'); ?>

		<h2 id="recent-posts" class="is-hidden-visually">Recent blog posts</h2>

		<div class="grid grid--gutter">

			<?php
				// Fetch the basic set of pages
				$blog_items = $blog->children()->visible();

				# Filter by date to exclude future posts (on production only)
				if(c::get('environment') != 'local' && c::get('environment') != 'stage') {
					$blog_items = $blog_items->filterBy('date', '<', time());
				}
			?>

			<?php foreach($blog_items->flip()->limit(4) as $blog_post): ?>

				<?php $blog_post_image = ($blog_post->images()->filterBy('filename','*=','main')->first()) ? $blog_post->images()->filterBy('filename','*=','main')->first() : $blog_post->images()->sortBy('sort', 'asc')->first(); ?>

				<div class="grid__cell medium-1of2">
					<a href="<?php echo $blog_post->url(); ?>" class="bg-image bg-image--link default-1by1">
						<?php echo $blog_post_image->imageset('grid', ['output' => 'bgimage']); ?>
						<span class="bg-text aligner aligner--stacked aligner--bottom">
							<h3 class="bg-text__title"><?php echo $blog_post->title()->smartypants()->widont(); ?></h3>
							<p class="bg-text__meta">Posted in blog &mdash; <?php snippet('datetime', ['relative' => true, 'page' => $blog_post]); ?></p>
						</span>
					</a>
				</div>

			<?php endforeach; ?>

		</div>

		<div class="aligner aligner--center space-leader-xl">
			<a href="<?php echo $blog->url(); ?>" class="button button--border-dark icon icon--right">
				More blog posts
				<svg role="presentation" width="24" height="24" title="Right arrow">
					<use xlink:href="/assets/images/sprite.svg#arrow-right"/>
				</svg>
			</a>
		</div>

	</div>

	<?php snippet('contentinfo'); ?>

<?php snippet('html-foot'); ?>
