<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<div class="filters aligner">
	<h2 class="is-hidden-visually">Filter posts</h2>
	<ul class="filterslist aligner js-filters">
		<?php if($filter_value): ?>
			<li class="filterslist__item">
				<a href="<?php echo $page->url(); ?>" class="button button--simple icon icon--right is-active" title="Remove filter: &lsquo;<?php echo tagunslug($filter_value); ?>&rsquo;">
					<span class="is-hidden-visually">Remove filter: </span>
					<?php echo tagunslug($filter_value); ?>
					<svg role="presentation" title="Cross">
						<use xlink:href="/assets/images/sprite.svg#cross"/>
					</svg>
				</a>
			</li>
		<?php endif; ?>

		<?php
			// Fetch all (visible) blog posts
			$blog_posts = $page->children()->visible();

			// Fetch filter values (e.g. tags), seperated by comma, associated to blog posts
			$filter_values = $blog_posts->pluck($filter_key, ',', true);

			// Sort all filter values (e.g. tags) by the number of instances of each filter value
			// usort($filter_values, function($a, $b) use($blog_posts, $filter_key) {
			// 	$aCount = $blog_posts->filterBy($filter_key, $a, ',')->count();
			// 	$bCount = $blog_posts->filterBy($filter_key, $b, ',')->count();
			// 	return strcmp($bCount, $aCount);
			// });

			// Sort filter values (e.g. tags) alphabetical
			sort($filter_values);
		?>

		<?php foreach($filter_values as $filter_item): ?>

			<?php $blog_posts_count = $blog_posts->filterBy($filter_key, '==', tagunslug($filter_item), ',')->count(); // Associated number count of blog posts for the current filter value ?>

			<?php if(!$filter_value || $filter_value != tagslug($filter_item)): ?>
				<li class="filterslist__item">
					<a href="<?php echo url($page->url() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . tagslug($filter_item)) ?>" class="button button--simple" title="Add filter: &lsquo;<?php echo html($filter_item); ?>&rsquo;"><?php echo html($filter_item . ' <small class="filterslist__item-count">' . $blog_posts_count . '</small>'); ?></a>
				</li>
			<?php endif; ?>

		<?php endforeach; ?>
	</ul>
</div>
