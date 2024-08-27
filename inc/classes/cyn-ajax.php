<?php

if (!class_exists('cyn_ajax')) {
  class cyn_ajax
  {
    function __construct()
    {
      add_action('wp_ajax_login_get_phone', [$this, 'cyn_login_get_phone']);
      add_action('wp_ajax_nopriv_login_get_phone', [$this, 'cyn_login_get_phone']);
      add_action('wp_ajax_cyn_login_get_otp', [$this, 'cyn_login_get_otp']);
      add_action('wp_ajax_nopriv_cyn_login_get_otp', [$this, 'cyn_login_get_otp']);
    }

    public function cyn_login_get_phone($data)
    {
      if (!wp_verify_nonce($_POST['_nonce'], 'ajax-nonce'))
        return wp_send_json_error(['verify_nonce' => false], 403);

      $cyn_sms = new cyn_sms();
      $prePass = constant('SECURE_AUTH_KEY');
      $alerts  = array();

      $data = $_POST['data'];

      if (!isset($data['phone']))
        return wp_send_json_error(['phone_exists' => false], 406);

      $tel     = (string)$data['phone'];
      $is_user = username_exists($tel);
      $user    = get_user_by('login', $tel);

      if ($is_user == false && $user == false) {
        $newUser = wp_create_user(
          $tel,
          $prePass . "-" . $tel
        );

        if (!is_wp_error($newUser)) {
          $newOtp = rand(1000, 9999);
          $currentTime = current_time('timestamp');

          update_user_option($newUser, 'show_admin_bar_front', false);
          if (isset($data['nickname']) && strlen($data['nickname']) > 0)
            wp_update_user(array('ID' => $newUser, 'display_name' => $data['nickname']));

          $addMeta = update_user_meta($newUser, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

          if ($addMeta != false) {
            $cyn_sms->cyn_send_verification(array($tel), $newOtp);
          } else {
            $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
          }
        } else {
          $alerts[] = 'مشکلی در ایجاد کاربر به وجود آمده. لطفا دوباره امتحان کنید.';
        }
      } else {
        $userID = $user->ID;
        $newOtp = rand(1000, 9999);
        $currentTime = current_time('timestamp');

        $addMeta = update_user_meta($userID, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

        if ($addMeta != false) {
          $cyn_sms->cyn_send_verification(array($tel), $newOtp);
        } else {
          $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
        }
      }

      if (count($alerts) > 0)
        return wp_send_json(['msgs' => $alerts], 500);

      return wp_send_json(['success' => true], 200);
    }

    public function cyn_login_get_otp($data)
    {
      if (!wp_verify_nonce($_POST['_nonce'], 'ajax-nonce'))
        return wp_send_json_error(['verify_nonce' => false], 403);

      $prePass = constant('SECURE_AUTH_KEY');
      $alerts  = array();

      $data = $_POST['data'];

      if (!isset($data['phone']))
        return wp_send_json_error(['phone_exists' => false], 406);

      $tel  = (string)$data['phone'];
      $otp  = (string)$data['otp_pass'];
      $user = get_user_by('login', $tel);

      if ($user != false) {
        $userID = $user->ID;
        $metaOtp = get_user_meta($userID, 'cyn_otp', true);
        $currentTime = current_time('timestamp');

        if ($otp == $metaOtp['otp'] && ($currentTime - $metaOtp['time']) < 300) {
          $signon = wp_signon(array(
            'user_login' => $tel,
            'user_password' => $prePass . "-" . $tel,
            'remember' => true
          ));

          if (is_wp_error($signon))
            $alerts[] = 'مشکلی در ورود به وجود آمده. لطفا دوباره امتحان کنید';
        } else {
          $alerts[] = 'رمز وارد شده صحیح نمیباشد یا زمان آن به اتمام رسیده';
        }
      } else {
        $alerts[] = 'کاربر مورد نظر پیدا نشد';
      }

      if (count($alerts) > 0)
        return wp_send_json(['msgs' => $alerts], 500);

      return wp_send_json(['success' => true, 'url' => get_permalink(get_option('woocommerce_myaccount_page_id'))], 200);
    }
  }
}
