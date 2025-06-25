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

		// Register "My First Block"
		acf_register_block_type(array(
			'name'              => 'ressource-block', // Unique slug for the block
			'title'             => __('Ressource Block', 'my-custom-acf-blocks'), // Displayed title in editor
			'description'       => __('A simple custom block created with ACF.', 'my-custom-acf-blocks'), // Description in editor
			'render_template'   => plugin_dir_path(__FILE__) . 'blocks/ressource/template.php', // Path to the block's PHP template
			'category'          => 'common', // Category in the block inserter (e.g., 'common', 'formatting', 'layout', 'widgets', 'embed')
			'icon'              => 'admin-comments', // Dashicons slug or SVG markup
			'keywords'          => array('first', 'custom', 'block'), // Search keywords for the block inserter
			'mode'              => 'auto', // How the block editor handles the block. 'auto' (default), 'preview', 'edit'.
			'enqueue_style'     => plugin_dir_url(__FILE__) . 'blocks/ressource/style.css', // Enqueue block-specific stylesheet
			'enqueue_script'    => plugin_dir_url(__FILE__) . 'blocks/ressource/script.js', // Enqueue block-specific javascript
			'supports'          => array( // Gutenberg block features support
				'align'     => true, // Allow alignment options (wide, full, left, center, right)
				'mode'      => false, // Disable block editing mode toggle in editor
				//'jsx'       => true, // Enable JSX for inner block content. Requires ACF 6.0+
			),
		));

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
