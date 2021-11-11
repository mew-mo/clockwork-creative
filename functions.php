<?php

// theme supports
// =========================================
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');
add_theme_support('post-formats', array('video'));

// excerpt length
// =========================================
function new_excerpt_length() {
  return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// importing stylesheet
// =========================================
function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_stylesheet');

// setting up / registering main nav
// =========================================
register_nav_menus(['primary' => 'Primary Navigation']);


// setting up work posttype
// =========================================
function create_work_post() {
  $args = array(
    'labels' => array(
      'name' => 'Our Work',
      'singular_name' => 'Work'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => array('title', 'editor', 'thumbnail', 'video'),
    'menu-position' => 20
  );
  register_post_type('work', $args);
}

add_action('init', 'create_work_post');

// // Post Type Support - Adding Videos to "Work" Posttype
// // ========
add_post_type_support('work', 'post-formats');


// setting up services posttype
// =========================================
function create_service_post() {
  $args = array(
    'labels' => array(
      'name' => 'Services',
      'singular_name' => 'Service'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-index-card',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu-position' => 20
  );
  register_post_type('services', $args);
}

add_action('init', 'create_service_post');


// making navbar content editable - nav section
// =========================================
function nav_content_customize($wp_customize) {
  $wp_customize->add_section('nav_section', array(
    'title' => 'Navbar Content', 'custom_setting',
    'priority' => 0
  ));

  // // Logo Image
  // // ========

  $wp_customize->add_setting('custom_logo', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
    'label' => 'Upload a logo image',
    'section' => 'nav_section',
    'settings' => 'custom_logo',
    'priority' => 0
  )));

  // // Background colour
  // // ========
  $wp_customize->add_setting('navbg_colorpicker', array(
    'default' => '#f7f7f6'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'navbg_colorpicker', array(
      'label' => 'Nav Background Colour',
      'section' => 'nav_section',
      'settings' => 'navbg_colorpicker',
      'priority' => 10
    )
  ));

  // // Link colour
  // // ========
  $wp_customize->add_setting('navlink_colorpicker', array(
    'default' => '#212121'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'navlink_colorpicker', array(
      'label' => 'Nav Link Colour',
      'section' => 'nav_section',
      'settings' => 'navlink_colorpicker',
      'priority' => 20
    )
  ));

  // // Link hover colour
  // // ========
  $wp_customize->add_setting('navlink_hov_colorpicker', array(
    'default' => '#EE4E24'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'navlink_hov_colorpicker', array(
      'label' => 'Nav Link Hover Colour',
      'section' => 'nav_section',
      'settings' => 'navlink_hov_colorpicker',
      'priority' => 30
    )
  ));

} //end funct

add_action('customize_register', 'nav_content_customize');

function nav_css() {
  $nav_bg_color = get_theme_mod('navbg_colorpicker');
  $navlink_color = get_theme_mod('navlink_colorpicker');
  $navlink_hover_color = get_theme_mod('navlink_hov_colorpicker');

  ?>
  <style type="text/css">

    nav {
      background: <?php echo $nav_bg_color ?>;
    }

    .menu-item .nav-link {
      color: <?php echo $navlink_color ?>;
    }

    .menu-item .nav-link:hover,
    .menu-item .nav-link:active {
      color: <?php echo $navlink_hover_color ?>;
    }

  </style>
  <?php
}

add_action('wp_head','nav_css');

// making frontpage content editable - fp section
// =========================================
function fp_content_customize($wp_customize) {
  $wp_customize->add_section('fp_section', array(
    'title' => 'Home Page Content', 'custom_setting',
    'priority' => 0
  ));

  // // Hero Image
  // // ========
  $wp_customize->add_setting('custom_hero_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_bg_img', array(
    'label' => 'Upload a background image',
    'section' => 'fp_section',
    'settings' => 'custom_hero_img',
    'priority' => 0
  )));

  // // Title
  // // ========
  $wp_customize->add_setting('title', array(
    'default' => 'Like <span class="col-main">Clockwork</span>.'
  ));

  $wp_customize->add_control('title', array(
    'label' => 'Enter Page Title',
    'description' => 'If you want a word to be coloured, put it where the word "Clockwork" is and do not delete the "spans" around it.',
    'section' => 'fp_section',
    'settings' => 'title',
    'type' => 'text',
    'priority' => 20
  ));

  // // Title colour
  // // ========
  $wp_customize->add_setting('title_col', array(
    'default' => '#f7f7f6'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'title_col', array(
      'label' => 'Title Colour',
      'section' => 'fp_section',
      'settings' => 'title_col',
      'priority' => 30
    )
  ));

  // // Tagline
  // // ========
  $wp_customize->add_setting('tagline', array(
    'default' => 'Visual Storytelling, Creative Production'
  ));

  $wp_customize->add_control('tagline', array(
    'label' => 'Enter Tagline / Subtitle',
    'section' => 'fp_section',
    'settings' => 'tagline',
    'type' => 'text',
    'priority' => 40
  ));

  // // Tagline colour
  // // ========
  $wp_customize->add_setting('tag_col', array(
    'default' => '#f7f7f6'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'tag_col', array(
      'label' => 'Tagline / Subtitle Colour',
      'section' => 'fp_section',
      'settings' => 'tag_col',
      'priority' => 50
    )
  ));

  // // Heading Text Position
  // // ========

  $wp_customize->add_setting('heading-pos', array(
    'default' => 'topleft'
  ));

  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'heading-pos', array(
    'label' => 'Position of the Front Page Title',
    'settings' => 'heading-pos',
    'priority' => 60,
    'section' => 'fp_section',
    'type' => 'select',
    'choices' => array(
      'topleft' => 'Top Left',
      'topright' => 'Top Right',
      'bottomright' => 'Bottom Right',
      'bottomleft' => 'Bottom Left',
      'center' => 'Center'
    )
  )));


    // // Intro txt title
    // // ========
    $wp_customize->add_setting('middle_title', array(
      'default' => 'The Clockwork Creative Team...'
    ));

    $wp_customize->add_control('middle_title', array(
      'label' => 'Middle Section Title',
      'section' => 'fp_section',
      'settings' => 'middle_title',
      'type' => 'text',
      'priority' => 70
    ));

  //   // Intro txt content
  //   // ========
    $wp_customize->add_setting('middle_content', array(
      'default' => 'Are a talented collective of experienced filmmakers, photographers, editors, and writers. From concept to completion, we make compelling stories to bring people into your world and create an impact.'
    ));

    $wp_customize->add_control('middle_content', array(
      'label' => 'Middle Section Content',
      'section' => 'fp_section',
      'settings' => 'middle_content',
      'type' => 'textarea',
      'priority' => 80
  ));

} //end funct

add_action('customize_register', 'fp_content_customize');

function hero_css() {
  $title_col = get_theme_mod('title_col');
  $tag_col = get_theme_mod('tag_col');
  $hero_img = get_theme_mod('custom_hero_img');
  $position = get_theme_mod('heading-pos');
  $align = get_theme_mod('heading-align');
  ?>
  <style type="text/css">
    .hero-img {
      <?php
        if ($hero_img) { ?>
          background-image: url(<?php echo $hero_img ?>);
          background-position: center;
          background-size: cover;
          background-repeat: no-repeat;
          <?php
        }
      ?>
    }

    .title {
      color: <?php echo $title_col?>;
    }

    .tagline {
      color: <?php echo $tag_col?>;
    }

    <?php
    if ($position == 'topleft') { ?>
      .hero-txt {
        margin-top: 5%;
        margin-left: 2%;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'bottomleft') { ?>
      .hero-txt {
        margin-top: 32%;
        margin-left: 2%;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'topright') { ?>
      .hero-txt {
        margin-top: 2%;
        margin-left: 60%;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'bottomright') { ?>
      .hero-txt {
        margin-top: 32%;
        margin-left: 60%;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'center') { ?>
      .hero-img {
        display: flex;
        align-items: center;
        justify-content: center;
      }
    <?php
    }
    ?>

  </style>
  <?php
}

add_action('wp_head','hero_css');

?>
