<?php
$classes = "block-ACFBLOCKNAME container";

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
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">


</section>