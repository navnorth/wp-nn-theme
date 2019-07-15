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
                <img class="about-main-img" src="<?php echo the_field('about_page_main_image') ?>"/>
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
            <?php if (get_field('about_page_section_1')): 
                $section1 = get_field('about_page_section_1');
                ?>
            <div class="tc-about-section">
                <h2><?php echo $section1['title']; ?></h2>
            </div>
        </div>
        <div class="about-content"><?php echo $section1['description']; ?></div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div id="tc-quote-box" class="about-page-quote"> 
        <?php if (get_field('about_page_quote')): 
            $quote = get_field('about_page_quote');
            ?>
            <div class="col-md-3" id="quote-img">
                <img alt="<?php echo $quote['image_alt']; ?>" src="<?php echo $quote['image'] ?>" class="qImg">
            </div>
            <div class="col-md-9" id="quote-text">
                <div class="tc-quote">
                    <div class="tc-quote-text">
                        <blockquote><?php echo $quote['text']; ?></blockquote>
                    </div>
                    <footer class="quote-source">
                        <?php echo $quote['source']; ?>
                    </footer>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div><!-- Quotes -->
    <?php if (get_field('about_page_section_2')): 
        $section2 = get_field('about_page_section_2');
        ?>
    <div class="about blue-background">
        <div class="tc-about-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
                <div class="tc-about-section">
                    <h2><?php echo $section2['title']; ?></h2>
                </div>
        </div>
        <div class="about-content">
            <div class="about-page-section-2"><?php echo $section2['description']; ?></div>
        </div>
    </div>
        <?php endif; ?>

    <?php if (get_field('about_page_section_3')): 
        $section3 = get_field('about_page_section_3'); ?>
    <div class="about white-background">
        <h1 class="white-background-header"><?php echo $section3['title']; ?></h1>
        <div class="about-content about-framework">
        <?php echo $section3['description']; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if (get_field('about_page_section_4')):
        $section4 = get_field('about_page_section_4');
    ?>
    <div class="about blue-background">
        <div class="tc-about-topbar clearfix">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-blue"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-0 tc-custom-bg-yellow"></div>
                <div class="tc-about-section inquiry-set-title">
                    <h2><?php echo $section4['title']; ?></h2>
                </div>
        </div>
        <div class="about-content">
        <?php echo $section4['description']; ?>
        </div>
    </div>
    <?php endif; ?>
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
                    <li><a href="<?php echo the_sub_field('url'); ?>" target="_blank"><?php echo the_sub_field('name')?></a></li>
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