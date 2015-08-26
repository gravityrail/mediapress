<?php
// Exit if the file is accessed directly over web
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
//Load the MPP Settings Helper if we are in the admin

add_action( 'mpp_loaded', 'mpp_admin_load' );

function mpp_admin_load() {
	
	if( ! is_admin() || ( is_admin() && defined(  'DOING_AJAX' ) )  )
		return ;

	$path = mediapress()->get_path() . 'admin/';
	
	$files = array(
		'functions.php',
		'mpp-settings-manager/mpp-admin-settings-loader.php',
		'admin.php',
		'class-mpp-post-helper.php',
		'class-mpp-gallery-list-helper.php',
		'tools/debug/debug-helper.php'
	);
	
	foreach( $files as $file ) {
	
		require_once $path . $file;
	}
	
	
	//class_alias( 'MPP_Admin_Settings_Page' , 'MPP_Admin_Page' );
	
	do_action( 'mpp_admin_loaded' );
	
}