<?php
/**
 *
 * MD Shortcodes Column
 *
 */

global $md_shortcodes;
global $element_options;

$md_shortcodes['md_column'] = array(
  "name"            => __("Column", "js_composer"),
  "base"            => "md_column",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "textarea",
      "heading"     => __("Text", "js_composer"),
      "param_name"  => "content",
      "value"       => ""
    ),
    array(
      "type"          => "radio",
      "heading"       => __("Width", "js_composer"),
      "param_name"    => "width",
      "value"         => array(
        __("Column-1", "js_composer") => '1', 
        __("Column-2", "js_composer") => '2', 
        __("Column-3", "js_composer") => '3', 
        __("Column-4", "js_composer") => '4', 
        __("Column-5", "js_composer") => '5', 
        __("Column-6", "js_composer") => '6', 
        __("Column-7", "js_composer") => '7', 
        __("Column-8", "js_composer") => '8', 
        __("Column-9", "js_composer") => '9', 
        __("Column-10", "js_composer") => '10', 
        __("Column-11", "js_composer") => '11', 
        __("Column-12", "js_composer") => '12', 
      ),
      "default"       => "12",
    ),
    $element_options['class'],
    $element_options['id'],
  )
);


function md_column_register( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'class' 		=> '',
	    'id' 			=> '',
	    'width'  		=> '',
	), $atts));

	$class  = setClass(array('md-column col-md-'.$width, $class));
	$id     = setId($id);

	$output = '<div'.$class.$id.'>'.do_shortcode($content).'</div>';

	return $output;
}
add_shortcode( 'md_column', 'md_column_register' );