<?php while ( have_posts() ) : the_post(); ?>
	<?php if($post->post_content) { ?>
	<div class="md-page">
		<div class="post-content">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php get_template_part( '/templates/blog/pagination-pages' ); ?>
			</div>
		</div>
	</div>
	<?php } ?>
<?php endwhile; ?>
