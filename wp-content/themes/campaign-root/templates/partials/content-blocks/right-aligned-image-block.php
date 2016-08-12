<?php
//
// Content Block ### Right-Aligned Image and Caption
//
if( get_row_layout() == 'right_aligned_image') : ?>
    <div id="right-image-caption-p-<?php echo get_row_index(); ?>" class="right-image-caption">
        <div class="row">

          <?php $right_aligned_image = get_sub_field('image'); ?>

          <figure>
              <img src="<?php echo $right_aligned_image['url']; ?>" alt="<?php echo $right_aligned_image['alt']; ?>">
            <?php if( $right_aligned_image['caption'] ) : ?>
            <figcaption>
              <?php if( $right_aligned_image['title'] ) : ?>
                <h3><?php echo $right_aligned_image['title']; ?></h3>
              <?php endif; ?>
              <?php echo $right_aligned_image['caption']; ?>
            </figcaption>
            <?php endif; ?>
          </figure>

    </div>
  </div>
<?php endif; ?>
