<?php

/**
 * Template for the Ressource Block
 */
$data = get_field('template');
var_dump($data); // For debugging purposes, remove in production
?>

<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">
	BLOCK
</div>
