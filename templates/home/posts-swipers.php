<?php
$cynProduct  = new cyn_products();
$frontPageId = get_option('page_on_front');
$catsGroup   = get_field("home-posts-cats", $frontPageId);

if (!isset($catsGroup["home-posts-cats-taxes"]))
  return;
else
  $catsGroup = $catsGroup["home-posts-cats-taxes"];


if (!is_array($catsGroup))
  return;

foreach ($catsGroup as $termId) :
  $term = $cynProduct->cyn_getProductTermAttr($termId);
  if (!isset($term))
    return;

  $queryArgs = array(
    'post_type' => 'post',
    'posts_per_page' => 16,
    'tax_query' => array(
      array(
        'taxonomy' => "category",
        'field' => "slug",
        'terms' => $term['slug'],
      )
    )
  );

  get_template_part('/templates/loop/swiper-products', null, [
    'queryArgs'   => $queryArgs,
    'parentClass' => "container",
    'navigation'  => true,
    'title'       => $term['name'],
    'showAll'     => $term['url'],
    'bgDark'      => false,
    'smPerPage'   => 3,
    'before'      => '<section class="">',
    'after'       => '</section> <div class="clearfix s-11"></div>',
    'blog'        => true
  ]);
endforeach;