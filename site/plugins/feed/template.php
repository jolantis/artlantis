<!-- generator="<?php echo $generator ?>" -->
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title><?php echo xml($title); ?></title>
		<link><?php echo xml($channel); ?></link>
		<generator><?php echo c::get('feed.generator', 'Kirby'); ?></generator>
		<lastBuildDate><?php echo date('r', $modified) ?></lastBuildDate>
		<?php /* <lastBuildDate><?php echo $site->find($channel)->modified('r'); ?></lastBuildDate> */ ?>
		<atom:link href="<?php echo url($channel); ?>.rss" rel="self" type="application/rss+xml" />

		<?php if(!empty($description)): ?>
			<description><?php echo xml($description); ?></description>
		<?php endif; ?>

		<?php foreach($items as $item): ?>
			<item>
				<title><?php echo xml($item->title()); ?></title>
				<link><?php echo xml($item->url()); ?></link>
				<guid><?php echo xml($item->id()); ?></guid>
				<pubDate><?php echo $datefield == 'modified' ? $item->modified('r') : $item->date('r', $datefield); ?></pubDate>
				<?php if($excerpt == true): ?>
					<?php $excerptlimit = (isset($excerptlimit)) ? $excerptlimit : 'words';  ?>
					<?php $excerptlenght = (isset($excerptlenght)) ? $excerptlenght : 40;  ?>
					<description><![CDATA[
						<?php echo $item->{$textfield}()->kirbytext()->excerpt($excerptlenght, $excerptlimit); ?>
						<?php if($image == true): ?>
							<?php echo figure($item->images()->first(), array('lazyload' => false)); ?>
						<?php endif; ?>
					]]></description>
				<?php else: ?>
					<description><![CDATA[
						<?php echo $item->{$textfield}()->kirbytext(); ?>
						<?php if($image == true): ?>
							<?php echo figure($item->images()->first(), array('lazyload' => false)); ?>
						<?php endif; ?>
					]]></description>
				<?php endif; ?>
			</item>
		<?php endforeach ?>
	</channel>
</rss>
