<?php
global $theme_options;

$new = false;

if(is_home() || is_search() || is_archive() || is_404()):

	if(get_option('page_on_front')){
		$page_id = get_option('page_on_front');
	} else if (get_option('page_for_posts')){
		$page_id = get_option('page_for_posts');
	} 
	else {}

else:

	if(is_404() || is_search() || is_archive()){ return; }
	$page_id = get_the_ID();

endif;

$page_options = get_post_custom($page_id);
if(!isset($page_options['page-header-enabled'])){
	$new = true;
	$page_options['page-header-enabled'][0] = true;
	$page_options['page-header-bgcolor'][0] = $theme_options['page-header-bgcolor'];
	$page_options['page-header-padding'][0] = $theme_options['page-header-padding'];
	$page_options['page-header-align'][0] = $theme_options['page-header-align'];
	$page_options['page-header-bgimage-attach'][0] = $theme_options['page-header-bgimage-attach'];
	$page_options['page-header-bgimage'][0] = '';
	$page_options['page-header-bgimage-type'][0] = $theme_options['page-header-bgimage-type'];
	$page_options['page-header-title'][0] = '';
	$page_options['page-header-title-animation'][0] = $theme_options['page-header-title-animation'];
	$page_options['page-header-subtitle'][0] = '';
	$page_options['page-header-subtitle-animation'][0] = $theme_options['page-header-subtitle-animation'];
	$page_options['page-header-mask'][0] = false;
}

if(is_search()){
	$page_options['page-header-title'][0] = __('SEARCH RESULT', MD_THEME_NAME);
	$page_options['page-header-subtitle'][0] = '"'.get_search_query().'"';

	if(isset($theme_options['page-search-bg-header']) && !$new)
	$page_options['page-header-bgimage'][0] = $theme_options['page-search-bg-header']['id'];
}

if(is_archive()){

	if (is_category()):
		$page_options['page-header-subtitle'][0] = __("FILTER BY CATEGORY", MD_THEME_NAME);
		$page_options['page-header-title'][0] = single_cat_title("", false);
	elseif(is_tag()):
		$page_options['page-header-subtitle'][0] = __("FILTER BY TAG", MD_THEME_NAME);
		$page_options['page-header-title'][0] = single_cat_title("", false);
	elseif(is_day()):
		$page_options['page-header-subtitle'][0] = __("FILTER BY DAY", MD_THEME_NAME);
		$page_options['page-header-title'][0] = get_the_time('F jS, Y');
	elseif(is_month()):
		$page_options['page-header-subtitle'][0] = __("FILTER BY MONTH", MD_THEME_NAME);
		$page_options['page-header-title'][0] = get_the_time('F, Y');
	elseif(is_year()):
		$page_options['page-header-subtitle'][0] = __("FILTER BY YEAR", MD_THEME_NAME);
		$page_options['page-header-title'][0] = get_the_time('Y');
	elseif(is_author()):
		global $author; $userdata = get_userdata($author);
		$page_options['page-header-subtitle'][0] = __("FILTER BY AUTHOR", MD_THEME_NAME);
		$page_options['page-header-title'][0] = $userdata->display_name;
	else:
		$page_options['page-header-subtitle'][0] = '';
		$page_options['page-header-title'][0] = 'ARCHIVE';
	endif;

	if(isset($theme_options['page-archive-bg-header']) && !$new)
	$page_options['page-header-bgimage'][0] = $theme_options['page-archive-bg-header']['id'];
}

if(is_404()){
	$page_options['page-header-title'][0] = __('Ooopsss...', MD_THEME_NAME);
	$page_options['page-header-subtitle'][0] = __('Page not found.', MD_THEME_NAME);

	if(isset($theme_options['page-404-bg-header']) && !$new)
	$page_options['page-header-bgimage'][0] = $theme_options['page-404-bg-header']['id'];
}

if (!isset($page_options['page-header-enabled']) || !filter_var($page_options['page-header-enabled'][0], FILTER_VALIDATE_BOOLEAN)) return;


// Check Background Color
if ($page_options['page-header-bgcolor'][0] == $theme_options['accent-color']):

	$page_header_bg = 'accent-bgcolor';
	$page_header_bg_color = '';

else:

	$page_header_bg = 'custom-bgcolor';
	$page_header_bg_color = 'background-color:'.$page_options['page-header-bgcolor'][0].';';

endif;


// Check Background Image
if ($page_options['page-header-bgimage'][0]):

	$img = wp_get_attachment_image_src( $page_options['page-header-bgimage'][0], 'full');
	
	$page_header_bg_image = 'background-image:url('.$img[0].');';

else:

	$page_header_bg_image = 'background-image:url('.get_template_directory_uri().'/assets/img/placeholder/home-header.jpg);';

endif;



// Check Background Parallax
if($page_options['page-header-bgimage-attach'][0] == 'bg-parallax'):
	$bg_parallax = ' data-type="background" data-speed="3"';
else:
	$bg_parallax = '';
endif;



// Set Class
$class = setClass(array($page_options['page-header-padding'][0], $page_options['page-header-align'][0], $page_header_bg, $page_options['page-header-bgimage-attach'][0], $page_options['page-header-bgimage-type'][0]));


// Set Style
if($page_options['page-header-bgcolor'][0] || $page_options['page-header-bgimage'][0]):

	$style = ' style="'.$page_header_bg_color.$page_header_bg_image.'"';

else:

	$style = false;

endif;




$page_header_title = ($page_options['page-header-title'][0]) ? $page_options['page-header-title'][0] : get_the_title($page_id);
$page_header_title_animation = ($page_options['page-header-title-animation'][0]) ? ' class="animated '.$page_options['page-header-title-animation'][0].'"' : '';
$page_header_subtitle_animation = ($page_options['page-header-subtitle-animation'][0]) ? ' class="animated '.$page_options['page-header-subtitle-animation'][0].'"' : '';
?>
<div id="page-header"<?php echo $class.$style.$bg_parallax; ?>>

	<?php 
		if(filter_var($page_options['page-header-mask'][0], FILTER_VALIDATE_BOOLEAN)){

			if ($page_options['page-header-mask-bgimage'][0]):

				$img = wp_get_attachment_image_src( $page_options['page-header-mask-bgimage'][0], 'full');
				
				$page_header_mask_bgimage = 'background-image:url('.$img[0].');';

			else:

				$page_header_mask_bgimage = '';

			endif;

			echo '<div class="mask" style="background-color:'.hex2rgb($page_options['page-header-mask-bgcolor'][0], $page_options['page-header-mask-opacity'][0]).';'.$page_header_mask_bgimage.'"></div>';
		}
	?>

	<div class="container">
		
		<h2<?php echo $page_header_title_animation;?> style="color:<?php echo $page_options['page-header-title-color'][0];?>"><?php echo $page_header_title; ?></h2>
		
		<?php if($page_options['page-header-subtitle'][0]): ?>
			<h3<?php echo $page_header_subtitle_animation;?> style="color:<?php echo $page_options['page-header-subtitle-color'][0];?>"><?php echo $page_options['page-header-subtitle'][0]; ?></h3>
		<?php endif; ?>
	

	    <?php if(function_exists('bcn_display') ) { ?>
		    <?php if( isset($page_options['show-breadcrumb']) && !filter_var($page_options['show-breadcrumb'][0], FILTER_VALIDATE_BOOLEAN)){} else { ?> 
		        <div class="breadcrumbs">
		        	<?php bcn_display(); ?>
		    	</div>
		    <?php } ?>
	    <?php } ?>

	</div>

</div>

<div class="wide-bar">
	<div class="container">
				<?php get_template_part('/templates/page/social-links'); ?>

				<?php if(isset($theme_options['site-author'])) { ?>
				<div class="site-author">
					<img src="<?php echo $theme_options['site-author']['url']; ?>" alt="<?php bloginfo('name'); ?>" />
				</div>
				<?php } ?>

				<?php
				if(is_single()){
					$prev = get_previous_post();
					$next = get_next_post();

					if($prev || $next){
					?>

					<div class="post-navigation float-right">
						<?php
						if($prev){ 
							echo '<a href="'.get_permalink($prev->ID).'" class="button color">Previous Post</a>';
						}

						if($next){ 
							echo '<a href="'.get_permalink($next->ID).'" class="button color">Next Post</a>';
						}

						?>

					</div>
				<?php
					}
				}
				?>
	</div>
</div>
<div class="clearfix"></div>