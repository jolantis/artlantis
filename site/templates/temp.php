<?php snippet('html-head', array(/* 'criticalcss' => 'temp' */)); ?>

	<main class="hero bg-image bg-image--cover">
		<?php echo $page->images()->shuffle()->first()->imageset('grid', ['output' => 'bgimage']); ?>
		<span class="hero__text aligner aligner--stacked aligner--bottom" style="padding: 2rem;">
			<h1 class="hero__title1 alpha-heading">Jonathan van Wunnik</h1>
			<div class="hero__subtitle1 alpha-heading">
				<?php echo $page->text()->kirbytext(); ?>
			</div>
		</span>
	</main>

<?php snippet('html-foot'); ?>
