<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_nn_theme
 */
global $post_id;
$pre_url = "";
$url = esc_url( get_the_permalink($post_id) );
$summary_class = "col-md-12 col-sm-12 col-xs-12";
$current_post = get_post($post_id);
$img_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
$img_alt = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
if (get_post_type($post_id)=="resource") {
	$inquiry_set = is_inquiryset_resource($current_post->post_title, true);
	$slug = str_replace("_","-",$current_post->post_name);
	
	if ($inquiry_set){
		$pre_url = esc_url( get_the_permalink($inquiry_set[0]->ID));
	}
	if ($pre_url)
		$url = $pre_url."/source/".$slug."-".$post_id;
}

if (isset($img_url)){
	$summary_class = "col-md-9 col-sm-6 col-xs-12";
}
?>

<article id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo $url; ?>" rel="bookmark"><?php echo $current_post->post_title; ?></a></h2>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			wp_nn_theme_posted_on();
			wp_nn_theme_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="search-content">
		<?php if(isset($img_url) && !empty($img_url)) : ?>
		<div class="col-md-3 col-sm-6 col-xs-12 search_image">
		    <img class="search_featured_image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" />
		</div>
		<?php endif; ?>
	
		<div class="entry-summary <?php echo $summary_class; ?>">
			<?php echo get_the_excerpt($post_id); ?>
		</div><!-- .entry-summary -->
	</div>
	
	<footer class="entry-footer">
		<?php wp_nn_theme_tc_entry_footer($post_id); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php echo $post_id; ?> -->
