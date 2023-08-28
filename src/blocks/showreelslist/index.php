<?php
$classes = "block-showreelslist container";

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
  <h1><?php echo esc_html(get_field('showreels_title')); ?></h1>
  <?php

  // Check rows existexists.
  if (have_rows('list_of_showreels')) :

    // Loop through rows.
    while (have_rows('list_of_showreels')) : the_row();

      $showreel_title = get_sub_field('showreel_title');
      $showreel_desc = get_sub_field('showreel_description');
      $showreel_video = get_sub_field('video_embed_code');
      $showreel_video_code = get_sub_field('video_code');
  ?>
      <div class="showreel-list-item">
        <div class="video">
          <?php
          echo wp_kses_post($showreel_video_code); ?>
        </div>
        <div class="details">
          <h3><?php echo esc_html($showreel_title); ?></h3>
          <p><?php echo wp_kses_post($showreel_desc); ?></p>
        </div>
      </div>
  <?php

    // End loop.
    endwhile;

  // No value.
  else :
  // Do something...
  endif;
  ?>
</div>