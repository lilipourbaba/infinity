<?php
$cynProduct = new cyn_products();
$postTerms  = $cynProduct->cyn_getProductTerms(true, false, "category");
?>

<section class="blog-head-search">
  <div class="container">
    <div class="search-container" style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/star-bg.webp' ?>);">
      <div class="f-row c-2">
        <div class="w-md-100">
          <?php get_template_part('/templates/loop/search-form', null, ['section' => "blog"]); ?>
        </div>

        <div class="w-md-100">
          <select id="blog-head-term-select" class="form-select" id="x02">
            <option value="<?= site_url() . '/blog'; ?>" selected>دسته بندی ها</option>
            <?php foreach ($postTerms as $term) : ?>
              <option value="<?= $term['url'] ?>"><?= $term['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="clearfix s-11"></div>