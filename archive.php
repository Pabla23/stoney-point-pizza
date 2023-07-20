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

	<main id="primary" class="site-main archive-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					$archive_title = get_the_archive_title();
					$archive_title = str_replace('Archives: ', '', $archive_title);
				?>
				<h1><?php echo $archive_title; ?></h1>
			</header><!-- .page-header -->
			<div class="border-div">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
