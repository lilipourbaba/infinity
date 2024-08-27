<?php /* Template Name: Login */ ?>

<?php
$userLink = get_permalink(get_option('woocommerce_myaccount_page_id'));
if (is_user_logged_in()) {
  wp_redirect($userLink);
  exit();
}
?>

<?php get_header(); ?>

<main class="main-body login">
  <div class="clearfix s-11"></div>

  <div class="container">
    <div class="login-container">
      <div class="f-row c-2">
        <div class="r w-md-100">
          <div class="loader" id="login-form-loader" style="display: none;"></div>

          <form action="./" method="POST" class="login-form" id="login-get-phone">
            <div class="input-label">
              <label for="nickname">
                نام و نام‌خانوادگی:
                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="نام و نام‌خانوادگی" maxlength="64" />
              </label>
            </div>

            <div class="input-label">
              <label for="nickname">
                لطفا شماره همراه خود را وارد نمایید:
                <div class="input-group ltr">
                  <button class="btn">+98</button>
                  <input type="text" name="phone" class="form-control f-ltr" variant="search" pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" minlength="10" maxlength="10" placeholder="9xx-xxx-xxxx" required />
                </div>
              </label>
            </div>

            <div class="btns">
              <button type="submit" class="btn" variant="primary">دریافت کد تایید</button>
            </div>
          </form>

          <form action="./" method="POST" class="login-form" id="login-get-otp" style="display: none;">
            <div class="input-label">
              <label for="otp_pass">
                <span>لطفا کد ارسال شده را وارد کنید:</span>
                <input type="text" name="otp_pass" id="otp_pass" class="form-control" pattern="[0-9]{4}" placeholder="X-X-X-X" minlength="4" maxlength="4" required />
              </label>
            </div>

            <div class="btns">
              <button type="submit" class="btn" variant="primary">تایید</button>
            </div>
          </form>
        </div>

        <div class="l w-md-100">
          <img src="<?= get_stylesheet_directory_uri() . '/assets/img/login.webp' ?>">
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix s-11"></div>
</main>

<?php get_footer(); ?>