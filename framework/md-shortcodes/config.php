<?php
define('MD_SHORTCODES_URI', get_template_directory_uri().'/framework/md-shortcodes/');
define('MD_SHORTCODES_DIR', get_template_directory().'/framework/md-shortcodes/');
$md_shortcodes = array();
$element_options = array('x');

/*-----------------------------------------------------------------------------------*/
/*	Translation
/*-----------------------------------------------------------------------------------*/
load_plugin_textdomain( 'textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/*-----------------------------------------------------------------------------------*/
/*	Library
/*-----------------------------------------------------------------------------------*/
require_once( 'lib/attributes.php' );
require_once( 'tinymce/tinymce-class.php' );


/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function md_shortcodes_backend() {

}
add_action('admin_init', 'md_shortcodes_backend');


/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue JS
/*-----------------------------------------------------------------------------------*/
function md_shortcodes_frontend() {
	
	# MEDIAELEMENT #
	wp_deregister_script('mediaelement');

	# PLUGINS #
    wp_enqueue_script( 'md-framework-plugins', MD_SHORTCODES_URI . 'assets/js/libs/plugins.js', array('jquery'), '1.0', true );

	# SHORTCODES #
	wp_enqueue_script('md-shortcodes', MD_SHORTCODES_URI . "assets/js/md-shortcodes.js", array('jquery'), '1.0', true);		 
}
add_action('wp_enqueue_scripts', 'md_shortcodes_frontend');


/*-----------------------------------------------------------------------------------*/
/*	MD Shortcodes
/*-----------------------------------------------------------------------------------*/
function md_shortcodes(){
	global $element_options;
	$shortcodes = array(
		'md_accordions',
		'md_blank_space',
		'md_button',
		'md_column',
		'md_row',
		'md_tabs',
		'md_social_share',
		'md_audio_hosted',
		'md_video',
	);

	foreach ($shortcodes as $s):
		if ( file_exists( dirname( __FILE__ ) . '/shortcodes/'.$s.'.php' ) ) {
		    require_once(dirname( __FILE__ ) . '/shortcodes/'.$s.'.php' );
		}
	endforeach;
}
md_shortcodes();
?>