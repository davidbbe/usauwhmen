<?php
/**
 *
 * MD Shortcodes Blank Space
 *
 */

global $md_shortcodes;
global $element_options;

$md_shortcodes['md_blank_space'] = array(
  "name"            => __("Blank Space", "js_composer"),
  "base"            => "md_blank_space",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "slider",
      "heading"     => __("Height", "js_composer"),
      "param_name"  => "height",
      "default"     => "30"
    ),
    $element_options['class'],
    $element_options['id'],
  )
);


function md_blank_space_register( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'class' 		=> '',
	    'id' 			=> '',
	    'height'  		=> '',
	), $atts));

	$class  = setClass(array('clearfix', $class));
	$id     = setId($id);

	$output = '<div'.$class.$id.' style="height:'.$height.'px"></div>';

	return $output;
}
add_shortcode( 'md_blank_space', 'md_blank_space_register' );