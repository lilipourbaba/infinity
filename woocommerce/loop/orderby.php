<?php

/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH'))
	exit;

function setChecked($value)
{
	echo 'value="' . $value . '"';

	if (isset($_GET['orderby']) && $_GET['orderby'] == $value)
		return "checked";

	return '';
}

$orderList = array(
	'menu_order' => "پیش‌فرض",
	'popularity' => "محبوب‌ترین",
	'price'      => "ارزان‌ترین",
	'price-desc' => "گران‌ترین",
	'date'       => "جدیدترین"
);
?>

<div id="product-archive-ordering" class="ordering">
	<p>
		<i class="iconsax" icon-name="sort"></i>
		<b>ترتیب براساس:</b>
	</p>

	<div class="radio-group">
		<?php foreach ($orderList as $name => $label) : ?>
 			<div>
				<input type="radio" name="orderby" class="form-check" id="<?= $name ?>-radio" <?= setChecked($name) ?>>
				<label for="<?= $name ?>-radio"><?= $label ?></label>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<div class="clearfix s-6"></div>