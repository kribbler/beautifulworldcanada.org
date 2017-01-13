<?php 
/**
 * The template for displaying all pages.
 *
 *
 Template Name: News
 */

get_header(); 
?>

  <div id="content-cont">
    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
	  <div class="clear"></div>	
      <div id="contentc">
      <h1>News &amp; Events</h1>	
    <div style='width: 944px; position: relative; padding: 0; margin: 0; display: block; padding: 25px'>
			<a href="/newsletters" id="nlbutton" style="position:static;float:right;width:230px;margin-top:-15px;text-align:center">Click Here To Read Our Newsletters</a>
<?php  								
showlinks('Upcoming Events','events_bar_08.jpg','Upcoming Events',false,'Stay tuned for upcoming events');
showlinks('events','events_bar_08.jpg','Events');
showlinks('Past Events','event-media-gallery.png','Previous Events',true);
showlinks(
	'extnews', // Category to search
	'news_05.jpg', // Image to display in link
	'News' // Title of section
);
?>

</div></div>

<?php
function showlinks($category,$image,$title,$ajax=false,$none='') {
	$bookmarks_args = array(
		'orderby' => 'id',
		'order' => 'DESC',
		'limit' => 24,					
		'category_name' =>$category,
		'class' => 'extnews_cat',
		'categorize' => false,
		'echo' => 0
	);					
	$bm=get_bookmarks($bookmarks_args); // Extracting the raw data as opposed to the string format
	$before = '<div style="margin-bottom: 4px; display: inline-block; width: 932px; height: 61px; background-color: #F0F0F0; background-image: '.get_bloginfo('template_directory').'/images/news_bar_03.jpg repeat-x;">';								
	$after = '</div>';
	if ($bm) { // Only echos the title, if there is data.
		echo '<h2>',htmlentities($title),'</h2>';
		foreach($bm as $match) {
			$content = $match->link_name;
			$arr_items = explode(",",$content,4); // limited to 4 separations, as any more then it wont show			
			// Echoed straight out instead of building it in a string first
			// replaced the double quotes with single quotes, and used echo like an array (comma separate values) quicker and less memory used 
			echo $before;
			echo '<div class="extnews_block"><div style="display: block; vertical-align: bottom; height: 24pt;"><h6><strong>',$arr_items[0],'</strong></h6></div></div>';
			echo '<div class="extnews_block"><div style="display: block; vertical-align: bottom; height: 24pt;padding-top: 4pt;"><h6>',$arr_items[1],'</h6></div></div>';
			echo '<div class="extnews_block"><span style="font-size: 10pt; line-height: 12pt;"><strong>',$arr_items[2],'</strong><br>',$arr_items[3],'</span></div>';	
			echo '<div class="extnews_block" style="padding: 0; width: 226px;">';
			if ($match->link_url<>'http://') {
				// Empty URL - bookmarks don't like empty url though so detect the minimum that it allows http://
				echo '<a target="_blank" href="',htmlentities($match->link_url,ENT_QUOTES),'"',(($ajax) ? ' class="ajax"' : ''),'><img src="',get_bloginfo('template_directory'),'/images/',$image,'"></a>';
				if ($ajax) {
					plugin('livequery');
					plugin('lightbox');
					plugin('bxslider');
					wp_enqueue_script('pasteventgallery','/wp-content/themes/beautifulworld/news.js');
				}
			}
			echo '</div>';	
			echo $after; 
		}
		echo '<br><br>';
	} elseif (!empty($none)) {
			echo '<h2>',htmlentities($title),'</h2>';
			echo '<div style="font-style:italic;margin-bottom:15px">',htmlentities($none),'</div>';	
	}	
}
?>
<?php get_footer(); ?>
