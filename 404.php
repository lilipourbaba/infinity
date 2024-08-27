<?php get_header(); ?>

<main class="main-body" role="main">
  <div class="container">
    <div class="clearfix s-16"></div>
    <div class="not-found">
      <img src="<?= get_stylesheet_directory_uri() . '/assets/img/404.webp' ?>" alt="404">

      <a href="<?= site_url() ?>" class="btn" variant="primary">بازگشت به صفحه اصلی</a>
    </div>
    <div class="clearfix s-16"></div>
  </div>
</main>

<?php get_footer(); ?>