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
        <div class="tc-heading-wrapper">
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
    </div>
    <div id="tc-highlights">
        <div class="tc-highlights-wrapper">
            <div class="row">
                <div id="tc-highlight-box">
                    <div class="col-md-7" id="tc-highlight-left">
                        <?php if (get_field('home_page_highlight_title')): ?>
                        <h2><?php echo the_field('home_page_highlight_title'); ?></h2>
                        <?php endif; ?>
                        <?php if (get_field('home_page_highlight_text')): ?>
                        <div class="tc-highlight-text">
                            <?php echo the_field('home_page_highlight_text'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-5 padding-none" id="tc-highlight-right">
                        <?php if (get_field('home_page_learn_more_text')): ?>
                        <div class="tc-learn-more-text">
                            <?php the_field('home_page_learn_more_text'); ?>
                        </div>
                        <?php endif; ?>
                        <?php if (get_field('home_page_learn_more_button_label')): ?>
                        <div class="tc-learn-more">
                            <a href="<?php the_field('home_page_learn_more_button_url'); ?>" class="tc-learn-more-button"><?php the_field('home_page_learn_more_button_label'); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- #primary -->

<?php
get_footer();