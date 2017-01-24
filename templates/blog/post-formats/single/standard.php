<?php
	global $theme_options;
	$page_options = get_post_custom($post->ID);
?>

<?php md_thumbnail($theme_options['blog-images-size'], $post->ID, true, false); ?>

<div class="post-body">
	
	<?php get_template_part('/templates/blog/meta-header'); ?>

	<h2 class="post-title"><?php the_title(); ?></h2>
	
	<div class="post-content">
		<?php the_content(); ?>
		<?php get_template_part( '/templates/blog/pagination-pages' ); ?>
	</div>

</div>