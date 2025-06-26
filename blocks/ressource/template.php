<?php

/**
 * Template for the Ressource Block
 */

// The $block variable is automatically passed to this template file
// when using 'render_template'.
$id = 'ressource-block-' . $block['id'];
if (! empty($block['anchor'])) {
	$id = $block['anchor'];
}

$data = get_field('template');
$post_img = get_field('template', false, false);
var_dump($data);
?>

<section id="<?php echo esc_attr($id); ?>" class="TemplateSection">
	<div>
		<h3>Template</h3>
		<div class="divider"></div>
		<h2><?php echo esc_html($data->post_title);
			?></h2>
		<p><?php echo esc_html($data->post_excerpt);
			?></p>
		<a class="btn btn-dev" href="/ressources/templates/<?php echo esc_url($data->post_name);
															?>">Télécharger gratuitement</a>
	</div>
	<?php echo get_the_post_thumbnail($post_img, 'full'); ?>
</section>
