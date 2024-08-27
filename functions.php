<?php

/* Define Globals */
define('ACF_PATH', get_stylesheet_directory() . '/inc/acf/');
define('ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/');

$GLOBALS['wc_cats_tax_name']    = "product_cat";
$GLOBALS['cyn_offers_tax_name'] = "cyn_offers";
$GLOBALS['cyn_colors_tax_name'] = "cyn_colors";
$GLOBALS['cyn_ages_tax_name']   = "cyn_ages";
$GLOBALS['cyn_faq_post_name']   = "cyn_faq";


/* Required Files */
include_once(ACF_PATH . 'acf.php');
require_once(__DIR__ . '/inc/classes/cyn-theme-init.php');
require_once(__DIR__ . '/inc/classes/cyn-theme-register.php');
require_once(__DIR__ . '/inc/classes/cyn-acf.php');
require_once(__DIR__ . '/inc/classes/cyn-products.php');
require_once(__DIR__ . '/inc/classes/cyn-sms.php');
require_once(__DIR__ . '/inc/classes/cyn-ajax.php');
require_once (__DIR__ . '/inc/classes/cyn-query.php');

/* Initializing Classes */
new cyn_theme_init(false, '1.1.1');
new cyn_register();
new cyn_acf();
new cyn_products(true);
new cyn_ajax();

/* Update Checker */
require(__DIR__ . '/inc/plugin-update-checker/plugin-update-checker.php');

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
  'https://github.com/cyandm/infinity-kids.git',
  __FILE__,
  'infinity-kids'
);
$updateChecker->setBranch('main');
// $updateChecker->setAuthentication('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');
