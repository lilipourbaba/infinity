<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;
?>

<nav class="breadcrumb" aria-label="Breadcrumb">
	<div class="container">
		<a href="<?= site_url() ?>">خانه</a>
		<i class="iconsax" icon-name="arrow-left"></i>

		<a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" class="current">حساب کاربری</a>
	</div>
</nav>

<div class="container my-account">
	<div class="f-row c-4">
		<div class="myAccount-navigation scope-1 w-md-100">
			<?php
			/**
			 * My Account navigation.
			 *
			 * @since 2.6.0
			 */
			do_action('woocommerce_account_navigation');
			?>
		</div>

		<div class="myAccount-content scope-3 w-md-100">
			<?php
			/**
			 * My Account content.
			 *
			 * @since 2.6.0
			 */
			do_action('woocommerce_account_content');
			?>
		</div>
	</div>
</div>
<div class="clearfix s-11"></div>