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

		<?php if ( have_posts() ) : ?>

			<h1>Testimonials</h1>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				?>
				<article>
					<?php the_content(); ?>
				</article>
				<?php

			endwhile;


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
