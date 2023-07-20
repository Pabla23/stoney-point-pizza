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
		<?php the_post_thumbnail(); ?>

		<section class="standards-intro-section">
			<?php
			if( function_exists( 'get_field' ) ) {
				if( get_field( 'introduction_paragraph' ) ) {
					?>
					<p><?php the_field( 'introduction_paragraph' ); ?></p>
					<?php
				}
			}
			?>
		</section>

		<?php
		$sections = array( 'pizza_preparation', 'pizza_packaging', 'timely_and_professional_delivery');

		foreach( $sections as $section) {
			?>
			<section>
				<?php
				if( have_rows( $section ) ) {

					if( $section === 'pizza_preparation' ) {
						?>
						<h2>Pizza Preparation</h2>
						<?php
					}
					else if( $section === 'pizza_packaging' ) {
						?>
						<h2>Pizza Packaging</h2>
						<?php
					}
					else if( $section === 'timely_and_professional_delivery' ) {
						?>
						<h2>Pizza Delivery</h2>
						<?php
					}

					while( have_rows( $section ) ) : the_row();

						$heading = get_sub_field( $section . '_heading' );
						$paragraph = get_sub_field( $section . '_paragraph' );
						?>
						<h3><?php echo $heading; ?></h3>
						<p><?php echo $paragraph; ?></p>
						<?php

					endwhile;
				}
				?>
			</section>

			<section class="standards-conclusion-section">
				<?php
				if( function_exists( 'get_field' ) ) {

					?>
					<h2>Your Feedback</h2>
					<?php

					if( get_field( 'packaging_&_standards_conclusion' ) ) {
						?>
						<p><?php the_field( 'packaging_&_standards_conclusion' ); ?></p>
						<?php
					}

					if ( get_field( 'link_to_location_contact' ) ) {
						?>
						<a href="<?php the_field( 'link_to_location_contact' ); ?>" class="standards-page-btn btn"><p>Contact Us</p></a>
						<?php
					}
				}
				?>
			</section>
			<?php
		}
		?>

	</main><!-- #main -->

<?php
get_footer();
