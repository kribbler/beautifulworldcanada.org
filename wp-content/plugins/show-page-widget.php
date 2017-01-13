<?php
/*
Plugin Name:  Show Page Widget
Plugin URI:   http://divinedesigns.ca/
Description:  A very basic widget structure to hack around with.
Version:      0.1
Author:       Jason McVeigh
Author URI:   http://www.jmcveigh.com/	
*/

/**
* Adds Show_Page_Widget widget.
*/

define('NAME_OF_PAGE_UNDEFINED','Undefined');

class Show_Page_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'show_page_widget', // Base ID
			'Show Page Widget', // Name
			array( 'description' => __( 'A Show Page Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );		
    $name_of_page = $instance['name_of_page'];
		echo $before_widget;
		/*
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		echo __( 'Hello, World!', 'text_domain' );
		*/ 
		
			// The Query
			if($name_of_page !== NAME_OF_PAGE_UNDEFINED) {
				$args = array('post_type' => 'page','order' => 'ASC','orderby' => 'name','name' => $name_of_page);
				$the_query = new WP_Query( $args );
	
				// The Loop
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					the_content();
				endwhile;
			} else {
				?>   
				<p> 
					This is the <strong>Show Page</strong> Widget.  Regrettably, there was no page selected in the administrative options so no page can be shown. <span style='color: red;'>Error undefined.</span>.  
				</p>
				<?php
			}		
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();		
    if(ereg('[\w-]+',$new_instance['name_of_page']))
    	$instance['name_of_page'] = $new_instance['name_of_page'];
		else
			$instance['name_of_page'] = NAME_OF_PAGE_UNDEFINED;
			
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array('name_of_page' => NAME_OF_PAGE_UNDEFINED);
		$instance = wp_parse_args((array)$instance,$defaults);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'name_of_page' ); ?>"><?php _e( 'Name Of Page:' ); ?></label> 
			<!-- <input class="widefat" id="<?php echo $this->get_field_id( 'name_of_page' ); ?>" name="<?php echo $this->get_field_name( 'name_of_page' ); ?>" type="text" value="<?php echo esc_attr( $name_of_page ); ?>" /> -->
			<select class="widefat" id="<?php echo($this->get_field_id('name_of_page')); ?>" name="<?php echo($this->get_field_name('name_of_page')); ?>">
<?php
			// The Query
			$args = array('post_type' => 'page','nopaging' => 1);
			$the_query = new WP_Query( $args );

			// The Loop
			while ( $the_query->have_posts() ) :
				$the_query->the_post();				
				if($instance['name_of_page'] == basename(get_permalink())) 
					$do_select = 'selected';
				else
					$do_select = '';
							
				echo("<option {$do_select}>" . basename(get_permalink()) . "</option>");
			endwhile;
?>
			</select>
		</p>
		<?php 
	}

} // class Show_Page_Widget 

add_action( 'widgets_init', create_function( '', 'register_widget( "show_page_widget" );' ) );

?>