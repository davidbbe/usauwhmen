<?php global $theme_options; ?>

<div class="post-header">
	<span class="meta-date">
		<?php echo get_the_date(); ?>
	</span>

	<?php if(comments_open()){ ?>
	<span class="meta-comment"><?php comments_popup_link(__('0 Comments', MD_THEME_NAME), __('1 Comment', MD_THEME_NAME), __('% Comments', MD_THEME_NAME)); ?></span>
	<?php } ?>

	<span class="meta-author"><?php _e('AUTHOR:', MD_THEME_NAME); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php echo __('View all posts by', MD_THEME_NAME); ?> <?php the_author(); ?>"><?php the_author(); ?></a></span>

	<?php if(get_the_category()){ ?>
	<span class="meta-category"><?php _e('CATEGORIES:', MD_THEME_NAME); ?> <?php the_category(', '); ?></span>
	<?php } ?>

	<?php if(get_the_tags()){ ?>
	<span class="meta-tags"><?php the_tags(); ?></span>
	<?php } ?>

</div>

