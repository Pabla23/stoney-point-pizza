<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stoney_Point_Pizza_Co.
 */

get_header();
?>

	<main id="primary" class="site-main">

		<h1><?php the_title(); ?></h1>
		
		<section class="contact-intro-section">

			<p>Don't feel like going out tonight? We deliver!</p>
			<a href="<?php echo esc_url( get_permalink( 14 ) ); ?>" class="order-btn btn"><p>Order Now</p></a>

		</section>

		<section class="contact-map-section">
			<h2>Quick Finder</h2>
			<?php
			if( function_exists( 'get_field' ) ) {
				if( get_field( 'google_map_stoney' ) ) {
					//output google map
					$location = get_field( 'google_map_stoney' );
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
					</div>
					<?php
				}
			}
			?>
		</section>

		<section class="contact-locations-section">
			<h2>Our Locations</h2>

			<?php
			$args = array(
				'post_type'      => 'spp-location',
				'posts_per_page' => -1,
				'order'          => 'ASC',
			);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				
				while( $query->have_posts() ) {
					$query->the_post();

					if( function_exists( 'get_field' ) ) {
						?>
						<article>

							<h3><?php the_title(); ?></h3>
							<a href="<?php echo esc_url( get_permalink( 14 ) ); ?>" class="order-btn btn"><p>Order</p></a>

							<?php
							if( get_field( 'restaurant_address' ) ) {
								?>
								<p><?php the_field( 'restaurant_address' ); ?></p>
								<?php
							}

							if( get_field( 'phone_number' ) ) {
								?>
								<p>Phone: <?php the_field( 'phone_number' ); ?></p>
								<?php
							}
							?>

							<a href="<?php echo esc_url( get_permalink( 99 ) ); ?>"><p>Menu</p></a>

							<?php
							if( get_field( 'opening_hours' ) ) {
								?>
								<p><?php the_field( 'opening_hours' ); ?></p>
								<?php
							}
							?>

						</article>
						<?php
					}
				}
				?>
				<?php
				wp_reset_postdata();
			}
			?>
		</section>

		<section class="contact-form-section">
			<h2>Contact Us</h2>
			<a href="<?php echo get_post_type_archive_link( 'spp-testimonial' ); ?>"><p>Testimonial Archive</p></a>
			<?php the_content(); ?>
		</section>

	</main><!-- #main -->

<?php

get_footer();
