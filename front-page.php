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
            <div class="col-md-4 padding-none banner-1">
                <div class="banner-overlay overlay-green"></div>
                <div style="background-image: url(<?php echo the_field('home_page_banner_image_1'); ?>)" class="head-banner"></div>
            </div>
            <?php endif; ?>
            <?php if (get_field('home_page_banner_image_2')): ?>
            <div class="col-md-4 padding-none banner-2">
                <div class="banner-overlay overlay-orange"></div>
                <div style="background-image: url(<?php echo the_field('home_page_banner_image_2'); ?>)" class="head-banner"></div>
            </div>
            <?php endif; ?>
            <?php if (get_field('home_page_banner_image_3')): ?>
            <div class="col-md-4 padding-none banner-3">
                <div class="banner-overlay overlay-pink"></div>
                <div style="background-image: url(<?php echo the_field('home_page_banner_image_3'); ?>)" class="head-banner"></div>
            </div>
            <?php endif; ?>
            <div class="primary-title" id="banner-heading">
                <?php if (get_field('home_page_primary_title')): ?>
                <h1 id="banner-title"><?php echo the_field('home_page_primary_title'); ?>: <span id="secondary-banner-title"><?php echo the_field('home_page_secondary_title'); ?></span></h1>
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
                <a href="<?php echo the_field($set_name."_link_url"); ?>">
                    <div class="col-md-3 col-sm-6 tc-inquiry-sets-block tc-inquiry-sets-block-padding move-up-left">
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
                            <h4><?php echo the_field($set_name."_link_label"); ?></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="tc-news-events">
        <div class="tc-news-events-wrapper">
            <?php if (get_field('home_page_news_header_text')): ?>
            <h2 class="tc-news-events-header"><?php echo the_field('home_page_news_header_text'); ?></h2>
            <?php endif; ?>
            <div id="tc-news-events-blocks">
                <?php for ($i=1;$i<=3;$i++) {
                    $events_name = "home_page_newsevent_".$i;
                ?>
                <div class="col-md-4 col-sm-6 tc-news-events-blocks-padding">
                    <div class="tc-news-events-block">
                        <div class="tc-events-media-image">
                            <div class="tc-events-image-thumbnail">
                                <div class="tc-events-image-section">
                                    <?php if (get_field($events_name."_image")): ?>
                                    <img src="<?php echo the_field($events_name."_image"); ?>" alt="" class="img-thumbnail-square img-responsive img-loaded">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tc-news-events-description">
                            <div class="tc-events-dates">
                                <?php if (get_field($events_name."_date")): ?>
                                <span><?php echo the_field($events_name."_date"); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if (get_field($events_name."_link_label")): ?>
                           <h4><a href="<?php echo the_field($events_name."_link_url"); ?>"><?php echo the_field($events_name."_link_label"); ?></a></h4>
                           <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div id="tc-news-events-all">
                <?php if (get_field('home_page_news_view_all_button_label')): ?>
                <a href="<?php echo the_field('home_page_news_view_all_button_url'); ?>" class="view-all-button"><?php echo the_field('home_page_news_view_all_button_label'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="tc-about">
        <div class="tc-about-wrapper">
            <div class="tc-about-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-orange"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-pink"></div>
                <div class="tc-about-section">
                <?php if (get_field('home_page_about_header_text')): ?>
                    <p><?php the_field('home_page_about_header_text'); ?></p>
                <?php endif; ?>
                </div>
            </div>
            <div class="tc-about-content clearfix">
                <div class="col-md-6 col-sm-12 tc-about-content-left padding-none">
                    <?php if (get_field('home_page_about_left_side')): ?>
                        <img class="logo" src="<?php echo the_field('home_page_about_left_side_logo'); ?>">
                        <div><i class="fal fa-map-marker-alt"></i><?php echo the_field('home_page_about_left_side_address'); ?></div>
                        <div><i class="fal fa-phone"></i><?php echo the_field('home_page_about_left_side_phone'); ?></div>
                        <?php if (get_field('home_page_about_left_side_fax')): ?>
                            <div><i class="fal fa-fax"></i><?php echo the_field('home_page_about_left_side_fax'); ?> FAX</div>
                        <?php endif; ?>
                        <?php if (get_field('home_page_about_left_side_email')): ?>
                            <div><i class="fal fa-envelope"></i><?php echo the_field('home_page_about_left_side_email'); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-12 tc-about-content-right padding-none">
                    <?php if (get_field('home_page_about_right_side_html_content')): ?>
                        <?php the_field('home_page_about_right_side_html_content'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- #primary -->

<?php
get_footer();