<?php
	global $theme_options;
	$quote_author = get_post_meta($post->ID, 'post-quote-author', true);
	$quote_text = get_post_meta($post->ID, 'post-quote-text', true);
	$quote_color = get_post_meta($post->ID, 'post-quote-color', true);
	$quote_bgcolor = get_post_meta($post->ID, 'post-quote-bgcolor', true);
	$quote_bgimage = get_post_meta($post->ID, 'post-quote-bgimage', true);

	$style = 'background-color:'.$quote_bgcolor.';';
	$style .= 'color:'.$quote_color.';';
	$mask = false;

	if($quote_bgimage){
		$bgimage = wp_get_attachment_image_src($quote_bgimage, 'full');
		$style .= 'background-image:url('.$bgimage[0].');';
		$mask = true;
	}
?>

<div class="post-quote" style="<?php echo $style; ?>">
	<?php if ($mask) { ?>
	<div class="mask"></div>
	<?php } ?>
	<div class="post-over">
		<div class="quote"><?php echo $quote_text; ?></div>
		<span class="quote-author">
			- <?php echo $quote_author; ?> - 
		</span>
	</div>
</div>

<div class="post-body">
	
	<?php get_template_part('/templates/blog/meta-header'); ?>

	<h2 class="post-title"><?php the_title(); ?></h2>	

	<?php the_content(); ?>
</div>