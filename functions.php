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
	add_image_size( 'featured-post-full', 800, 375, true );
	add_image_size( 'recent-news-post-image', 300, 175, array( 'center', 'center' ) );

	add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
	function wpshout_custom_sizes( $sizes ) {
	    return array_merge( $sizes, array(
	        'recent-news-post-image' => __( 'recent-news-post-image' ),
	    ) );
	}

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

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width' 		=> 90,
		'height' 		=> 90,
		'flex-width'	=> true,
	) );

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
		$font_families[] = 'Work Sans:600,800';
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

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'sixthman' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'sixthman' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'sixthman' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'sixthman' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'sixthman' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'sixthman' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'sixthman' ),
		'id'            => 'footer-4',
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

	wp_enqueue_style( 'sixthman-style', get_stylesheet_uri(), array(), '20171203', '');

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'instagram', get_template_directory_uri() . '/js/instagram-feed.js', array(), '20151215', true );

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

function remove_dashboard_widgets () {

  remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
  remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); //WordPress.com Blog
  remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
  remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
  // remove_meta_box('dashboard_plugins','dashboard','normal'); //Plugins
  //  remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now
  remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
  //  remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
  //  remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
  //  remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
  remove_action('welcome_panel','wp_welcome_panel');

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');



// Register Custom Post Type
function sixthman_hof_post_type() {

	$labels = array(
		'name'                  => _x( 'Hall of Famers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Hall of Fame', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Hall of Fame', 'text_domain' ),
		'name_admin_bar'        => __( 'Hall of Fame', 'text_domain' ),
		'archives'              => __( 'Hall of Famers', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Members', 'text_domain' ),
		'add_new_item'          => __( 'Add New Hall of Famer', 'text_domain' ),
		'add_new'               => __( 'Add New Hall of Famer', 'text_domain' ),
		'new_item'              => __( 'New Hall of Famer', 'text_domain' ),
		'edit_item'             => __( 'Edit Hall of Famer', 'text_domain' ),
		'update_item'           => __( 'Update Hall of Famer', 'text_domain' ),
		'view_item'             => __( 'View Hall of Famer', 'text_domain' ),
		'view_items'            => __( 'View Hall of Famers', 'text_domain' ),
		'search_items'          => __( 'Search Hall of Famer', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'hall-of-fame',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Hall of Fame', 'text_domain' ),
		'description'           => __( 'A list of all hall of famers', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array( 'hall-of-fame-year' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'hof', $args );

}
add_action( 'init', 'sixthman_hof_post_type', 0 );



// Register Custom Taxonomy
function hall_of_fame_year() {

	$labels = array(
		'name'                       => _x( 'Hall of Fame Years', 'Taxonomy General Name', 'hall-of-fame-year' ),
		'singular_name'              => _x( 'Hall of Fame Year', 'Taxonomy Singular Name', 'hall-of-fame-year' ),
		'menu_name'                  => __( 'HOF Years', 'hall-of-fame-year' ),
		'all_items'                  => __( 'All Years', 'hall-of-fame-year' ),
		'parent_item'                => __( 'Parent Item', 'hall-of-fame-year' ),
		'parent_item_colon'          => __( 'Parent Item:', 'hall-of-fame-year' ),
		'new_item_name'              => __( 'New HOF Year', 'hall-of-fame-year' ),
		'add_new_item'               => __( 'Add HOF Year', 'hall-of-fame-year' ),
		'edit_item'                  => __( 'Edit HOF Year', 'hall-of-fame-year' ),
		'update_item'                => __( 'Update HOF Year', 'hall-of-fame-year' ),
		'view_item'                  => __( 'View HOF Year', 'hall-of-fame-year' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'hall-of-fame-year' ),
		'add_or_remove_items'        => __( 'Add or remove HOF Year', 'hall-of-fame-year' ),
		'choose_from_most_used'      => __( 'Choose from the most years', 'hall-of-fame-year' ),
		'popular_items'              => __( 'Popular HOF Years', 'hall-of-fame-year' ),
		'search_items'               => __( 'Search Years', 'hall-of-fame-year' ),
		'not_found'                  => __( 'Not Found', 'hall-of-fame-year' ),
		'no_terms'                   => __( 'No items', 'hall-of-fame-year' ),
		'items_list'                 => __( 'Items list', 'hall-of-fame-year' ),
		'items_list_navigation'      => __( 'Items list navigation', 'hall-of-fame-year' ),
	);
	$rewrite = array(
		'slug'                       => 'hof/year',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'hall-of-fame-year', array( 'hof' ), $args );

}
add_action( 'init', 'hall_of_fame_year', 0 );





if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'School Information',
		'menu_title'	=> 'School Information',
		'menu_slug' 	=> 'school-information',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-welcome-learn-more',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Alerts',
		'menu_title'	=> 'Alerts',
		'menu_slug' 	=> 'alerts',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-megaphone',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Analytics',
		'menu_title'	=> 'Analytics',
		'menu_slug' 	=> 'analytics',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-chart-area',
	));
	
}





//  Custom Search Form

function sixthman_search_form() { ?>

	<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="form-group">
			<label class="sr-only" for="search">Search</label>
			<input type="search" id="search" class="form-control" placeholder="Search …" value="" name="s" title="Search for:" />
		</div>
		<input type="submit" class="btn btn-primary btn-block" value="Search" />
	</form>

<?php
}




