<?php snippet('html-head', array('criticalcss' => 'work_item')); ?>

	<?php snippet('banner'); ?>

	<main role="main">

		<div class="contain-padding aligner aligner--baseline">

			<h1 class="beta-heading space-trailer-ggr"><?php echo $page->title()->smartypants()->widont(); ?></h1>

			<?php /*
			<span class="beta-heading aligner aligner--baseline space-trailer-ggr">
				<a href="<?php echo $page->parent()->url(); ?>" class="link link--simple link--no-history">Work</a>
				&nbsp;/&nbsp;
				<h1 class="beta-heading"><?php echo $page->title()->smartypants()->widont(); ?></h1>
			</span>
			*/ ?>

		</div>

		<?php if($page->text()->isNotEmpty()): ?>
			<div class="copy copy--contain space-trailer-m">
				<div class="intro">
					<?php echo $page->text()->kirbytext(); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php /*
		<div class="contain-padding aligner">
			<div class="toggle js-toggle-buttons aligner__item--right">
				<button class="toggle__item button icon icon--left js-toggle-grid">
					<svg role="presentation" title="Toggle grid view">
						<use xlink:href="/assets/images/sprite.svg#grid"/>
					</svg>
					<small>Grid view</small>
				</button>
				<button class="toggle__item button icon icon--left js-toggle-list">
					<svg role="presentation" title="Toggle list view">
						<use xlink:href="/assets/images/sprite.svg#stacked"/>
					</svg>
					<small>List view</small>
				</button>
			</div>
		</div>
		*/ ?>

		<div class="contain-padding cssgrid cssgrid--grid js-toggle-target">

			<?php $i=1; foreach ($page->images()->sortBy('sort', 'asc')->flip() as $image): ?>
				<div class="cssgrid__item<?php if($image->dimensions()->portrait()): ?> cssgrid__item--tall<?php endif; if($image->dimensions()->ratio() > 2) : ?> cssgrid__item--wide<?php endif; ?>">
					<figure class="figure-image">
						<?php echo $image->imageset('default'); ?>
					</figure>
				</div>
			<?php $i++; endforeach; ?>

		</div>

	</main>

<?php snippet('footer'); ?>
