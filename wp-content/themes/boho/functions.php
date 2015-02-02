<?php
	//hide admin bar for all users
	show_admin_bar(false);

	function add_query_vars_filter( $vars ){
		/*$vars = array(
			"edit_rsvp"
			,"edit_is_day_guest"
			,"edit_child"
			,"childId"
		);*/

		$vars[] = "edit_rsvp";
		$vars[] .= "edit_is_day_guest";
		$vars[] .= "edit_child";
		$vars[] .= "childId";
		return $vars;
	}
	add_filter( 'query_vars', 'add_query_vars_filter' );

	/**
	 * Redirect back to homepage and not allow access to 
	 * WP admin for Subscribers.
	 */
	function themeblvd_redirect_admin(){
		if ( ! current_user_can( 'edit_posts' ) ){
			wp_redirect( site_url() );
			exit;		
		}
	}
	add_action( 'admin_init', 'themeblvd_redirect_admin' );
?>