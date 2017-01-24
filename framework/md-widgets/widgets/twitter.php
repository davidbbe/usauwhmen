<?php 
/**
 * Adds MD_Widget_Twitter widget.
 */
class MD_Widget_Twitter extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'md_widget_twitter', // Base ID
			__('MD Twitter Widget', 'text_domain'), // Name
			array( 'description' => __( 'Show tweets from specified Twitter account.', 'text_domain' ), ) // Args
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
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		?>
		
		<ul>
		<?php
			if( (get_option('tdf_consumer_key')) && (get_option('tdf_consumer_secret')) && (get_option('tdf_access_token')) && (get_option('tdf_access_token_secret')) ) {
				$tweets = getTweets($instance['username'], $instance['tweets']);
				foreach($tweets as $tweet):
					echo '<li>'.TwitterFilter($tweet['text']).'</li>';
				endforeach;
			} else {
				echo '<li>Twitter Feed not configured. <a href="'.admin_url('options-general.php?page=tdf_settings').'">Click here to edit.</a></li>';  
			}
		?>
		</ul>

		<?php	
		echo $args['after_widget'];
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
			$title = __('TWITTER WIDGET', MD_THEME_NAME);
		}

		if ( isset( $instance[ 'username' ] ) ) {
			$username = $instance[ 'username' ];
		}
		else {
			$username = 'ThemesHolic';
		}

		if ( isset( $instance[ 'tweets' ] ) ) {
			$tweets = $instance[ 'tweets' ];
		}
		else {
			$tweets = '3';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', MD_THEME_NAME ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username:', MD_THEME_NAME ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'tweets' ); ?>"><?php _e( 'Tweets Count:', MD_THEME_NAME ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'tweets' ); ?>" name="<?php echo $this->get_field_name( 'tweets' ); ?>" type="text" value="<?php echo esc_attr( $tweets ); ?>">
		</p>
		<?php 
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['username'] = ( ! empty( $new_instance['username'] ) ) ? strip_tags( $new_instance['username'] ) : '';
		$instance['tweets'] = ( ! empty( $new_instance['tweets'] ) ) ? strip_tags( $new_instance['tweets'] ) : '';

		return $instance;
	}

} // class MD_Widget_Twitter

// register MD_Widget_Twitter widget
function register_MD_Widget_Twitter() {
    register_widget( 'MD_Widget_Twitter' );
}
add_action( 'widgets_init', 'register_MD_Widget_Twitter' );


if(!function_exists('TwitterFilter')){

  // Twitter Filter
  function TwitterFilter($string)
  {
    $content_array = explode(" ", $string);
    $output = '';

    foreach($content_array as $content)
    {
      //starts with http://
      if(substr($content, 0, 7) == "http://")
      $content = '<a href="' . $content . '">' . $content . '</a>';

      //starts with www.
      if(substr($content, 0, 4) == "www.")
      $content = '<a href="http://' . $content . '">' . $content . '</a>';

      if(substr($content, 0, 8) == "https://")
      $content = '<a href="' . $content . '">' . $content . '</a>';

      if(substr($content, 0, 1) == "#")
      $content = '<a href="https://twitter.com/search?src=hash&amp;q=' . $content . '">' . $content . '</a>';

      if(substr($content, 0, 1) == "@")
      $content = '<a href="https://twitter.com/' . $content . '">' . $content . '</a>';

      $output .= " " . $content;
    }

    $output = trim($output);
    return $output;
  }

}
?>