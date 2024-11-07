<?php
/**
 * Enqueue scripts and stylesheets
 */

#[\JetBrains\PhpStorm\NoReturn] function roots_scripts(): void
{
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );

	wp_enqueue_script( THEME_DOMAIN . '-script', roots_get_script_uri( 'script.min.js' ), [ 'jquery' ] );
}

add_action( 'wp_enqueue_scripts', 'roots_scripts', 100 );

#[\JetBrains\PhpStorm\NoReturn] function roots_styles(): void {
	wp_enqueue_style( THEME_DOMAIN . '-style', get_stylesheet_uri(), [], THEME_VERSION );
	wp_style_add_data( THEME_DOMAIN . '-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' );

	wp_enqueue_style( THEME_DOMAIN . '-clear', roots_get_style_uri( 'styles.css' ) );
	wp_enqueue_style( THEME_DOMAIN . '-structure', roots_get_style_uri( 'structure.min.css' ) );
	wp_enqueue_style( THEME_DOMAIN . '-block', roots_get_style_uri( 'blocks.css' ) );
}

add_action( 'wp_enqueue_scripts', 'roots_styles', 100 );
