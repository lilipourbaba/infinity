<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $wp_query;
get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>

<div class="archive-product container">
	<div class="f-row c-4">
		<div class="archive-sidebar scope-1 w-md-100" data-action="close">
			<?php get_template_part('/woocommerce/archive', 'product-sidebar', []); ?>
		</div>

		<div class="archive-loop scope-3 w-md-100">
			<h1 class="archive-title"><?php woocommerce_page_title(); ?></h1>
			<div class="clearfix s-6"></div>

			<button id="mobile-show-sidebar" class="btn w-100" variant="text-secondary">
				<i class="iconsax" icon-name="filter-add"></i>
				نمایش فیلترها
			</button>

			<?php
			if (woocommerce_product_loop()) {
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');

				if (wc_get_loop_prop('total')) : ?>
					<article class="article-loop f-row c-3 c-lg-2">
						<?php
						while (have_posts()) :
							the_post();
							wc_get_template_part('content', 'product');
						endwhile;
						?>
					</article>

					<article class="article-loop-sm">
						<?php
						while (have_posts()) :
							the_post();
							wc_get_template_part('content', 'product-sm');
						endwhile;
						?>
					</article>
			<?php endif;

				echo '<div class="clearfix s-6"></div>';

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			}
			?>
		</div>
	</div>

	<?php if (!$wp_query->is_paged() && is_archive() && !empty(term_description())) : ?>
		<div class="clearfix s-8"></div>
		<div class="archive-description">
			<div id="term-description" class="">
				<div class="term-description-content">
					<?php echo term_description(); ?>
				</div>
			</div>
			<div class="clearfix s-0"></div>

			<div class="f-row">
				<button id="term-description-opener" class="btn" variant="default">
					نمایش بیشتر
				</button>
			</div>
		</div>
	<?php endif; ?>
</div>
<div class="clearfix s-6"></div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
