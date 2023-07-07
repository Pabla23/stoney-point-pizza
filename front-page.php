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

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<section class="home-intro-section">
			<?php
			the_title();
			the_custom_logo();
			?>
			<a href="<?php echo esc_url( get_permalink( 14 ) ); ?>" class="order-btn btn"><p>Order Now</p></a>
		</section>

		<section class="home-promotions-section">
			<h2>Promotions:</h2>

			<?php
			$args = array(
				'post_type'      => 'shop_coupon',
				'posts_per_page' => 4,
			);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?>
				<div class="swiper">
					<div class="swiper-wrapper">
					<?php
					while( $query->have_posts() ) {
						$query->the_post();
						?>
						<div class="swiper-slide">
							<p>Code: <?php the_title(); ?></p>
							<?php the_excerpt(); ?>
						</div>
						<?php
					}
					?>
					</div>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
				<?php
				wp_reset_postdata();
			}
			?>

			<?php
			$args = array(
				'post_type'      => 'spp-testimonial',
				'posts_per_page' => 1,
			);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?>
				<div class="rand-testimonial">
				<?php
				while( $query->have_posts() ) {
					$query->the_post();
					the_content();
				}
				?>
				</div>
				<?php
				wp_reset_postdata();
			}
			?>
		</section>

		<section class="home-features-section">
			<?php
			$args = array(
				'post_type'      => 'spp-item',
				'posts_per_page' => 3,
				'orderby'        => 'rand',
				'tax_query'      => array(
					array(
						'taxonomy' => 'spp-itemcategory',
						'field'    => 'slug',
						'terms'    => 'signature-pizzas',
					),
				),
			);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {

				while( $query->have_posts() ) {
					$query->the_post();
					?>
					<article class="item-container">
						<?php the_post_thumbnail( 'feature-home' ); ?>
						<h3><?php the_title(); ?></h3>						
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</section>

		<section class="home-about-section">
			<?php
			if( function_exists( 'get_field' ) ) {
				if( get_field( 'about_section_heading' ) ) {
					?>
					<h2><?php the_field( 'about_section_heading' ); ?></h2>
					<?php
				}

				if( get_field( 'about_section_excerpt' ) ) {
					?>
					<p><?php the_field( 'about_section_excerpt' ); ?></p>
					<?php
				}

				if( get_field( 'read_more' ) ) {
					?>
					<a href="<?php the_field( 'read_more' ); ?>" class="read-more-btn btn">Read More</a>
					<?php
				}
			}
			?>
		</section>
	</main><!-- #main -->

<?php

get_footer();
