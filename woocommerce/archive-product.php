<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	woocommerce_product_loop_start();

	?>

	<div class="slider-container pizza-container">
		<h2>Pizza</h2>

		<div class="nav-slider pizza-slider">
			<?php
			// Get the names and slugs of sub categories from "pizza" category to loop through
			$pizza_names = array();
			$pizza_items = array();

			$args = array(
				'taxonomy' => 'product_cat',
				'parent' => 43
			);
			$terms = get_terms($args);

			foreach($terms as $term) {
				array_push($pizza_names, $term->name);
				array_push($pizza_items, $term->slug);
			}

			// loop through pizza categories to create buttons
			foreach($pizza_names as $pizza) :
				?>
				<button class="pizza-type-button"><?php echo $pizza; ?></button>
				<?php
			endforeach;
			?>
		</div>

		<div class="slider-items pizza-items">
			<?php

			foreach($pizza_items as $pizza) :
				?>
				<div class="slider-item pizza-item">
					<?php
						$args = array(
							'post_type' => 'product',
							'product_cat' => $pizza,
							'posts_per_page' => -1
						);

						$loop = new WP_Query($args);

						if ($loop->have_posts()) :
							while ($loop->have_posts()) :
								$loop->the_post();
								wc_get_template_part('content', 'product');
							endwhile;
						endif;

						wp_reset_query();
					?>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>

	<div class="build-own-container">
		<h2>Build Your Own</h2>
		<?php
			$args = array(
				'post_type' => 'product',
				'product_cat' => 'build-your-own',
				'posts_per_page' => -1
			);

			$loop = new WP_Query($args);

			if ($loop->have_posts()) :
				while ($loop->have_posts()) :
					$loop->the_post();
					wc_get_template_part('content', 'product');
				endwhile;
			endif;

			wp_reset_query();
		?>
	</div>

	<div class="slider-container specialty-container">
		<div class="nav-slider specialty-slider">
			<?php
			$specialty_names = array();
			$specialty_items = array();

			$args = array(
				'taxonomy' => 'product_cat',
				'parent' => 44
			);
			$terms = get_terms($args);

			foreach($terms as $term) :
				array_push($specialty_names, $term->name);
				array_push($specialty_items, $term->slug);
			endforeach;

			// loop through specialty categories to create buttons
			foreach($specialty_names as $specialty) :
				?>
				<button class="specialty-type-button"><?php echo $specialty; ?></button>
				<?php
			endforeach;
			?>
		</div>

		<div class="slider-items specialty-items">
			<?php

			foreach($specialty_items as $specialty) :
				?>
				<div class="slider-item specialty-item">
					<?php
						$args = array(
							'post_type' => 'product',
							'product_cat' => $specialty,
							'posts_per_page' => -1
						);

						$loop = new WP_Query($args);

						if ($loop->have_posts()) :
							while ($loop->have_posts()) :
								$loop->the_post();
								wc_get_template_part('content', 'product');
							endwhile;
						endif;

						wp_reset_query();
					?>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>

	<div class="deals-container">
		<h2>Deals</h2>
		<?php
		
			$args = array(
				'post_type' => 'product',
				'product_cat' => 'deals',
				'posts_per_page' => -1
			);

			$loop = new WP_Query($args);

			if ($loop->have_posts()) :
				while ($loop->have_posts()) :
					$loop->the_post();
					echo '<div class="deal-item">';
					wc_get_template_part('content', 'product');
					echo '</div>';
				endwhile;
			endif;

			wp_reset_query();
		?>
	</div>

	<?php

	woocommerce_product_loop_end();

} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
