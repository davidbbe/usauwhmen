<?php global $post; ?>
<div class="read-more"><a href="<?php the_permalink(); ?>" class="button color" title="<?php echo get_the_title($post->ID); ?>'"><?php echo __("Read More", MD_THEME_NAME); ?> <i class="typcn-arrow-right"></i></a></div>
