<?php
$searchQuery = get_search_query();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if (isset($_GET['section']) && $_GET['section'] == 'blog') {
  $section = "blog";
} elseif (isset($_GET['section']) && $_GET['section'] == 'product') {
  $section = "product";
} else {
  $section = "all";
}

$productQuery = new WP_Query(
  array(
    'post_type' => 'product',
    's' => $searchQuery,
    'paged' => $paged,
    'posts_per_page' => 24,
    'meta_key' => '_stock_status',
           'orderby' =>
        array(
            'meta_value' => 'ASC',
            'menu_order' => 'DSC'
        )
  )
);

$postQuery = new WP_Query(
  array(
    'post_type' => 'post',
    's' => $searchQuery,
    'paged' => $paged,
    'posts_per_page' => 24,
  )
);
?>

<?php get_header(); ?>

<main class="main-body" role="main">
  <div class="clearfix s-11"></div>
  <section class="search-page-head">
    <div class="container"
      style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/star-bg.webp' ?>);">
      <div class="f-row c-2">
        <div class="w-md-100">
          <h1 class="h1">لباس مد نظرت رو جستجو کن!</h1>
        </div>

        <div class="w-md-100">
          <?php get_template_part('/templates/loop/search-form', null, ['section' => "product"]); ?>
        </div>
      </div>
    </div>
  </section>
  <div class="clearfix s-11"></div>

  <?php if ($section != "blog"): ?>
    <section class="search-result container">
      <div class="title">
        <h2>نمایش جستجو در محصولات برای "<?= $searchQuery ?>"</h2>
      </div>
      <div class="clearfix s-8"></div>

      <div class="result-loop">
        <?php if ($productQuery->have_posts()): ?>
          <div class="product-loop f-row c-4 c-lg-2">
            <?php
            while ($productQuery->have_posts()):
              $productQuery->the_post();
              wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
            ?>
          </div>

          <div class="product-loop-sm">
            <?php
            while ($productQuery->have_posts()):
              $productQuery->the_post();
              wc_get_template_part('content', 'product-sm');
            endwhile;
            wp_reset_postdata();
            ?>
          </div>
          <div class="clearfix s-8"></div>

          <nav class='archive-pagination'>
            <?=
              paginate_links(
                array(
                  'total' => $productQuery->max_num_pages,
                  'add_args' => false,
                  'prev_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-right"></i>' : '<i class="iconsax" icon-name="arrow-left"></i>',
                  'next_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-left"></i>' : '<i class="iconsax" icon-name="arrow-right"></i>',
                  'type' => 'list',
                  'end_size' => 3,
                  'mid_size' => 3,
                )
              )
              ?>
          </nav>
        <?php else: ?>
          <h4 class="no-found">هیچ موردی یافت نشد.</h4>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>
    <div class="clearfix s-11"></div>
  <?php endif; ?>

  <?php if ($section != "product"): ?>
    <section class="search-result container">
      <div class="title">
        <h2>نمایش جستجو در مقالات برای "<?= $searchQuery ?>"</h2>
      </div>
      <div class="clearfix s-8"></div>

      <div class="result-loop">
        <?php if ($postQuery->have_posts()): ?>
          <div class="f-row c-4 c-lg-2">
            <?php
            while ($postQuery->have_posts()):
              $postQuery->the_post();
              get_template_part('/templates/loop/post-card', null, []);
            endwhile;
            ?>
          </div>
          <div class="clearfix s-8"></div>

          <nav class='archive-pagination'>
            <?=
              paginate_links(
                array(
                  'total' => $postQuery->max_num_pages,
                  'add_args' => false,
                  'prev_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-right"></i>' : '<i class="iconsax" icon-name="arrow-left"></i>',
                  'next_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-left"></i>' : '<i class="iconsax" icon-name="arrow-right"></i>',
                  'type' => 'list',
                  'end_size' => 3,
                  'mid_size' => 3,
                )
              )
              ?>
          </nav <?php else: ?> <h4 class="no-found">هیچ موردی یافت نشد.</h4>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>
    <div class="clearfix s-11"></div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>