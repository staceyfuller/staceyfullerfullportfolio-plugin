<?php

/**
 * Plugin Name:       SF Plugin
 * Description:       Custom plugin for SF Full Portfolio functionality.
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Version:           1.0.0
 * Author: Stacey Fuller
 * Author URI: https://www.staceyfuller.com.au
 * Text Domain:       sffullportfolio-plugin
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */

// define('SFFULLPORTFOLIO_PLUGIN_DIR', plugin_dir_path(__FILE__));
// define('SFFULLPORTFOLIO_PLUGIN_URL', plugin_dir_url(__FILE__));
// define('PLUGIN_FOLDER_NAME', basename(SFFULLPORTFOLIO_PLUGIN_DIR));

/**
 * Custom Block Categories
 */
add_filter('block_categories_all', function ($categories) {

	// Adding a new category.
	$categories[] = array(
		'slug'  => 'custom-blocks',
		'title' => 'Custom Blocks'
	);

	return $categories;
});

/** *
 * Load Custom Blocks
 * Registers block types including their render callback function
 */
function create_block_sffullportfolio_blocks_plugin_block_init()
{


	# Register ACF6 Blocks
	register_block_type(__DIR__ . '/src/blocks/linkedicontextgrid');
	register_block_type(__DIR__ . '/src/blocks/toolsgrid');
	register_block_type(__DIR__ . '/src/blocks/formandtext');
	register_block_type(__DIR__ . '/src/blocks/portfoliolist');
	register_block_type(__DIR__ . '/src/blocks/portfolioitemdetails');
	register_block_type(__DIR__ . '/src/blocks/twotextcolumns3070');
	register_block_type(__DIR__ . '/src/blocks/showreelslist');
}
add_action('init', 'create_block_sffullportfolio_blocks_plugin_block_init');

add_filter('should_load_separate_core_block_assets', '__return_true');


// enqueue the index.js in editor only to stop getting the "block is already registered" message in console.
//Register/load styles front and back end
function sffullportfolio_enqueue_blocks_scripts()
{
	$asset_file = require plugin_dir_path(__FILE__) . 'build/index.asset.php';
	wp_enqueue_script('sffullportfolio-blocks-js', plugins_url('/build/index.js', __FILE__), $asset_file['dependencies'], 1.0, false);


	// styles
	$styleIndexPath = '/build/style-index.css';
	wp_register_style(
		'style-index',
		plugins_url($styleIndexPath, __FILE__),
		array(),
		filemtime(plugin_dir_path(__FILE__) . $styleIndexPath),
		'all'
	); // filetime used for cache busting
}
add_action('enqueue_block_assets', 'sffullportfolio_enqueue_blocks_scripts');


// add iframe to wp_kses_post
function sffullportfolio_add_iframe_to_kses_post($allowedposttags)
{
	$allowedposttags['iframe'] = array(
		'src'             => true,
		'height'          => true,
		'width'           => true,
		'frameborder'     => true,
		'allowfullscreen' => true,
		"allow"			  => true,
		"style"		  	  => true
	);
	return $allowedposttags;
}
add_filter('wp_kses_allowed_html', 'sffullportfolio_add_iframe_to_kses_post', 10, 2);
