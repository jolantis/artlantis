<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// PARTIAL :: DESKTOP
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

	<?php // snippet('nav-main'); ?>

	<div role="contentinfo" class="contentinfo contain-padding">
		<div class="delta-heading space-trailer-m">
			<p><a href="https://artlantis.nl" rel="me" class="link link--simple link--no-history">Designer</a> by trade, photographer by heart&#8202;&mdash;&#8202;capturing the beauty of life.</p>
			<p>Any questions about my work, or my rates, please feel free to <a href="<?php echo $site->find('contact')->url(); ?>" class="link link--simple link--no-history">contact</a> me.</p>
		</div>

		<?php snippet('nav-main', array('loc' => 'footer')); ?>

		<footer class="medium-aligner">
			<p>&copy; <?php echo '2002&ndash;' . date("Y"); ?> <a href="https://jonathanvanwunnik.com" rel="me"><?php echo $site->copyright()->smartypants(); ?></a></p>
			<p class="medium-aligner__item--right">All contents licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" title="Creative Commons Attribution-Non-Commercial-No-Derivs 4.0 International">CC BY-NC-ND license</a></p>
		</footer>
	</div>

	<?php snippet('google-analytics'); ?>
</body>
</html>
