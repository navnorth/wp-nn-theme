<?php
/**
 * The about page template file
 *
 * @package wp_nn_theme
 */

get_header();
?>
<div id="main" class="about-wrapper">
    <div class="about white-background">
        <div class="about-content">
            <?php if (get_field('about_page_main_header')): ?>
            <div class="about-main-header">
                <h1><?php echo the_field('about_page_main_header'); ?></h1>
            </div>
            <?php endif; ?>
        <div class="row mb-3 mt-5">
            <div class="col-md-6">
                <img class="about-main-img" src="http://localhost.localdomain/wp-content/uploads/2019/05/1.jpg"/>
            </div>
            <?php if (get_field('about_page_main_description')): ?>
            <div class="about-main-description col-md-6">
                <p><?php echo the_field('about_page_main_description'); ?></p>
            </div>
        <?php endif; ?>
        </div>
</div>
</div>
    <div class="about blue-background">
        <div class="tc-about-topbar clearfix">
            <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
            <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
            <?php if (get_field('about_page_title_1')): ?>
            <div class="tc-about-section">
                <h2><?php echo the_field('about_page_title_1'); ?></h2>
            </div>
            <?php endif; ?>
        </div>
        <?php if (get_field('about_page_description_1')): ?>
        <div class="about-content"><?php echo the_field('about_page_description_1'); ?></div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div id="tc-quote-box" class="about-page-quote"> 
        <?php if (get_field('about_page_quote_image')): ?>
            <div class="col-md-3" id="quote-img">
                <img alt="<?php echo the_field('about_page_quote_image_alt'); ?>" src="<?php echo the_field('about_page_quote_image'); ?>" class="qImg">
            </div>
        <?php endif; ?>
            <div class="col-md-9" id="quote-text">
                <div class="tc-quote">
                    <?php if (get_field('about_page_quote_text')): ?>
                    <div class="tc-quote-text">
                        <blockquote><?php echo the_field('about_page_quote_text'); ?></blockquote>
                    </div>
                    <?php endif;?>
                    <?php if (get_field('about_page_quote_source')): ?>
                    <footer class="quote-source">
                        <?php echo the_field('about_page_quote_source'); ?>
                    </footer>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- Quotes -->
    <div class="about blue-background">
        <div class="tc-about-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
                <div class="tc-about-section">
                <?php if (get_field('about_page_title_2')): ?>
                    <h2><?php echo the_field('about_page_title_2'); ?></h2>
                <?php endif; ?>
                </div>
        </div>
        <div class="about-content">
            <?php if (get_field('about_page_section_2')): ?>
            <div class="about-page-section-2"><?php echo the_field('about_page_section_2'); ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="about white-background">
    <?php if (get_field('about_page_title_3')): ?>
        <h1 class="white-background-header"><?php echo the_field('about_page_title_3'); ?></h1>
    <?php endif; ?>
    <?php if (get_field('about_page_section_3')): ?>
        <div class="about-content about-framework">
        <?php echo the_field('about_page_section_3') ?>
        </div>
    <?php endif; ?>
    </div>
    <div class="about blue-background">
    <div class="tc-about-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
                <div class="tc-about-section inquiry-set-title">
                <?php if (get_field('about_page_title_4')): ?>
                    <h2><?php echo the_field('about_page_title_4') ?></h2>
                <?php endif; ?>
                </div>
        </div>
        <div class="about-content">
        <?php if (get_field('about_page_section_4')): ?>
        <?php echo the_field('about_page_section_4'); ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="about white-background">
        <?php if (get_field('about_page_participating_institutions_title')): ?>
        <h1 class="white-background-header"><?php echo the_field('about_page_participating_institutions_title'); ?></h1>
        <?php endif; ?>
        <div class="about-content participating-institutions-wrap">
            <p><em>Teaching California</em> is proud to include content from over 60 collections in California and across the US:</p>
            <?php if (get_field('about_page_participating_institutions')): ?>
            <ul class="participating-institutions">
            <?php

            // check if the repeater field has rows of data
            if( have_rows('about_page_participating_institutions') ):

                // loop through the rows of data
                while ( have_rows('about_page_participating_institutions') ) : the_row();

                    // display a sub field value
                    ?>
                    <li><a href="<?php echo the_sub_field('participating_institution_link'); ?>" target="_blank"><?php echo the_sub_field('participating_institution_name')?></a></li>
            <?php 

                endwhile;

            else :

                // no rows found

            endif;

            ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();