<?php
global $theme_options;
$show_pagination = true;
if(is_front_page()){
	
global $paged, $wp_query, $wp;
if  ( empty($paged) ) {
        if ( !empty( $_GET['paged'] ) ) {
                $paged = $_GET['paged'];
        } elseif ( !empty($wp->matched_query) && $args = wp_parse_args($wp->matched_query) ) {
                if ( !empty( $args['paged'] ) ) {
                        $paged = $args['paged'];
                }
        }
        if ( !empty($paged) )
                $wp_query->set('paged', $paged);
}      
$wp_query = new WP_Query();
	$wp_query->query("showposts=".get_option('posts_per_page')."&paged=".$paged);
}
?>

<div class="md-blog post-list">
	<?php
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
			$format = (get_post_format(get_the_id())) ? get_post_format(get_the_id()) : 'standard';

			$is_sticky = (is_sticky()) ? ' sticky' : '';

      if (! in_category('private')) :
			 include(locate_template('templates/blog/loop/classic.php'));
      endif;
		endwhile;
		
	?>
</div>
<?php md_pagination();  ?>
<?php $wp_query = null; wp_reset_query();?>