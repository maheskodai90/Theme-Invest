<?php
/**
* Capital functions and definitions
*
* @package northarc_capital
*/

/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) {
$content_width = 730; /* pixels */
}

/**
* Set the content width for full width pages with no sidebar.
*/
function northarc_capital_content_width() {
if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
global $content_width;
$content_width = 1110; /* pixels */
}
}
add_action( 'template_redirect', 'northarc_capital_content_width' );

if ( ! function_exists( 'northarc_capital_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function northarc_capital_setup() {

/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on Capital, use a find and replace
* to change 'northarc_capital' to the name of your theme in all the template files
*/
load_theme_textdomain( 'northarc_capital', get_template_directory() . '/languages' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
add_theme_support( 'post-thumbnails' );

add_image_size( 'northarc_capital-featured', 730, 410, true );
add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
'primary'      => __( 'Primary Menu', 'northarc_capital' ),
'footer-links' => __( 'Footer Links', 'northarc_capital' ) // secondary menu in footer
) );

// Enable support for Post Formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

// Setup the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'northarc_capital_custom_background_args', array(
'default-color' => 'ffffff',
'default-image' => '',
) ) );

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );
}
endif; // northarc_capital_setup
add_action( 'after_setup_theme', 'northarc_capital_setup' );

/**
* Register widgetized area and update sidebar with default widgets.
*/
function northarc_capital_widgets_init() {
register_sidebar( array(
'name'          => __( 'Sidebar', 'northarc_capital' ),
'id'            => 'sidebar-1',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget'  => '</aside>',
'before_title'  => '<h3 class="widget-title">',
'after_title'   => '</h3>',
) );
register_sidebar(array(
'id'            => 'home-widget-1',
'name'          => __( 'Homepage Twitter', 'northarc_capital' ),
'description'   => __( 'Displays on the Home Page', 'northarc_capital' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="widgettitle">',
'after_title'   => '</h3>',
));




register_widget( 'northarc_capital_social_widget' );
register_widget( 'northarc_capital_popular_posts_widget' );
}
add_action( 'widgets_init', 'northarc_capital_widgets_init' );

include(get_template_directory() . "/inc/widgets/widget-popular-posts.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");


/**
* Enqueue scripts and styles.
*/
function northarc_capital_scripts() {

wp_enqueue_style( 'northarc_capital-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

wp_enqueue_style( 'northarc_capital-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/inc/css/flexslider.css' );

wp_enqueue_style( 'slickslider-css', get_template_directory_uri().'/inc/css/slick.css' );

wp_enqueue_style( 'northarc_capital-animate', get_template_directory_uri().'/inc/css/animate.css' );
wp_enqueue_script( 'northarc_capital-wow_js', get_template_directory_uri().'/inc/js/wow.min.js' );  


if ( class_exists( 'jigoshop' ) ) { // Jigoshop specific styles loaded only when plugin is installed
wp_enqueue_style( 'jigoshop-css', get_template_directory_uri().'/inc/css/jigoshop.css' );
}

wp_enqueue_style( 'northarc_capital-style', get_stylesheet_uri() );

wp_enqueue_script('northarc_capital-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/inc/js/flexslider.min.js', array('jquery'), '2.5.0', true );

wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/inc/js/slick.min.js');

wp_enqueue_script( 'responsive-tabs', get_template_directory_uri() . '/inc/js/responsive-tabs.js' );

wp_enqueue_script( 'northarc_capital-main', get_template_directory_uri() . '/inc/js/main.js', array('jquery'), '1.5.4', true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'northarc_capital_scripts' );

/**
* Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
*/
function northarc_capital_ie_support_header() {
echo '<!--[if lt IE 9]>'. "\n";
echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) . '"></script>'. "\n";
echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/respond.min.js' ) . '"></script>'. "\n";
echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'northarc_capital_ie_support_header', 11 );

/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Custom functions that act independently of the theme templates.
*/
require get_template_directory() . '/inc/extras.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';

/**
* Load custom nav walker
*/
require get_template_directory() . '/inc/navwalker.php';

if ( class_exists( 'woocommerce' ) ) {
/**
* WooCommerce related functions
*/
require get_template_directory() . '/inc/woo-setup.php';
}

if ( class_exists( 'jigoshop' ) ) {
/**
* Jigoshop related functions
*/
require get_template_directory() . '/inc/jigoshop-setup.php';
}

/**
* Metabox file load
*/
require get_template_directory() . '/inc/metaboxes.php';

/**
* TGMPA
*/
require get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
* Register Social Icon menu
*/
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'northarc_capital' ) );
}

/*Wordpress Remove Core Upates*/
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

/* Globals variables */
global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
$options_categories[$category->cat_ID] = $category->cat_name;
}

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'northarc_capital'),'side-pull-right' => esc_html__('Left Sidebar', 'northarc_capital'),'no-sidebar' => esc_html__('No Sidebar', 'northarc_capital'),'full-width' => esc_html__('Full Width', 'northarc_capital'));

// Typography Options
global $typography_options;
$typography_options = array(
'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18px'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
'faces' => array(
'arial'          => 'Arial,Helvetica,sans-serif',
'verdana'        => 'Verdana,Geneva,sans-serif',
'trebuchet'      => 'Trebuchet,Helvetica,sans-serif',
'georgia'        => 'Georgia,serif',
'times'          => 'Times New Roman,Times, serif',
'tahoma'         => 'Tahoma,Geneva,sans-serif',
'Open Sans'      => 'Open Sans,sans-serif',
'palatino'       => 'Palatino,serif',
'helvetica'      => 'Helvetica,Arial,sans-serif',
'helvetica-neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
),
'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
'color'  => true
);

// Typography Defaults
global $typography_defaults;
$typography_defaults = array(
'size'  => '14px',
'face'  => 'helvetica-neue',
'style' => 'normal',
'color' => '#6B6B6B'
);

/**
* Helper function to return the theme option value.
* If no value has been saved, it returns $default.
* Needed because options are saved as serialized strings.
*
* Not in a class to support backwards compatibility in themes.
*/
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

$option_name = '';
// Get option settings from database
$options = get_option( 'northarc_capital' );

// Return specific option
if ( isset( $options[$name] ) ) {
return $options[$name];
}

return $default;
}
endif;

// Breadcrumbs two start
function custom_breadcrumbs() {

// Settings
$separator          = '/';
$breadcrums_id      = 'breadcrumbs';
$breadcrums_class   = 'breadcrumbs';
$home_title         = 'Home';

// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
$custom_taxonomy    = 'product_cat';

// Get the query & post information
global $post,$wp_query;

// Do not display on the homepage
if ( !is_front_page() ) {

// Build the breadcrums
echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

// Home page
echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
echo '<li class="separator separator-home"> ' . $separator . ' </li>';

if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

// If post is a custom post type
$post_type = get_post_type();

// If it is a custom post type display name and link
if($post_type != 'post') {

$post_type_object = get_post_type_object($post_type);
$post_type_archive = get_post_type_archive_link($post_type);

echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
echo '<li class="separator"> ' . $separator . ' </li>';

}

$custom_tax_name = get_queried_object()->name;
echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

} else if ( is_single() ) {

// If post is a custom post type
$post_type = get_post_type();

// If it is a custom post type display name and link
if($post_type != 'post') {

$post_type_object = get_post_type_object($post_type);
$post_type_archive = get_post_type_archive_link($post_type);

echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
echo '<li class="separator"> ' . $separator . ' </li>';

}

// Get post category info
$category = get_the_category();

if(!empty($category)) {

// Get last category post is in
$last_category = end(array_values($category));

// Get parent any categories and create array
$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
$cat_parents = explode(',',$get_cat_parents);

// Loop through parent categories and store in variable $cat_display
$cat_display = '';
foreach($cat_parents as $parents) {
$cat_display .= '<li class="item-cat">'.$parents.'</li>';
$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
}

}

// If it's a custom post type within a custom taxonomy
$taxonomy_exists = taxonomy_exists($custom_taxonomy);
if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
$cat_id         = $taxonomy_terms[0]->term_id;
$cat_nicename   = $taxonomy_terms[0]->slug;
$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
$cat_name       = $taxonomy_terms[0]->name;

}

// Check if the post is in a category
if(!empty($last_category)) {
echo $cat_display;
echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

// Else if post is in a custom taxonomy
} else if(!empty($cat_id)) {

echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
echo '<li class="separator"> ' . $separator . ' </li>';
echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

} else {

echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

}

} else if ( is_category() ) {

// Category page
echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

} else if ( is_page() ) {

// Standard page
if( $post->post_parent ){

// If child page, get parents 
$anc = get_post_ancestors( $post->ID );

// Get parents in the right order
$anc = array_reverse($anc);

// Parent page loop
if ( !isset( $parents ) ) $parents = null;
foreach ( $anc as $ancestor ) {
$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
}

// Display parent pages
echo $parents;

// Current page
echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

} else {

// Just display current page if not parents
echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

}

} else if ( is_tag() ) {

// Tag page

// Get tag information
$term_id        = get_query_var('tag_id');
$taxonomy       = 'post_tag';
$args           = 'include=' . $term_id;
$terms          = get_terms( $taxonomy, $args );
$get_term_id    = $terms[0]->term_id;
$get_term_slug  = $terms[0]->slug;
$get_term_name  = $terms[0]->name;

// Display the tag name
echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

} elseif ( is_day() ) {

// Day archive

// Year link
echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

// Month link
echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

// Day display
echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

} else if ( is_month() ) {

// Month Archive

// Year link
echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

// Month display
echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

} else if ( is_year() ) {

// Display year archive
echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

} else if ( is_author() ) {

// Auhor archive

// Get the author information
global $author;
$userdata = get_userdata( $author );

// Display author name
echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

} else if ( get_query_var('paged') ) {

// Paginated archives
echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

} else if ( is_search() ) {

// Search results page
echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';

} elseif ( is_404() ) {

// 404 page
echo '<li>' . 'Error 404' . '</li>';
}

echo '</ul>';

}

}

// Breadcrumbs two end


/*Admin Logo*/
function my_custom_login_logo()
{
echo '<style  type="text/css"> .login h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/images/login-logo.png)  !important; background-size: contain; height: 94px !important; width: 138px !important;
background-position: center center} </style>';
}
add_action('login_head',  'my_custom_login_logo');

add_action('admin_head', 'my_custom_fonts'); function my_custom_fonts() { echo '<style> .acf-image-uploader { position: relative; width: 100px; } </style>'; }

/*Banner Post Type*/
function bannerImg() {
$labels = array(
'name'               => _x( 'Home Banners', 'post type general name' ),
'singular_name'      => _x( 'Home Banners', 'post type singular name' ),
'add_new'            => _x( 'Add New', 'Banner' ),
'add_new_item'       => __( 'Add New Banner' ),
'edit_item'          => __( 'Edit Banner' ),
'new_item'           => __( 'New Banner' ),
'all_items'          => __( 'All Banner' ),
'view_item'          => __( 'View Banner' ),
'search_items'       => __( 'Search Banner' ),
'not_found'          => __( 'No Banner found' ),
'not_found_in_trash' => __( 'No Banner found in the Trash' ), 
'parent_item_colon'  => '',
'menu_name'          => 'Home Banners'
);
$args = array(
'labels'        => $labels,
'description'   => 'Home Banners',
'public'        => true,
'menu_position' => 7,
'supports'      => array( 'title', 'thumbnail'),
'has_archive'   => true,
'menu_icon'     => 'dashicons-admin-post',
);
register_post_type( 'banners', $args ); 
}
add_action( 'init', 'bannerImg' );


/*FImpact Fund Post Type*/
function FImapacts() {
$labels = array(
'name'               => _x( 'IFMR FImpact', 'post type general name' ),
'singular_name'      => _x( 'IFMR FImpact', 'post type singular name' ),
'add_new'            => _x( 'Add New', 'FImpact' ),
'add_new_item'       => __( 'Add New FImpact' ),
'edit_item'          => __( 'Edit FImpact' ),
'new_item'           => __( 'New FImpact' ),
'all_items'          => __( 'All FImpact' ),
'view_item'          => __( 'View FImpact' ),
'search_items'       => __( 'Search FImpact' ),
'not_found'          => __( 'No FImpact found' ),
'not_found_in_trash' => __( 'No FImpact found in the Trash' ), 
'parent_item_colon'  => '',
'menu_name'          => 'IFMR FImpact'
);
$args = array(
'labels'        => $labels,
'description'   => 'IFMR FImpact',
'public'        => true,
'menu_position' => 7,
'supports'      => array( 'title','editor', 'thumbnail'),
'has_archive'   => true,
'menu_icon'     => 'dashicons-admin-post',
);
register_post_type( 'fimapacts', $args ); 
}
add_action( 'init', 'FImapacts' );


/*Testimonials Post Type*/
function testimonialPost() {
$labels = array(
'name'               => _x( 'Testimonials', 'post type general name' ),
'singular_name'      => _x( 'Testimonials', 'post type singular name' ),
'add_new'            => _x( 'Add New', 'Testimonials' ),
'add_new_item'       => __( 'Add New Testimonials' ),
'edit_item'          => __( 'Edit Testimonials' ),
'new_item'           => __( 'New Testimonials' ),
'all_items'          => __( 'All Testimonials' ),
'view_item'          => __( 'View Testimonials' ),
'search_items'       => __( 'Search Testimonials' ),
'not_found'          => __( 'No Testimonials found' ),
'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
'parent_item_colon'  => '',
'menu_name'          => 'Testimonials'
);
$args = array(
'labels'        => $labels,
'description'   => 'Testimonials',
'public'        => true,
'menu_position' => 7,
'supports'      => array( 'title', 'thumbnail'),
'has_archive'   => true,
'menu_icon'     => 'dashicons-admin-post',
);
register_post_type( 'testimonials', $args ); 
}
add_action( 'init', 'testimonialPost' );

// Taxonomy Key: writingcat
function my_taxonomies_testimonial() {
$labels = array(
'name'              => _x( 'Categories', 'taxonomy general name' ),
'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
'search_items'      => __( 'Search  Categories' ),
'all_items'         => __( 'All Categories' ),
'parent_item'       => __( 'Parent Category' ),
'parent_item_colon' => __( 'Parent Category:' ),
'edit_item'         => __( 'Edit Category' ), 
'update_item'       => __( 'Update Category' ),
'add_new_item'      => __( 'Add New Category' ),
'new_item_name'     => __( 'New Category' ),
'menu_name'         => __( ' Categories' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
);
register_taxonomy( 'testimonialcategory', 'testimonials', $args );
}
add_action( 'init', 'my_taxonomies_testimonial', 0 );


/*Inthenews Post Type*/
function inthenewsPost() {
  $labels = array(
    'name'               => _x( 'In The News', 'post type general name' ),
    'singular_name'      => _x( 'In The News', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'In The News' ),
    'add_new_item'       => __( 'Add New In The News' ),
    'edit_item'          => __( 'Edit In The News' ),
    'new_item'           => __( 'New In The News' ),
    'all_items'          => __( 'All In The News' ),
    'view_item'          => __( 'View In The News' ),
    'search_items'       => __( 'Search In The News' ),
    'not_found'          => __( 'No In The News found' ),
    'not_found_in_trash' => __( 'No In The News found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'In The News'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'In The News',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'thumbnail',),
    'has_archive'   => true,
  'menu_icon'     => 'dashicons-admin-post',
  );
  register_post_type( 'inthenews', $args ); 
}
add_action( 'init', 'inthenewsPost');

// Taxonomy Key: writingcat
function my_taxonomies_inthenews() {
  $labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search  Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ), 
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category' ),
    'menu_name'         => __( 'Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'inthenewscat', 'inthenews', $args );
}
add_action( 'init', 'my_taxonomies_inthenews', 0 );


/*Career Post Type*/
function careerPost() {
  $labels = array(
    'name'               => _x( 'Careers', 'post type general name' ),
    'singular_name'      => _x( 'Careers', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Careers' ),
    'add_new_item'       => __( 'Add New Careers' ),
    'edit_item'          => __( 'Edit Careers' ),
    'new_item'           => __( 'New Careers' ),
    'all_items'          => __( 'All Careers' ),
    'view_item'          => __( 'View Careers' ),
    'search_items'       => __( 'Search Careers' ),
    'not_found'          => __( 'No Careers found' ),
    'not_found_in_trash' => __( 'No Careers found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Careers'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Careers',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
  'menu_icon'     => 'dashicons-admin-post',
  );
  register_post_type( 'career', $args ); 
}
add_action( 'init', 'careerPost' );