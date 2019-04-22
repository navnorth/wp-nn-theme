<?php
/**
 * The front page template file
 *
 * @package wp_nn_theme
 */

get_header();
?>
<div id="main">
    <div id="tc-heading" class="heading">
        <?php if (get_field('home_page_banner_image_1')): ?>
        <div class="col-md-4 padding-none">
            <img src="<?php echo the_field('home_page_banner_image_1'); ?>" class="head-banner" />
        </div>
        <?php endif; ?>
        <?php if (get_field('home_page_banner_image_2')): ?>
        <div class="col-md-4 padding-none">
            <img src="<?php echo the_field('home_page_banner_image_2'); ?>" class="head-banner" />
        </div>
        <?php endif; ?>
        <?php if (get_field('home_page_banner_image_3')): ?>
        <div class="col-md-4 padding-none">
            <img src="<?php echo the_field('home_page_banner_image_3'); ?>" class="head-banner" />
        </div>
        <?php endif; ?>
        <div class="primary-title" id="banner-heading">
            <?php if (get_field('home_page_primary_title')): ?>
            <h1 id="banner-title"><?php echo the_field('home_page_primary_title'); ?></h1>
            <?php endif; ?>
            <?php if (get_field('home_page_tagline')): ?>
            <h2 id="banner-subtitle"><?php echo the_field('home_page_tagline'); ?></h2>
            <?php endif; ?>
        </div>
    </div>
</div><!-- #primary -->

<?php
get_footer();