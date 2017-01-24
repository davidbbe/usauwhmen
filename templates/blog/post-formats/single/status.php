<?php
	global $theme_options;
	$status_text = get_post_meta($post->ID, 'post-status-text', true);
	$status_color = get_post_meta($post->ID, 'post-status-color', true);
	$status_bgcolor = get_post_meta($post->ID, 'post-status-bgcolor', true);
	$status_bgimage = get_post_meta($post->ID, 'post-status-bgimage', true);

	$style = 'background-color:'.$status_bgcolor.';';
	$style .= 'color:'.$status_color.';';
	$mask = false;

	if($status_bgimage){
		$bgimage = wp_get_attachment_image_src($status_bgimage, 'full');
		$style .= 'background-image:url('.$bgimage[0].');';
		$mask = true;
	}
?>

<div class="post-status" style="<?php echo $style; ?>">
	<?php if ($mask) { ?>
	<div class="mask"></div>
	<?php } ?>
	<div class="post-over">
		<div class="status"><?php echo $status_text; ?></div>
	</div>
</div>

<div class="post-body">
	
	<?php get_template_part('/templates/blog/meta-header'); ?>

	<h2 class="post-title"><?php the_title(); ?></h2>	

	<?php the_content(); ?>
</div>