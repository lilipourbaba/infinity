<?php
$post_id = get_the_ID();
$post_permalink = get_the_permalink($post_id);
?>

<div class="post-card">
  <a href="<?= $post_permalink ?>">
    <img src="<?= get_the_post_thumbnail_url($post_id, "full") ?>" alt="<?= get_the_title($post_id) ?>">
    <h3 class="title"><?= get_the_title($post_id) ?></h3>
    <button class="btn" variant="text-secondary"><i class="iconsax" icon-name="arrow-right"></i></button>
  </a>
</div>
