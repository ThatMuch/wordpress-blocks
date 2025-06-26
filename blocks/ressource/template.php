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
$post_id = $data->ID;
// get post slug from post id
$post_slug = get_post_field('post_name', $post_id);
// get post thumbnail
$post_img = get_the_post_thumbnail($post_id, 'full', array(
	'alt'   => $data->post_title,
));
// get post excerpt from post id
$post_excerpt = get_post_field('post_excerpt', $post_id);

?>

<section id="<?php echo esc_attr($id); ?>" class="TemplateSection">
	<div>
		<h3>Template</h3>
		<div class="divider"></div>
		<h2><?php echo esc_html($data->post_title);
			?></h2>
		<p><?php echo esc_html($post_excerpt);
			?></p>
		<a class="btn btn-dev" href="/ressources/templates/<?php echo $post_slug; ?>">
			Télécharger gratuitement
		</a>
	</div>
	<?php echo $post_img; ?>
</section>
