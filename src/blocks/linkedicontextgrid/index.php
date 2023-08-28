<?php
$classes = "block-linkedicontextgrid";

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
  <?php
  // Check rows existexists.
  if (have_rows('icon_text_grid_items')) :

    // Loop through rows.
    while (have_rows('icon_text_grid_items')) : the_row();

      // Load sub field value.
      $icon = get_sub_field('icon');
      $text = get_sub_field('text');
      $link = get_sub_field('link');

  ?>
      <a href="<?php echo esc_url($link['url']); ?>" target="_self" class="linkedicontextgrid-item" title="<?php esc_attr($link['title']); ?>">
        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
        <h4><?php echo esc_html($text); ?></h4>
      </a>
  <?php
    // End loop.
    endwhile;

  // No value.
  else :
  // Do something...
  endif;
  ?>

</div>