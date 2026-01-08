<?php
/**
 * Enqueue scripts and styles
 */

// Enqueue frontend assets
function air_enqueue_styles() {
	wp_enqueue_style('air-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
	wp_enqueue_script('air-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'air_enqueue_styles');

// Enqueue editor assets
function air_enqueue_editor_assets() {
	wp_enqueue_style('air-editor-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action('enqueue_block_editor_assets', 'air_enqueue_editor_assets');
