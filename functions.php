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

// setting up team member posttype
// =========================================
function create_team_post() {
  $args = array(
    'labels' => array(
      'name' => 'Team Members',
      'singular_name' => 'Team Member'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-groups',
    'supports' => array('title', 'editor', 'thumbnail', 'video'),
    'menu-position' => 20
  );
  register_post_type('team', $args);
}

add_action('init', 'create_team_post');


// Filter Hook- Changing title prompt to the team member name for Team Members Posttype and to service name for the services post type
// =========================================
function change_default_title($title) {
  $screen = get_current_screen();

  if ('team' == $screen->post_type) {
    $title = 'Team Member Name';
  } elseif ('services' == $screen->post_type) {
    $title = 'Service Name';
  }
  return $title;
}

add_filter('enter_title_here', 'change_default_title');

// Team Metabox for Position Description
// ================================================
function add_position_metabox() {
  add_meta_box(
    'position_metabox',
    'Team Member Position',
    'position_metabox_callback',
    'team',
    'normal'
  );
}

function position_metabox_callback($post) {
  $position = get_post_meta($post->ID, 'position_input', true);
  echo '<input type ="text" placeholder="Enter the Member\'s position (e.x. Photographer)" id="position_input" name="position_input" size="50" value="' . $position . '"><br><br>';
}

add_action('admin_menu', 'add_position_metabox');

function save_position_metabox_data($post_id, $post) {

  $post_type = get_post_type_object($post->post_type);
  if (! current_user_can($post_type->cap->edit_post, $post_id)) {
    return $post_id;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  if ($post->post_type != 'team') {
    return $post_id;
  }

  if (isset($_POST['position_input'])) {
    update_post_meta($post_id, 'position_input', sanitize_text_field($_POST['position_input']));
  } else {
    delete_post_meta($post_id, 'position_input');
  }

  return $post_id;
}

add_action('save_post', 'save_position_metabox_data', 10, 2);

// Creating Work Taxonomy for videos
// ================================================
function create_video_taxonomy() {
  $labels = array(
    'name' => 'Video Types',
    'singular_name' => 'Video Type',
    'search_items' => 'Search Video Types',
    'all_items' => 'All Video Types',
    'parent_item' => 'Parent Video Type',
    'parent_item_colon' => 'Parent Video Type:',
    'edit_item' => 'Edit Video Type',
    'update_item' => 'Update Video Type',
    'add_new_item' => 'Add new Video Type',
    'new_item_name' => 'New Video Type Name',
    'menu_name' => 'Video Type'
  );

  register_taxonomy(
    'video-type',
    array('work'),
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true
    )
  );
}

add_action('init', 'create_video_taxonomy', 0);


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
    'priority' => 10
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

  //   // Intro txt content
  //   // ========

    $wp_customize->add_setting('col-no', array(
      'default' => 2
    ));

    $wp_customize->add_control('col-no', array(
      'label' => 'Service Column Number',
      'description' => '1 is the smallest columns, 12 is the largest (spanning the page width)',
      'section' => 'fp_section',
      'settings' => 'col-no',
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1,
        'max' => 12
      ),
      'priority' => 90
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
        text-align: left;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'bottomleft') { ?>
      .hero-txt {
        margin-top: 32%;
        margin-left: 2%;
        text-align: left;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'topright') { ?>
      .hero-txt {
        margin-top: 2%;
        margin-left: 60%;
        text-align: right;
      }
    <?php
    }
    ?>

    <?php
    if ($position == 'bottomright') { ?>
      .hero-txt {
        margin-top: 32%;
        margin-left: 60%;
        text-align: right;
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
        text-align: center;
      }
    <?php
    }
    ?>

  </style>
  <?php
}

add_action('wp_head','hero_css');


// making about page content editable - abt section
// =========================================
function abt_content_customize($wp_customize) {
  $wp_customize->add_section('abt_section', array(
    'title' => 'About Us Page Content', 'custom_setting',
    'priority' => 15
  ));

  // // Title
  // // ========
  $wp_customize->add_setting('abt_title', array(
    'default' => 'About Us'
  ));

  $wp_customize->add_control('abt_title', array(
    'label' => 'Enter Page Title',
    'section' => 'abt_section',
    'settings' => 'abt_title',
    'type' => 'text',
    'priority' => 10
  ));

  // // Slide 1 txt content
  // // ========
  $wp_customize->add_setting('slide1_content', array(
    'default' => 'Clockwork Creative are very good at stories. We are experts in narrative visual storytelling — from feature-length documentary to 15-second snippets for social sharing. Our projects run like clockwork if clocks were known for working with intelligence, sensitivity, flexibility, and open communication.'
  ));

  $wp_customize->add_control('slide1_content', array(
    'label' => 'Slide 1 Content',
    'section' => 'abt_section',
    'settings' => 'slide1_content',
    'type' => 'textarea',
    'priority' => 20
  ));

  // // Slide 1 img
  // // ========
  $wp_customize->add_setting('slide1_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slide1_img', array(
    'label' => 'Slide 1 Image',
    'section' => 'abt_section',
    'settings' => 'slide1_img',
    'priority' => 30
  )));

  // // Slide 2 txt content
  // // ========
  $wp_customize->add_setting('slide2_content', array(
    'default' => 'Having a multi-skilled creative director, experienced core crew, and access to specialist support makes us adaptable. Our network includes friends and colleagues who happen to be some of the industry’s best technicians and practitioners. We work and deliver to the size, schedule and ambition of our clients.'
  ));

  $wp_customize->add_control('slide2_content', array(
    'label' => 'Slide 2 Content',
    'section' => 'abt_section',
    'settings' => 'slide2_content',
    'type' => 'textarea',
    'priority' => 40
  ));

  // // Slide 2 img
  // // ========
  $wp_customize->add_setting('slide2_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slide2_img', array(
    'label' => 'Slide 2 Image',
    'section' => 'abt_section',
    'settings' => 'slide2_img',
    'priority' => 50
  )));

  // // Slide 3 txt content
  // // ========
  $wp_customize->add_setting('slide3_content', array(
    'default' => 'We believe compromise and collaboration are important parts of a creative process. But we don’t compromise on quality. Whether local or global, boutique or big budget, stories crafted by Clockwork are striking in their visual and emotional detail. Before and during filming, our crew is known for working with people to get the best out of them. We listen to clients carefully and incorporate feedback to deliver quality.'
  ));

  $wp_customize->add_control('slide3_content', array(
    'label' => 'Slide 3 Content',
    'section' => 'abt_section',
    'settings' => 'slide3_content',
    'type' => 'textarea',
    'priority' => 60
  ));

  // // Slide 3 img
  // // ========
  $wp_customize->add_setting('slide3_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slide3_img', array(
    'label' => 'Slide 3 Image',
    'section' => 'abt_section',
    'settings' => 'slide3_img',
    'priority' => 70
  )));

  // // Slide 4 txt content
  // // ========
  $wp_customize->add_setting('slide4_content', array(
    'default' => 'Clockwork is equipped with the latest tech to give your project the professional treatment it deserves — being able to deliver on all platforms from cinema to billboards, social media snippets or GIFs. We care about the impact of our work, and we like building visibility for brands and organisations who care about the impact of theirs.'
  ));

  $wp_customize->add_control('slide4_content', array(
    'label' => 'Slide 4 Content',
    'section' => 'abt_section',
    'settings' => 'slide4_content',
    'type' => 'textarea',
    'priority' => 80
  ));

  // // Slide 4 img
  // // ========
  $wp_customize->add_setting('slide4_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slide4_img', array(
    'label' => 'Slide 4 Image',
    'section' => 'abt_section',
    'settings' => 'slide4_img',
    'priority' => 90
  )));

  // // Slide 5 txt content
  // // ========
  $wp_customize->add_setting('slide5_content', array(
    'default' => 'Depending on the goal and budget of your project, we can work with you through the entire production process, from developing a concept to delivering finished media. Sometimes our clients prefer to lead particular stages of a project, or work with existing partners — calling us in to focus on specific parts of production. We enjoy collaboration, and we’re happy to work in this way when required.'
  ));

  $wp_customize->add_control('slide5_content', array(
    'label' => 'Slide 5 Content',
    'section' => 'abt_section',
    'settings' => 'slide5_content',
    'type' => 'textarea',
    'priority' => 100
  ));

  // // Slide 5 img
  // // ========
  $wp_customize->add_setting('slide5_img', array(
    'default' => ''
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slide5_img', array(
    'label' => 'Slide 5 Image',
    'section' => 'abt_section',
    'settings' => 'slide5_img',
    'priority' => 110
  )));

} //end funct

add_action('customize_register', 'abt_content_customize');

?>
