<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Accordion Group & Accordion
 * Shortcode Example : [tc_accordion_group][tc_accordion title="" accordion_series="one" expanded=""] your content goes here [/tc_accordion][/tc_accordion_group]
 */
add_shortcode('tc_accordion_group', 'tc_accordion_group_func');
function tc_accordion_group_func($atts, $content = null)
{
    $accordion_id = "accordion";
    
    if (!empty($atts)) {
        extract($atts);
        if ($id)
            $accordion_id = $id;
    }
    
    $return = '';
    $return .= '<div class="panel-group" id="'.$accordion_id.'" role="tablist" aria-multiselectable="true">';
        $content = str_replace( "<p>","", $content );
        $content = str_replace( "</p>","", $content );
        $return .= do_shortcode($content);
    $return .= '</div>';
    return $return;
}

add_shortcode('tc_accordion', 'tc_accordion_func');
function tc_accordion_func($atts, $content = null)
{
    $group_id = "accordion";

    extract($atts);
    $return = '';
  
    if(isset($accordion_series) && !empty($accordion_series))
    {
        $return .= '<div class="panel panel-default">';
            $return .= '<div class="panel-heading" role="tab" id="heading'. $group_id. $accordion_series .'">';
                $return .= '<h5 class="panel-title">';
    
                    if(isset($expanded) && !empty($expanded) && strtolower($expanded) == "true")
                    {
                        $class = "";
                        $uptcls = "in";
                    }
                    else
                    {
                        $class = "collapsed";
                        $uptcls = '';
                    }
    
                    $return .= '<a class="'.$class.'" role="button" data-toggle="collapse" href="#collapse'. $group_id. $accordion_series .'" data-target="#collapse'. $group_id. $accordion_series .'" aria-expanded="false" aria-controls="collapse'. $group_id. $accordion_series .'">';
                        $return .= $title;
                    $return .= '</a>';
                $return .= ' </h5>';
            $return .= '</div>';
    
            $return .= '<div id="collapse'. $group_id. $accordion_series .'" class="panel-collapse collapse '.$uptcls.'" role="tabpanel" aria-labelledby="heading'. $accordion_series .'">';
                $return .= '<div class="panel-body">';
                    $return .= do_shortcode($content);
                $return .= '</div>';
            $return .= '</div>';
        $return .= '</div>';

        return $return;
    }
}

/**
 * Bar Tile Shortcode
 * Shortcode Example : [tc_bar_tile short_description="" link_label="" link_url="" new_window="false"]
 */
add_shortcode('tc_bar_tile', 'tc_bar_tile_func');
function tc_bar_tile_func($atts, $content = null)
{
    
    if (!empty($atts))
        extract($atts);
    
    $return     = '';
    $new_tab    = '';
    
    if ($new_window=="true")
        $new_tab = ' target="_blank"';
    
    $return .= '<a href="'.$link_url.'"'.$new_tab.' class="tc-bar-tile-block-link">';
    $return .= '<div class="tc-bar-tile-block row">';
    
    if (isset($short_description) && $short_description!==""){
        $return .= '    <div class="col-md-2 col-sm-4 tc-bar-tile-short-desc">';
        $return .= $short_description;
        $return .= '    </div>';
    }
    
    $return .= '    <div class="col-md-10 col-sm-8 tc-bar-tile-label">';
    $return .=  $link_label;
    $return .= '    </div>';
    $return .= '</div>';
    $return .= '</a>';
    return $return;
}

/**
 * Button Tile Shortcode
 * Shortcode Example : [tc_button_tile short_description="" link_label="" link_url="" new_window="false"]
 */
add_shortcode('tc_button_tile', 'tc_button_tile_func');
function tc_button_tile_func($atts, $content = null)
{
    
    if (!empty($atts))
        extract($atts);
    
    $return     = '';
    $new_tab    = '';
    $classes    = '';
    $sd_classes = 'col-md-4 col-sm-6';
    
    if ($new_window==true)
        $new_tab = ' target="_blank"';
    if (isset($link_label) && $link_label!=="")
        $classes = 'class="col-md-6 tc-button-tile-block-link"';
    else{
        $classes = 'class="col-md-3 tc-button-tile-block-link"';
        $sd_classes = 'col-md-12 col-sm-12';
    }
        
    $return .= '<a href="'.$link_url.'"'.$new_tab.''.$classes.'>';
    $return .= '<div class="tc-button-tile-block row">';
    
    $return .= '    <div class="'.$sd_classes.' tc-button-tile-short-desc">';
    $return .= $short_description;
    $return .= '    </div>';
    
    if (isset($link_label) && $link_label!==""){
        $return .= '    <div class="col-md-8 col-sm-6 tc-button-tile-label">';
        $return .=  $link_label;
        $return .= '    </div>';
    }
    $return .= '</div>';
    $return .= '</a>';
    return $return;
}

/**
 * PDF Embed Shortcode
 * Shortcode Example : [tc_pdf_embed src=""]
 */
add_shortcode('tc_pdf_embed', 'tc_pdf_embed_func');
function tc_pdf_embed_func($atts)
{
    $return = "";
    
    if (!empty($atts))
        extract($atts);
    
    if ($src){
        $isPDF = is_pdf_resource($src);
        if ($isPDF){
            $return .= '<div class="ps-pdf-block">
                        <div class="psPDFWrapper">';
            $return .= oer_display_pdf_embeds($src, true);
            $return .= '</div></div>';
        }
    }
    return $return;
}
?>