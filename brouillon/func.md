<!-- error 1 -->
function enqueue_product_scripts() {
	// enqueue single product scripts and styles
	if ( is_product() ) :
		wp_enqueue_script( 'product-overlay-script', get_template_directory_uri() . '/js/product-overlay.js', array( 'jquery' ), '1.0', true );
	endif;
	// enqueue product archive scripts and styles
	if ( is_post_type_archive( 'product' ) ) :
		wp_enqueue_script( 'product-archive-tabs', get_template_directory_uri() . '/js/product-archive-tabs.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'product-archive-slick', get_template_directory_uri() . '/js/start-slick.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'enqueue_product_scripts' );




<!-- error 2 -->
// change product archive image size
function woocommerce_template_loop_product_thumbnail() {
	echo woocommerce_get_product_thumbnail('medium');
}




<!-- error 3 -->
} else {
    $html  = '<figure class="bundled_product_image woocommerce-product-gallery__image--placeholder">';
    $html .= sprintf( '<a href="%1$s" class="placeholder_image zoom" data-rel="%3$s"><img class="wp-post-image" src="%1$s" alt="%2$s"/></a>', wc_placeholder_img_src(), __( 'Bundled product placeholder image', 'woocommerce-product-bundles' ), $image_rel );
    $html .= '</figure>';
}
from here: // change product bundle image size... code copied from plugin template then adjusted
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
        $html  = '<figure class="bundled_product_image woocommerce-product-gallery__image--placeholder">';
        $html .= sprintf( '<a href="%1$s" class="placeholder_image zoom" data-rel="%3$s"><img class="wp-post-image" src="%1$s" alt="%2$s"/></a>', wc_placeholder_img_src(), __( 'Bundled product placeholder image', 'woocommerce-product-bundles' ), $image_rel );
        $html .= '</figure>';
    }

    return $html;
}
add_filter( 'woocommerce_bundled_product_image_html', 'custom_woocommerce_bundled_product_image_html', 10, 3 );

