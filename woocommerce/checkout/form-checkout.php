<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>

<nav class="breadcrumb" aria-label="Breadcrumb">
	<div class="container">
		<a href="<?= site_url() ?>">خانه</a>
		<i class="iconsax" icon-name="arrow-left"></i>

		<a href="<?= wc_get_page_permalink('shop') ?>">فروشگاه</a>
		<i class="iconsax" icon-name="arrow-left"></i>

		<a href="<?= wc_get_cart_url() ?>" class="current">سبد خرید</a>
		<i class="iconsax" icon-name="arrow-left"></i>

		<a href="<?= wc_get_checkout_url() ?>" class="current">صفحه پرداخت</a>
	</div>
</nav>

<div class="clearfix s-2"></div>
<?php
do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}
?>

<div class="container">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

		<div class="f-row">
			<?php if ($checkout->get_checkout_fields()) : ?>
				<?php do_action('woocommerce_checkout_before_customer_details'); ?>

				<div class="w-md-100" id="customer_details">
					<div class="">
						<?php do_action('woocommerce_checkout_billing'); ?>
					</div>

					<div class="">
						<?php do_action('woocommerce_checkout_shipping'); ?>
					</div>
				</div>

				<?php do_action('woocommerce_checkout_after_customer_details'); ?>
			<?php endif; ?>

			<div class="order-review w-md-100">
				<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

				<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>
				<div class="clearfix s-6"></div>

				<?php do_action('woocommerce_checkout_before_order_review'); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>

				<?php do_action('woocommerce_checkout_after_order_review'); ?>
			</div>
		</div>
	</form>
</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
<div class="clearfix s-11"></div>