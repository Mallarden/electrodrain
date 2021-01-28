<?php


//Added query parameters
function add_query_vars_filter( $vars ){
  $vars[] = "calc";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

//Custom Excerpt Length function
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .updated, #wp-admin-bar-flatsome-activate, #wp-admin-bar-flatsome_panel, #toplevel_page_flatsome-panel {
      display:none !important;
      visibility:none !important;
    } 
  </style>';

  // Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
  if ($GLOBALS['pagenow'] !='wp-login.php'&& !is_admin()) {

      wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
      wp_enqueue_script('conditionizr'); // Enqueue it!

      wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
      wp_enqueue_script('modernizr'); // Enqueue it!

      wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
      wp_enqueue_script('html5blankscripts'); // Enqueue it!

      wp_register_script('htmldelighter', get_template_directory_uri() . '/js/delighters.min.js', array('jquery'), '1.0.0'); // Custom scripts
      wp_enqueue_script('htmldelighter'); // Enqueue it!

      wp_register_script('animate', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '5.0.0'); // Custom scripts
      wp_enqueue_script('animate'); // Enqueue it!
  }
}
/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
  wp_enqueue_style( 'style-name', get_stylesheet_uri() . '/css/main.css', array(), '1.0.0', true );
  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
}
function my_scripts_method() {
  wp_enqueue_script(
      'custom-script',
      get_stylesheet_directory_uri() . '/js/scripts.js',
      array( 'jquery' )
  );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
add_action( 'wp_enqueue_scripts', 'wpsites_second_style_sheet' );
function wpsites_second_style_sheet() {
    if ( is_category() ) {
       wp_register_style( 'second-style', get_template_directory_uri() .'css/bootstrap.min.css', array(), '20130608');
       wp_enqueue_style( 'second-style' );    
    }    
}