<?php
/**
 * lexim functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lexim
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('lexim_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lexim_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on lexim, use a find and replace
         * to change 'lexim' to the name of your theme in all the template files.
         */
        load_theme_textdomain('lexim', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'lexim'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'lexim_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'lexim_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lexim_content_width()
{
    $GLOBALS['content_width'] = apply_filters('lexim_content_width', 640);
}

add_action('after_setup_theme', 'lexim_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lexim_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'lexim'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'lexim'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'lexim_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lexim_scripts()
{
    wp_enqueue_style('slick-1.8.1-style', get_stylesheet_directory_uri() . '/assets/slick.css', array(), _S_VERSION);
    wp_enqueue_style('lexim-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('lexim-style', 'rtl', 'replace');

    wp_enqueue_script('slick-1.8.1-script', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('lexim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'lexim_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


////////// START CUSTOMIZE

// Change image size
//add_image_size( 'large', 120, 120, true );
//add_image_size( 'medium_large', 120, 120, true );
//add_image_size( 'medium', 120, 120, true );
add_image_size( 'post-thumbnail', 120);

// Disable the threshold.
add_filter('big_image_size_threshold', '__return_false');


// Remove default image sizes here.
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
add_filter('intermediate_image_sizes', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
    unset($sizes['thumbnail']); // 150x150 pixels
    unset($sizes['medium']); // 300x300 pixels(maximum)
    unset($sizes['large']); // 1024x1024 pixels(maximum)
    unset($sizes['medium_large']); // 768px width
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}


// Remove ACF Images
add_filter('acf/get_image_sizes', 'remove_acf_get_image_sizes');
function remove_acf_get_image_sizes($sizes)
{
    $checkList = ['full'];
    if (is_array($sizes)) {
        foreach ($sizes as $key => $val) {
            if (!in_array($key, $checkList)) {
                unset($sizes[$key]);
            }
        }
    }
    return $sizes;
}


/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// Remove br tag in shortcode
remove_filter('the_contemedia.phpnt', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


// Add slug / images column for PAGE posts, POSTs
add_filter("manage_page_posts_columns", "page_columns");
function page_columns($columns)
{
    $add_columns = array(
        'slug' => 'Slug',
    );
    $response = array_slice($columns, 0, 2, true) +
        $add_columns +
        array_slice($columns, 2, count($columns) - 1, true);

    return $response;
}

add_action("manage_page_posts_custom_column", "my_custom_page_columns");
function my_custom_page_columns($column)
{
    global $post;
    switch ($column) {
        case 'slug' :
            echo $post->post_name;
            break;
    }
}

add_filter("manage_post_posts_columns", "post_columns");
add_filter("manage_team_posts_columns", "post_columns");
add_filter("manage_client_posts_columns", "post_columns");
function post_columns($columns)
{
    $first_column = ['thumb_image' => 'Thumb'];
    $add_columns = array(
        'slug' => 'Slug'
    );
    $res = array_slice($columns, 0, 1, true) + $first_column +
        array_slice($columns, 1, 1, true) + $add_columns +
        array_slice($columns, 2, count($columns) - 1, true);

    return $res;
}

add_action("manage_post_posts_custom_column", "my_custom_post_columns");
add_action("manage_team_posts_custom_column", "my_custom_post_columns");
add_action("manage_client_posts_custom_column", "my_custom_post_columns");
function my_custom_post_columns($column)
{
    global $post;
    switch ($column) {
        case 'thumb_image' :
            $noImg = get_stylesheet_directory_uri() . '/assets/img/noimage-admin.jpg';
            $thumb = get_the_post_thumbnail_url($post->ID);
            if ($thumb && $thumb !== "") {
                $noImg = $thumb;
            }
            echo '<img width="50px" src="' . $noImg . '" />';
            break;
        case 'slug' :
            echo $post->post_name;
            break;
    }
}

// End - Add slug column for PAGE posts, POSTs


/**
 * Add section in admin page
 * @position function.php
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' => 'Options Page',
            'menu_title' => 'Options Page Settings',
            'menu_slug' => 'options-page-settings',
            'capability' => 'edit_posts',
            'redirect' => true
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'General Settings',
            'menu_title' => 'General Settings',
            'parent_slug' => 'options-page-settings'
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Footer Settings',
            'menu_title' => 'Footer Settings',
            'parent_slug' => 'options-page-settings'
        )
    );
}

// Add Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
