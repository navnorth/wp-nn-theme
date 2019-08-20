<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_nn_theme
 */
global $post_id;
get_header();
$results = array();
?>

	<section id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'wp_nn_theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if (get_post_type() == "lesson-plans") {
					$results[] = array(
							'typeId' => 1,
							'type' => __("Inquiry Sets", 'wp_nn_theme'),
							'post' => $post
							);
				} elseif(get_post_type() == "resource"){
					if (is_inquiryset_resource($post->post_title)){
						$results[] = array(
							'typeId' => 3,
							'type' => __("Primary Sources", 'wp_nn_theme'),
							'post' => $post
						);
					}
				} else {
					$results[] = array(
						'typeId' => 2,
						'type' => __("Pages/Posts", 'wp_nn_theme'),
						'post' => $post
					);
				}

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' );

			endwhile;
			
			usort($results, 'tc_compareType');
				
			foreach($results as $result) {
				$post_id = $result['post']->ID;
				
				get_template_part("template-parts/content", "search");
			}


		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
