<?php 

	$helpers = array(
		'framework-helper',
		'tgm-plugin-activation',
		'activation',
		'force',
		'mobile-detect',
		'post-gallery'
	);

	foreach ($helpers as $h):
		if ( file_exists( dirname( __FILE__ ) . '/helpers/'.$h.'.php' ) ) {
		    require_once(dirname( __FILE__ ) . '/helpers/'.$h.'.php' );
		}
	endforeach;

?>