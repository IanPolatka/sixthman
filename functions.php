<?php
/**
 * sixthman functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sixthman
 */

if ( ! function_exists( 'sixthman_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sixthman_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sixthman, use a find and replace
	 * to change 'sixthman' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sixthman', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'sixthman' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sixthman_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'sixthman_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sixthman_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sixthman_content_width', 640 );
}
add_action( 'after_setup_theme', 'sixthman_content_width', 0 );



/**
 * Register custom fonts.
 */
function sixthman_fonts_url() {
	$fonts_url = '';
	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro and PT Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$titillium_web = _x( 'on', 'Titillium Web font: on or off', 'sixthman' );
	$work_sans = _x( 'on', 'Work Sans font: on or off', 'sixthman' );
	$font_families = array();
	if ( 'off' !== $titillium_web ) {
		$font_families[] = 'Titillium Web:400,400i,700,800,900';
	}
	if ( 'off' !== $work_sans ) {
		$font_families[] = 'Work Sans:800';
	}
	if ( in_array( 'on', array($titillium_web, $work_sans) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}



/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function sixthman_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'sixthman-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'sixthman_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sixthman_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sixthman' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sixthman' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sixthman_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sixthman_scripts() {

	// Enqueue Google Fonts: Source Sans Pro and PT Serif
	wp_enqueue_style( 'sixthman-fonts', sixthman_fonts_url() );

	//  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '20170619', '');

	wp_enqueue_style( 'sixthman-style', get_stylesheet_uri(), array(), '20170619', '');

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//  Enqueue Font Awesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	wp_enqueue_script( 'sixthman-skip-link-focus-fix', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sixthman_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');
