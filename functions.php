<?php
/**
 * NN Web theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Navigation North
 * @since Navigation North 1.0
 */

define( 'NN_TEXT_DOMAIN', 'navigationnorth' );

/**
 * Enqueue default theme styles.
 */
function nn_enqueue_styles() {
	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.NoExplicitVersion
		'nn-styles',
		get_stylesheet_uri(),
		array(),
		null // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	);
}
add_action( 'wp_enqueue_scripts', 'nn_enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'nn_enqueue_styles' );

/**
 * Register custom block styles for core blocks.
 */
function nn_register_custom_block_styles() {
		// Define the custom styles for the button block.
		$button_styles = array(
			array(
				'name'  => 'nn-blue',
				'label' => __( 'NN Blue', 'nn-text-domain' ),
			),
			array(
				'name'  => 'nn-cyan',
				'label' => __( 'NN Cyan', 'nn-text-domain' ),
			),
			array(
				'name'  => 'nn-yellow',
				'label' => __( 'NN Yellow', 'nn-text-domain' ),
			),
		);

		// Loop through the styles and register each one.
		foreach ( $button_styles as $style ) {
			register_block_style( 'core/button', $style );
		}
}
add_action( 'init', 'nn_register_custom_block_styles' );

/**
 * Remove default button outline style variation.
 */
function nn_remove_button_outline_style() {
	wp_enqueue_script(
		'custom-block-editor-js',
		get_stylesheet_directory_uri() . '/assets/js/button-unregister-styles.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		filemtime( get_stylesheet_directory() . '/assets/js/button-unregister-styles.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'nn_remove_button_outline_style', 20 );

/**
 * Allow SVG and WEBP format in media uploader
 *
 * @param array  $data values for the extension, mime type, and corrected filename.
 * @param string $file full path of the file.
 * @param string $filename name of the file.
 * @param array  $mimes array of mime types.
 */
function nn_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
	global $wp_version;

	if ( '4.7.1' !== $wp_version ) {
		return $data;
	}

	$filetype = wp_check_filetype( $filename, $mimes );

	return array(
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename'],
	);
}
add_filter( 'wp_check_filetype_and_ext', 'nn_check_filetype_and_ext', 10, 4 );

/**
 * Add SVG and WEBP to allowed mime types.
 *
 * @param array $mimes mime types keyed by the file extension regex.
 */
function nn_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'nn_mime_types', 1, 1 );

/**
 * Change hamburger menu icon according to Figma design
 *
 * @param string $block_content the block content.
 * @param array  $block  the full block including name and attributes.
 */
function custom_render_block_core_navigation( string $block_content, array $block ) {
	if (
		'core/navigation' === $block['blockName'] &&
		! is_admin() &&
		! wp_is_json_request()
	) {
		return preg_replace(
			'/\<svg width(.*?)\<\/svg\>/',
			'<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.7998 7.99999C4.7998 7.57565 4.96838 7.16868 5.26843 6.86862C5.56849 6.56857 5.97546 6.39999 6.3998 6.39999H25.5998C26.0242 6.39999 26.4311 6.56857 26.7312 6.86862C27.0312 7.16868 27.1998 7.57565 27.1998 7.99999C27.1998 8.42434 27.0312 8.83131 26.7312 9.13136C26.4311 9.43142 26.0242 9.59999 25.5998 9.59999H6.3998C5.97546 9.59999 5.56849 9.43142 5.26843 9.13136C4.96838 8.83131 4.7998 8.42434 4.7998 7.99999Z" fill="#172836"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.7998 16C4.7998 15.5756 4.96838 15.1687 5.26843 14.8686C5.56849 14.5686 5.97546 14.4 6.3998 14.4H25.5998C26.0242 14.4 26.4311 14.5686 26.7312 14.8686C27.0312 15.1687 27.1998 15.5756 27.1998 16C27.1998 16.4243 27.0312 16.8313 26.7312 17.1314C26.4311 17.4314 26.0242 17.6 25.5998 17.6H6.3998C5.97546 17.6 5.56849 17.4314 5.26843 17.1314C4.96838 16.8313 4.7998 16.4243 4.7998 16Z" fill="#172836"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3999 24C14.3999 23.5756 14.5685 23.1687 14.8685 22.8686C15.1686 22.5686 15.5756 22.4 15.9999 22.4H25.5999C26.0242 22.4 26.4312 22.5686 26.7313 22.8686C27.0313 23.1687 27.1999 23.5756 27.1999 24C27.1999 24.4243 27.0313 24.8313 26.7313 25.1314C26.4312 25.4314 26.0242 25.6 25.5999 25.6H15.9999C15.5756 25.6 15.1686 25.4314 14.8685 25.1314C14.5685 24.8313 14.3999 24.4243 14.3999 24Z" fill="#172836"/>
</svg>',
			$block_content
		);
	}

	return $block_content;
}
add_filter( 'render_block', 'custom_render_block_core_navigation', null, 2 );

/**
 * Return current year.
 */
function nn_current_year_shortcode() {
	$year = date_i18n( 'Y' );
	return $year;
}
add_shortcode( 'current_year', 'nn_current_year_shortcode' );
