<?php

if (!class_exists('cyn_products')) {
  class cyn_products
  {

    function __construct($actions = false)
    {
      if ($actions) {
        add_action('template_redirect', [$this, 'cyn_redirect_login_page']);

        add_action('pre_get_posts', [$this, 'cyn_archive_pre_get_posts']);
        add_filter('woocommerce_variation_is_active', [$this, 'cyn_variations_out_of_stock'], 10, 2);
        // add_filter('woocommerce_checkout_fields', [$this, 'cyn_checkout_fields']);
        // add_filter('woocommerce_default_address_fields', [$this, 'cyn_edit_address_fields']);
        // add_filter('woocommerce_billing_fields', [$this, 'cyn_edit_address_other_fields']);
        add_filter('woocommerce_account_menu_items', [$this, 'cyn_account_navigation']);
      }
    }

    /** product terms **/
    public function cyn_getProductTerms($parent0 = true, $onlyId = false, $taxonomy = "product_cat")
    {
      global $wpdb;
      $terms = [];

      if (is_int($parent0)) {
        $termsID = $wpdb->get_col("SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy='$taxonomy' AND parent='$parent0'");
      } elseif ($parent0 == true) {
        $termsID = $wpdb->get_col("SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy='$taxonomy' AND parent='0'");
      } else {
        $termsID = $wpdb->get_col("SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy='$taxonomy'");
      }

      foreach ($termsID as $tId) {
        if ($onlyId == true) {
          $terms[] = $tId;
        } else {
          $termAttr = $this->cyn_getProductTermAttr($tId);
          $terms[$termAttr['id']] = $termAttr;
        }
      }

      return $terms;
    }

    public function cyn_getProductTermAttr($termID)
    {
      global $wpdb;
      $termsAttr = array();
      $wpTerm    = get_term($termID);
      $termUrl   = get_term_link($wpTerm);
      $termMeta  = $wpdb->get_row("SELECT meta_value FROM $wpdb->termmeta WHERE term_id=$termID AND meta_key='thumbnail_id'");

      $termsAttr["id"]     = $termID;
      $termsAttr["name"]   = $wpTerm->name;
      $termsAttr["slug"]   = $wpTerm->slug;
      $termsAttr["parent"] = $wpTerm->parent;
      $termsAttr["count"]  = $wpTerm->count;
      $termsAttr["url"]    = $termUrl;

      if (isset($termMeta)) {
        $termAttach = wp_get_attachment_url($termMeta->meta_value);
        $termThumb = wp_get_attachment_image_url($termMeta->meta_value);

        $termsAttr["attachment"] = $termAttach;
        $termsAttr["thumbnail"] = $termThumb;
      }

      return $termsAttr;
    }


    /** archive product filter **/
    public function cyn_archive_pre_get_posts($query)
    {
      if ($query->is_archive && $query->is_main_query() && !is_admin() && !is_category()) {
        function filterNumbers($val)
        {
          return ((int)$val > 0);
        }

        $getCats   = isset($_GET['cats']) ? array_filter(explode(",", $_GET['cats']), "filterNumbers") : [];
        $getAges   = isset($_GET['ages']) ? array_filter(explode(",", $_GET['ages']), "filterNumbers") : [];
        $getColors = isset($_GET['colors']) ? array_filter(explode(",", $_GET['colors']), "filterNumbers") : [];

        $tax_query = array('relation' => "AND");

        if (count($getCats) > 0) {
          $tax_query[] = array(
            'taxonomy' => $GLOBALS['wc_cats_tax_name'],
            'field' => "term_id",
            'terms' => $getCats,
          );
        }

        if (count($getAges) > 0) {
          $tax_query[] = array(
            'taxonomy' => $GLOBALS['cyn_ages_tax_name'],
            'field' => "term_id",
            'terms' => $getAges,
          );
        }

        if (count($getColors) > 0) {
          $tax_query[] = array(
            'taxonomy' => $GLOBALS['cyn_colors_tax_name'],
            'field' => "term_id",
            'terms' => $getColors,
          );
        }

        $query->set('tax_query', $tax_query);
        $GLOBALS["archive_query"] = $query;
      }
    }

    /** single product disable not is in stock variation **/
    public function cyn_variations_out_of_stock($grey_out, $variation)
    {
      if (!$variation->is_in_stock())
        return false;

      return true;
    }

    /** custom checkout page form fields **/
    public function cyn_checkout_fields($fields)
    {
      unset($fields['billing']['billing_company']);
      // unset($fields['billing']['billing_country']);
      // unset($fields['billing']['billing_address_2']);

      $fields['billing']['billing_first_name']['priority'] = 1;
      $fields['billing']['billing_last_name']['priority'] = 2;
      $fields['billing']['billing_state']['priority'] = 3;
      $fields['billing']['billing_city']['priority'] = 4;
      $fields['billing']['billing_address_1']['priority'] = 5;
      $fields['billing']['billing_address_2']['priority'] = 6;

      $fields['billing']['billing_email']['priority'] = 7;
      $fields['billing']['billing_phone']['priority'] = 8;
      $fields['billing']['billing_postcode']['priority'] = 9;

      $fields['billing']['billing_country']['class'] = ['hidden'];
      $fields['billing']['billing_first_name']['class'] = [];
      $fields['billing']['billing_last_name']['class'] = [];
      $fields['billing']['billing_state']['class'] = [];
      $fields['billing']['billing_city']['class'] = [];
      $fields['billing']['billing_address_1']['class'] = ['w-100'];
      $fields['billing']['billing_address_2']['class'] = ['w-100'];

      $fields['billing']['billing_phone']['class'] = [];
      $fields['billing']['billing_email']['class'] = [];
      $fields['billing']['billing_postcode']['class'] = ['w-100'];

      $fields['billing']['billing_first_name']['input_class'] = ['form-control'];
      $fields['billing']['billing_last_name']['input_class'] = ['form-control'];
      $fields['billing']['billing_address_1']['input_class'] = ['form-control'];
      $fields['billing']['billing_postcode']['input_class'] = ['form-control'];
      $fields['billing']['billing_address_2']['input_class'] = ['form-control'];

      $fields['billing']['billing_phone']['input_class'] = ['form-control'];
      $fields['billing']['billing_email']['input_class'] = ['form-control'];
      $fields['order']['order_comments']['input_class'] = ['form-control'];

      $fields['billing']['billing_first_name']['placeholder'] = 'نام';
      $fields['billing']['billing_last_name']['placeholder'] = 'نام خانوادگی';
      $fields['billing']['billing_email']['placeholder'] = 'ایمیل';
      $fields['billing']['billing_phone']['placeholder'] = 'تلفن';
      $fields['billing']['billing_postcode']['placeholder'] = 'کد پستی';
      $fields['billing']['billing_address_1']['placeholder'] = 'آدرس دقیق';
      $fields['billing']['billing_address_2']['placeholder'] = 'پلاک منزل';

      $fields['billing']['billing_email']['required'] = false;
      $fields['billing']['billing_postcode']['required'] = true;

      return $fields;
    }

    /** custom edit address page fields **/
    // public function cyn_edit_address_fields($address)
    // {
    //   $address['company']['class'] = ['hidden'];
    //   $address['country']['class'] = ['hidden'];
    //   // $address['address_2']['class'] = ['hidden'];

    //   $address['first_name']['class'] = [];
    //   $address['last_name']['class'] = [];
    //   $address['state']['class'] = [];
    //   $address['city']['class'] = [];
    //   $address['address_1']['class'] = ['w-100'];
    //   $address['address_2']['class'] = ['w-100'];

    //   $address['postcode']['class'] = [];

    //   $address['first_name']['input_class'] = ['form-control'];
    //   $address['last_name']['input_class'] = ['form-control'];
    //   $address['address_1']['input_class'] = ['form-control'];
    //   $address['city']['input_class'] = ['form-control'];
    //   $address['state']['input_class'] = ['form-control'];
    //   $address['postcode']['input_class'] = ['form-control'];

    //   // $address['postcode']['required'] = false;

    //   return $address;
    // }

    /** custom edit address page phone and email fields **/
    public function cyn_edit_address_other_fields($fields)
    {
      $fields['billing_phone']['class'] = [];
      $fields['billing_email']['class'] = [];

      $fields['billing_phone']['input_class'] = ['form-control'];
      $fields['billing_email']['input_class'] = ['form-control'];

      // $fields['billing_email']['required'] = false;

      return $fields;
    }

    /** redirect my account page to login if not user logged in **/
    public function cyn_redirect_login_page()
    {
      if (get_the_ID() == get_option('woocommerce_myaccount_page_id')) {
        if (!is_user_logged_in()) {
          wp_redirect(site_url('login'));
          exit();
        }
      }
    }

    /** custom my account navigation items **/
    public function cyn_account_navigation($items)
    {
      return array(
        'edit-account'    => 'اطلاعات کاربری',
        'orders'          => 'سفارش‌ها',
        'edit-address'    => 'آدرس',
        'customer-logout' => 'خروج',
      );
    }
  }
}
