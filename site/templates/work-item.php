<?php snippet('html-head', array('criticalcss' => 'work_item')); ?>

	<?php snippet('banner'); ?>

	<main role="main">

		<div class="contain-padding aligner aligner--baseline">

			<h1 class="alpha-heading space-trailer-ggr">
				<?php echo ($page->long_title()->exists() && $page->long_title()->isNotEmpty()) ? $page->long_title()->smartypants()->widont() : $page->title()->smartypants()->widont(); ?>
			</h1>

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
				<?php echo $page->text()->kirbytext(); ?>
			</div>
		<?php endif; ?>

		<div class="toggle js-toggle-buttons contain-padding">
			<div class="aligner aligner--right">
				<button class="toggle__item button button--simple icon icon--big js-toggle-grid" title="Grid view">
					<svg role="presentation" title="Grid view">
						<use xlink:href="/assets/images/sprite.svg#grid"/>
					</svg>
					<span class="is-hidden-visually">Grid view</span>
				</button>
				<button class="toggle__item button button--simple icon icon--big js-toggle-list">
					<svg role="presentation" title="Stacked view">
						<use xlink:href="/assets/images/sprite.svg#stacked"/>
					</svg>
					<span class="is-hidden-visually">Stacked view</span>
				</button>
			</div>
		</div>

		<div class="contain-padding cssgrid js-toggle-target">

			<?php $i=1; foreach ($page->images()->sortBy('sort', 'asc')->shuffle() as $image): ?>
				<div class="cssgrid__item<?php if($image->dimensions()->portrait()): ?> cssgrid__item--tall<?php endif; if($image->dimensions()->ratio() > 2) : ?> cssgrid__item--wide<?php endif; ?>">
					<figure class="figure-image">
						<?php echo $image->imageset('default'); ?>
					</figure>
				</div>
			<?php $i++; endforeach; ?>

		</div>

		<aside class="contain-padding space-leader-xl">
			<?php $work = site()->find('work'); ?>

			<h2 class="is-hidden-visually">More work</h2>

			<div class="grid grid--gutter">
				<?php foreach($work->children()->visible()->not(site()->activePage())->shuffle()->limit(2) as $work_item): ?>

					<?php $work_item_image = ($work_item->images()->filterBy('filename','*=','main')->first()) ? $work_item->images()->filterBy('filename','*=','main')->first() : $work_item->images()->sortBy('sort', 'asc')->first(); ?>

					<div class="grid__cell medium-1of2">
						<a href="<?php echo $work_item->url(); ?>" class="bg-image bg-image--link aligner">
						<?php if($work_item_image): ?>
							<?php // echo $work_item_image->imageset('grid'); ?>
							<?php echo $work_item_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner aligner--stacked aligner--center">
								<h3 class="bg-text__title-big"><?php echo $work_item->title()->smartypants()->widont(); ?></h3>
								<p class="bg-text__button button button--border-light icon icon--right">
									View
									<svg role="presentation" width="24" height="24" title="Right arrow">
										<use xlink:href="/assets/images/sprite.svg#arrow-right"/>
									</svg>
								</p>
							</span>
						<?php endif; ?>
					</a>
					</div>

				<?php endforeach ?>
			</div>
		</aside>

	</main>

	<?php snippet('contentinfo'); ?>

<?php snippet('html-foot'); ?>
