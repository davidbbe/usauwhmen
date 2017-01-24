<?php
	global $theme_options;
	$link = get_post_meta($post->ID, 'post-link-url', true);
	$label = get_post_meta($post->ID, 'post-link-label', true);
	$target = get_post_meta($post->ID, 'post-link-target', true);
	$link_color = get_post_meta($post->ID, 'post-link-color', true);
	$link_bgcolor = get_post_meta($post->ID, 'post-link-bgcolor', true);
	$link_bgimage = get_post_meta($post->ID, 'post-link-bgimage', true);

	$style = 'background-color:'.$link_bgcolor.';';
	$style .= 'color:'.$link_color.';';
	$mask = false;

	if($link_bgimage){
		$bgimage = wp_get_attachment_image_src($link_bgimage, 'full');
		$style .= 'background-image:url('.$bgimage[0].');';
		$mask = true;
	}
?>

<div class="post-link" style="<?php echo $style; ?>">
	<?php if ($mask) { ?>
	<div class="mask"></div>
	<?php } ?>
	<div class="post-over">
		<a href="<?php echo $link;?>" title="<?php esc_attr($label) ?>" class="link-title" style="color:<?php echo $link_color;?>"><?php echo $label; ?></a>
		<a href="<?php echo $link;?>" target="<?php echo $target;?>" class="link-url" style="color:<?php echo $link_color;?>"><?php echo $link; ?></a> - <a href="<?php echo get_permalink();?>" style="color:<?php echo $link_color;?>">#</a>
	</div>
</div>

<span class="post-format"></span>