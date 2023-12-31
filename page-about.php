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
		
		<section class="about-intro-section">
		
			<h1><?php the_title(); ?></h1>

			<?php
			the_post_thumbnail();
			?>

			<a href="<?php echo esc_url( get_permalink( 14 ) ); ?>" class="order-btn btn">Order Now</a>

		</section>
		<div class="border-div">
		<section class="about-info-section">
			<article>
				<?php
				if( function_exists( 'get_field' ) ) {
					if( get_field( 'history_heading' ) ) {
						?>
						<h2><?php the_field( 'history_heading' ); ?></h2>
						<?php
					}

					if( get_field( 'company_history' ) ) {
						?>
						<p><?php the_field( 'company_history' ); ?></p>
						<?php
					}

					if( get_field( 'history_image' ) ) {
						$image = get_field( 'history_image' );
						$size = 'info-about';
						echo wp_get_attachment_image( $image, $size );
					}
				}
				?>
			</article>

			<article>
				<?php
				if( function_exists( 'get_field' ) ) {
					if( get_field( 'mission_heading' ) ) {
						?>
						<h2><?php the_field( 'mission_heading' ); ?></h2>
						<?php
					}

					if( get_field( 'company_mission' ) ) {
						?>
						<p><?php the_field( 'company_mission' ); ?></p>
						<?php
					}

					if( get_field( 'mission_image' ) ) {
						$image = get_field( 'mission_image' );
						$size = 'info-about';
						echo wp_get_attachment_image( $image, $size );
					}
				}
				?>
			</article>
		</section>

		<section class="about-founders-section">
			<h2>Our Founders</h2>
			<?php
			if( have_rows( 'owner_bios' ) ) {
				while( have_rows( 'owner_bios' ) ) : the_row();
				?>
					<div class="bio">
						<h3><?php echo get_sub_field( 'owner_name' ); ?></h3>
						<?php
						echo wp_get_attachment_image( get_sub_field( 'owner_picture' ), 'info-about');
						?>
						<p><?php echo get_sub_field( 'owner_description' ); ?></p>
					</div>
					<?php
				endwhile;
			}
			?>

		</section>

		<section class="about-testimonial-section">
			<h2>Customer Reviews</h2>
			<?php
			$args = array(
				'post_type'      => 'spp-testimonial',
				'posts_per_page' => 3,
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
			
			if( function_exists( 'get_field' ) ) {
				if( get_field( 'link_to_testimonials' ) ) {
					?>
					<a href="<?php the_field( 'link_to_testimonials' ); ?>" class="testimonial-page-btn btn">Read More</a>
					<?php
				}
			}
			?>
		</section>

		<section class="about-standards-section">
			<?php
			if( function_exists( 'get_field' ) ) {
				if( get_field( 'standards_heading' ) ) {
					?>
					<h2><?php the_field( 'standards_heading' ); ?></h2>
					<?php
				}
				if( get_field( 'standards_blurb' ) ) {
					?>
					<p><?php the_field( 'standards_blurb' ); ?></p>
					<?php
				}
				if( get_field('link_to_standards') ) {
					?>
					<a href="<?php the_field( 'link_to_standards' ); ?>" class="standards-page-btn btn">Read More</a>
					<?php
				}
			}
			?>
		</section>
		</div>
	</main><!-- #main -->

<?php
get_footer();
