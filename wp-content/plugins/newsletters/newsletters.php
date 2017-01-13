<?php
/*
Plugin Name: Past Newsletters
Plugin URI: http://www.seoheap.com/
Description: Past Newsletters Manager for BeautifulWorld
Author: James Cantrell
Version: 1.0.0
Author URI: http://www.seoheap.com/
*/

add_action( 'init', 'newsletters' );
function newsletters() {
	register_post_type( 'newsletters',array(
		'labels' => array(
			'name' => __( 'Newsletters' ),
			'singular_name' => __( 'newsletters' )
		),
		'public' => true,
		'has_archive' => true,
		'supports'=>array('title','editor','thumbnail')
	));
	register_taxonomy(
		'category',
		'newsletters',
		array(
			'hierarchical'=>true,
			'label'=>'Category',
			'query_var'=>true,
			'rewrite'=>true
		)
	);
}
