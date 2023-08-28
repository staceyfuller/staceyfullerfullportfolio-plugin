<?php
$classes = "block-formandtext container";

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
  $classes .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
  <div class="formandtext__content">
    <h2><?php echo esc_html(get_field('heading')); ?></h2>
    <?php echo wp_kses_post(get_field('text')); ?>
  </div>
  <div class="formandtext__form">
    <?php echo wp_kses_post(get_field('form_shortcode')); ?>
  </div>
</div>