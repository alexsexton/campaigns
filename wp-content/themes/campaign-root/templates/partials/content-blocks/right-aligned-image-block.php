<?php
//
// Content Block ### Right-Aligned Image and Caption
//
if( get_row_layout() == 'right_aligned_image') : ?>
    <div id="right-image-caption-p-<?php echo get_row_index(); ?>" class="right-image-caption <?php if( get_sub_field('image_size') != 'default') { the_sub_field('image_size'); } ?>">
        <div class="row">

          <?php $right_aligned_image = get_sub_field('image'); ?>

          <figure>
            <?php if( get_sub_field('image_url')): ?> <a href="<?php the_sub_field('image_url'); ?>"> <?php endif ?>
                <img src="<?php echo $right_aligned_image['url']; ?>" alt="<?php echo $right_aligned_image['alt']; ?>">
            <?php if( get_sub_field('image_url')): ?> </a> <?php endif ?>
            <?php if( $right_aligned_image['caption'] ) : ?>
            <figcaption>
              <?php if( $right_aligned_image['title'] ) : ?>
                <h3><?php if( get_sub_field('image_url')): ?> <a href="<?php the_sub_field('image_url'); ?>"> <?php endif ?><?php echo $right_aligned_image['title']; ?>
                <?php if( get_sub_field('image_url')): ?> </a> <?php endif ?></h3>
              <?php endif; ?>
              <p><?php echo $right_aligned_image['caption']; ?></p>
            </figcaption>
            <?php endif; ?>
          </figure>

    </div>
  </div>
<?php endif; ?>
