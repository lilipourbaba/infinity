<?php
$cynProduct = new cyn_products();
$blogPageId = isset($args['page_id']) ? $args['page_id'] : get_the_ID();
$blogSlider = get_field("blog-head-slider", $blogPageId);

if (!(isset($blogSlider) && is_array($blogSlider)))
  return;
?>

<section class="blog-head-slider">
  <div id="blog-head-slider" class="swiper container">
    <div class="swiper-wrapper">
      <?php foreach ($blogSlider as $slide) : ?>
        <?php if (isset($slide['slider_post']) && !empty($slide['slider_post'])) : ?>
          <?php
          $slidePostId = $slide['slider_post'];
          $postCategories = wp_get_post_categories($slidePostId);
          ?>

          <div class="swiper-slide">
            <div class="f-row c-2">
              <div class="slide-details w-md-100">
                <?php if (is_array($postCategories) && count($postCategories) > 0) : ?>
                  <?php $term = $cynProduct->cyn_getProductTermAttr($postCategories[0]); ?>

                  <div class="post-cat">
                    <a href="<?= $term['url'] ?>" class="btn">
                      <?= $term['name'] ?>
                      <i class="iconsax" icon-name="arrow-left"></i>
                    </a>
                  </div>
                <?php endif; ?>

                <h2 class="h1"><?= get_the_title($slidePostId) ?></h2>

                <p class="excerpt"><?= get_the_excerpt($slidePostId) ?></p>

                <div class="show-post">
                  <a href="<?= get_the_permalink($slidePostId) ?>" class="btn">
                    <i class="iconsax" icon-name="arrow-right"></i>
                    خواندن ادامه
                  </a>
                </div>
              </div>

              <div class="slide-img w-md-100">
                <img src="<?= get_the_post_thumbnail_url($slidePostId, "full") ?>" alt="<?= get_the_title($slidePostId) ?>">
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="swiper-pagination"></div>
  </div>
</section>

<div class="clearfix s-11"></div>
