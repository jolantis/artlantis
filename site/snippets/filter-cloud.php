<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<div class="filters">
	<ul class="filterlist" id="filters">
		<?php if($filter_value): ?>
			<li class="filterlist__item" style="display: inline-block;"><a href="<?php echo url($page->url()); ?>" class="filterlist__button">All</a></li>
		<?php else: ?>
			<li class="filterlist__item" style="display: inline-block; text-decoration: underline;">All</li>
		<?php endif; ?>

		<?php foreach($page->children()->visible()->flip()->pluck($filter_key, ',', true) as $filter_item): ?>
			<?php if($filter_value && $filter_value == tagslug($filter_item)): ?>
				<li class="filterlist__item" style="display: inline-block; text-decoration: underline;"><?php echo html($filter_item); ?></li>
			<?php else: ?>
				<li class="filterlist__item" style="display: inline-block;"><a href="<?php echo url($page->url() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . tagslug($filter_item)) ?>" class="filterlist__button"><?php echo html($filter_item); ?></a></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
