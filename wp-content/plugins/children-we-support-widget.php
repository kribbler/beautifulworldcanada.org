<?php
/*
Plugin Name:  Children Supported By Us Widget
Plugin URI:   http://divinedesigns.ca/
Description:  A table for Beautiful World Canada Foundaion.
Version:      1.0
Author:       Jason McVeigh
Author URI:   http://www.jmcveigh.com/	
*/

/**
* Adds Child_Support_Widget widget.
*/

class Child_Support_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'child_support_widget', // Base ID
			'Children Supported By Us Widget', // Name
			array( 'description' => __( 'Table for BWCF Widget', 'text_domain' ), ) // Args
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
		$title = apply_filters( 'widget_title', $instance['title'] );
    $girls_special = $instance['girls_special'];
    $girls_secondary = $instance['girls_secondary'];
    $girls_tertiary = $instance['girls_tertiary'];
    $boys_special = $instance['boys_special'];
    $boys_secondary = $instance['boys_secondary'];
    $boys_tertiary = $instance['boys_tertiary'];
		echo $before_widget;
		/*
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		*/
		/* echo __( 'Hello, World!', 'text_domain' ); */ 
		?>
<table class="directors_table">
  <thead>
    <tr>
      <th class="empty">
        <span class="whitespace"></span>
      </th>
      <th>
        
            				Special
        <br>
        Needs
            			
      </th>
      <th>
         
            				Secondary
        <br>
        School
            			
      </th>
      <th>
         
            				Post
        <br>
        Secondary
            			
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th> 
            				Girls
            			</th>
      <td>
            				<?php echo($girls_special); ?>
            			</td>
      <td>
            				<?php echo($girls_secondary); ?>
            			</td>
      <td>
            				<?php echo($girls_tertiary); ?>
            			</td>
    </tr>
    <tr>
      <th> 
            				Boys
            			</th>
      <td>
            				<?php echo($boys_special); ?>
            			</td>
      <td>
            				<?php echo($boys_secondary); ?>
            			</td>
      <td>
            				<?php echo($boys_tertiary); ?>
            			</td>
    </tr>
    <tr>
      <th> 
            				Total
            			</th>
      <td>
            				<?php echo($girls_special + $boys_special); ?>
            			</td>
      <td>
            				<?php echo($girls_secondary + $boys_secondary); ?>
            			</td>
      <td>
            				<?php echo($girls_tertiary + $boys_tertiary); ?>
            			</td>
    </tr>
    <tr>
      <th colspan="3"> 
            			Total BWC Students
            			</th>
      <td>
            				<?php echo($girls_special + $boys_special + $girls_secondary + $boys_secondary + $girls_tertiary + $boys_tertiary); ?>
            			</td>
    </tr>
  </tbody>
</table>
		<?php
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
		$instance['title'] = strip_tags( $new_instance['title'] );
    
    if(is_int(intval($new_instance['girls_special'])))
    	$instance['girls_special'] = intval($new_instance['girls_special']);
    else
    	$instance['girls_special'] = 0;
    
    if(is_int(intval($new_instance['girls_secondary'])))
    	$instance['girls_secondary'] = intval($new_instance['girls_secondary']);
    else
    	$instance['girls_secondaryl'] = 0;
    
    if(is_int(intval($new_instance['girls_tertiary'])))
    	$instance['girls_tertiary'] = intval($new_instance['girls_tertiary']);
    else
    	$instance['girls_tertiary'] = 0;
    

    if(is_int(intval($new_instance['boys_special'])))
    	$instance['boys_special'] = intval($new_instance['boys_special']);
    else
    	$instance['boys_special'] = 0;
    
    if(is_int(intval($new_instance['boys_secondary'])))
    	$instance['boys_secondary'] = intval($new_instance['boys_secondary']);
    else
    	$instance['boys_secondaryl'] = 0;
    
    if(is_int(intval($new_instance['boys_tertiary'])))
    	$instance['boys_tertiary'] = intval($new_instance['boys_tertiary']);
    else
    	$instance['boys_tertiary'] = 0;

    	
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Children Supported By Us', 'text_domain' );
		}
		
		$defaults = array('title'=> 'Children Supported By Us','girls_special' => 0,'girls_secondary' => 0,'girls_tertiary' => 0,'boys_special' => 0, 'boys_secondary' => 0, 'boys_tertiary' => 0);
		$instance =  wp_parse_args( (array) $instance, $defaults);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id( 'girls_special' ); ?>">girls_special:</label>
			<input id="<?php echo $this->get_field_id( 'girls_special' ); ?>" name="<?php echo $this->get_field_name( 'girls_special' ); ?>" value="<?php echo $instance['girls_special']; ?>" style="width:100%;" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id( 'girls_secondary' ); ?>">girls_secondary:</label>
			<input id="<?php echo $this->get_field_id( 'girls_secondary' ); ?>" name="<?php echo $this->get_field_name( 'girls_secondary' ); ?>" value="<?php echo $instance['girls_secondary']; ?>" style="width:100%;" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id( 'girls_tertiary' ); ?>">girls_tertiary:</label>
			<input id="<?php echo $this->get_field_id( 'girls_tertiary' ); ?>" name="<?php echo $this->get_field_name( 'girls_tertiary' ); ?>" value="<?php echo $instance['girls_tertiary']; ?>" style="width:100%;" />
		</p>		
		<p> 
			<label for="<?php echo $this->get_field_id( 'boys_special' ); ?>">boys_special:</label>
			<input id="<?php echo $this->get_field_id( 'boys_special' ); ?>" name="<?php echo $this->get_field_name( 'boys_special' ); ?>" value="<?php echo $instance['boys_special']; ?>" style="width:100%;" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id( 'boys_secondary' ); ?>">boys_secondary:</label>
			<input id="<?php echo $this->get_field_id( 'boys_secondary' ); ?>" name="<?php echo $this->get_field_name( 'boys_secondary' ); ?>" value="<?php echo $instance['boys_secondary']; ?>" style="width:100%;" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id( 'boys_tertiary' ); ?>">boys_tertiary:</label>
			<input id="<?php echo $this->get_field_id( 'boys_tertiary' ); ?>" name="<?php echo $this->get_field_name( 'boys_tertiary' ); ?>" value="<?php echo $instance['boys_tertiary']; ?>" style="width:100%;" />
		</p>
		<?php 
	}

} // class Show_Page_Widget 

add_action( 'widgets_init', create_function( '', 'register_widget( "child_support_widget" );' ) );

?>