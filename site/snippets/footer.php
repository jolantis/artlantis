<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// PARTIAL :: DESKTOP
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

	<?php // snippet('nav-main'); ?>

	<div role="contentinfo" class="contentinfo">
		<div class="copy copy--contain delta-heading space-trailer-m">
			<p>
				Photography is my passion, <a href="https://artlantis.nl" rel="me" class="link link--simple link--no-history"><abbr title="user experience">ux</abbr> design</a> my trade.
				If you want to learn more about me, my rates and availablity, or just want to go for a <a href="https://en.wikipedia.org/wiki/Photowalking" rel="external">photowalk</a>, please don't hesitate to <a href="<?php echo $site->find('contact')->url(); ?>" class="link link--simple link--no-history">contact me</a>.
			</p>
		</div>

		<?php snippet('nav-main', array('loc' => 'footer')); ?>

		<footer class="medium-aligner contain-padding">
			<p>&copy; <?php echo '2002&ndash;' . date("Y"); ?> <a href="https://jonathanvanwunnik.com" rel="me"><?php echo $site->copyright()->smartypants(); ?></a></p>
			<p class="medium-aligner__item--right">All contents licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" title="Creative Commons Attribution-Non-Commercial-No-Derivs 4.0 International">CC BY-NC-ND license</a></p>
		</footer>
	</div>

	<?php snippet('google-analytics'); ?>
</body>
</html>
