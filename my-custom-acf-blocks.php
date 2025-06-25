<?php

/**
 * Plugin Name: My Custom ACF Blocks
 * Plugin URI:  https://yourwebsite.com/
 * Description: A plugin to register custom Gutenberg blocks using Advanced Custom Fields.
 * Version:     1.0.0
 * Author:      Your Name
 * Author URI:  https://yourwebsite.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-custom-acf-blocks
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register Custom ACF Blocks
 *
 * This function is hooked into 'acf/init' which ensures ACF PRO is loaded
 * before attempting to register any blocks.
 */
function my_custom_acf_blocks_register_blocks()
{

	// Check if function exists and ACF is active.
	// acf_register_block_type() is the primary function for registering blocks.
	if (function_exists('acf_register_block_type')) {

		// When using a block.json file, WordPress automatically registers the block.
		// ACF then extends this registration.
		// It's generally recommended to remove the acf_register_block_type() call
		// for blocks that have a block.json file, as block.json handles most properties
		// including asset enqueuing and render template.
		// If you need to add ACF-specific settings not covered by block.json,
		// you can still use acf_register_block_type() but be mindful of conflicts.
		// For asset enqueuing, block.json's 'style' property is preferred.
		//
		// The 'ressource-block' is defined via block.json, so this PHP registration
		// is redundant and potentially conflicting for asset loading.
		//
		// acf_register_block_type(array(
		// 	'name'              => 'ressource-block',
		// 	'title'             => __('Ressource Block', 'my-custom-acf-blocks'),
		// 	'description'       => __('A simple custom block created with ACF.', 'my-custom-acf-blocks'),
		// 	'render_template'   => plugin_dir_path(__FILE__) . 'blocks/ressource/template.php',
		// 	'category'          => 'common',
		// 	'icon'              => 'admin-comments',
		// 	'keywords'          => array('first', 'custom', 'block'),
		// 	'mode'              => 'auto',
		// 	'enqueue_style'     => plugin_dir_url(__FILE__) . 'blocks/ressource/style.css',
		// 	'enqueue_script'    => plugin_dir_url(__FILE__) . 'blocks/ressource/script.js',
		// 	'supports'          => array(
		// 		'align'     => true,
		// 		'mode'      => false,
		// 	),
		// ));

		// Add more blocks here by calling acf_register_block_type() again for each.
		// Example for a second block:
		/*
        acf_register_block_type( array(
            'name'              => 'my-second-block',
            'title'             => __( 'My Second Custom Block', 'my-custom-acf-blocks' ),
            'description'       => __( 'Another example block.', 'my-custom-acf-blocks' ),
            'render_template'   => plugin_dir_path( __FILE__ ) . 'blocks/my-second-block/my-second-block.php',
            'category'          => 'common',
            'icon'              => 'star-filled',
            'keywords'          => array( 'second', 'example' ),
        ) );
        */
	}
}
add_action('acf/init', 'my_custom_acf_blocks_register_blocks');

// Optional: Add an admin notice if ACF PRO is not active
function my_custom_acf_blocks_admin_notice()
{
	if (! function_exists('acf_pro_get_path')) {
?>
		<div class="notice notice-error is-dismissible">
			<p><?php _e('My Custom ACF Blocks requires Advanced Custom Fields PRO to be installed and active.', 'my-custom-acf-blocks'); ?></p>
		</div>
<?php
	}
}
add_action('admin_notices', 'my_custom_acf_blocks_admin_notice');
