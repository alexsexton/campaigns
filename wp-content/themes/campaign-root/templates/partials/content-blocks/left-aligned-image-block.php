<?php
//
// Content Block ### Left-Aligned Image and Caption
//
if( get_row_layout() == 'left_aligned_image') : ?>
    <div id="left-image-caption-p-<?php echo get_row_index(); ?>" class="left-image-caption <?php if( get_sub_field('image_size') != 'default') { the_sub_field('image_size'); } ?>">
        <div class="row">

          <?php $left_aligned_image = get_sub_field('image'); ?>


          <figure>
            <?php if( get_sub_field('image_url')): ?> <a href="<?php the_sub_field('image_url'); ?>"> <?php endif ?>
              <img src="<?php echo $left_aligned_image['url']; ?>" alt="<?php echo $left_aligned_image['alt']; ?>">
            <?php if( get_sub_field('image_url')): ?> </a> <?php endif ?>
            <?php if( $left_aligned_image['caption'] ) : ?>
            <figcaption>
              <?php if( $left_aligned_image['title'] ) : ?>
                <h3><?php if( get_sub_field('image_url')): ?><a href="<?php the_sub_field('image_url'); ?>"> <?php endif ?> <?php echo $left_aligned_image['title']; ?> <?php if( get_sub_field('image_url') != 'null'): ?> </a> <?php endif ?></h3>
              <?php endif; ?>
              <p><?php echo $left_aligned_image['caption']; ?></p>
            </figcaption>
            <?php endif; ?>
          </figure>


        </div>
  </div>
<?php endif; ?>
