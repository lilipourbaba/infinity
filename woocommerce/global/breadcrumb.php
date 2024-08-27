<?php

/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (!defined('ABSPATH'))
	exit;


/**
 * $delimiter
 * $wrap_before
 * $wrap_after
 */

$wrap_before = '<nav class="breadcrumb" aria-label="Breadcrumb"> <div class="container">';
$wrap_after  = '</div> </nav>';
$delimiter   = '<i class="iconsax" icon-name="arrow-left"></i>';

if (!empty($breadcrumb)) {

	echo $wrap_before;

	foreach ($breadcrumb as $key => $crumb) {

		if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
			echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
		} else {
			echo '<a href="' . esc_url($crumb[1]) . '" class="current">' . esc_html($crumb[0]) . '</a>';
		}

		if (sizeof($breadcrumb) !== $key + 1) {
			echo $delimiter;
		}
	}

	echo $wrap_after;
}
