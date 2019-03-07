<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_nn_theme
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php
		wp_nav_menu([
		     'menu'            => 'secondary',
		     'theme_location'  => 'menu-footer',
		     'container'       => 'div',
		     'container_id'    => 'navbarCollapse',
		     'container_class' => 'collapse navbar-collapse',
		     'menu_id'         => false,
		     'menu_class'      => 'navbar-nav mr-auto nav-left',
		     'depth'           => 0,
		     'fallback_cb'     => 'tcnavwalker::fallback',
		     'walker'          => new tcnavwalker()
		]);
		?>
		<div class="site-info">
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Copyright Reserved &copy; %d', 'wp_nn_theme' ), date('Y') );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
