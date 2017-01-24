<?php
/**
 *
 * MD Shortcodes Tabs
 *
 */


global $md_shortcodes;
global $element_options;

$md_shortcodes['md_tabs'] = array(
  "name"            => __("Tabs", "js_composer"),
  "base"            => "md_tabs",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "custom",
      "param_name"  => "tab",
      "name"        => "tab",
    ),
    $element_options['class'],
    $element_options['id'],
    $element_options['css_animation'],
    $element_options['css_animation_delay'],
  )
);


function md_tab_register( $atts, $content = null ) {
  extract(shortcode_atts(array(
    'title' => ''
  ), $atts));

  $uid = uniqid();

  if($GLOBALS['tabs'] == 'nav'){
    $output = '<li><a href="#'.$uid.'" data-toggle="tab">'.$title.'</a></li>';
  }

  else{
    $output = '<div class="tab-pane">'.do_shortcode($content).'</div>';
  }

  return $output;
}
add_shortcode( 'md_tab', 'md_tab_register' );

function md_tabs_register( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'class'     => '',
      'id'      => '',
      'css_animation' => '',
      'css_animation_delay' => '',
      'color_scheme'  => ''
  ), $atts));

  $animated = ($css_animation) ? 'animate' : '';
  $css_animation_delay = ($css_animation) ? ' data-delay="'.$css_animation_delay.'"' : '';

  $class  = setClass(array('md-tabs', $animated, $css_animation, $class, $color_scheme));
  $id   = setId($id);

  $output = '<div'.$class.$id.$css_animation_delay.'>';
  $output .= '<ul class="nav nav-tabs">';
  $GLOBALS['tabs'] = 'nav';
  $output .= do_shortcode($content);
  $output .= '</ul>';
  $GLOBALS['tabs'] = 'content';
  $output .= '<div class="tab-content">';
  $output .= do_shortcode($content);
  $output .= '</div>';
  $output .= '</div>';


  return $output;
}
add_shortcode( 'md_tabs', 'md_tabs_register' );

