<?php
$classes = "block-portfoliolist container";

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
  <h1><?php echo get_field('portfolio_list_title'); ?></h1>


  <?php

  // Check rows existexists.
  if (have_rows('portfolio_list')) :

    // Loop through rows.
    while (have_rows('portfolio_list')) : the_row();

      $title = get_sub_field('title');
      $work_type = get_sub_field('work_type');
      $project_link = get_sub_field('project_link');
      $project_image = get_sub_field('project_image');
  ?>
      <div class="portfolio-list-item">
        <span class="details">
          <a href="<?php echo esc_url($project_link); ?>" title="<?php _e('View Project', 'sffullportfolio'); ?>">
            <h3><?php echo esc_attr($title); ?></h3>
          </a>
          <a href="<?php echo esc_url($project_link); ?>" title="<?php _e('View Project', 'sffullportfolio'); ?>">
            <p><?php echo esc_attr($work_type); ?></p>
          </a>
        </span>
        <a href="<?php echo esc_url($project_link); ?>" title="<?php _e('View Project', 'sffullportfolio'); ?>">
          <img src="<?php echo esc_url($project_image['url']); ?>" srcset="<?php echo wp_get_attachment_image_srcset($project_image['ID']); ?>" alt="<?php echo esc_attr($project_image['alt']); ?>" />
        </a>
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