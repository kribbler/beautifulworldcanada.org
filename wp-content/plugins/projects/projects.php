<?php
/*
Plugin Name: Projects
Plugin URI: http://www.seoheap.com/
Description: Projects Manager for BeautifulWorld
Author: James Cantrell
Version: 1.0.0
Author URI: http://www.seoheap.com/
*/

add_action( 'init', 'projects' );
function projects() {
	register_post_type( 'projects',array(
		'labels' => array(
			'name' => __( 'Projects' ),
			'singular_name' => __( 'projects' )
		),
		'public' => true,
		'has_archive' => true,
		'supports'=>array('title','editor','thumbnail'),
		'register_meta_box_cb' => 'add_projects_metaboxes'
	));
	register_taxonomy(
		'location',
		'projects',
		array(
			'hierarchical'=>true,
			'label'=>'Locations',
			'query_var'=>true,
			'rewrite'=>true
		)
	);
}
function add_projects_metaboxes() {
    add_meta_box('wpt_projects_sample', 'Project Info', 'wpt_projects_sample', 'projects', 'advanced', 'default');	
}
function wpt_projects_sample() {
	global $post;
	$prefix='_projects';
	echo '<input type="hidden" name="',$prefix,'meta_noncename" id="',$prefix,'meta_noncename" value="',wp_create_nonce(plugin_basename(__FILE__)),'"/>';
	include dirname(__FILE__).'/meta.php';
}
function wpt_save_projects_meta($post_id, $post) {
	$prefix='_projects';
	if (!wp_verify_nonce($_POST[$prefix.'meta_noncename'],plugin_basename(__FILE__)))
		return $post->ID;
	if (!current_user_can('edit_post',$post->ID))
		return $post->ID;

	$meta=array();
	$p=allpost();
	$p=(isset($p[$prefix])) ? $p[$prefix] : array();
	foreach ($p as $k=>$v) {
		if (is_array($v))
			$v=json_encode($v);
		$k=$prefix.'_'.$k;
		if (get_post_meta($post->ID,$k,false)) {
			if (!$v) {
				delete_post_meta($post->ID,$k);
				
			} else {
				update_post_meta($post->ID,$k,$v);
			}
		} elseif ($v) {
			add_post_meta($post->ID,$k,$v);
		}
	}
}
add_action('save_post', 'wpt_save_projects_meta', 1, 2); // save the custom fields

include dirname(__FILE__).'/taxonomy-meta.php';