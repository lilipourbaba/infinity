<?php

if (!class_exists('cyn_acf')) {
  class cyn_acf
  {
    function __construct()
    {
      add_filter('acf/settings/url', function ($url) {
        return ACF_URL;
      });
      add_filter('acf/settings/show_updates', '__return_false', 100);
      //add_filter('acf/settings/show_admin', '__return_false');

      $this->cyn_acf_actions();
    }

    public function cyn_acf_actions()
    {
      if (!function_exists('acf_add_local_field_group'))
        return;

      add_action('acf/init', [$this, 'cyn_front_page_acf']);
      add_action('acf/init', [$this, 'cyn_taxonomies_acf']);
      add_action('acf/init', [$this, 'cyn_blog_page_acf']);
      add_action('acf/init', [$this, 'cyn_posts_acf']);
      add_action('acf/init', [$this, 'cyn_about_us_acf']);
    }

    public function cyn_front_page_acf()
    {
      $homeHeadSlider = array();
      for ($i = 1; $i < 9; $i++) {
        $homeHeadSlider[] = array(
          'key' => 'field_99abcd010' . $i,
          'label' => 'اسلاید ' . $i,
          'name' => 'home-head-slider-' . $i,
          'type' => 'group',
          'layout' => 'block',
          'wrapper' => array(
            'width' => '25',
            'class' => '',
            'id' => '',
          ),
          'sub_fields' => array(
            array(
              'key' => 'field_99abcd0101' . $i,
              'label' => 'آدرس',
              'name' => 'slide_href',
              'aria-label' => '',
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'placeholder' => '',
            ),
            array(
              'key' => 'field_99abcd0102' . $i,
              'label' => 'تصویر دسکتاپ',
              'name' => 'slide_img',
              'aria-label' => '',
              'type' => 'image',
              'instructions' => 'ابعاد 2x1',
              'required' => 0,
              'conditional_logic' => 0,
              'return_format' => 'url',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
              'preview_size' => 'medium',
            ),
            array(
              'key' => 'field_99abcd0103' . $i,
              'label' => 'تصویر  موبایل ',
              'name' => 'slide_img_sm',
              'aria-label' => '',
              'type' => 'image',
              'instructions' => 'ابعاد 1x1',
              'required' => 0,
              'conditional_logic' => 0,
              'return_format' => 'url',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
              'preview_size' => 'medium',
            ),
          )
        );
      }

      acf_add_local_field_group(array(
        'key' => 'group_99abcd0000',
        'title' => 'برگه خانه',
        'fields' => array(
          // home head slider
          array(
            'key' => 'tab_99abcd0100',
            'label' => 'اسلایدر',
            'name' => '',
            'aria-label' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'placement' => 'top',
            'endpoint' => 1,
          ),
          array(
            'key' => 'group_99abcd0100',
            'label' => '',
            'name' => 'home-head-slider',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => $homeHeadSlider
          ),
          // home head cats
          array(
            'key' => 'tab_99abcd0200',
            'label' => 'دسته ها',
            'name' => '',
            'aria-label' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'placement' => 'top',
            'endpoint' => 0,
          ),
          array(
            'key' => 'group_99abcd0200',
            'label' => 'رنگبندی',
            'name' => 'home-head-cats-colors',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0201',
                'label' => 'متن',
                'name' => 'home-head-cats-colors-text',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => 'دنبال چه رنگی هستی؟',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_99abcd0202',
                'label' => 'دسته ها',
                'name' => 'home-head-cats-colors-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => $GLOBALS['cyn_colors_tax_name'],
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd0300',
            'label' => 'رده سنی',
            'name' => 'home-head-cats-ages',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0301',
                'label' => 'متن',
                'name' => 'home-head-cats-ages-text',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => 'دنبال لباس برای چه سنی هستی؟',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_99abcd0302',
                'label' => 'دسته ها',
                'name' => 'home-head-cats-ages-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => $GLOBALS['cyn_ages_tax_name'],
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd0400',
            'label' => 'دسته بندی های اصلی',
            'name' => 'home-head-product-cats',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0401',
                'label' => 'دسته ها',
                'name' => 'home-head-product-cats-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => $GLOBALS['wc_cats_tax_name'],
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd0500',
            'label' => 'پیشنهادات',
            'name' => 'home-head-product-offers',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0501',
                'label' => 'دسته ها',
                'name' => 'home-head-product-offers-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => $GLOBALS['cyn_offers_tax_name'],
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd0600',
            'label' => 'دسته بندی ها',
            'name' => 'home-product-cats',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0601',
                'label' => 'دسته ها',
                'name' => 'home-product-cats-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => $GLOBALS['wc_cats_tax_name'],
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd0700',
            'label' => 'دسته بندی مقالات',
            'name' => 'home-posts-cats',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd0701',
                'label' => 'دسته ها',
                'name' => 'home-posts-cats-taxes',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'taxonomy' => "category",
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(),
              ),
            ),
          ),
          array(
            'key' => 'field_99abcd0800',
            'label' => 'سوالات متداول',
            'name' => 'home_faq',
            'aria-label' => '',
            'type' => 'post_object',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'post_type' => array(
              0 => $GLOBALS['cyn_faq_post_name'],
            ),
            'post_status' => array(
              0 => 'publish',
            ),
            'taxonomy' => '',
            'return_format' => 'id',
            'multiple' => 1,
            'allow_null' => 0,
            'bidirectional' => 0,
            'ui' => 1,
            'bidirectional_target' => array(),
          ),
          // header and body scripts
          array(
            'key' => 'tab_99abcd0800',
            'label' => 'اسکریپت ها',
            'name' => '',
            'aria-label' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'placement' => 'top',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_99abcd0801',
            'label' => 'اسکریپت های head',
            'name' => 'acf_head_scripts',
            'aria-label' => '',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'default_value' => '',
            'maxlength' => '',
            'rows' => '',
            'placeholder' => '',
            'new_lines' => '',
          ),
          array(
            'key' => 'field_99abcd0802',
            'label' => 'اسکریپت های body',
            'name' => 'acf_top_body',
            'aria-label' => '',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'default_value' => '',
            'maxlength' => '',
            'rows' => '',
            'placeholder' => '',
            'new_lines' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'page_template',
              'operator' => '==',
              'value' => 'templates/front-page.php',
            ),
          ),
        )
      ));
    }

    public function cyn_taxonomies_acf()
    {
      acf_add_local_field_group(array(
        'key' => 'group_99abcd1000',
        'title' => 'cyn_colors_cat',
        'fields' => array(
          array(
            'key' => 'field_99abcd1000',
            'label' => 'تصویر',
            'name' => 'cat_image',
            'aria-label' => '',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'return_format' => 'url',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'preview_size' => 'medium',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'taxonomy',
              'operator' => '==',
              'value' => $GLOBALS['cyn_colors_tax_name'],
            ),
          ),
        )
      ));
    }

    public function cyn_blog_page_acf()
    {
      $blogHeadSlider = array();
      for ($i = 1; $i < 9; $i++) {
        $blogHeadSlider[] = array(
          'key' => 'field_99abcd310' . $i,
          'label' => 'اسلاید ' . $i,
          'name' => 'blog-head-slider-' . $i,
          'type' => 'group',
          'layout' => 'block',
          'wrapper' => array(
            'width' => '25',
            'class' => '',
            'id' => '',
          ),
          'sub_fields' => array(
            /*
            array(
              'key' => 'field_99abcd3101' . $i,
              'label' => 'تصویر',
              'name' => 'slide_img',
              'aria-label' => '',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'return_format' => 'url',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
              'preview_size' => 'medium',
            ),
            */
            array(
              'key' => 'field_99abcd3102' . $i,
              'label' => 'نوشته',
              'name' => 'slider_post',
              'aria-label' => '',
              'type' => 'post_object',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'post_type' => array(
                0 => 'post',
              ),
              'post_status' => array(
                0 => 'publish',
              ),
              'taxonomy' => '',
              'return_format' => 'id',
              'multiple' => 0,
              'allow_null' => 0,
              'bidirectional' => 0,
              'ui' => 1,
              'bidirectional_target' => array(),
            ),
          )
        );
      }

      acf_add_local_field_group(array(
        'key' => 'group_99abcd3000',
        'title' => 'برگه بلاگ',
        'fields' => array(
          array(
            'key' => 'group_99abcd3100',
            'label' => '',
            'name' => 'blog-head-slider',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => $blogHeadSlider
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'page_template',
              'operator' => '==',
              'value' => 'templates/blog.php',
            ),
          ),
        )
      ));
    }

    public function cyn_posts_acf()
    {
      acf_add_local_field_group(array(
        'key' => 'group_99abcd4000',
        'title' => 'مقالات مرتبط',
        'fields' => array(
          array(
            'key' => 'field_99abcd4010',
            'label' => 'مقالات مرتبط',
            'name' => 'related_posts',
            'aria-label' => '',
            'type' => 'post_object',
            'post_type' => array(
              0 => 'post',
            ),
            'post_status' => array(
              0 => 'publish',
            ),
            'taxonomy' => '',
            'return_format' => 'id',
            'multiple' => 1,
            'allow_null' => 0,
            'bidirectional' => 0,
            'ui' => 1,
            'bidirectional_target' => array(),
          ),
          array(
            'key' => 'field_99abcd4020',
            'label' => 'شاید بپسندید',
            'name' => 'liked_posts',
            'aria-label' => '',
            'type' => 'post_object',
            'post_type' => array(
              0 => 'post',
            ),
            'post_status' => array(
              0 => 'publish',
            ),
            'taxonomy' => '',
            'return_format' => 'id',
            'multiple' => 1,
            'allow_null' => 0,
            'bidirectional' => 0,
            'ui' => 1,
            'bidirectional_target' => array(),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'post',
            ),
          ),
        )
      ));
    }

    public function cyn_about_us_acf()
    {
      acf_add_local_field_group(array(
        'key' => 'group_99abcd5000',
        'title' => 'برگه درباره ما',
        'fields' => array(
          array(
            'key' => 'group_99abcd5100',
            'label' => 'درباره ما',
            'name' => 'about_us_about',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd5101',
                'label' => 'عنوان',
                'name' => 'about_us_about_title',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => 'با اینفینیتی آشنا شو!',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_99abcd5102',
                'label' => 'متن',
                'name' => 'about_us_about_context',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd5200',
            'label' => 'راهنمای خرید',
            'name' => 'about_us_guide',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd5201',
                'label' => 'عنوان',
                'name' => 'about_us_guide_title',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => 'راهنمای خرید',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_99abcd5202',
                'label' => 'متن',
                'name' => 'about_us_guide_context',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
              ),
              array(
                'key' => 'field_99abcd5203',
                'label' => 'تصویر',
                'name' => 'about_us_guide_image',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'return_format' => 'url',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'preview_size' => 'medium',
                'wrapper' => array(
                  'width' => '50',
                  'class' => '',
                  'id' => '',
                ),
              ),
              array(
                'key' => 'field_99abcd5204',
                'label' => 'آدرس',
                'name' => 'about_us_guide_url',
                'aria-label' => '',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'placeholder' => '',
                'wrapper' => array(
                  'width' => '50',
                  'class' => '',
                  'id' => '',
                ),
              ),
            ),
          ),
          array(
            'key' => 'group_99abcd5300',
            'label' => 'شرایط و مقررات',
            'name' => 'about_us_regulation',
            'aria-label' => '',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'block',
            'sub_fields' => array(
              array(
                'key' => 'field_99abcd5301',
                'label' => 'عنوان',
                'name' => 'about_us_regulation_title',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => 'شرایط و مقررات تعویض و مرجوع',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_99abcd5302',
                'label' => 'متن',
                'name' => 'about_us_regulation_context',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
              ),
              array(
                'key' => 'field_99abcd5303',
                'label' => 'تصویر',
                'name' => 'about_us_regulation_image',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'return_format' => 'url',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'preview_size' => 'medium',
                'wrapper' => array(
                  'width' => '50',
                  'class' => '',
                  'id' => '',
                ),
              ),
              array(
                'key' => 'field_99abcd5304',
                'label' => 'آدرس',
                'name' => 'about_us_regulation_url',
                'aria-label' => '',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'placeholder' => '',
                'wrapper' => array(
                  'width' => '50',
                  'class' => '',
                  'id' => '',
                ),
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'page_template',
              'operator' => '==',
              'value' => 'templates/about-us.php',
            ),
          ),
        )
      ));
    }
  }
}
