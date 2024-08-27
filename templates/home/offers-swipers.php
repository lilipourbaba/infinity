<?php
$cynProduct  = new cyn_products();
$frontPageId = get_option('page_on_front');
$offersGroup = get_field("home-head-product-offers", $frontPageId);

if (!isset($offersGroup["home-head-product-offers-taxes"]))
  return;
else
  $offersGroup = $offersGroup["home-head-product-offers-taxes"];

$counter = 0;
foreach ($offersGroup as $termId) :
  $term = $cynProduct->cyn_getProductTermAttr($termId);
  if (!isset($term))
    return;

  $queryArgs = array(
    'post_type' => 'product',
    'posts_per_page' => 16,
    'meta_query' => array(
      array(
        'key' => '_stock_status',
        'value' => 'instock'
      )
    ),
    'tax_query' => array(
      array(
        'taxonomy' => $GLOBALS['cyn_offers_tax_name'],
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
    'bgDark'      => $counter % 2 != 0,
    'smPerPage'   => 3,
    'before'      => $counter % 2 == 0 ? '<section class="home-products-swiper">' : '<section class="home-products-swiper dark">',
    'after'       => '</section> <div class="clearfix s-11"></div>'
  ]);

  $counter++;
endforeach;
