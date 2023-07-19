<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stoney_Point_Pizza_Co.
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="store-hours">
			<?php
			$args = array(
					'post_type'      => 'spp-location',
					'posts_per_page' => 1,
					'order'          => 'ASC',
				);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				
				while( $query->have_posts() ) {
					$query->the_post();

					if( function_exists( 'get_field' ) ) {
							if( get_field( 'opening_hours' ) ) {
								?>
								<p><?php the_field( 'opening_hours' ); ?></p>
								<?php
							}
					}
				}
				wp_reset_postdata();
			}
			?>
		</div>

		<div class="footer-menus">
			<nav id="footer-links" class="footer-links">
				<?php
					wp_nav_menu( array( 'theme_location' => 'footer-links' ) ); 
				?>
			</nav>

			<nav id="footer-socials" class="footer-socials">
				<?php
					wp_nav_menu( array( 'theme_location' => 'footer-socials' ) );
				?>
			</nav>
				
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
