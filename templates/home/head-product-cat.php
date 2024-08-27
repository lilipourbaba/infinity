<?php
$frontPageId = get_option('page_on_front');
$productCatsGroup = get_field("home-head-product-cats", $frontPageId);
$cynProduct = new cyn_products();
?>

<?php if (isset($productCatsGroup["home-head-product-cats-taxes"])) : ?>
  <?php $taxesId = $productCatsGroup["home-head-product-cats-taxes"]; ?>
  <div id="home-head-product-cats" class="container">
    <div>
      <?php foreach ($taxesId as $termId) : ?>
        <?php $term = $cynProduct->cyn_getProductTermAttr($termId); ?>

        <a href="<?= $term["url"] ?>">
          <img src="<?= $term["attachment"] ?>" alt="">
          <p class="h3"><?= $term["name"] ?></p>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="clearfix s-11"></div>
<?php endif; ?>