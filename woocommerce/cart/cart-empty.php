<?php

/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

$cartImg = get_stylesheet_directory_uri() . '/assets/img/shopping-cart.webp';
?>

<div class="clearfix s-16"></div>
<div class="cart-empty">
	<img src="<?= $cartImg ?>">

	<h2>سبد خرید شما خالی است!</h2>

	<a class="btn" variant="primary" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
		بازگشت به فروشگاه
	</a>
</div>
<div class="clearfix s-16"></div>