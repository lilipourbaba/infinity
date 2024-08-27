<?php /* Template Name: Contact us */ ?>

<?php
$post_id = get_the_ID();
$image   = get_stylesheet_directory_uri() . '/assets/img/contact-us.webp';
?>

<?php get_header(); ?>

<main class="main-body contact-us" role="main">
  <div class="clearfix s-8"></div>
  <section class="container">
    <div class="f-row c-2">
      <div class="content w-md-100">
        <div class="content-item">
          <div class="f-row c-2">
            <div>
              <h2>ارتباط با ما</h2>
              <div class="clearfix s-2"></div>

              <?php if (get_option("cyn_phone_number1")) : ?>
                <a href="tel:<?= get_option("cyn_phone_number1") ?>" dir="ltr"><?= get_option("cyn_phone_number1") ?></a>
              <?php endif; ?>
              <?php if (get_option("cyn_phone_number2")) : ?>
                <a href="tel:<?= get_option("cyn_phone_number2") ?>" dir="ltr"><?= get_option("cyn_phone_number2") ?></a>
              <?php endif; ?>
            </div>

            <div>
              <h2>شبکه‌های اجتماعی</h2>
              <div class="clearfix s-2"></div>

              <div class="media">
                <a href="<?php echo get_option("cyn_pinterest") ? get_option("cyn_pinterest") : "#"; ?>">
                  <img src="<?= get_stylesheet_directory_uri() . "/assets/img/pinterest-icon.svg" ?>">
                </a>

                <a href="<?php echo get_option("cyn_instagram") ? get_option("cyn_instagram") : "#"; ?>">
                  <img src="<?= get_stylesheet_directory_uri() . "/assets/img/instagram-icon.svg" ?>">
                </a>

                <a href="<?php echo get_option("cyn_whatsapp") ? get_option("cyn_whatsapp") : "#"; ?>">
                  <img src="<?= get_stylesheet_directory_uri() . "/assets/img/whatsapp-icon.svg" ?>">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix s-8"></div>

        <div class="content-item">
          <div class="f-row c-2">
            <div class="w-md-100">
              <h2>آدرس</h2>
              <div class="clearfix s-2"></div>

              <p><?= get_option("cyn_shop_address") ?></p>
            </div>

            <div class="w-md-100">
              <h2>پشتیبانی</h2>
              <div class="clearfix s-2"></div>

              <p><?= get_option("cyn_shop_support") ?></p>
            </div>
          </div>
        </div>
        <div class="clearfix s-8"></div>

        <div class="content-item">
          <div class="f-row c-auto">
            <div>
              <h2>آدرس روی نقشه</h2>
              <div class="clearfix s-2"></div>

              <?= get_option("cyn_shop_map") ?>
            </div>
          </div>
        </div>
      </div>

      <div class="w-md-100">
        <img class="w-100" src="<?= $image ?>">
      </div>
    </div>
  </section>
  <div class="clearfix s-8"></div>
</main>

<?php get_footer(); ?>