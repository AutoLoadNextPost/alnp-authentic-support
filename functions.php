<?php
/**
 * Setup Child Theme
 */
function csco_setup_child_theme() {
	load_child_theme_textdomain( 'csco', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'csco_setup_child_theme', 99 );

/**
 * Enqueue Child Theme Assets
 */
function csco_child_assets() {
	if ( ! is_admin() ) {
		$version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'csco_child_css', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(), $version, 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'csco_child_assets', 99 );

/*
 * Enable Support for Auto Load Next Post.
 */
function csco_alnp_support() {
	add_theme_support( 'auto-load-next-post' );

	// Removes the themes post navigation.
	remove_action( 'csco_post_content_after', 'csco_post_pagination', 10 );
	remove_action( 'csco_post_after', 'csco_single_post_pagination', 10 );

	// Removes other features.
	remove_action( 'csco_post_content_before', 'csco_share_buttons_top' );
	remove_action( 'csco_post_content_after', 'csco_single_post_author', 30 );
	remove_action( 'csco_post_after', 'csco_single_subscribe', 20 );
	remove_action( 'csco_post_after', 'csco_single_post_carousel', 30 );
	remove_action( 'csco_post_end', 'csco_single_post_author' );

	// Adds the page header before the content.
	add_action( 'alnp_load_before_content', 'csco_alnp_page_header' );

	// Adds the compatible post navigation for Auto Load Next Post.
	add_action( 'csco_post_content_after', 'auto_load_next_post_navigation', 10 );
	remove_action( 'alnp_load_after_content', 'auto_load_next_post_navigation', 1, 10 );
}
add_action( 'after_setup_theme', 'csco_alnp_support' );

/**
 * Displays the page header.
 */
function csco_alnp_page_header() {
	// Get page header type: wide, large, simple, small or none.
	$type = csco_get_page_header_type();

	// Enable the line below for debugging purposes.
	//echo '<div style="width:100%; height:120px; background-color:#a9e613; color:#000; text-align:center; line-height: 120px; border-bottom: 2px solid #524D4D;"><p>Header type: ' . $type . '</p></div>';

	// Convert header type to "Simple" if "None".
	if ( 'none' == $type ) {
		$type = "simple";
	}

	// Convert header type to "Wide" if "Large".
	if ( 'large' == $type ) {
		$type = "wide";
	}

	csco_page_header( $type );
} // END csco_alnp_page_header()

/**
 * Add your custom code below this comment.
 */
