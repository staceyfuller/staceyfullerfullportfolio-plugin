<?php
$classes = "block-twotextcolumns3070 container";

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
  <div class="small-column-text">
    <?php echo esc_html(get_field('small_column_text')); ?>
  </div>
  <div class="large-column-text">
    <?php echo wp_kses_post(get_field('large_column_text')); ?>
  </div>
</div>