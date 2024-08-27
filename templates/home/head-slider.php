<?php
$frontPageId = get_option('page_on_front');
$sliderGroup = get_field("home-head-slider", $frontPageId);
?>

<div id="home-head-slider" class="swiper">
  <div class="swiper-wrapper">
    <?php foreach ($sliderGroup as $slider => $slide) : ?>
      <?php if (!empty($slide["slide_img"])) : ?>
        <div class="swiper-slide">
          <a href="<?= !empty($slide["slide_href"]) ? $slide["slide_href"] : '#' ?>" rel="nofollow">
            <img src="<?= $slide["slide_img"] ?>" class="img-xl">
            <img src="<?= $slide["slide_img_sm"] ?>" class="img-sm">
          </a>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<div class="clearfix s-0"></div>