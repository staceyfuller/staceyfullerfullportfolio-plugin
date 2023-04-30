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

/** *
 * Load Custom Blocks
 * Registers block types including their render callback function
 */
function create_block_sffullportfolio_blocks_plugin_block_init()
{


	# Register ACF6 Blocks
	register_block_type(__DIR__ . '/src/blocks/wrapper');
	// register_block_type(__DIR__ . '/src/blocks/iconverticalstackrow', array('icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.cls-1{stroke-width:.8px;}.cls-1,.cls-2{fill:none;stroke:#000;stroke-miterlimit:10;}.cls-2{stroke-width:.48px;}</style></defs><line class="cls-1" x1="12.74" y1="12.48" x2="23.13" y2="12.48"/><rect x="15.3" y="4.96" width="5.28" height="5.28"/><line class="cls-2" x1="12.74" y1="14.98" x2="23.13" y2="14.98"/><line class="cls-2" x1="12.74" y1="18.98" x2="23.13" y2="18.98"/><line class="cls-2" x1="12.74" y1="17.11" x2="23.13" y2="17.11"/><line class="cls-1" x1=".87" y1="12.54" x2="11.26" y2="12.54"/><rect x="3.43" y="5.02" width="5.28" height="5.28"/><line class="cls-2" x1=".87" y1="15.04" x2="11.26" y2="15.04"/><line class="cls-2" x1=".87" y1="19.04" x2="11.26" y2="19.04"/><line class="cls-2" x1=".87" y1="17.16" x2="11.26" y2="17.16"/></svg>'));

}
add_action('init', 'create_block_sffullportfolio_blocks_plugin_block_init');

add_filter('should_load_separate_core_block_assets', '__return_true');


// enqueue the index.js in editor only to stop getting the "block is already registered" message in console.
function sffullportfolio_enqueue_blocks_scripts()
{
	$asset_file = require plugin_dir_path(__FILE__) . 'build/index.asset.php';
	wp_enqueue_script('sffullportfolio-blocks-js', plugins_url('/build/index.js', __FILE__), $asset_file['dependencies'], 1.0, false);
}
add_action('enqueue_block_editor_assets', 'sffullportfolio_enqueue_blocks_scripts');



/*
STYLES
*/
// Register/load styles front and back end
function sffullportfolio_register_and_enqueue_block_styles()
{

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
add_action('enqueue_block_assets', 'sffullportfolio_register_and_enqueue_block_styles');
