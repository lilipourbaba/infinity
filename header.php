<?php
$frontPageId      = get_option('page_on_front');
$accountPermalink = get_permalink(get_option('woocommerce_myaccount_page_id')) . 'orders';

$headField = get_field('acf_head_scripts', $frontPageId);
$bodyField = get_field('acf_top_body', $frontPageId);
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		var cyn_head_script = {
			url: "<?= admin_url('admin-ajax.php') ?>",
			nonce: "<?= wp_create_nonce('ajax-nonce') ?>",
			site_url: "<?= site_url() ?>"
		}
	</script>

	<?= isset($headField) ? $headField : ''; ?>
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?= isset($bodyField) ? $bodyField : ''; ?>

	<?php wp_body_open() ?>

	<header id="header">			

		<div class="container">
			<!-- Desktop -->
			<div id="header-desktop">
				<div class="logo">
					<?php the_custom_logo() ?>
				</div>

				<nav class="header-nav">
					<?php wp_nav_menu(['theme_location' => 'header']) ?>
				</nav>

				<div class="actions">
					<div class="header-search">
						<button class="btn" variant="default" id="open-header-search"><i class="iconsax" icon-name="search-normal-2"></i></button>
						<div class="header-search-group">
							<?php get_template_part('/templates/loop/search-form', null, []); ?>
						</div>
					</div>

					<a href="<?= wc_get_cart_url() ?>" class="btn" variant="default">
						<i class="iconsax" icon-name="shop"></i>
					</a>

					<a href="<?= $accountPermalink ?>" class="btn" variant="text-primary">
						<?= !is_user_logged_in() ? 'ورود یا ثبت نام' : 'حساب کاربری ' ?>
						<i class="iconsax" icon-name="login-2"></i>
					</a>
				</div>
			</div>
			<!-- Mobile -->
			<div id="header-mobile">

				
				<div class="actions">
					<button id="open-mobile-menu" class="btn" variant="default"><i class="iconsax" icon-name="hamburger-menu"></i></button>

					<div class="logo">
						<?php the_custom_logo() ?>
					</div>

					<a href="<?= wc_get_cart_url() ?>" class="btn" variant="default">
						<i class="iconsax" icon-name="shop"></i>
					</a>
				</div>
				
				<div class="clearfix s-4"></div>
				
				<div class="mobile-search">
					<?php get_template_part('/templates/loop/search-form', null, []); ?>
				</div>

				<!-- Menu Modal -->
				<div id="mobile-menu-modal" class="" data-action="close">
					<div class="modal-container">
						<div class="menu-head">
							<button class="btn close-modal" variant="default" data-action="close"><i class="iconsax" data-action="close" icon-name="x"></i></button>

							<div class="logo">
								<img src="<?= get_option("cyn_second_logo") ?>" alt="<?= get_option("blogname") ?>">
							</div>

							<a href="<?= $accountPermalink ?>" class="btn" variant="text-primary">
								<i class="iconsax" icon-name="login-2"></i>
							</a>
						</div>
						<div class="clearfix s-4"></div>

						<!-- <div class="mobile-search">
							<?php //get_template_part('/templates/loop/search-form', null, []); ?>
						</div> -->
						<div class="clearfix s-4"></div>

						<nav class="mobile-menu-nav">
							<?php wp_nav_menu(['theme_location' => 'header']) ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	<div class="sub-menu-back"></div>
	
	</header>