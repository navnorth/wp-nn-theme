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
    
                    $return .= '<a class="'.$class.'" role="button" data-toggle="collapse" data-parent="#'.$group_id.'" href="#collapse'. $group_id. $accordion_series .'" data-target="#collapse'. $group_id. $accordion_series .'" aria-expanded="false" aria-controls="collapse'. $group_id. $accordion_series .'">';
                        $return .= $title;
                    $return .= '</a>';
                $return .= ' </h5>';
            $return .= '</div>';
    
            $return .= '<div id="collapse'. $group_id. $accordion_series .'" class="panel-collapse collapse '.$uptcls.'" role="tabpanel" aria-labelledby="heading'. $accordion_series .'">';
                $return .= '<div class="panel-body">';
                    $return .= $content;
                $return .= '</div>';
            $return .= '</div>';
        $return .= '</div>';

        return $return;
    }
}
?>