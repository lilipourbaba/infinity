<?php
$frontPageId = get_option('page_on_front');
$colorsGroup = get_field("home-head-cats-colors", $frontPageId);
$agesGroup   = get_field("home-head-cats-ages", $frontPageId);
?>

<div id="home-head-cats" class="" style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/star-bg.webp' ?>);">
  <?php if (is_array($colorsGroup["home-head-cats-colors-taxes"]) && count($colorsGroup) > 0) : ?>
    <div class="container">
      <h3 class="h2"><?= $colorsGroup["home-head-cats-colors-text"] ?></h3>
      <div class="home-head-cats-colors">
        <?php foreach ($colorsGroup["home-head-cats-colors-taxes"] as $colorCatId) : ?>
          <?php $term = get_term($colorCatId, $GLOBALS['cyn_colors_tax_name']); ?>
          <a href="<?= get_term_link($term, $GLOBALS['cyn_colors_tax_name']) ?>" title="<?= $term->name ?>">
            <img src="<?= get_field("cat_image", $GLOBALS['cyn_colors_tax_name'] . "_" . $colorCatId) ?>">
          </a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="clearfix s-0"></div>
  <?php endif; ?>

  <?php if (is_array($agesGroup["home-head-cats-ages-taxes"]) && count($agesGroup) > 0) : ?>
    <div class="container">
      <h3 class="h2"><?= $agesGroup["home-head-cats-ages-text"] ?></h3>
      <div class="home-head-cats-ages">
        <?php foreach ($agesGroup["home-head-cats-ages-taxes"] as $ageCatId) : ?>
          <?php $term = get_term($ageCatId, $GLOBALS['cyn_ages_tax_name']); ?>
          <a href="<?= get_term_link($term, $GLOBALS['cyn_ages_tax_name']) ?>" class="btn" variant="text-secondary">
            <?= $term->name ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div>

<div class="clearfix s-0"></div>