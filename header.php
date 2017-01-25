<?php global $theme_options; ?>
<?php
	$device = (md_detect_mobile()) ? 'mobile' : 'desktop';
	$css3_animations = ($device == 'desktop' && !detect_ie_9()) ? 'enabled' : 'disabled';

	$body_style = false;
	$body_bgcolor = false;
	$body_bgimage = false;
	$site_layout = $theme_options['site-layout'];
	$header_width = $theme_options['header-width'];



	if(isset($post)){

		if(is_home()):
			
			if(get_option('page_for_posts')){
				$page_id = get_option('page_for_posts');
			} else {}

		elseif (class_exists('Woocommerce') && is_shop()):

			$page_id = woocommerce_get_page_id( 'shop' );

		else:
			$page_id = get_the_id();

		endif;

		$post_custom = get_post_custom($page_id);

		if(isset($post_custom['force-boxed']) && filter_var($post_custom['force-boxed'][0], FILTER_VALIDATE_BOOLEAN)){

			$site_layout = 'boxed';

			if(isset($post_custom['page-bgcolor']))
				$body_bgcolor = 'background-color:'.$post_custom['page-bgcolor'][0].';';

			if(isset($post_custom['page-bgimage']) && $post_custom['page-bgimage'][0] != '' ){
				$bg_image = wp_get_attachment_image_src( $post_custom['page-bgimage'][0], 'full');
				$body_bgimage = 'background-image:url('.$bg_image[0].');';
			}
		}

		if($body_bgcolor || $body_bgimage)
		$body_style = ' style="'.$body_bgcolor.$body_bgimage.'" ';

	}

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- SEO -->
<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
<meta name="description" content="Official website of the US Men&#039;s Elite Underwater Hockey Team.">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">

<!-- Social -->
<meta property="og:site_name" content="US Men&#039;s Elite Underwater Hockey" />
<meta property="og:title" content="<?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?>" />
<meta property="og:description" content="Official website of the US Men&#039;s Elite Underwater Hockey Team." />
<meta property="og:image" content="//usauwhmen.com.com/wp-content/uploads/2017/01/196c784a246e796e273172706509a786.jpeg" />
<meta property="og:url" content="//usauwhmen.com" />

<!-- RSS & Pingbacks -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 

<?php wp_head(); ?>
</head>

<body <?php body_class();?><?php echo $body_style;?> data-device="<?php echo $device; ?>" data-css3-animations="<?php echo $css3_animations;?>" data-layout="<?php echo $site_layout; ?>" data-header-width="<?php echo $header_width; ?>">

<?php get_template_part( '/templates/page/loading' ); ?>

<div id="wrap">
	<header id="header">
		<div class="header-content" id="header-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div id="logo">
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
								<?php
									if(isset($theme_options['logo']) && isset($theme_options['logo']['url']) && $theme_options['logo']['url'] != ''){
										echo '<img src="'.$theme_options['logo']['url'].'" alt="" />';
									}
									else{
										echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/logo.png" alt="" />';
									}
								?>
							</a>
						</div>
					</div>
					
					<div class="col-md-9">
						<nav id="header-menu">
							<?php 
								if(has_nav_menu("header-menu")){
									
									$args = array( 
										'theme_location' => 'header-menu', 
										'depth'			 => 3,
										'container'      => false,
									);
									
									wp_nav_menu($args);

								} else {
									echo '<span class="menu-fallback">No menu is found. <a href="'.admin_url('nav-menus.php').'">Click here to assign.</a></span>';
								}							
							?>
						</nav>

						<a href="#" id="menu-mobile-open"></a>
					</div>
				</div>
			</div>
		</div>
	</header>	
	<div id="header-mobile">
		<div class="container">	
			<a href="#" id="menu-mobile-close"><i class="icon-remove-sign"></i></a>
			<nav class="header-menu-mobile">
				<?php 
					$args = array( 
						'theme_location' => 'header-menu', 
						'depth'          => 3, 
						'container'      => false,
						'menu_id'	 	 => 'header-menu-mobile'
					);

					if(has_nav_menu("header-menu")){
						wp_nav_menu($args); 
					}							
				?>
			</nav>
		</div>
		<a href="#" id="menu-mobile-close"></a>
	</div>
