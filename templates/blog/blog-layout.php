<?php

global $theme_options;

if($theme_options['blog-sidebar'] == "left"):
	echo '<div class="row">';
		echo '<div class="md-column col-md-8 col-md-right col-sm-left">';
			get_template_part( '/templates/blog/posts-loop' );
		echo '</div>';

		echo '<div class="md-column col-side col-md-4 col-md-left col-sm-right">';
			dynamic_sidebar('sidebar-blog');
		echo '</div>';
	echo '</div>';
	
elseif ($theme_options['blog-sidebar'] == "right"):
	echo '<div class="row">';
		echo '<div class="md-column col-md-8">';
			get_template_part( '/templates/blog/posts-loop' );
		echo '</div>';

		echo '<div class="md-column col-side col-md-4 col-side">';
			dynamic_sidebar('sidebar-blog');
		echo '</div>';
	echo '</div>';


else:

	echo '<div class="row">';
		echo '<div class="md-column col-md-12">';
		get_template_part( '/templates/blog/posts-loop' );
		echo '</div>';
	echo '</div>';
	
endif;
?>