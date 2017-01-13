<?php
if (!have_posts()) {
	get_header();
	?>
	<div id="content-cont">
	<div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
	<div class="clear"></div>
	<div id="content">
	<p>There are no newsletters at the moment.</p>
	</div>
	<?php
	get_footer();
}

while ( have_posts() ) {
	the_post();
	$p=get_permalink();
	header('Location: '.$p);
	exit;;
}

