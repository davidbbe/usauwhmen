<?php
/**
 *
 * MD Shortcodes Accordions
 *
 */


global $md_shortcodes;
global $element_options;

$md_shortcodes['md_accordions'] = array(
  "name"            => __("Tabs", "js_composer"),
  "base"            => "md_accordions",
  "modal"           => true,
  "params"          => array(
    array(
      "type"        => "custom",
      "param_name"  => "accordion",
      "name"        => "accordion",
    ),
    $element_options['class'],
    $element_options['id'],
    $element_options['css_animation'],
    $element_options['css_animation_delay'],
  )
);


function md_accordion_register( $atts, $content = null ) {

  extract(shortcode_atts(array(
    'title' => ''
  ), $atts));

  $uid = 'tab_'.uniqid();

  $output = '<div class="panel">';

  $output .= '<div class="panel-heading">';
  $output .= '<h4 class="panel-title">';
  $output .= '<a data-toggle="collapse" href="#'.$uid.'" class="collapsed">'.do_shortcode($title).'</a>';
  $output .= '</h4>';
  $output .= '</div>';

  $output .= '<div id="'.$uid.'" class="panel-collapse collapse">';
  $output .= '<div class="panel-body">'.do_shortcode($content).'</div>';
  $output .= '</div>';

  $output .= '</div>';

  return $output;
}
add_shortcode( 'md_accordion', 'md_accordion_register' );

function md_accordions_register( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'class'         => '',
      'id'            => '',
      'css_animation' => '',
      'css_animation_delay' => '',
      'expanded'      => 'expanded',
  ), $atts));

  $animated = ($css_animation) ? 'animate' : '';
  $css_animation_delay = ($css_animation) ? ' data-delay="'.$css_animation_delay.'"' : '';
  $uid = 'acc_'.uniqid();


  $class  = setClass(array('md-accordions', $animated, $css_animation, $class, $expanded));
  $id   = setId($id);


  $output = '<div'.$class.$id.$css_animation_delay.'>';
  $output .= '<div class="panel-group" id="'.$uid.'">';
  $output .= do_shortcode($content);
  $output .= '</div>';
  $output .= '</div>';

  return $output;

}
add_shortcode( 'md_accordions', 'md_accordions_register' );

