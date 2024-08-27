<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<main class="main-body blog" role="main">
  <?php
  get_template_part('/templates/blog/head-slider', null, []);
  get_template_part('/templates/blog/head-search', null, []);
  get_template_part('/templates/blog/terms-posts', null, []);
  ?>
</main>

<?php get_footer(); ?>