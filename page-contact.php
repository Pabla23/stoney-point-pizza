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
		<div class="border-div">
		<section class="contact-map-section">
			<h2>Quick Finder</h2>
			<?php
			if (have_rows('contact_map')) :
				?>
				<div class="acf-map">
					<?php while (have_rows('contact_map')) : the_row();
						$location = get_sub_field('location');
						$map_icon = get_sub_field('icon'); //custom marker icon 
						?>
						<div class="marker" 
							data-lat="<?php echo $location['lat']; ?>" 
							data-lng="<?php echo $location['lng']; ?>" 
							data-icon="<?php echo $map_icon //custom marker icon 
							; 
						?>">
								<h4><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('address'); ?></p>
								<p><?php the_sub_field('description'); ?></p>
						</div>
					<?php endwhile; ?>
				</div>
			<?php
			endif; ?>
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
							<a href="<?php echo esc_url( get_permalink( 14 ) ); ?>" class="order-btn btn">Order</a>

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
			<?php the_content(); ?>
		</section>
		</div>
	</main><!-- #main -->

<?php

get_footer();
