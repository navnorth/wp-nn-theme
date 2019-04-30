<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_nn_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cb6187e384f190012d555fa&product=inline-share-buttons-wp' async='async'></script>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp_nn_theme' ); ?></a>
<header id="masthead" class="site-header">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<div class="site-branding">
				<a class="site-brand" href="<?php echo site_url(); ?>">
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img class="header-logo" src="'. esc_url( $logo[0] ) .'">';
					}
					// echo '<h1 class="blogname">'. get_bloginfo( 'name' ) .'</h1>';
					?>
				</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			   wp_nav_menu([
			     'menu'            => 'primary',
			     'theme_location'  => 'menu-1',
			     'container'       => 'div',
			     'container_id'    => 'navbarTop',
			     'container_class' => 'collapse navbar-collapse',
			     'menu_id'         => false,
			     'menu_class'      => 'navbar-nav mr-auto nav-right',
			     'depth'           => 0,
			     'fallback_cb'     => 'tcnavwalker::fallback',
			     'walker'          => new tcnavwalker()
			   ]);
			?>
		</div>
	</nav>
</header><!-- #masthead -->
<?php
$container_class = " container";
if (is_front_page()){
	$container_class = "";
}
?>
<div id="page" class="site<?php echo $container_class; ?>">
	<div id="content" class="site-content">
