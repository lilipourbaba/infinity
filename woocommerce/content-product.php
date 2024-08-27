<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible())
	return;

$product_id = $product->get_id();
$product_name = $product->get_name();
$product_image = $product->get_image("full", ['class' => "product-img"]);
$product_permalink = get_the_permalink($product_id);

$product->is_type('variable') && $all_variations = $product->get_variation_attributes();
if (!$product->is_in_stock()) {
	$sale_price = "ناموجود";
} elseif ($product->is_on_sale()) {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_sale_price();
		$regular_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['sale_price']);
		$regular_price = min($product_prices['regular_price']);
	}
	$sale_price && $discount = round(($sale_price / $regular_price - 1) * -100);
} else {
	if ($product->is_type('simple')) {
		$sale_price = $product->get_regular_price();
	} elseif ($product->is_type('variable')) {
		$product_prices = $product->get_variation_prices();

		$sale_price = min($product_prices['regular_price']) ? min($product_prices['regular_price']) : "";
		// $sale_price = $product_prices['sale_price'];
	}
}

?>

<div class="product-card">
	<a href="<?= $product_permalink ?>">
		<?= $product_image ?>

		<div class="product-details">
			<?php if ($product->is_on_sale() && isset($discount)): ?>
				<div class="offer f-row c-auto">
					<h4><?php echo 'تخفیف ویژه ' . $discount . '%' ?></h4>
				</div>
			<?php endif; ?>

			<div class="title f-row c-2">
				<h4 class="name"><?= $product_name ?></h4>

				<div class="stock">
					<?php if ($product->is_in_stock()): ?>
						<?php if ($product->is_on_sale()): ?>
							<span class="regular-price">
								<?= wc_price($regular_price) ?>
							</span>
						<?php endif; ?>

						<span class="sale-price h3">
							<?php echo (wc_price($sale_price)) ?>
						</span>
					<?php else: ?>
						<span class="out-of-stock h3"><?= $sale_price ?></span>
					<?php endif; ?>
				</div>
			</div>

			<!-- <div class="show f-row c-auto">
				<button class="btn" variant="primary" title="<?= $product_name ?>">
					مشاهده محصول
				</button>
			</div> -->
		</div>
	</a>
</div>