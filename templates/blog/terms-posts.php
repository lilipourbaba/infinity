<?php
$cynProduct = new cyn_products();
$postTerms  = $cynProduct->cyn_getProductTerms(true, false, "category");
?>

<?php foreach ($postTerms as $term) : ?>
  <?php if ($term['count'] > 0) : ?>
    <?php
    $articleQuery = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'tax_query' => array(
        array(
          'taxonomy' => "category",
          'field' => "slug",
          'terms' => $term['slug'],
        )
      )
    ));

    if ($articleQuery->have_posts()) :
    ?>
      <section class="blog-term-section">
        <div class="container">
          <div class="title">
            <h2 class="h1"><a href="<?= $term['url'] ?>"><?= $term['name'] ?></a></h2>
          </div>
          <div class="clearfix s-4"></div>

          <article class="article-posts f-row c-3 c-lg-2">
            <?php
            while ($articleQuery->have_posts()) :
              $articleQuery->the_post();
              get_template_part('/templates/loop/post-card', null, []);
            endwhile;
            ?>
          </article>
        </div>
      </section>
      <div class="clearfix s-11"></div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
<?php endforeach; ?>