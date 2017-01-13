<?php
/**
 * The template for displaying all pages.
 *
 *
 Template Name: All Projects
 */
get_header();

?>
<div id="content-cont">
<div id="banner"><img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
<div class="clear"></div>
<div id="content" class="locations">
<h1>All Projects</h1>

<div class="locationlist">
<?php
$opts=qsql('SELECT option_value FROM wp_options WHERE option_name=\'first_section\'');
$opts=(isset($opts[0]['option_value'])) ? unserialize($opts[0]['option_value']) : array();

$args = array(
    'posts_per_page'  => -1,
    'offset'          => 0,
	'numberposts'	  => 0,
    'orderby'         => 'post_title',
    'order'           => 'ASC',
    'post_type'       => 'projects',
);
$p=get_posts($args);
foreach ($p as $post) {
		$meta=get_post_meta($post->ID,false,true);
		echo '<div>';
		$cat=get_the_terms($post->ID,'location');
		if ($cat) {
			echo '<ul class="cats">';
			foreach ($cat as $a) {
				$c=(empty($opts[$a->term_id]['taxcolor'])) ? '' : ' style="color:'.$opts[$a->term_id]['taxcolor'].'"';
				echo '<li><a href="/location/',$a->slug,'"',$c,'>',$a->name,'</a></li>';
			}
			echo '</ul>';
		}
		echo '<h4>',html($post->post_title),'</h4>';
		echo '<table>';
		echo '<tr><td rowspan="2" class="img">';
		//image
		if (has_post_thumbnail($post->ID)) {
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');
			echo '<img src="',htmlq($image[0]),'"/>';
		}
		//founded
		if (isset($meta['_projects_founded'][0]))
			echo '<br/>Founded ',html($meta['_projects_founded'][0]);
		echo '</td><th>About';
		if (isset($meta['_projects_abbr'][0]))
			echo ' ',html($meta['_projects_abbr'][0]);
		echo ':</th><td>';
		//about
		echo $post->post_content;
		echo '</td></tr>';
		if (isset($meta['_projects_support'][0])) {
			echo '<tr><th>We Support:</th><td>';
			echo nl2br(html($meta['_projects_support'][0]));
			echo '</td></tr>';
		}
		echo '</table>';
		echo '</div>';
}
 ?>

</div>
<ul class="qklinks">
<li class="up"><a href="#" onclick="jQuery('body,html').animate({scrollTop:0},800);return false;">Back To Top</a></li>
<li class="left"><a href="/what-we-do">Back To Project Map</a></li>
</ul>
<div style="clear:both"></div>
</div>
<?php
get_footer();
?>

