<?php 
header("Content-type: text/css; charset=utf-8"); 

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp . '/wp-load.php' );
?>

.accent-color{
	color: <?php echo $theme_options['accent-color']; ?> !important;
}

.accent-bgcolor{
	background-color: <?php echo $theme_options['accent-color']; ?> !important;
}

.accent-bordercolor{
	border-color: <?php echo $theme_options['accent-color']; ?> !important;
}

body{
	color: <?php echo $theme_options['font-body']['color']; ?>;
	font-family: <?php echo $theme_options['font-body']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-body']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-body']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-body']['line-height']; ?>;
	<?php if(isset($theme_options['font-body']['font-style']) && ($theme_options['font-body']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-body']['font-style']; ?>;
	<?php endif; ?>	

	background-color: <?php echo $theme_options['body-bgcolor']; ?>;
	<?php if($theme_options['body-bgimage']['url']): ?>
	background-image: url(<?php echo $theme_options['body-bgimage']['url']; ?>);
	<?php endif; ?>	
}

#wrap{
	background-color: <?php echo $theme_options['wrap-bgcolor']; ?>;
	<?php if($theme_options['wrap-bgimage']['url']): ?>
	background-image: url(<?php echo $theme_options['wrap-bgimage']['url']; ?>);
	<?php endif; ?>	
}

a{
	color: <?php echo $theme_options['accent-color']; ?>;
}

a:hover{
	color: <?php echo $theme_options['font-body']['color']; ?>;
}

::selection{
	color: #fff;
	background: <?php echo $theme_options['accent-color']; ?>;
}
::-moz-selection{
	color: #fff;
	background: <?php echo $theme_options['accent-color']; ?>;
}

h1{
	color: <?php echo $theme_options['font-h1']['color']; ?>;
	font-family: <?php echo $theme_options['font-h1']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h1']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h1']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h1']['line-height']; ?>;
	<?php if(isset($theme_options['font-h1']['font-style']) && ($theme_options['font-h1']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h1']['font-style']; ?>;
	<?php endif; ?>	
}

h2{
	color: <?php echo $theme_options['font-h2']['color']; ?>;
	font-family: <?php echo $theme_options['font-h2']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h2']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h2']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h2']['line-height']; ?>;
	<?php if(isset($theme_options['font-h2']['font-style']) && ($theme_options['font-h2']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h2']['font-style']; ?>;
	<?php endif; ?>	
}

h3{
	color: <?php echo $theme_options['font-h3']['color']; ?>;
	font-family: <?php echo $theme_options['font-h3']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h3']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h3']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h3']['line-height']; ?>;
	<?php if(isset($theme_options['font-h3']['font-style']) && ($theme_options['font-h3']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h3']['font-style']; ?>;
	<?php endif; ?>	
}

h4{
	color: <?php echo $theme_options['font-h4']['color']; ?>;
	font-family: <?php echo $theme_options['font-h4']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h4']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h4']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h4']['line-height']; ?>;
	<?php if(isset($theme_options['font-h4']['font-style']) && ($theme_options['font-h4']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h4']['font-style']; ?>;
	<?php endif; ?>	
}

h5{
	color: <?php echo $theme_options['font-h5']['color']; ?>;
	font-family: <?php echo $theme_options['font-h5']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h5']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h5']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h5']['line-height']; ?>;
	<?php if(isset($theme_options['font-h5']['font-style']) && ($theme_options['font-h5']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h5']['font-style']; ?>;
	<?php endif; ?>	
}

h6{
	color: <?php echo $theme_options['font-h6']['color']; ?>;
	font-family: <?php echo $theme_options['font-h6']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-h6']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-h6']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-h6']['line-height']; ?>;
	<?php if(isset($theme_options['font-h6']['font-style']) && ($theme_options['font-h6']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-h6']['font-style']; ?>;
	<?php endif; ?>	
}

#header-menu ul.menu li,
#header-menu ul.menu li a{
	color: <?php echo $theme_options['menu-font']['color']; ?>;
	font-family: <?php echo $theme_options['menu-font']['font-family']; ?>;
	font-size: <?php echo $theme_options['menu-font']['font-size']; ?>;
	font-weight: <?php echo $theme_options['menu-font']['font-weight']; ?>;
}

#page-header h2{
	color: <?php echo $theme_options['page-header-title']['color']; ?>;
	font-family: <?php echo $theme_options['page-header-title']['font-family']; ?>;
	font-size: <?php echo $theme_options['page-header-title']['font-size']; ?>;
	font-weight: <?php echo $theme_options['page-header-title']['font-weight']; ?>;
	line-height: <?php echo $theme_options['page-header-title']['line-height']; ?>;
}

#page-header h3{
	color: <?php echo $theme_options['page-header-subtitle']['color']; ?>;
	font-family: <?php echo $theme_options['page-header-subtitle']['font-family']; ?>;
	font-size: <?php echo $theme_options['page-header-subtitle']['font-size']; ?>;
	font-weight: <?php echo $theme_options['page-header-subtitle']['font-weight']; ?>;
	line-height: <?php echo $theme_options['page-header-subtitle']['line-height']; ?>;
}

footer,
footer .chosen-results li{
	background: <?php echo $theme_options['footer-bgcolor']; ?>;
}

#copyright{
	background: <?php echo $theme_options['copyright-bgcolor']; ?>;
}


input[type="submit"],
button,
a.button,
#page-header h2 span,
#page-header h3 span,
#header-menu ul.menu li:hover > a,
#header-menu ul.menu li a:hover,
#header-menu ul.menu > li.current_page_item > a,
#header-menu-mobile .menu-item-has-children > a.open{
	color: <?php echo $theme_options['accent-color']; ?>;
}

input[type="submit"]:hover,
button:hover,
a.button:hover,
.md-blog .read-more a:hover,
input[type="submit"].color,
.md-blog .post .post-format:before,
button.color,
a.button.color,
.md-pagination li.active,
.md-pagination li:hover,
.md-pagination.pagination-page span,
.md-pagination.pagination-page a span:hover,
.widget .tagcloud a:hover,
.form-submit input,
.mejs-overlay:hover .mejs-overlay-button,
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current{
	background-color: <?php echo $theme_options['accent-color']; ?>;
}

.widget .tagcloud a:hover,
.widget_md_widget_dribbble ul li:hover,
.widget_md_widget_pinterest ul li:hover,
.widget_md_widget_flickr .flickr_badge_image:hover,
.form-submit input,
.md-blog .post.sticky{
	border-color: <?php echo $theme_options['accent-color']; ?> !important;
}

input[type="submit"]:hover,
button:hover,
a.button:hover,
.md-blog .read-more a:hover,
input[type="submit"].color,
button.color,
a.button.color{
	border-color: <?php echo $theme_options['accent-color']; ?>;
}

.md-blog .post-title a,
.md-social-share .item a{
	color: <?php echo $theme_options['font-body']['color']; ?>;
}
?>
/* CUSTOM CSS STARTS HERE */
<?php if(isset($theme_options['custom-css'])) echo $theme_options['custom-css']; ?>
