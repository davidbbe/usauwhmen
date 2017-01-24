<?php global $theme_options; ?>
<div class="md-blog">
<?php while ( have_posts() ) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
		<?php
			$format = (get_post_format(get_the_id())) ? get_post_format(get_the_id()) : 'standard';
			$is_sticky = (is_sticky()) ? ' sticky' : '';
			include(locate_template('templates/blog/post-formats/single/'.$format.'.php'));
		?>
		<?php get_template_part('/templates/blog/social-share'); ?>
	</article>
	
	<?php get_template_part('/templates/blog/meta-footer'); ?>
	
	<?php comments_template('', true); ?>

<?php endwhile; ?>
</div>