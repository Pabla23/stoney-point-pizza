<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Stoney_Point_Pizza_Co.
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'stoney-point' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below.', 'stoney-point' ); ?></p>
				<!-- link to home -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Home', 'stoney-point' ); ?></a>
				<!-- link to shop -->
				<a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Shop', 'stoney-point' ); ?></a>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
