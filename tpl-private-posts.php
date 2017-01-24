<?php
/*
Template Name: Private posts
*/
?>
<?php global $theme_options; ?>
<?php get_header(); ?>

<?php get_template_part( '/templates/page/page-header' ); ?>

<div class="page-content padding-small" id="home-container">
  <div class="container">
    <?php 
      echo '<div class="row">';
        echo '<div class="md-column col-md-8">';
          get_template_part( '/templates/blog/posts-loop-private' );
        echo '</div>';

        echo '<div class="md-column col-side col-md-4 col-side">';
          dynamic_sidebar('sidebar-blog');
        echo '</div>';
      echo '</div>';
     ?>
  </div>
</div>

<?php get_footer(); ?>