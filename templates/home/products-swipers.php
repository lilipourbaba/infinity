<?php
$cynProduct  = new cyn_products();
$frontPageId = get_option('page_on_front');
$catsGroup   = get_field("home-product-cats", $frontPageId);

if (!isset($catsGroup["home-product-cats-taxes"]))
  return;
else
  $catsGroup = $catsGroup["home-product-cats-taxes"];


if (!is_array($catsGroup))
  return;

foreach ($catsGroup as $termId) :
  $term = $cynProduct->cyn_getProductTermAttr($termId);
  if (!isset($term))
    return;

  $queryArgs = array(
    'post_type' => 'product',
    'posts_per_page' =>16,
    'meta_query' => array(
        array(
            'key' => '_stock_status',
            'value' => 'instock'
        )
        ),
    'tax_query' => array(
      array(
        'taxonomy' => $GLOBALS['wc_cats_tax_name'],
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
    'before'      => '<section class="home-products-swiper">',
    'after'       => '</section> <div class="clearfix s-11"></div>'
  ]);
endforeach;
