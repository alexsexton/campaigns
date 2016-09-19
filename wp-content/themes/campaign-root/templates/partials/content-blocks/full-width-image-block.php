<?php
//
// Content Block ### Full-Width Image
//
if( get_row_layout() == 'full_width_image') : ?>
<div id="full-width-image-p-<?php echo get_row_index(); ?>" class="full-width-image">
    <div class="row">

      <?php $full_width_image = get_sub_field('image'); ?>
        <figure>
          <img src="<?php echo $full_width_image['url']; ?>" alt="<?php echo $full_width_image['alt']; ?>">
          <?php if ($full_width_image['title'] || $full_width_image['caption']) : ?>
          <figcaption>
              <?php if ($full_width_image['title']) {
              echo '<h2>' . $full_width_image['title'] . '</h2>';
              } ?>
              <?php if ($full_width_image['caption']) {
              echo '<p>' . $full_width_image['caption'] . '</p>';
              } ?>
          </figcaption>
          <?php endif; ?>
        </figure>
    </div>
</div>
<?php endif; ?>
