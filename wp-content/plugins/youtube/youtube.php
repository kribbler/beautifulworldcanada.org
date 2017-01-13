<?php
/*
Plugin Name: Youtube Video
Description: Youtube Video
Author: SEOHeap
Version: 1
Author URI: http://seoheap.com/
*/
//Hn8rd5WPyVo
class YoutubeWidget extends WP_Widget {
	function YoutubeWidget() {
		$widget_ops = array('classname' => 'YoutubeWidget', 'description' => 'Shows the youtube video' );
		$this->WP_Widget('YoutubeWidget', 'Youtube Video', $widget_ops);
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array() );
		$video=esc_attr($instance['video']);
		?>
        <fieldset><legend>Video ID:</legend>
			<input id="<?php echo $this->get_field_id('video'); ?>" name="<?php echo $this->get_field_name('video'); ?>" value="<?php echo htmlentities($video,ENT_QUOTES); ?>">
        </fieldset>
        <?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['video']=$new_instance['video'];
		return $instance;
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$video=esc_attr($instance['video']);
		if (!$video)
			return;
		echo '<div class="vid">';
		echo '<iframe width="100%" src="http://www.youtube.com/embed/',$video,'" frameborder="0" allowfullscreen></iframe>';
		echo '</div>';
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("YoutubeWidget");') );?>