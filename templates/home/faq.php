<?php
$frontPageId = get_option('page_on_front');
$faqField    = get_field("home_faq", $frontPageId);
$faqImage    = get_stylesheet_directory_uri() . "/assets/img/faq-home-img.webp";

if (!isset($faqField))
  return;
if (!is_array($faqField))
  return;
if (count($faqField) < 1)
  return;

$faqQuery = new WP_Query([
  'post_type' => $GLOBALS['cyn_faq_post_name']
]);

if (!$faqQuery->have_posts())
  return wp_reset_postdata();
?>

<section class="home-faq">
  <div class="container">
    <h3 class="h1">سوالات متداول</h3>
    <div class="clearfix s-6"></div>

    <div class="f-row c-3">
      <div class="content scope-2 w-md-100">
        <div class="context">
          <?php while ($faqQuery->have_posts()) : $faqQuery->the_post(); ?>
            <div class="faq-item">
              <div class="faq-title">
                <h4>
                  <span><?= get_the_title() ?></span>
                  <button class="btn" variant="default"><i class="iconsax" icon-name="chevron-left"></i></button>
                </h4>
              </div>

              <div class="faq-content">
                <?= the_content() ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

      <div class="img scope-1 w-md-100">
        <img src="<?= $faqImage ?>">
      </div>
    </div>
  </div>
</section>

<div class="clearfix s-16"></div>
<?php wp_reset_postdata(); ?>