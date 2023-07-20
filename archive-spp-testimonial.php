<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stoney_Point_Pizza_Co.
 */

get_header();
?>

	<main id="primary" class="site-main">

			<header class="page-header">
				<?php
					$archive_title = get_the_archive_title();
					$archive_title = str_replace('Archives: ', '', $archive_title);
				?>
				<h1><?php echo $archive_title; ?></h1>
			</header><!-- .page-header -->

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