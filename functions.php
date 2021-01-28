<?php
/**
 * andrew functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package andrew
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'andrew_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function andrew_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on andrew, use a find and replace
		 * to change 'andrew' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'andrew', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'andrew' ),
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
				'andrew_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'andrew_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function andrew_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'andrew_content_width', 640 );
}
add_action( 'after_setup_theme', 'andrew_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function andrew_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'andrew' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'andrew' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'andrew_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function andrew_scripts() {
	wp_enqueue_style( 'andrew-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'andrew-style', 'rtl', 'replace' );

	wp_enqueue_script( 'andrew-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'andrew_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}

add_filter('upload_mimes', 'add_file_types_to_uploads');

function recent_work() {
	$labels = array(
	  'name'               => _x( 'Projects', 'post type general name' ),
	  'singular_name'      => _x( 'Project', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'project' ),
	  'add_new_item'       => __( 'Add New Project' ),
	  'edit_item'          => __( 'Edit Project' ),
	  'new_item'           => __( 'New Project' ),
	  'all_items'          => __( 'All Projects' ),
	  'view_item'          => __( 'View Project' ),
	  'search_items'       => __( 'Search Projects' ),
	  'not_found'          => __( 'No Project found' ),
	  'not_found_in_trash' => __( 'No Project found in the Trash' ),
	  'menu_name'          => 'Projects'
	);

	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Includes all the projects that I worked on',
	  'public'        => true,
	  'menu_position' => 5,
	  'menu_icon'     => 'dashicons-layout',
	  'supports'      => array( 'title', 'editor', 'thumbnail' ),
	  'has_archive'   => true,
	);

	register_post_type( 'project', $args ); 
}

add_action( 'init', 'recent_work' );