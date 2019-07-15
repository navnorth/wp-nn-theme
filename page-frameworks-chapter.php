<?php
/**
 * Template Name: Frameworks Chapter
 * The template for displaying framework chapter pages
 *
 * This is the template that displays all chapter pages of a framework.
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
<div id="primary">
	<div id="tc-frameworks-heading" class="heading">
	<?php if (get_field('frameworks_chapter_top_heading')): ?>
	    <div class="tc-framework-chapter-wrapper">
		<h1><?php echo the_field('frameworks_chapter_top_heading'); ?></h1>
	    </div>
	<?php endif; ?>
	</div>
	<div id="tc-frameworks-bar-heading" class="bar-heading">
	    <div class="tc-framework-bar-wrapper">
		<div class="tc-framework-bar-left col-md-6">
		</div>
		<div class="tc-framework-bar-right col-md-6">
			<?php if (get_field('frameworks_previous_link')): ?>
			<a class="tc-prev-button" href="<?php echo the_field('frameworks_previous_link'); ?>"><i class="fal fa-angle-left"></i><?php  echo the_field('frameworks_previous_link_label'); ?></a>
			<?php endif; ?>
			<?php if (get_field('frameworks_previous_link') && get_field('frameworks_next_link')): ?>
			<span class="tc-button-separator">&nbsp;</span>
			<?php endif; ?>
			<?php if (get_field('frameworks_next_link')): ?>
			<a class="tc-next-button" href="<?php echo the_field('frameworks_next_link'); ?>"><?php  echo the_field('frameworks_next_link_label'); ?><i class="fal fa-angle-right"></i></a>
			<?php endif; ?>
		</div>
	    </div>
	</div>
	<main id="main" class="site-main site-frameworks-chapter">
	<div class="col-md-8 frameworks-chapter-content">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', '' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	</div>
	<?php if (get_field('frameworks_related_inquiry_sets')): ?>
	<div class="col-md-4 frameworks-chapter-sidebar">
		<h4 class="related-inquiry-set-title"><?php _e("Related Inquiry Sets", WP_NN_SLUG); ?></h4>
		<?php
		$inquiry_sets = get_field('frameworks_related_inquiry_sets');
		
		if (is_array($inquiry_sets)) {
			foreach($inquiry_sets as $inquiry){
				$curriculum = $inquiry['frameworks_related_inquiry_set'];
		?>
		<a href="<?php echo get_the_permalink($curriculum->ID); ?>" class="wp-block-wp-curriculum-inquiry-set-thumbnail-block lp-tc-related-inquiry-block-link" rel="noopener noreferrer">
			<div class="lp-tc-related-inquiry-blocks-padding">
				<div class="media-image">
					<div class="image-thumbnail">
						<div class="image-section">
							<?php
							$img_url = get_template_directory_uri(). "/images/default-image.png";
							if (has_post_thumbnail($curriculum->ID)) {
							     $img_url = get_the_post_thumbnail_url($curriculum->ID);
							}
							?>
							<img src="<?php echo $img_url; ?>" alt="<?php echo $curriculum->post_title; ?>" class="img-thumbnail-square img-responsive img-loaded">
						</div>
					</div>
				</div>
				<?php
				$oer_lp_grade = null;
				if (function_exists('oer_inquiry_set_grade_level')){
					$oer_lp_grade = oer_inquiry_set_grade_level($curriculum->ID);
				}
				if ($oer_lp_grade){
				?>
				<div class="lp-tc-related-inquiry-grades">
					<span><?php echo $oer_lp_grade; ?></span>
				</div>
				<?php } ?>
				<div class="custom-bg-dark custom-bg-dark-inquiry-sets"></div>
				<div class="lp-tc-related-inquiry-set-description">
					<h4><?php echo $curriculum->post_title; ?></h4>
				</div>
			</div>
		</a>
		<?php
			}
		} ?>
	</div>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
