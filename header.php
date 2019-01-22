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
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<div class="site-branding">
				<a class="navbar-brand" href="#">
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'">';
					} else {
						echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
					}
					?>
				</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			   wp_nav_menu([
			     'menu'            => 'primary',
			     'theme_location'  => 'menu-1',
			     'container'       => 'div',
			     'container_id'    => 'navbarCollapse',
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
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp_nn_theme' ); ?></a>
	<div id="content" class="site-content row">
