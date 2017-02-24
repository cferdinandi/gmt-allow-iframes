<?php

/**
 * Plugin Name: GMT Allow iFrames
 * Plugin URI: https://github.com/cferdinandi/gmt-allow-iframes/
 * GitHub Plugin URI: https://github.com/cferdinandi/gmt-allow-iframes/
 * Description: Prevent wp_kses from removing iframe embeds.
 * Version: 1.0.0
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * License: GPLv3
 */


function gmt_allow_iframes_filter( $allowedposttags ) {

	// Only change for users who can publish posts
	if ( !current_user_can( 'publish_posts' ) ) return $allowedposttags;

	// Allow iframes and the following attributes
	$allowedposttags['iframe'] = array(
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
	);

	return $allowedposttags;
}
add_filter( 'wp_kses_allowed_html', 'gmt_allow_iframes_filter' );