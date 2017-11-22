<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<?php if($prev || $next): ?>
	<div role="navigation" class="pagination contain-padding">
		<?php /* <h2 class="is-hidden-visually">Page navigation</h2> */ ?>
		<ul class="pagination__list">
			<?php if($next): ?>
				<li class="pagination__item pagination__item--newer">
					<a href="<?php echo $next->url(); ?>" class="icon icon--left">
						<svg role="presentation" width="24" height="24" title="Left arrow">
							<use xlink:href="/assets/images/sprite.svg#arrow-left"/>
						</svg>
						<?php echo $next->title(); ?>
					</a>
				</li>
			<?php endif ?>

			<?php if($prev): ?>
				<li class="pagination__item pagination__item--older">
					<a href="<?php echo $prev->url(); ?>" class="icon icon--right">
						<?php echo $prev->title(); ?>
						<svg role="presentation" width="24" height="24" title="Right arrow">
							<use xlink:href="/assets/images/sprite.svg#arrow-right"/>
						</svg>
					</a>
				</li>
			<?php endif ?>
		</ul>
	</div>
<?php endif; ?>
