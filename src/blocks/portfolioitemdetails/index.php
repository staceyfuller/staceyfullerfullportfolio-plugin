<?php
$classes = "block-portfolioitemdetails container";

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

$work_type = get_field('work_type');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
  <div class="portfolioitemdetails__worksource">
    <?php if ($work_type == "client") : ?>
      <h3 class="pi-detail-heading"><?php _e('Client', 'sffullportfolio'); ?></h3>
      <p class="pi-detail-content"><?php echo esc_html(get_field('client')); ?></p>
    <?php endif; ?>
    <?php if ($work_type == "employer") : ?>
      <h3 class="pi-detail-heading"><?php _e('Employer', 'sffullportfolio'); ?></h3>
      <p class="pi-detail-content"><?php echo esc_html(get_field('employer')); ?></p>
    <?php endif; ?>
  </div>
  <div class="portfolioitemdetails__skills">
    <h3 class="pi-detail-heading"><?php _e('Skills', 'sffullportfolio'); ?></h3>
    <p class="pi-detail-content"><?php echo wp_kses_post(get_field('skills_list')); ?></p>
  </div>
  <div class="portfolioitemdetails__project-description">
    <h1><?php echo esc_html(get_field('project_title')); ?></h1>
    <?php echo wp_kses_post(get_field('project_description')); ?>
  </div>
</div>