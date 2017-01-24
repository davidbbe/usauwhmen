<?php

/*
*	
*	PAGE GENERAL METABOX
*
*/

global $theme_options;
global $md_metabox;


$fields = array(
	
	array(
		'name'  => 'page-loading',
		'label' => __('Loading', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'Default',
				'value' => 'default'
			),
			array(
				'label' => 'No',
				'value' => 'false'
			),
			array(
				'label' => 'Rotate Plan Light',
				'value' => 'rotateplane light'
			),
			array(
				'label' => 'Rotate Plan Dark',
				'value' => 'rotateplane dark'
			),
			array(
				'label' => 'Double Bounce Light',
				'value' => 'doublebounce light'
			),
			array(
				'label' => 'Double Bounce Dark',
				'value' => 'doublebounce dark'
			),
			array(
				'label' => 'Wave Light',
				'value' => 'wave light'
			),
			array(
				'label' => 'Wave Dark',
				'value' => 'wave dark'
			),
			array(
				'label' => 'Wandering Cubes Light',
				'value' => 'wanderingcubes light'
			),
			array(
				'label' => 'Wandering Cubes Dark',
				'value' => 'wanderingcubes dark'
			),
			array(
				'label' => 'Pulse Light',
				'value' => 'pulse light'
			),
			array(
				'label' => 'Pulse Dark',
				'value' => 'pulse dark'
			),
			array(
				'label' => 'Chasing Dots Light',
				'value' => 'chasingdots light'
			),
			array(
				'label' => 'Chasing Dots Dark',
				'value' => 'chasingdots dark'
			),
			array(
				'label' => 'Three Bounce Light',
				'value' => 'threebounce light'
			),
			array(
				'label' => 'Three Bounce Dark',
				'value' => 'threebounce dark'
			),
			array(
				'label' => 'Cube Light',
				'value' => 'cube light'
			),
			array(
				'label' => 'Cube Dark',
				'value' => 'cube dark'
			),
			array(
				'label' => 'Fading Circle Light',
				'value' => 'fadingcircle light'
			),
			array(
				'label' => 'Fading Circle Dark',
				'value' => 'fadingcircle dark'
			),
		),
		'default' => 'default'
	),
	
	array(
		'name'  => 'force-boxed',
		'label' => __('Force Layout Boxed', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'No',
				'value' => 'false'
			),
			array(
				'label' => 'Yes',
				'value' => 'true'
			),
		),
		'desc' => 'Force Boxed Layout in this page',
	),

	array(
		'name'  => 'page-bgimage',
		'label' => __('Page Background Image', MD_THEME_NAME),
		'type'  => 'upload',
		'media' => 'image',
		'desc' => 'Force Background Image in this page',
	),

	array(
		'name'  => 'page-bgcolor',
		'label' => __('Page Background Color', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => $theme_options['body-bgcolor']
	),
);

$md_metabox['general']['order'] 	= 1;
$md_metabox['general']['title'] 	= 'General Settings';
$md_metabox['general']['id'] 		= 'meta-page-general';
$md_metabox['general']['icon'] 		= 'magic';
$md_metabox['general']['class'] 	= 'blocked';
$md_metabox['general']['fields'] 	= $fields;
