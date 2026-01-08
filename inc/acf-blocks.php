<?php
/**
 * ACF Blocks configuration
 */

// Register custom block category
function air_register_block_category($categories) {
	return array_merge(
		array(
			array(
				'slug'  => 'custom-blocks',
				'title' => __('Custom Blocks', 'airfleet'),
			),
		),
		$categories
	);
}
add_filter('block_categories_all', 'air_register_block_category', 10, 1);

// Register ACF blocks
function air_register_blocks() {
	if (function_exists('acf_register_block_type')) {
		acf_register_block_type(array(
			'name'              => 'text-and-image',
			'title'             => __('Text and Image'),
			'description'       => __('A custom block with text and image layout options'),
			'render_template'   => get_stylesheet_directory() . '/blocks/text-and-image/template.php',
			'category'          => 'custom-blocks',
			'icon'              => 'align-pull-left',
			'keywords'          => array('text', 'image', 'layout'),
			'mode'              => 'preview',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
			),
			'example'           => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'_is_preview' => true
					)
				)
			)
		));
	}
}
add_action('acf/init', 'air_register_blocks');

// Set ACF JSON save/load paths
function air_acf_json_save_point($path) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'air_acf_json_save_point');

function air_acf_json_load_point($paths) {
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}
add_filter('acf/settings/load_json', 'air_acf_json_load_point');
