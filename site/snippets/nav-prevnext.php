<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------

// $mod_class = (!isset($mod_class)) ? '' : ' ' . $mod_class; // modifier class(es)
// $back_to_overview_url = (!isset($back_to_overview_url)) ? '' : $back_to_overview_url; // back url

////////////////////////////////////////////////////////// ?>

<?php if($prev || $next): ?>
	<div role="navigation" class="pagination contain-padding">
		<?php /* <h2 class="is-hidden-visually">Page navigation</h2> */ ?>
		<ul>
			<?php if($next): ?>
				<li class="pagination__item pagination__item--next">
					<?php if($filter_value):?>
						<a href="<?php echo url($next->parent() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . $filter_value . '/' . $next->uid()); ?>">Newer post <span>(<?php echo $next->title(); ?>)</span></a>
					<?php else: ?>
						<a href="<?php echo $next->url(); ?>">Newer post <span>(<?php echo $next->title(); ?>)</span></a>
					<?php endif; ?>
				</li>
			<?php endif ?>

			<?php /*
			<li>
				<a href="<?php echo $back_to_overview_url; ?>"><span>Back to overview</span></a>
			</li>
			*/ ?>

			<?php if($prev): ?>
				<li class="pagination__item pagination__item--prev">
					<?php if($filter_value): ?>
						<a href="<?php echo url($prev->parent() . '/' . (($filter_key == 'tags') ? 'tag' : $filter_key) . '/' . $filter_value . '/' . $prev->uid()); ?>">Older post <span>(<?php echo $prev->title(); ?>)</span></a>
					<?php else: ?>
						<a href="<?php echo $prev->url(); ?>">Older post <span>(<?php echo $prev->title(); ?>)</span></a>
					<?php endif; ?>
				</li>
			<?php endif ?>
		</ul>
	</div>
<?php endif; ?>

