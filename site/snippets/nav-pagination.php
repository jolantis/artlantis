<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<?php if($pagination && $pagination->hasPages()): ?>
	<div role="navigation" class="pagination contain-padding">
		<?php /* <h2 class="is-hidden-visually">Page navigation</h2> */ ?>
		<ul>
			<?php if($pagination->hasPrevPage()): ?>
				<li class="pagination__item pagination__item--prev">
					<?php if($page_num == 2): ?>
						<a href="<?php echo url(kirby()->request()->path()->first() . (($filter_value) ? '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . $filter_value : '')); ?>">Previous page</a>
					<?php else: ?>
						<a href="<?php echo url(kirby()->request()->path()->first() . (($filter_value) ? '/' . $filter_value : '') . '/page/' . ($page_num - 1)); ?>">Previous page</a>
					<?php endif; ?>
				</li>
			<?php endif; ?>

			<?php if($pagination->hasNextPage()): ?>
				<li class="pagination__item pagination__item--next">
					<a href="<?php echo url(kirby()->request()->path()->first() . (($filter_value) ? '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . $filter_value : '') . '/page/' . ($page_num + 1)); ?>">Next page</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
<?php endif; ?>
