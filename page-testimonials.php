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

		<h1><?php the_title(); ?></h1>

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

	</main><!-- #main -->

<?php
get_footer();
