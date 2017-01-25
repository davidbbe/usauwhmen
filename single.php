<?php global $theme_options; ?>
<?php get_header(); ?>

<?php get_template_part( '/templates/page/page-header' ); ?>

<div class="page-content padding-small" id="single-container">
	<div class="container">
		<?php
			if($theme_options['post-sidebar'] == "left"):
				echo '<div class="row">';
					echo '<div class="md-column col-md-8 col-md-right col-sm-left content-full">';
						if ( in_category('private')) {
							if ( post_password_required(28) ) {
								echo get_the_password_form();
							} else {
								get_template_part( '/templates/blog/content-post-body' );
							}
						} else {
							get_template_part( '/templates/blog/content-post-body' );
						}
					echo '</div>';
					
					echo '<div class="md-column col-side col-md-4">';
						dynamic_sidebar('sidebar-blog');
					echo '</div>';
				echo '</div>';
				
			elseif ($theme_options['post-sidebar'] == "right"):
				echo '<div class="row">';
					echo '<div class="md-column col-md-8 col-md-left col-sm-left content-full">';
						if ( in_category('private')) {
							if ( post_password_required(28) ) {
								echo get_the_password_form();
							} else {
								get_template_part( '/templates/blog/content-post-body' );
							}
						} else {
							get_template_part( '/templates/blog/content-post-body' );
						}
					echo '</div>';

					echo '<div class="md-column col-side col-md-4 col-md-right col-sm-right">';
						dynamic_sidebar('sidebar-blog');
					echo '</div>';
				echo '</div>';


			else:
				if ( in_category('private')) {
					if ( post_password_required(28) ) {
						echo get_the_password_form();
					} else {
						get_template_part( '/templates/blog/content-post-body' );
					}
				} else {
					get_template_part( '/templates/blog/content-post-body' );
				}
			endif;
		?>
	</div>
</div>

<?php get_footer(); ?>