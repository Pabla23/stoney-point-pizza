<?php

function spp_register_custom_post_types() {

    //register testimonials post type
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name'  ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name'  ),
        'menu_name'          => _x( 'Testimonials', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial'  ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No testimonials found.' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( array( 'core/quote' ) ),
        'template_lock'      => 'all',
    );

    register_post_type( 'spp-testimonial', $args );

    //register locations post type
    $labels = array(
        'name'               => _x( 'Locations', 'post type general name'  ),
        'singular_name'      => _x( 'Location', 'post type singular name'  ),
        'menu_name'          => _x( 'Locations', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Location', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'location' ),
        'add_new_item'       => __( 'Add New Location' ),
        'new_item'           => __( 'New Location' ),
        'edit_item'          => __( 'Edit Location' ),
        'view_item'          => __( 'View Location'  ),
        'all_items'          => __( 'All Locations' ),
        'search_items'       => __( 'Search Locations' ),
        'parent_item_colon'  => __( 'Parent Locations:' ),
        'not_found'          => __( 'No locations found.' ),
        'not_found_in_trash' => __( 'No locations found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'show_ui'            => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'locations' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-location-alt',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'spp-location', $args );

    //register menu items post type
    $labels = array(
        'name'               => _x( 'Menu Items', 'post type general name'  ),
        'singular_name'      => _x( 'Menu Item', 'post type singular name'  ),
        'menu_name'          => _x( 'Menu Items', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Menu Item', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'menu item' ),
        'add_new_item'       => __( 'Add New Menu Item' ),
        'new_item'           => __( 'New Menu Item' ),
        'edit_item'          => __( 'Edit Menu Item' ),
        'view_item'          => __( 'View Menu Item'  ),
        'all_items'          => __( 'All Menu Items' ),
        'search_items'       => __( 'Search Menu Items' ),
        'parent_item_colon'  => __( 'Parent Menu Items:' ),
        'not_found'          => __( 'No menu items found.' ),
        'not_found_in_trash' => __( 'No menu items found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'show_ui'            => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'items' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-food',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'spp-item', $args );
}

add_action( 'init', 'spp_register_custom_post_types' );

function spp_register_taxonomies() {
    //register menu category taxonomy
    $labels = array(
        'name'              => _x( 'Menu Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Menu Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Menu Categories' ),
        'all_items'         => __( 'All Menu Category' ),
        'parent_item'       => __( 'Parent Menu Category' ),
        'parent_item_colon' => __( 'Parent Menu Category:' ),
        'edit_item'         => __( 'Edit Menu Category' ),
        'view_item'         => __( 'View Menu Category' ),
        'update_item'       => __( 'Update Menu Category' ),
        'add_new_item'      => __( 'Add New Menu Category' ),
        'new_item_name'     => __( 'New Menu Category Name' ),
        'menu_name'         => __( 'Menu Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'menu-category' ),
    );

    register_taxonomy( 'spp-itemcategory', array( 'spp-item' ), $args );
}

add_action( 'init', 'spp_register_taxonomies' );

//flush rewrite rules on theme activation... just in case
function spp_rewrite_flush() {
    spp_register_custom_post_types();
    spp_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'spp_rewrite_flush' );
?>