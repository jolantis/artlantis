<?php snippet_detect('html-head', array(
	// 'criticalcss' => 'temp',
)); ?>

	<?php echo bgimage($page->images()->shuffle()->first(), array(
		'width'     => 1200,
		// 'cropratio' => 2/3,
		'class'     => 'cover cover--temp'
	)); ?>

	<div class="temp-message contain-padding1">

		<main role="main" class="">

			<h1><?php echo $site->title()->smartypants()->widont(); ?></h1>

			<?php echo $page->intro()->kirbytext(); ?>
			<?php echo $page->text()->kirbytext(); ?>

		</main>

	</div>

<?php snippet('no-ctm-fallback'); ?>
<?php snippet('google-analytics'); ?>
