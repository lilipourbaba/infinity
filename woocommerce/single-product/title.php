<?php

/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://woo.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

the_title('<h1 class="product_title entry-title">', '</h1>');


$metaSizes = json_decode(get_post_meta(get_the_ID(), "product_size_guide", true));
if (!isset($metaSizes))
	return;
if (!(is_array($metaSizes) && count($metaSizes) > 0))
	return;
?>

<button class="btn" variant="yellow" id="sizes-guide-open">
	<i class="iconsax" icon-name="info-circle"></i>
	راهنمای اندازه
</button>

<div id="sizes-guide-modal" class="" data-action="close-sizes">
	<div class="container">
		<div class="sizes-guide-header" data-action="close-sizes">
			<!-- <button class="btn" variant="yellow">مشاهده جدول</button> -->

			<button class="btn" variant="default" data-action="close-sizes">
				<i class="iconsax" icon-name="x"></i>
				بستن
			</button>
		</div>

		<div class="sizes-guide-container">
			<div class="sizes-guide-table">
				<table>
					<thead>
						<tr>
							<?php foreach ($metaSizes[0] as $theadSize) : ?>
								<th><?= $theadSize ?></th>
							<?php endforeach; ?>
						</tr>
					</thead>

					<tbody>
						<?php for ($i = 1; $i < count($metaSizes); $i++) : ?>
							<tr>
								<?php foreach ($metaSizes[$i] as $theadSize) : ?>
									<td><?= $theadSize ?></td>
								<?php endforeach; ?>
							</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>