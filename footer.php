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
</div><!-- #page -->
<footer id="nn-footer" class="site-footer">
	<div class="container">
		<div class="row">
			<div class=" col-md-6 col-sm-8 col-xs-12">
				<?php
				wp_nav_menu([
				     'menu'            => 'secondary',
				     'theme_location'  => 'menu-footer',
				     'container'       => 'div',
				     'container_id'    => 'navbar-footer',
				     'container_class' => 'footer-navbar-collapse',
				     'menu_id'         => false,
				     'menu_class'      => 'nn-menu-footer',
				     'depth'           => 0,
				     'fallback_cb'     => 'tcnavwalker::fallback',
				     'walker'          => new tcnavwalker()
				]);
				?>
			</div>
			<div class="col-md-6 col-sm-4 col-xs-12">
				<ul class="nn-social-links">
				<?php
				$facebook = get_option("wp_nn_theme_social_facebook");
				if ($facebook) {
					echo "<li><a href='".$facebook."' target='_blank'><i class='fab fa-facebook-square fa-2x'></i></a></li>";
				}
				
				$twitter = get_option("wp_nn_theme_social_twitter");
				if ($twitter) {
					echo "<li><a href='".$twitter."' target='_blank'><i class='fab fa-twitter fa-2x'></i></a></li>";
				}
				
				$instagram = get_option("wp_nn_theme_social_instagram");
				if ($instagram) {
					echo "<li><a href='".$instagram."' target='_blank'><i class='fab fa-instagram fa-2x'></i></a></li>";
				}
				
				$flickr = get_option("wp_nn_theme_social_flickr");
				if ($flickr) {
					echo "<li><a href='".$flickr."' target='_blank'><i class='fab fa-flickr fa-2x'></i></a></li>";
				}
				?>
				</ul>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
