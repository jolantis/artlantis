<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<div class="filters">
	<?php /*<a class="filterbutton js-expandbutton" href="#expandthis" title="Show more filter tags">More</a> */ ?>
	<h2 class="is-hidden-visually">Filter blog posts by&hellip;</h2>
	<ul class="filterlist js-expandtarget">
		<?php if($filter_value): ?>
			<li class="filterlist__item is-active">
				<a href="<?php echo url($page->url()); ?>" class="filterlist__button icon icon--right" title="Remove filter: &lsquo;<?php echo tagunslug($filter_value); ?>&rsquo;">
					<span class="is-hidden-visually">Remove filter: </span>
					<?php echo tagunslug($filter_value); ?>
					<svg role="presentation" title="Cross">
						<use xlink:href="/assets/images/sprite.svg#cross"/>
					</svg>
				</a>
			</li>
		<?php /*
		<?php else: ?>
			<li class="filterlist__item is-active"><span class="filterlist__button">All</span></li>
		*/ ?>
		<?php endif; ?>

		<?php foreach($page->children()->visible()->flip()->pluck($filter_key, ',', true) as $filter_item): ?>
			<?php /*
			<?php if($filter_value && $filter_value == tagslug($filter_item)): ?>
				<li class="filterlist__item is-hidden"><span class="filterlist__button"><?php echo html($filter_item); ?></span></li>
			<?php else: ?>
			*/ ?>
			<?php if(!$filter_value || $filter_value != tagslug($filter_item)): ?>
				<li class="filterlist__item"><a href="<?php echo url($page->url() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . tagslug($filter_item)) ?>" class="filterlist__button" title="Add filter: &lsquo;<?php echo html($filter_item); ?>&rsquo;"><?php echo html($filter_item); ?></a></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
