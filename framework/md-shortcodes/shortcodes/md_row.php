<?php
/**
 *
 * MD Row
 *
 */

global $md_shortcodes;
global $element_options;

$md_shortcodes['md_row'] = array(
  "name"            => __("Row", "js_composer"),
  "base"            => "md_row",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "textarea",
      "heading"     => __("Text", "js_composer"),
      "param_name"  => "content",
      "value"       => ""
    ),
    $element_options['class'],
    $element_options['id'],
  )
);


function md_row_register( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'class' 		=> '',
	    'id' 			=> '',
	), $atts));

	$class  = setClass(array('row', $class));
	$id     = setId($id);

	$output = '<div'.$class.$id.'>'.do_shortcode($content).'</div>';

	return $output;
}
add_shortcode( 'md_row', 'md_row_register' );