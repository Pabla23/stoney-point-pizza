<?php
/**
 * The template for displaying the Testimonials page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stoney_Point_Pizza_Co.
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="border-div">
		<h1><?php the_title(); ?></h1>

		<?php
				$args = array(
					'post_type'      => 'spp-testimonial',
					'posts_per_page' => -1,
					'orderby'        => 'rand',
				);

				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					?>
					<section class="testimonial-section">
					<?php
					while( $query->have_posts() ) {
						$query->the_post();

						the_content();
						
					}
					?>
					</section>
					<?php
					wp_reset_postdata();
				}
				?>
	</div>
	</main><!-- #main -->

<?php
get_footer();
