<?php /* Template Name: Front Page */ ?>

<?php get_header(); ?>

<main class="main-body"  role="main">
  <?php
  get_template_part('/templates/home/head-slider', null, []);
  get_template_part('/templates/home/head-cats', null, []);
  get_template_part('/templates/home/head-product-cat', null, []);
  get_template_part('/templates/home/offers-swipers', null, []);
  get_template_part('/templates/home/products-swipers', null, []);
  get_template_part('/templates/home/faq', null, []);
  get_template_part('/templates/home/posts-swipers', null, []);
  ?>
</main>

<?php get_footer(); ?>