<?php global $theme_options; ?>

<?php md_thumbnail($theme_options['blog-images-size'], $post->ID, true);  ?>

<div class="post-body">
	<?php
		global $post;

		$is_page = ($post->post_type == 'page') ? true : false;
	
	?>


	<?php if($is_page) { ?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()) ?>"><?php the_title(); ?></a></h2>
		<div class="post-content"><?php the_excerpt(); ?></div>
		<?php get_template_part('/templates/blog/read-more'); ?>

	<?php } else { ?>
		
		<?php get_template_part('/templates/blog/meta-header'); ?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()) ?>"><?php the_title(); ?></a></h2>

		<?php if(empty( $post->post_excerpt ) ) { ?>
			
			<div class="post-content"><?php the_content('<div class="read-more">'.__("Read More", MD_THEME_NAME).'<i class="typcn-arrow-right"></i></div>'); ?></div>

		<?php } else { ?>
			
			<div class="post-content"><?php the_excerpt(); ?></div>
			<?php get_template_part('/templates/blog/read-more'); ?>
		
		<?php } ?>

	<?php } ?>

</div>

<span class="post-format"></span>