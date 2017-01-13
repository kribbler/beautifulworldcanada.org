<?php
get_header();

$image='';
if (function_exists('z_taxonomy_image_url'))
	$image=z_taxonomy_image_url();
	
$q=qsql('SELECT option_value FROM wp_options WHERE option_name=\'first_section\'');
$q=(isset($q[0]['option_value'])) ? unserialize($q[0]['option_value']) : array();

$value=get_query_var($wp_query->query_vars['taxonomy']);
$term=get_term_by('slug',$value,$wp_query->query_vars['taxonomy']);

$tax=array();
if (isset($q[$term->term_id])) {
	$tax=$q[$term->term_id];
}
?>
<div id="content-cont">
<div id="banner"><img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
<div class="clear"></div>
<div id="content" class="locations">
<h1>What We Do</h1>
<div class="locationheader">
<?php
if ($image)
	echo '<img src="',htmlq($image),'"/>';
?>
<small>Our Projects &gt;</small>
<select onchange="window.location=jQuery(this).val()" class="countrychange">
<option>new country</option>
<option value="/location/south-africa/">South Africa</option>
<option value="/location/uganda/">Uganda</option>
<option value="/location/sierra-leone/">Sierra Leone</option>
<option value="/location/rwanda/">Rwanda</option>
</select>
<h2<?php echo (isset($tax['taxcolor'])) ? ' style="color:'.htmlq($tax['taxcolor']).'"' : ''; ?>>
<?php single_cat_title(); ?>
</h2>
<?php echo category_description(); ?>
<?php
$class='';
if (!empty($tax['quotes'])) {
	$class=' hasquotes';
	echo '<div class="locquotes">';
	echo $tax['quotes'];
	echo '</div>';
}
?>
</div>
<div class="clear"></div>
<br/>

<div class="locationlist<?php echo $class; ?>">

<?php
$col=(isset($tax['taxcolor'])) ? ' style="background:'.htmlq($tax['taxcolor']).'"' : '';

if (have_posts()) {
	while (have_posts()) {
		the_post();
		$meta=get_post_meta(get_the_ID(),false,true);
		$points=(isset($meta['_projects_pointers'][0])) ? $meta['_projects_pointers'][0] : '';
		$points=array_filter(explode(',',$points));
		echo '<div>';
		if ($points) {
			echo '<ul class="points">';
			foreach ($points as $a) {
				echo '<li',$col,'><span>',html($a),'</span></li>';
			}
			echo '</ul>'; 
		}
		echo '<h4>',the_title(),'</h4>';
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
		the_content();
		echo '</td></tr>';
		if (isset($meta['_projects_support'][0])) {
			echo '<tr><th>We Support:</th><td>';
			echo nl2br(html($meta['_projects_support'][0]));
			echo '</td></tr>';
		}
		echo '</table>';
		echo '</div>';
	}
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

