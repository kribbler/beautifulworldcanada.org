<?php
/*
Plugin Name: Newsletter List
Plugin URI: http://www.seoheap.com/
Description: Show the newsletter list
Author: James Cantrell
Version: 1.0.0
Author URI: http://www.seoheap.com/
*/

class newsletterlistWidget extends WP_Widget {
    function newsletterlistWidget() {
		$this->options = array(
			array(
				'name'=>'title',
				'label'=>'Title',
				'type'=>'text',
				'default'=>''
			)
		);
        parent::WP_Widget(false,$name='Newsletter List');	
    }
    function widget($args,$instance) {
		extract($args);
		$title=apply_filters('widget_title',$instance['title']);
		echo $before_widget;  
		if ($title) {
			echo $before_title,$instance['title'],$after_title;
		}
		include dirname(__FILE__).'/view.php';
		echo $after_widget;
    }
    function update($new_instance,$old_instance) {				
		$instance=$old_instance;
		foreach ($this->options as $val) {
			switch ($val['type']) {
				case 'text':
					$instance[$val['name']] = strip_tags($new_instance[$val['name']]);
					break;
				case 'checkbox':
					$instance[$val['name']] = ($new_instance[$val['name']]=='on') ? true : false;
					break;
			}
		}
        return $instance;
    }
    function form($instance) {
		$new=(empty($instance));
		foreach ($this->options as $val) {
			if ($new && $val['default']) {
				$instance[$val['name']]=$val['default'];
			}
			$label='<label for="'.$this->get_field_id($val['name']).'">'.$val['label'].'</label>';
			switch ($val['type']) {
				case 'text':
					echo '<p>',$label,'<br />';
					echo '<input class="widefat" id="',$this->get_field_id($val['name']),'" name="',$this->get_field_name($val['name']),'" type="text" value="',esc_attr($instance[$val['name']]),'"/></p>';
					break;
				case 'checkbox':
					$checked=($instance[$val['name']]) ? ' checked="checked"' : '';
					echo '<input id="',$this->get_field_id($val['name']),'" name="',$this->get_field_name($val['name']),'" type="checkbox"',$checked,'/> ',$label.'<br/>';
					break;
			}
		}
	}
}

add_action('widgets_init', create_function('', 'return register_widget("newsletterlistWidget");'));
