<?php
/**
 * The posts page template file
 *
 * @package wp_nn_theme
 */

get_header();
$col = 8;
?>

<div id="primary" class="content-area col-md-<?php echo $col; ?> mx-auto">
	<main id="main" class="site-main m-2">
    <h1 class="mt-5">News & Events</h1>
	<?php 
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
    
    <?php if ( $wpb_all_query->have_posts() ) : ?>
    
    <ul class="posts-list">
        <!-- the loop -->
        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
            <li class="post-tile">
                <div class="d-flex">
                    <div class="post-thumbnail-wrap col-md-4" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)"></div>
                    <div class="post-info col-md-8">
                        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        <p class="post-date"><?php the_date(); ?></p>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="tc-learn-more-button move-up-left">Read More</a>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        <!-- end of the loop -->
    
    </ul>
    
        <?php wp_reset_postdata(); ?>
    
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
