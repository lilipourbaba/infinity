<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$productId = get_the_ID();
$relatedProducts = wc_get_related_products($productId, 16, array());
$relatedProductsArgs = array(
	'post_type' => 'product',
	'meta_query' => array(
		array(
			'key' => '_stock_status',
			'value' => 'instock'
		)
	),
	'posts_per_page' => 16,
	'post__in' => $relatedProducts
);
?>


<div id="product-<?= $productId ?>" class="single-product container">
	<h2 class="details-title">جزئیات محصول</h2>

	<section class="product-details f-row c-5 c-md-1">
		<article class="product-summary scope-3 w-md-100">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action('woocommerce_single_product_summary');
			?>
		</article>

		<div class="product-images scope-2 w-md-100">
			<?php
			$thumbnail_id = $product->get_image_id();
			$attachment_ids = $product->get_gallery_image_ids();
			array_unshift($attachment_ids, (int) $thumbnail_id);
			?>
			<div id="single-product-gallery" class="swiper">
				<div class="swiper-navigation">
					<div class="navigation prev">
						<button class="swiper-btn-prev btn" variant="default"><i class="iconsax"
								icon-name="chevron-right"></i></button>
					</div>

					<div class="navigation next">
						<button class="swiper-btn-next btn" variant="default"><i class="iconsax"
								icon-name="chevron-left"></i></button>
					</div>
				</div>

				<div class="swiper-wrapper">
					<?php foreach ($attachment_ids as $imgId): ?>
						<div class="swiper-slide">
							<img src="<?= wp_get_attachment_image_url($imgId, "full") ?>">
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div id="single-product-thumbs" class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ($attachment_ids as $imgId): ?>
						<div class="swiper-slide">
							<img class="thumb" src="<?= wp_get_attachment_image_url($imgId, "full") ?>">
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix s-11"></div>







	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>




	<section class="product-related">
		<?php
		get_template_part('/templates/loop/swiper-products', null, [
			'queryArgs' => $relatedProductsArgs,
			'parentClass' => "container",
			'navigation' => true,
			'title' => "شاید بپسندید",
			'bgDark' => false,
			'smPerPage' => 6
		]);
		?>
	</section>
	<div class="clearfix s-11"></div>
</div>
<div class="clearfix"></div>



<?php do_action('woocommerce_after_single_product'); ?>