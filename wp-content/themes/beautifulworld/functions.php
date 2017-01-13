<?php
add_theme_support( 'menus' );
register_nav_menus( array(
        'primary' => __( 'Primary Navigation' ),
        'footer' => __( 'Footer Navigation' ),
) );

function add_new_widget_location($name) {
	if ( ! function_exists('dynamic_sidebar' ) || ! dynamic_sidebar($name) ) : ?>
	<div class="widget">
	<h4><?php echo $name; ?></h4>
	<div class="widget">
		<p>This section is widgetized.  If you would like to add content to this section, you may do so by using the Widgets panel from within your WordPress Admin Dashboard.  This Widget Section is called "<strong><?php echo($name); ?></strong>"</p>
	</div>
	</div>
	<?php endif; ?>
	<?php
}

function get_page_by_name($pagename)
{
$pages = get_pages();
foreach ($pages as $page) if ($page->post_name == $pagename) return $page->ID;
return false;
}

/* FEATURED THUMBNAIL URL */
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
       add_theme_support( 'post-thumbnails' );

}


function get_image_url(){
       $image_id = get_post_thumbnail_id();
       $image_url = wp_get_attachment_image_src($image_id,'large');
       $image_url = $image_url[0];
       echo $image_url;
       }

function limit_words($string, $word_limit) {

	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character

	$words = explode(' ', $string);

	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character

	return implode(' ', array_slice($words, 0, $word_limit));

}

if(function_exists('register_sidebar'))
{
register_sidebar( array('name'=>'Home Left 1',
  'before_widget' => ' <div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2>',
	'after_title'   => '</h2>' 
	));

register_sidebar( array('name'=>'Home Quote 1',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div style="display: none;">',
	'after_title'   => '</div>'
	));
    
register_sidebar( array('name'=>'Home Right 1',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div style="display: none;">',
	'after_title'   => '</div>' 
	));
register_sidebar( array('name'=>'Home Right 2',
  'before_widget' => '<div id="twitterfeed">',
	'after_widget'  => '</div>',
	'before_title'  => '<div style="display: none;">',
	'after_title'   => '</div>' 
	));

register_sidebar( array('name'=>'About Left 2',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

register_sidebar( array('name'=>'About Right 1',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

register_sidebar( array('name'=>'About Right 2',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

register_sidebar( array('name'=>'About Right 3',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

register_sidebar( array('name'=>'About Right 4',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

	
register_sidebar( array('name'=>'What We Do Map Caption',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));

register_sidebar( array('name'=>'Newsletters',
  'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>' 
	));
}

function new_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');

?>