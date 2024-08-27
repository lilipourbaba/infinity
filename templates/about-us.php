<?php /* Template Name: About us */ ?>

<?php
$post_id   = get_the_ID();
$imgHead   = get_stylesheet_directory_uri() . '/assets/img/about-us-head.webp';
$imgHeadSm = get_stylesheet_directory_uri() . '/assets/img/about-us-head-sm.webp';

$aboutGroup = get_field("about_us_about", $post_id);
$guideGroup = get_field("about_us_guide", $post_id);
$regulation = get_field("about_us_regulation", $post_id);
?>

<?php get_header(); ?>

<main class="main-body about-us" role="main">
  <div class="head-img" style="background-color: #E8DFD1;">
    <div class="container">
      <img class="md" src="<?= $imgHead ?>">
      <img class="sm" src="<?= $imgHeadSm ?>">
    </div>
  </div>
  <div class="clearfix s-11"></div>

  <?php if (isset($aboutGroup)) : ?>
    <section class="about container">
      <h1 class="h1"><?= isset($aboutGroup['about_us_about_title']) ? $aboutGroup['about_us_about_title'] : '' ?></h1>
      <div class="clearfix s-4"></div>

      <div class="context">
        <?= isset($aboutGroup['about_us_about_context']) ? $aboutGroup['about_us_about_context'] : '' ?>
      </div>
    </section>
    <div class="clearfix s-11"></div>
  <?php endif; ?>

  <?php if (isset($guideGroup)) : ?>
    <section class="guide container">
      <div class="f-row c-3 rev">
        <div class="context scope-2 w-md-100">
          <h2 class="h1"><?= isset($guideGroup['about_us_guide_title']) ? $guideGroup['about_us_guide_title'] : '' ?></h2>
          <div class="clearfix s-4"></div>

          <?= isset($guideGroup['about_us_guide_context']) ? $guideGroup['about_us_guide_context'] : '' ?>

          <?php if (isset($guideGroup['about_us_guide_url'])) : ?>
            <div class="clearfix s-4"></div>
            <div class="w-100">
              <a href="<?= $guideGroup['about_us_guide_url'] ?>" class="btn" variant="primary">راهنمای خرید</a>
            </div>
          <?php endif; ?>
        </div>

        <div class="scope-1 w-md-100">
          <img class="w-100" src="<?= isset($guideGroup['about_us_guide_image']) ? $guideGroup['about_us_guide_image'] : '' ?>">
        </div>
      </div>
    </section>
    <div class="clearfix s-11"></div>
  <?php endif; ?>

  <?php if (isset($regulation)) : ?>
    <section class="regulation container">
      <div class="f-row c-3">
        <div class="scope-1 w-md-100">
          <img class="w-100" src="<?= isset($regulation['about_us_regulation_image']) ? $regulation['about_us_regulation_image'] : '' ?>">
        </div>

        <div class="context scope-2 w-md-100">
          <h2 class="h1"><?= isset($regulation['about_us_regulation_title']) ? $regulation['about_us_regulation_title'] : '' ?></h2>
          <div class="clearfix s-4"></div>

          <?= isset($regulation['about_us_regulation_context']) ? $regulation['about_us_regulation_context'] : '' ?>

          <?php if (isset($regulation['about_us_regulation_url'])) : ?>
            <div class="clearfix s-4"></div>
            <div class="w-100">
              <a href="<?= $regulation['about_us_regulation_url'] ?>" class="btn" variant="primary">مطالعه کامل قوانین</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <div class="clearfix s-11"></div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>