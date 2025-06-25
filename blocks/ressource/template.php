<?php

/**
 * Template for the Ressource Block
 */
$data = get_field('template');
$post_img = get_field('template', false, false);
var_dump($data); // For debugging purposes, remove in production
?>

<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">
	BLOCK
	<?php echo get_the_post_thumbnail($post_img, 'thumbnail'); ?>
</div>
