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
            </div><!-- Highlights -->
            <div class="row">
                <div id="tc-quote-box">
                    <div class="col-md-3" id="quote-img">
                        <?php if (get_field('home_page_quote_image')): ?>
                        <img src="<?php echo the_field('home_page_quote_image'); ?>" class="qImg">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9" id="quote-text">
                        <div class="tc-quote">
                            <?php if (get_field('home_page_quote_text')): ?>
                            <div class="tc-quote-text"><?php echo the_field('home_page_quote_text'); ?></div>
                            <?php endif; ?>
                            <?php if (get_field('home_page_quote_source')): ?>
                            <footer class="quote-source"><?php echo the_field('home_page_quote_source'); ?></footer>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div><!-- Quotes -->
        </div>
    </div>
    <div id="tc-inquiry-sets">
        <div class="tc-inquiry-sets-wrapper">
            <div class="tc-inquiry-sets-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
                <div class="tc-inquiry-set-section">
                <?php if (get_field('home_page_explore_inquiry_set_header_text')): ?>
                    <p><?php the_field('home_page_explore_inquiry_set_header_text'); ?></p>
                <?php endif; ?>
                </div>
            </div>
            <div class="tc-inquiry-sets-grid-section clearfix">
                <?php for ($i=1;$i<=4;$i++) {
                    $set_name = "home_page_inquiry_set_".$i;
                ?>
                <div class="col-md-3 col-sm-6 tc-inquiry-sets-block-padding">
                    <div class="tc-inquiry-set-media-image">
                        <div class="tc-inquiry-set-image-thumbnail">
                            <div class="tc-inquiry-set-image-section">
                                <?php if (get_field($set_name."_image")): ?>
                                <img src="<?php echo the_field($set_name."_image"); ?>" alt="" class="img-thumbnail-square img-responsive img-loaded">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tc-inquiry-set-label">
                        <?php if (get_field($set_name."_link_label")): ?>
                        <h4><a href="<?php echo the_field($set_name."_link_url"); ?>"><?php echo the_field($set_name."_link_label"); ?></a></h4>
                        <?php endif; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div><!-- #primary -->

<?php
get_footer();