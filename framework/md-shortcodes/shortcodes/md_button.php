<?php
/**
 *
 * MD Shortcodes Button
 *
 */

global $md_shortcodes;
global $element_options;

$md_shortcodes['md_button'] = array(
  "name"            => __("Button", "js_composer"),
  "base"            => "md_button",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "textfield",
      "heading"     => __("Text", "js_composer"),
      "param_name"  => "content",
      "value"       => ""
    ),
    $element_options['href'],
    $element_options['target'],
    $element_options['button_size'],
    $element_options['button_color'],
    $element_options['button_bgcolor'],
    $element_options['class'],
    $element_options['id'],
    $element_options['css_animation'],
    $element_options['css_animation_delay'],
  )
);


function md_button_register( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'class'             => '',
      'id'              => '',
      'css_animation'         => '',
      'css_animation_delay'   => '',
      'size'                  => false,
      'href'                  => '',
      'target'                => '',
      'bgcolor'               => '',
      'color'                 => '',
  ), $atts));

  $animated = ($css_animation) ? 'animate' : '';
  $css_animation_delay = ($css_animation) ? ' data-delay="'.$css_animation_delay.'"' : '';

  $class  = setClass(array('md-button', $animated, $css_animation, $class, $size));
  $id     = setId($id);


  $style = ' style="background-color:'.$bgcolor.'; border-color:'.$bgcolor.'; color:'.$color.';"';
  
  ($target) ? $target = ' target="_blank"' : $target = '';

  $output = '<a href="'.$href.'"'.$class.$id.$target.$style.$css_animation_delay.'>';

  $output .= esc_attr($content);
  $output .= '</a>';

  if($content)
  return $output;
}

add_shortcode( 'md_button', 'md_button_register' );