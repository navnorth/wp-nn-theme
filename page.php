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
 * @package wp_nn_theme
 */
global $post; 
get_header();
$col = 12;
if (is_active_sidebar('sidebar-1'))
	$col = 8;

$front_page_id = get_option('page_on_front');

?>
<div id="tc-heading" class="heading">
	<div class="tc-heading-wrapper">
	    <?php if (get_field('home_page_banner_image_1', $front_page_id)): ?>
	    <div class="col-md-4 padding-none">
		<div class="banner-overlay overlay-green"></div>
		<div style="background-image: url(<?php echo the_field('home_page_banner_image_1', $front_page_id); ?>)" class="head-banner"></div>
	    </div>
	    <?php endif; ?>
	    <?php if (get_field('home_page_banner_image_2', $front_page_id)): ?>
	    <div class="col-md-4 padding-none">
		<div class="banner-overlay overlay-orange"></div>
		<div style="background-image: url(<?php echo the_field('home_page_banner_image_2', $front_page_id); ?>)" class="head-banner"></div>
	    </div>
	    <?php endif; ?>
	    <?php if (get_field('home_page_banner_image_3', $front_page_id)): ?>
	    <div class="col-md-4 padding-none">
		<div class="banner-overlay overlay-pink"></div>
		<div style="background-image: url(<?php echo the_field('home_page_banner_image_3', $front_page_id); ?>)" class="head-banner"></div>
	    </div>
	    <?php endif; ?>
	    <div class="primary-title" id="page-banner-heading">
		<h1 id="page-banner-title"><?php echo get_the_title($post->ID); ?></h1>
	    </div>
	</div>
</div>
	<div id="primary" class="content-area col-md-<?php echo $col; ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
