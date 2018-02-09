<?php snippet('html-head', array('criticalcss' => 'contact')); ?>

	<?php snippet('banner'); ?>

	<main role="main" class="copy copy--contain">

		<h1>
			<?php echo ($page->long_title()->exists() && $page->long_title()->isNotEmpty()) ? $page->long_title()->smartypants()->widont() : $page->title()->smartypants()->widont(); ?>
		</h1>

		<?php if($page->intro()->isNotEmpty()): ?>
			<?php echo $page->intro()->kirbytext(); ?>
		<?php endif; ?>

		<div vocab="http://schema.org/" typeof="Person" class="vcard">
			<span property="name" class="is-hidden-visually">Artlantis Photography</span>
			<span property="name">Jonathan van Wunnik</span>
			<img src="https://gravatar.com/avatar/f1e6989e062fe42f36cc3894b0468e0f?s=400.jpg" property="image" alt="Avatar of Jonathan van Wunnik" class="is-hidden-visually">
			<span property="jobTitle" class="is-hidden-visually">Photographer &amp; UX Designer</span>
			<div property="address" typeof="PostalAddress">
					<span property="streetAddress" class="is-hidden-visually">Dalgasvej 12</span>
					<span property="postalCode" class="is-hidden-visually">6623</span>
					<span property="addressLocality">Vorbasse</span>,
					<span property="addressCountry">Danmark</span>
			</div>
			<span property="telephone">+45 50 69 93 55</span><br>
			<a href="mailto:hello@jonathanvanwunnik.com" property="email">hello@jonathanvanwunnik.com</a>
			<a href="https://jonathanvanwunnik.com" property="url" class="is-hidden-visually">jonathanvanwunnik.com</a><br>
			cvr number <span property="taxID" class="numerals1">DK39028255</span>
		</div>

		<?php echo $page->text()->kirbytext(); ?>

	</main>

	<?php snippet('contentinfo'); ?>

<?php snippet('html-foot'); ?>
