<?php
/*
Template Name: Private posts
*/
?>
<?php global $theme_options; ?>
<?php get_header(); ?>
<?php get_template_part( '/templates/page/page-header' ); ?>

<?php if ( post_password_required() ) : ?>
  <div class="page-content padding-small" id="home-container">
    <div class="container">
      <?php echo get_the_password_form(); ?>
    </div>
  </div>
<?php else : ?>

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
<?php endif; ?>

<?php get_footer(); ?>