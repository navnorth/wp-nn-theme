<?php
/**
 * wp_nn_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_nn_theme
 */
define( "WP_NN_THEME_NAME", "Teaching California Theme" );
define( "WP_NN_THEME_VERSION", "0.0.1" );
define( "WP_NN_SLUG", "wp_nn_theme" );
 
if ( ! function_exists( 'wp_nn_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_nn_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wp_nn_theme, use a find and replace
		 * to change 'wp_nn_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp_nn_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp_nn_theme' ),
                        'menu-footer' => esc_html__( 'Footer', 'wp_nn_theme' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_nn_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
                
	}
endif;
add_action( 'after_setup_theme', 'wp_nn_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_nn_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wp_nn_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_nn_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_nn_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp_nn_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp_nn_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp_nn_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_nn_theme_scripts() {
    
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        
	wp_enqueue_style( 'wp_nn_theme-style', get_stylesheet_uri() );
        
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome-pro.all.min.css' );

	wp_enqueue_script( 'wp_nn_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array());

	wp_enqueue_script( 'wp_nn_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array());
        
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wp_nn_theme_scripts' );

/**
 *
 */
require get_template_directory() . '/classes/tcnavwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Settings page
 **/
function wp_nn_theme_settings_page() {
        $page = "theme_settings_page";
    
	//Create Settings Section
	add_settings_section(
		'wp_nn_theme_settings',
		'',
		'wp_nn_theme_settings_callback',
		$page
	);

	//Add Settings field for Google Analytics ID
	add_settings_field(
		'wp_nn_theme_ga_id',
		'',
		'wp_nn_theme_settings_field',
		$page,
		'wp_nn_theme_settings',
		array(
			'uid' => 'wp_nn_theme_ga_id',
			'type' => 'textbox',
			'name' =>  __('Google Analytics ID: ', 'wp_nn_theme')
		)
	);
        
        //Create Settings Sub Section for Social Links
	add_settings_section(
		'wp_nn_theme_social_settings',
		'',
		'wp_nn_theme_social_settings_callback',
		$page
	);
        
        //Add Settings field for Social Links - Instagram
	add_settings_field(
		'wp_nn_theme_social_instagram',
		'',
		'wp_nn_theme_settings_field',
		$page,
		'wp_nn_theme_social_settings',
		array(
			'uid' => 'wp_nn_theme_social_instagram',
			'type' => 'textbox',
			'name' =>  __('Instagram: ', 'wp_nn_theme')
		)
	);
        
        //Add Settings field for Social Links - Facebook
	add_settings_field(
		'wp_nn_theme_social_facebook',
		'',
		'wp_nn_theme_settings_field',
		$page,
		'wp_nn_theme_social_settings',
		array(
			'uid' => 'wp_nn_theme_social_facebook',
			'type' => 'textbox',
			'name' =>  __('Facebook: ', 'wp_nn_theme')
		)
	);
        
        //Add Settings field for Social Links - Twitter
	add_settings_field(
		'wp_nn_theme_social_twitter',
		'',
		'wp_nn_theme_settings_field',
		$page,
		'wp_nn_theme_social_settings',
		array(
			'uid' => 'wp_nn_theme_social_twitter',
			'type' => 'textbox',
			'name' =>  __('Twitter: ', 'wp_nn_theme')
		)
	);
        
        //Add Settings field for Social Links - Flickr
	add_settings_field(
		'wp_nn_theme_social_flickr',
		'',
		'wp_nn_theme_settings_field',
		$page,
		'wp_nn_theme_social_settings',
		array(
			'uid' => 'wp_nn_theme_social_flickr',
			'type' => 'textbox',
			'name' =>  __('Flickr: ', 'wp_nn_theme')
		)
	);

	register_setting( 'theme_settings_page' , 'wp_nn_theme_ga_id' );
        register_setting( 'theme_settings_page' , 'wp_nn_theme_social_instagram' );
        register_setting( 'theme_settings_page' , 'wp_nn_theme_social_facebook' );
        register_setting( 'theme_settings_page' , 'wp_nn_theme_social_twitter' );
        register_setting( 'theme_settings_page' , 'wp_nn_theme_social_flickr' );
}
add_action( 'admin_init' , 'wp_nn_theme_settings_page' );

/**
 * Theme Settings Callback
 **/
function wp_nn_theme_settings_callback() {

}

/**
 * Theme Social Links Settings Callback
 **/
function wp_nn_theme_social_settings_callback(){
    
}

/**
 * Theme Settings field
 **/
function wp_nn_theme_settings_field( $arguments ) {
    
    $value = get_option($arguments['uid']);
    
    echo '<div class="form-group"><label for="'.$arguments['uid'].'"><strong>'.$arguments['name'].'</strong></label>
            <input name="'.$arguments['uid'].'" id="'.$arguments['uid'].'" type="'.$arguments['type'].'" value="' . $value . '" /></div>';
}

/**
 * Add Theme Settings Page
 **/
function add_wp_nn_theme_settings_menu(){
    add_theme_page("Theme Settings", "Settings", "edit_theme_options", "theme_settings_page",  "add_wp_nn_theme_settings_page", 10);
    //add_submenu_page("themes.php", "Theme Settings", "Settings", "edit_theme_options", "theme_settings_page",  "add_wp_nn_theme_settings_page");
}
add_action( "admin_menu", "add_wp_nn_theme_settings_menu" );

function add_wp_nn_theme_settings_page(){
    include( get_template_directory() . "/admin-template/settings.php");
}

function nn_theme_load_custom_scripts(){
	wp_register_style( 'wp_nn_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'wp_nn_admin_css' );
}
add_action( "admin_enqueue_scripts", "nn_theme_load_custom_scripts" );

function nn_theme_add_footer_menu(){
    $menu_name = __('Footer Menu', WP_NN_SLUG);
    $menu_location = "menu-footer";
    
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    //Create Footer menu automatically
    if (!$menu_exists){
        $menu_id = wp_create_nav_menu($menu_name);
        
        $pages = nn_get_top_level_pages();
        
        // Add Top Level Pages as menu
        foreach($pages as $page){
            $menu_title = $page->post_title;
            $menu_classes = "nn-nav-menu-item";
            $menu_url = $page->guid;
            $menu_status = "publish";
            
             wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  $menu_title,
                'menu-item-classes' => $menu_classes,
                'menu-item-url' => $menu_url,
                'menu-item-object' => 'page',
                'menu-item-status' => $menu_status)
            );
            
        }
        
        if( !has_nav_menu( $menu_location ) ){
            $locations = get_theme_mod('nav_menu_locations');
            $locations[$menu_location] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
        
    }
}
add_action( "admin_init","nn_theme_add_footer_menu" );

function nn_get_top_level_pages(){
    $pages = null;
    
    $args = array(
        "post_type" => "page",
        "post_status" => "publish",
        "parent" => 0,
        "hierarchical" => 0
    );
    
    $pages = get_pages($args);
    
    return $pages;
}

function add_search_nav_item($items, $args){
    if ($args->menu == "primary"){
        $search = '<form role="search" method="get" class="tc-search-form" action="'.site_url().'"><input tabindex="-1" type="search" class="tc-search-field" placeholder="Search..." value="" name="s" /><button tabindex="0" type="submit" class="tc-search-submit"><i class="fas fa-search fa-2x"></i></button><a class="tc-search-bg"></a></form>';
        $items = $items;
        $items .= "<li class='menu-item nav-link tc-search-nav'>".$search."</li>";
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_search_nav_item', 10, 2);


/* Enqueue script and css for Gutenberg Inquiry Set Thumbnail block */
function wp_nn_enqueue_inquiry_set_block(){
	wp_enqueue_script(
            'thumbnail-block-js', 
            get_template_directory_uri() . "/js/thumbnail-block.build.js",
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-api')
	);
        wp_localize_script(
            'thumbnail-block-js',
            'wp_nn_theme',
            array(
                "theme_path" => get_template_directory_uri()
            )
        );
	wp_enqueue_style(
            'thumbnail-block-css', 
            get_template_directory_uri() . "/css/thumbnail-block.css",
            array('wp-edit-blocks')
	);
	/* Register Block */
	register_block_type('wp-nn-theme/thumbnail-block', array(
            'editor_script' => 'thumbnail-block-js',
            'editor_style' => 'thumbnail-block-css'
	));
}
add_action('enqueue_block_editor_assets', 'wp_nn_enqueue_inquiry_set_block');