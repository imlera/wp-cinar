<?php
/**
 * Enable theme features
 */
add_theme_support( 'root-relative-urls' );    // Enable relative URLs
add_theme_support( 'bootstrap-top-navbar' );  // Enable Bootstrap's top navbar
add_theme_support( 'bootstrap-gallery' );     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support( 'nice-search' );           // Enable /?s= to /search/ redirect
add_theme_support( 'jquery-cdn' );            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define( 'THEME', wp_get_theme() );
define( 'THEME_DOMAIN', THEME->get( 'TextDomain' ) );
define( 'THEME_VERSION', THEME->get( 'Version' ) );

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if ( ! isset( $content_width ) ) $content_width = 1300;