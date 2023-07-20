<?php
/**
 * Stoney Point Pizza Co. functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stoney_Point_Pizza_Co.
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stoney_point_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Stoney Point Pizza Co., use a find and replace
		* to change 'stoney-point' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'stoney-point', get_template_directory() . '/languages' );

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
			'menu-1'         => esc_html__( 'Primary', 'stoney-point' ),
			'footer-links'   => esc_html__( 'Footer Links', 'stoney-point' ),
			'footer-socials' => esc_html__( 'Footer Socials', 'stoney-point' ),
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
			'stoney_point_custom_background_args',
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

	/**
	 * Adds custom images sizes
	 * 
	 */
	// Images for the featured items on the home page
	add_image_size( 'feature-home', 750, 450, true);
	add_image_size( 'feature-home-square', 600, 600, true);

	// Image size for the images on the about page
	add_image_size( 'info-about', 400, 500, true);
	


}
add_action( 'after_setup_theme', 'stoney_point_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stoney_point_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stoney_point_content_width', 640 );
}
add_action( 'after_setup_theme', 'stoney_point_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stoney_point_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'stoney-point' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'stoney-point' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'stoney_point_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stoney_point_scripts() {
	wp_enqueue_style( 'stoney-point-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'stoney-point-style', 'rtl', 'replace' );

	wp_enqueue_script( 'stoney-point-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue Swiper on the home page
	if( is_front_page() ) {

		wp_enqueue_style(
			'swiper-styles',
			get_template_directory_uri() . '/css/swiper-bundle.css',
			array(),
			'10.0.3'
		);

		wp_enqueue_script(
			'swiper-scripts',
			get_template_directory_uri() . '/js/swiper-bundle.min.js',
			array(),
			'10.0.3',
			true
		);

		wp_enqueue_script(
			'swiper-settings',
			get_template_directory_uri() . '/js/swiper-settings.js',
			array( 'swiper-scripts' ),
			_S_VERSION,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'stoney_point_scripts' );

/**
 * Admin customization features
 */
// require get_template_directory() . 'inc/admin-customization.php';

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
 * Custom post types and taxonomy.
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// hide default post type of posts from admin menu
function hide_posts_from_admin_menu() {
	remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'hide_posts_from_admin_menu' );

/**
 * STONEY POINT WOOCOMMERCE ENQUEUE SCRIPTS AND CSS
 */


//  my version because of the previous error
function enqueue_product_scripts() {
	// Enqueue single product scripts and styles
	if ( is_singular( 'product' ) ) {
		wp_enqueue_script( 'product-overlay-script', get_template_directory_uri() . '/js/product-overlay.js', array( 'jquery' ), '1.0', true );
	}
	
	// Enqueue product archive scripts and styles
	if ( is_post_type_archive( 'product' ) ) {
		wp_enqueue_script( 'product-archive-tabs', get_template_directory_uri() . '/js/product-archive-tabs.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'product-archive-slick', get_template_directory_uri() . '/js/start-slick.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_product_scripts' );


/**
 * STONEY POINT WOOCOMMERCE OVERRIDES
 */

// disable sku on single product page
add_filter( 'wc_product_sku_enabled', '__return_false' );

// change product loop title to h3
function woocommerce_template_loop_product_title() {
	echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h3>';
}

// change product loop image size
function woocommerce_template_loop_product_thumbnail() {
	global $product;

	echo $product->get_image('medium');
}

// change product bundle image size... code copied from plugin template then adjusted
function custom_woocommerce_bundled_product_image_html($html, $product_id, $bundled_item) {
	if ( has_post_thumbnail( $product_id ) ) {
			$image_post_id = get_post_thumbnail_id( $product_id );
			$image_title   = esc_attr( get_the_title( $image_post_id ) );
			$image_data    = wp_get_attachment_image_src( $image_post_id, 'medium' ); // Change 'full' to 'medium' for the desired image size
			$image_link    = $image_data[0];
			$image         = wp_get_attachment_image( $image_post_id, 'medium', false, array(
					'title'                   => $image_title,
					'data-caption'            => get_post_field( 'post_excerpt', $image_post_id ),
					'data-large_image'        => $image_link,
					'data-large_image_width'  => $image_data[1],
					'data-large_image_height' => $image_data[2],
			) );

			$html  = '<figure class="bundled_product_image woocommerce-product-gallery__image">';
			$html .= sprintf( '<a href="%1$s" class="image zoom" title="%2$s">%3$s</a>', $image_link, $image_title, $image );
			$html .= '</figure>';
	} else {
			$image_rel = '';
			$html  = '<figure class="bundled_product_image woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<a href="%1$s" class="placeholder_image zoom" data-rel="%3$s"><img class="wp-post-image" src="%1$s" alt="%2$s"/></a>', wc_placeholder_img_src(), __( 'Bundled product placeholder image', 'woocommerce-product-bundles' ), $image_rel );
			$html .= '</figure>';
	}

	return $html;
}
add_filter( 'woocommerce_bundled_product_image_html', 'custom_woocommerce_bundled_product_image_html', 10, 3 );