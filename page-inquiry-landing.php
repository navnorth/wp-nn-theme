<?php
/**
 * Template Name: Inquiry Landing
 * The template for displaying Inquiry Set Landing pages
 *
 * This is the template that displays the inquiry set landing pages.
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
?>
<main id="main" class="inquiry-landing-wrapper">
    <div class="inquiry-set-header-wrapper">
        <a class="back-button" href="http://chs-test.navigationnorth.com/inquiry-sets"><i class="fal fa-arrow-left"></i>BACK<span class="large-screen-back-btn"> TO INQUIRY SETS</span></a>
        <?php if (get_field('inquiry_set_landing_header')): ?>
            <h4 class="inquiry-sets-by-grade-header"><?php echo the_field('inquiry_set_landing_header'); ?></h4>
        <?php endif; ?>
    </div>
    <div class="inquiry-landing-content">
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
    </div>
</main>
<?php
get_sidebar();
get_footer();
