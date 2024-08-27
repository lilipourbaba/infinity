<?php
if (isset($args['section']) && $args['section'] == 'blog') {
  $section = "blog";
} elseif (isset($args['section']) && $args['section'] == 'product') {
  $section = "product";
} else {
  $section = "all";
}

if ($section == "blog") {
  $placeholder = " در مقالات";
} elseif ($section == "product") {
  $placeholder = " در محصولات";
} else {
  $placeholder = "";
}
?>

<form class="input-group" action="<?= site_url() ?>" method="GET">
  <button type="submit" class="btn iconsax" icon-name="search-normal-2"></button>
  <input name="s" type="search" class="form-control" variant="search" placeholder="<?= 'جستجو' . $placeholder ?>" required>
  <input type="hidden" name="section" value="<?= $section ?>">
</form>