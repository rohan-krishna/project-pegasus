<?php
/**
 * Project Pegasus functions and definitions
 *
 * @package Project Pegasus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

//Set-up URL Paths

DEFINE('PP_DIR',get_template_directory_uri());
remove_action('wp_head','wp_generator');



if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'project_pegasus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function project_pegasus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Project Pegasus, use a find and replace
	 * to change 'project-pegasus' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'project-pegasus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'project-pegasus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'project_pegasus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // project_pegasus_setup
add_action( 'after_setup_theme', 'project_pegasus_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function project_pegasus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'project-pegasus' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'project_pegasus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function project_pegasus_scripts() {
	wp_enqueue_style( 'project-pegasus-style', get_stylesheet_uri() );

	wp_enqueue_style( 'waves-style' , get_template_directory_uri() . '/bower_components/waves/dist/waves.min.css');

	wp_enqueue_script( 'project-pegasus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'project-pegasus-homebrew', get_template_directory_uri() . '/js/homebrew.js' );

	wp_enqueue_script( 'project-pegasus-waves', get_template_directory_uri() . '/bower_components/waves/dist/waves.min.js' );

	wp_enqueue_script( 'project-pegasus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'project_pegasus_scripts' );

/**
* Implement WP Settings API
*
*/

function eg_settings_api_init() {

	add_settings_section('eg_settings_section','Example Settings Section','eg_settings_section_callback_function','reading');

	add_setting_field('eg_setting_name','Example Setting Name','eg_setting_callback_function','reading','eg_setting_section');

	register_setting('reading','eg_settings_api_init');
}

function eg_settings_section_callback_function()
	{
		echo '<p>Intro Text For Our Settings Section</p>';
	}

function eg_setting_callback_function()
	{
		echo '<input name="eg_setting_name" id="eg_setting_name" type="checkbox" value="1" class="code" ' . checked( 1, get_option( 'eg_setting_name' ), false ) . ' /> Explanation text';
	}


/*
Define Post-Type for Slider
*/

add_action('init','slider_post_init');

function slider_post_init()
{
	$labels = array(
		'name' => 'Slides',
		'singular_name' => 'Slide',
		'menu_name' => 'Slides',
		'name_admin_bar' => 'Slides',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slide',
		'new_item' => 'New Slide',
		'edit_item' => 'Edit Slide',
		'view_item' => 'View Slide',
		'all_items' => 'View All Slides',
		'search_items' => 'Search Slides',
		'parent_item_colon' => 'Parent Slide',
		'not_found' => 'No slides found.',
		'not_found_in_trash' => 'No slides in trash.' );

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'exclude_from_search' => true,
		'rewrite' => array('slug'=>'slide'),
		'capability_type' => 'post',
		'has_archive' => true,
		'menu_position' => null,
		'menu_icon' => PP_DIR . '/images/slider.png',
		'supports' => array('title','thumbnail','author','excerpt','editor')
		);
	register_post_type('slide',$args);
}

/*
Define Post Type for Events
*/

add_action('init','event_post_init');

function event_post_init()
{
	$labels = array(
		'name' => 'Events',
		'singular' => 'Event',
		'menu_name' => 'Events',
		'name_admin_bar' => 'Events',
		'add_new' => 'Add New ',
		'add_new_item' => 'New Event',
		'edit_item' => 'Edit Event',
		'view_item' => 'View Event',
		'all_items' => 'View All Events',
		'search_items' => 'Search Events',
		'parent_item_colon' => 'Parent Event',
		'not_found' => 'Event Not Found',
		'not_found_in_trash' => 'No events in trash.');

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'event'),
		'capability_type' => 'post',
		'has_archive' => true,
		'menu_position' => null,
		'menu_icon' => PP_DIR . '/images/event.png',
		'supports' => array('title','thumbnail','author','excerpt','editor')
		);

	register_post_type('event',$args);
}

/*
Define Post-Type for Testimonials
*/

add_action('init','testi_post_init');

function testi_post_init()
{
	$labels = array(
		'name' => 'Testimonials',
		'singular_name' => 'Testimonial',
		'menu_name' => 'Testimonials',
		'name_admin_bar' => 'Testimonials',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Testimonial',
		'new_item' => 'New Testimonial',
		'edit_item' => 'Edit Testimonial',
		'view_item' => 'View Testimonial',
		'all_items' => 'View All Testimonials',
		'search_items' => 'Search Testimonials',
		'parent_item_colon' => 'Parent Testimonial',
		'not_found' => 'No Testimonials found.',
		'not_found_in_trash' => 'No Testimonials in trash.' );

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'exclude_from_search' => true,
		'rewrite' => array('slug'=>'testimonial'),
		'capability_type' => 'post',
		'has_archive' => true,
		'menu_position' => null,
		'supports' => array('title','thumbnail','author','excerpt','editor')
		);
	register_post_type('testimonial',$args);
}

/*

Register Custom Channel Navigation

*/

add_action('after_setup_theme','pp_register_menus');

function pp_register_menus()
{
	register_nav_menus( array(
		'channel' => 'Channel Navigation Menu',
		'secondary' => 'Secondary Navigation Menu',
		'admissions' => 'Admissions Menu',
		'academics' => 'Academics Menu',
		'research' => 'Research Menu'
	)	);
}
/*

Theme Supports

*/

add_theme_support('post-thumbnails');

add_action( 'after_setup_theme', 'pp_theme_setup' );
function pp_theme_setup() {
  add_image_size( 'slider-thumb', 350 ); // 300 pixels wide (and unlimited height)
  add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
