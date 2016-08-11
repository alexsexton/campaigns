<?php
//
// Content Block ### Left-Aligned Image and Caption
//
if( get_row_layout() == 'left_aligned_image') : ?>
    <div id="left-image-caption-p-<?php echo get_row_index(); ?>" class="left-image-caption">
        <div class="row">

          <?php $left_aligned_image = get_sub_field('image'); ?>

          <figure>
              <img src="<?php echo $left_aligned_image['url']; ?>" alt="<?php echo $left_aligned_image['alt']; ?>">
            <?php if( $left_aligned_image['caption'] ) : ?>
            <figcaption>
              <?php if( $left_aligned_image['title'] ) : ?>
                <h3><?php echo $left_aligned_image['title']; ?></h3>
              <?php endif; ?>
              <?php echo $left_aligned_image['caption']; ?>
            </figcaption>
            <?php endif; ?>
          </figure>

        </div>
  </div>
<?php endif; ?>
