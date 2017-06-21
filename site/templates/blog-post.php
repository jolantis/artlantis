<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
	'prev_next' => true
)); ?>

	<?php snippet('banner'); ?>
	<?php // snippet('breadcrumb'); ?>

	<?php $main_image = ($page->images()->filterBy('filename','*=','main')->first()) ? $page->images()->filterBy('filename','*=','main')->first() : $page->images()->sortBy('sort', 'asc')->first(); ?>

	<div class="hero bg-image bg-image--cover">
		<?php echo $main_image->imageset('hero', ['output' => 'bgimage']); ?>
		<span class="hero__title"><?php echo $page->title()->smartypants(); ?></span>
		<span class="hero__meta"><?php echo $page->images()->count(); ?> photos</span>
	</div>

	<main class="copy copy--contain">

		<h1 class="is-hidden-visually"><?php echo $page->title()->smartypants()->widont(); ?></h1>

		<?php if($page->date($format=true)): ?>
			<p><small>
				Published on <?php snippet('datetime', ['format' => 'j F Y']); ?>
			</small></p>
		<?php endif; ?>

		<?php echo $page->intro()->kirbytext(); ?>

		<?php if($page->photos()->isNotEmpty()): ?>

			<?php echo $page->photos()->kirbytext(); ?>

		<?php else: ?>

			<?php /* foreach ($page->images()->sortBy('sort', 'asc')->not($main_image) as $image): */ ?>
			<?php foreach ($page->images()->sortBy('sort', 'asc') as $image) : ?>
				<figure class="figure-image">
					<?php echo $image->imageset('default'); ?>
					<?php if($image->caption()->isNotEmpty()): ?>
						<figcaption><?php echo $image->caption()->smartypants(); ?></figcaption>
					<?php endif; ?>
				</figure>
			<?php endforeach; ?>

		<?php endif; ?>

	</main>

	<?php // snippet('nav-sub'); ?>

<?php snippet_detect('footer'); ?>
