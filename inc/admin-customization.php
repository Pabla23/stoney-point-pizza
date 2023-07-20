<?php
/**
 *************** Admin Customization Features ***************
 * 
 * Section 1: Login Page Customization
 * Section 2: Dashboard Widget Customization
 * Section 3: Dashboard Menu Customization
 * 
 * 
 * 
 * 
 */

 /**
  *************** Section 1: Login Page Customization ***************
  * Source: https://codex.wordpress.org/Customizing_the_Login_Form
  *
  */

 //// Replaces the WordPress logo with your own custom logo
 //// Note: you must add your own logo to an "images" folder within your theme. Adjust CSS values accordingly
 function spp_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo1-v2-solid.png);
		height:140px;
		width:320px;
		background-size: 140px 140px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'spp_login_logo' );


// Changes the logo link so that it points to your site, instead of wordpress.org
function spp_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'spp_login_logo_url' );

function spp_login_logo_url_title() {
    return 'Stoney Point Pizza - Home';
}
add_filter( 'login_headertext', 'spp_login_logo_url_title' );


// Links your own custom CSS stylesheet for the login page
function spp_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'spp_login_stylesheet' );


 /**
  *************** Section 2: Dashboard Widget Customization ***************
  * Source: https://developer.wordpress.org/apis/dashboard-widgets/
  *
  */

  //// Removes the Quick Draft widget from the dashboard
  //// Note: see the docs for a full list of the default widget names
function spp_remove_dashboard_widget() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
} 
add_action( 'wp_dashboard_setup', 'spp_remove_dashboard_widget' );


//// Defines the content of a new custom dashboard widget
function spp_dashboard_widget_function( $post, $callback_args ) {
	esc_html_e( "Hello FWD33, this is my first custom Dashboard Widget!", "textdomain" );
}

//// Defines the content of a custom widget containing an embedded video
function spp_video_widget_function( $post, $callback_args ) { ?>
	<iframe 
	width="400" 
	height="315" 
	src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
	title="YouTube video player" 
	frameborder="0" 
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
	allowfullscreen></iframe>
	<?php
}

//// Adds the new widgets to the Dashboard
function spp_add_dashboard_widgets() {
	wp_add_dashboard_widget( 'dashboard_widget', "Connor's Custom Dashboard Widget", 'spp_dashboard_widget_function' );
	wp_add_dashboard_widget( 'dashboard_widget', "Connor's Video Widget", 'spp_video_widget_function' );
}
add_action( 'wp_dashboard_setup', 'spp_add_dashboard_widgets' );


 /**
  *************** Section 3: Dashboard Menu Customization ***************
  * Source: https://developer.wordpress.org/apis/dashboard-widgets/
  *
  */

//// Establishes a custom admin menu order
//// Note: If you're renaming menu items, make sure you reorder the menu FIRST. Otherwise, you may end up renaming the wrong menu item!
function spp_custom_menu_order( $menu_ord ) {

     if ( !$menu_ord ) return true;

     return array(

      'index.php', // Dashboard
      'separator1', // First separator
      'edit.php?post_type=page', // Pages
		  'edit.php?post_type=spp-location', // Locations
		  'edit.php?post_type=spp-item', // Menu Items
		  'edit.php?post_type=spp-testimonial', // Testimonials

     );
}
add_filter( 'custom_menu_order', 'spp_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'spp_custom_menu_order', 10, 1 );

  //// The following function features a number of changes to the WP admin menu bar
  //// Note: you can get a list of all menu items by running the following line of code on a page template and then copying and saving the result. Replace 'menu' with 'submenu' for submenu info
  //// echo '<pre>' . print_r( $GLOBALS[ 'menu' ], true) . '</pre>';
  function spp_custom_admin_menu_changes() {

	//// Note: Rename any menu items before removing any menu items. When you remove an item with remove_menu_page, it remains in the menu item array
	//// Renames a menu item
	// global $menu;
	// $menu[7][0] = 'Pics N Stuff';

	// //// Renames a submenu item
	// global $submenu;
	// $submenu['upload.php'][5][0] = 'Pics Library';

	//// Removes an item from the admin menu
	remove_menu_page( 'edit.php' );

  }
  add_action( 'admin_init', 'spp_custom_admin_menu_changes' );
?>