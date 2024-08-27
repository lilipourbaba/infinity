<?php
if ($page = get_page_by_path('blog', OBJECT, 'page'))
  $page_id = $page->ID;
else
  $page_id = 0;

global $wp_query;

$thisTerm = get_term_by( "slug", $wp_query->get('category_name'), "category" );
?>

<?php get_header(); ?>

<main class="main-body" role="main">
  <?php
  get_template_part('/templates/blog/head-slider', null, ['page_id' => $page_id]);
  get_template_part('/templates/blog/head-search', null, []);
  ?>

  <section class="blog-term-section">
    <div class="container">
      <div class="title">
        <h2 class="h1"><?= $thisTerm->name ?></h2>
      </div>
      <div class="clearfix s-4"></div>

      <?php if ($wp_query->have_posts()) : ?>
        <article class="article-posts f-row c-3 c-lg-2">
          <?php
          while ($wp_query->have_posts()) :
            $wp_query->the_post();
            get_template_part('/templates/loop/post-card', null, []);
          endwhile;
          ?>
        </article>

        <nav class='archive-pagination'>
          <?=
          paginate_links(
            array(
              'total'     => $wp_query->max_num_pages,
              'add_args'  => false,
              'prev_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-right"></i>' : '<i class="iconsax" icon-name="arrow-left"></i>',
              'next_text' => is_rtl() ? '<i class="iconsax" icon-name="arrow-left"></i>' : '<i class="iconsax" icon-name="arrow-right"></i>',
              'type'      => 'list',
              'end_size'  => 3,
              'mid_size'  => 3,
            )
          )
          ?>
        </nav>
      <?php else : ?>
        <h3>نوشته ای وجود ندارد</h3>
      <?php endif; ?>
    </div>
  </section>
  <div class="clearfix s-11"></div>
</main>

<?php get_footer(); ?>