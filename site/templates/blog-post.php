<?php snippet('html-head', array('criticalcss' => 'blog_post')); ?>

	<?php snippet('banner'); ?>

	<?php $main_image = ($page->images()->filterBy('filename','*=','main')->first()) ? $page->images()->filterBy('filename','*=','main')->first() : $page->images()->sortBy('sort', 'asc')->first(); ?>

	<div class="hero bg-image bg-image--cover">
		<?php echo $main_image->imageset('hero', ['output' => 'bgimage']); ?>
		<span class="hero__text aligner aligner--stacked aligner--center">
			<span class="hero__title"><?php echo $page->title()->smartypants()->widont(); ?></span>
			<?php /*
			<span class="hero__subtitle">
				<?php if($page->tags()->isNotEmpty()): ?>
					<?php $i = 0; foreach($tags = str::split($page->tags(),',') as $tag): ?>
						<?php echo $tag; ?><?php if($i < (count($tags) -1)): echo ' &mdash; '; endif; ?>
					<?php $i++; endforeach; ?>
			<?php endif; ?>
			</span>
			*/ ?>
			<span class="hero__meta aligner--left"><?php echo $page->images()->count(); ?> photos</span>
		</span>
	</div>

	<main role="main" class="copy copy--contain space-leader-xl">

		<h1><?php echo $page->title()->smartypants()->widont(); ?></h1>

		<?php if($page->tags()->isNotEmpty() || $page->date($format=true)): ?>
			<p>

			<?php if($page->tags()->isNotEmpty()): ?>
				Posted in
				<?php $i = 1; foreach($tags = str::split($page->tags(),',') as $tag): ?>
					<a href="<?php echo $page->parent()->url() . '/tags/' . tagslug($tag); ?>" class="link link--no-history link--lowercase"><?php echo $tag; ?></a>
					<?php
						if($i == (count($tags) - 1)):
							echo ' and ';
						elseif($i < (count($tags))):
							echo ', ';
						endif;
					?>
				<?php $i++; endforeach; ?>

				<?php if($page->date($format=true)): ?>
					on <?php snippet('datetime', ['format' => 'j F Y']); ?>
				<?php endif; ?>

			<?php else: ?>

				<?php if($page->date($format=true)): ?>
					Posted on <?php snippet('datetime', ['format' => 'j F Y']); ?>
				<?php endif; ?>

			<?php endif; ?>

			</p>
		<?php endif; ?>

		<div class="intro">
			<?php echo $page->intro()->kirbytext(); ?>
		</div>

		<?php if($page->photos()->isNotEmpty()): ?>

			<?php echo $page->photos()->kirbytext(); ?>

		<?php else: ?>

			<?php /* foreach ($page->images()->sortBy('sort', 'asc')->not($main_image) as $image): */ ?>
			<?php foreach ($page->images()->filterBy('filename','!*=','main')->sortBy('sort', 'asc') as $image) : ?>
				<figure class="figure-image">
					<?php echo $image->imageset('default'); ?>
					<?php if($image->caption()->isNotEmpty()): ?>
						<figcaption><?php echo $image->caption()->smartypants(); ?></figcaption>
					<?php endif; ?>
				</figure>
			<?php endforeach; ?>

		<?php endif; ?>

		<?php /*
		<h2>Details</h2>
		<ul>
			<li>…</li>
			<li>…</li>
			<li>…</li>
			<li>…</li>
		</ul>
		*/ ?>

	</main>

	<div class="contain-padding space-leader-m">
		<?php if($filter_value): ?>
			<?php $blog_posts_count = $page->parent()->children()->visible()->filterBy($filter_key, '==', tagunslug($filter_value), ',')->count(); // Associated number count of blog posts for the current filter value ?>
			<p>
				<a href="<?php echo $page->parent()->url(); ?>" class="button button--simple icon icon--right is-active" title="Remove filter: &lsquo;<?php echo tagunslug($filter_value); ?>&rsquo;">
					<span class="is-hidden-visually">Remove filter: </span>
					<?php echo tagunslug($filter_value); ?>
					<svg role="presentation" title="Cross">
						<use xlink:href="/assets/images/sprite.svg#cross"/>
					</svg>
				</a>
				<small>active filter with <a href="<?php echo $page->parent()->url() . '/tags/' . tagslug($filter_value); ?>" class="link link--no-history"><?php echo ($blog_posts_count < 2) ? $blog_posts_count . ' post' : $blog_posts_count . ' posts'; ?></a></small>
			</p>
		<?php endif; ?>
	</div>

	<?php snippet('nav-prevnext'); ?>

<?php snippet('footer'); ?>
