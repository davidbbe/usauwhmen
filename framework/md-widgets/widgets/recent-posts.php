<?php 
/**
 * Adds MD_Widget_Recent_Posts widget.
 */
class MD_Widget_Recent_Posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'md_widget_recent_posts', // Base ID
			__('MD Recent Posts', 'text_domain'), // Name
			array( 'description' => __( 'Show your recent posts.', 'text_domain' ), ) // Args
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

		global $theme_options;
		?>

		<ul>
		<?php
			$rPosts = new WP_Query();
			$rPosts->query( array( 'showposts='.$instance['count'], 'cat' => -6 ));
				while ($rPosts->have_posts()) : $rPosts->the_post(); ?>
				<?php
					$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail' );
				?>
					<li>
						<span class="date"><?php echo get_the_date();?></span>
						<!-- <img src="<?php echo $thumb[0];?>" alt="<?php esc_attr(the_title()); ?>" class="" /> -->
						<h3><a href="<?php the_permalink();?>" title="<?php esc_attr(the_title()); ?>"><?php the_title();?></a></h3>
						<!-- <p><?php echo substr(get_the_excerpt(), 0, 50).'...'; ?></p> -->
					</li>	
				<?php endwhile; 
			wp_reset_query();
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
			$title = __('RECENT POSTS', MD_THEME_NAME);
		}

		if ( isset( $instance[ 'count' ] ) ) {
			$count = $instance[ 'count' ];
		}
		else {
			$count = 5;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', MD_THEME_NAME ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Number of posts to show:', MD_THEME_NAME ); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="3">
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
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

		return $instance;
	}

} // class MD_Widget_Recent_Posts

// register MD_Widget_Recent_Posts widget
function register_MD_Widget_Recent_Posts() {
    register_widget( 'MD_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'register_MD_Widget_Recent_Posts' );
?>