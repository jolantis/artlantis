<?php snippet('html-head', array('criticalcss' => 'work')); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="contain-padding">

		<h1 class="beta-heading">
			<?php echo ($page->long_title()->exists() && $page->long_title()->isNotEmpty()) ? $page->long_title()->smartypants()->widont() : $page->title()->smartypants()->widont(); ?>
		</h1>

		<?php /*
		<div class="copy">
			<?php echo $page->intro()->kirbytext(); ?>
		</div>
		*/ ?>

		<div class="grid grid--gutter">
			<?php foreach ($page_items->flip() as $page_item) : ?>

				<?php $page_item_image = ($page_item->images()->filterBy('filename','*=','main')->first()) ? $page_item->images()->filterBy('filename','*=','main')->first() : $page_item->images()->sortBy('sort', 'asc')->first(); ?>

				<article class="grid__cell huge-1of2" id="<?php echo $page_item->slug(); ?>">
					<a href="<?php echo $page_item->url(); ?>" class="bg-image bg-image--link aligner">
						<?php if($page_item_image): ?>
							<?php // echo $page_item_image->imageset('grid'); ?>
							<?php echo $page_item_image->imageset('grid', ['output' => 'bgimage']); ?>
							<span class="bg-text aligner aligner--stacked aligner--center">
								<h2 class="bg-text__title-big"><?php echo $page_item->title()->smartypants()->widont(); ?></h2>
								<p class="bg-text__button button button--border-light icon icon--right">
									View
									<svg role="presentation" width="24" height="24" title="Right arrow">
										<use xlink:href="/assets/images/sprite.svg#arrow-right"/>
									</svg>
								</p>
							</span>
						<?php endif; ?>
					</a>
				</article>

			<?php endforeach; ?>
		</div>

	</main>

<?php snippet('footer'); ?>
