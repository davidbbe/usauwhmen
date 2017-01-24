<?php
/**
 *
 * MD Shortcodes Video
 *
 */

global $md_shortcodes;


$md_shortcodes['md_video'] = array(
  "name"            => __("Video Youtube / Vimeo", "js_composer"),
  "base"            => "md_video",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "radio",
      "heading"     => __("Video Type", "js_composer"),
      "param_name"  => "type",
      "value"       => array(
        __('YouTube', "js_composer")  => "youtube", 
        __('Vimeo', "js_composer")    => "vimeo", 
      ),
      "default"     => "youtube",
      "description" => __("Select Video Type.", "js_composer")
    ),
    array(
      "type"        => "textfield",
      "heading"     => __("Video ID", "js_composer"),
      "param_name"  => "video_id",
      "description" => __("Set Video ID (eg. YouTube: 4Wkr0eXiUNw | eg. Vimeo: 7449107).", "js_composer")
    ),
    $element_options['class'],
    $element_options['id'],
    $element_options['css_animation'],
    $element_options['css_animation_delay'],
  )
);

function md_video_register( $atts, $content = null ) {

	extract(shortcode_atts(array(
	    'class' 		=> '',
	    'id' 			=> '',
	    'css_animation' => '',
	    'css_animation_delay' => '',
	    'type'	 		=> '',
	    'video_id'		=> '',
	), $atts));

	$animated = ($css_animation) ? 'animate' : '';
	$css_animation_delay = ($css_animation) ? ' data-delay="'.$css_animation_delay.'"' : '';

	$class  = setClass(array('md-video', $animated, $css_animation, $class));
	$id 	= setId($id);

	if ($type == 'youtube'){

		$embed = '<iframe src="//www.youtube.com/embed/'.$video_id.'" allowfullscreen></iframe>';

	}
	else if ($type == 'vimeo'){

		$embed = '<iframe src="//player.vimeo.com/video/'.$video_id.'" allowfullscreen></iframe>';

	}


	$output = '<div'.$class.$id.$css_animation_delay.'>'.$embed.'</div>';

	return $output;
}

add_shortcode( 'md_video', 'md_video_register' );