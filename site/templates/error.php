<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'other_than_default',
)); ?>

	<?php snippet('banner'); ?>

	<div class="contain-padding">

		<main role="main" class="copy space-trailer-m">

			<h1><?php echo $page->title()->smartypants()->widont(); ?></h1>

			<?php echo $page->text()->kirbytext(); ?>

		</main>

	</div>

<?php snippet_detect('footer'); ?>
