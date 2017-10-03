<?php snippet('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="copy copy--contain space-trailer-l">

		<h1><?php echo $page->title()->smartypants()->widont(); ?></h1>

		<?php echo $page->intro()->kirbytext(); ?>

		<?php if($page->text()->isNotEmpty()): ?>

			<?php echo $page->text()->kirbytext(); ?>

		<?php else: ?>

			<?php // $main_image = ($page->images()->filterBy('filename','*=','main')->first()) ? $page->images()->filterBy('filename','*=','main')->first() : $page->images()->sortBy('sort', 'asc')->first(); ?>

			<?php // foreach ($page->images()->sortBy('sort', 'asc')->not($main_image) as $image) : ?>
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

<?php snippet('footer'); ?>
