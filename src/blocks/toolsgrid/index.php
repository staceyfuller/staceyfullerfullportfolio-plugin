<?php
$classes = "block-toolsgrid container";

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
  $heading = get_field('heading');
  $tools = get_field('tools_section');
  $tech = get_field('tech_section');
  $cms = get_field('cms_section');
  ?>
  <h2><?php echo $heading; ?></h2>
  <?php if ($tools) : ?>
    <div class="toolsgrid__list-item">
      <h3><?php echo $tools['tools_heading']; ?></h3>
      <p><?php echo $tools['tools_list']; ?></p>
    </div>
  <?php endif; ?>
  <?php if ($tech) : ?>
    <div class="toolsgrid__list-item">
      <h3><?php echo $tech['tech_heading']; ?></h3>
      <p><?php echo $tech['tech_list']; ?></p>
    </div>
  <?php endif; ?>
  <?php if ($cms) : ?>
    <div class="toolsgrid__list-item">
      <h3><?php echo $cms['cms_heading']; ?></h3>
      <p><?php echo $cms['cms_list']; ?></p>
    </div>
  <?php endif; ?>
</div>