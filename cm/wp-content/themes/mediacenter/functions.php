<?php
/**
 * MediaCenter engine room
 *
 * @package mediacenter
 */

/**
 * Initialize all things
 */
require get_template_directory() . '/inc/init.php';

/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */

define( 'MC_TEMPLATE_PATH', get_template_directory() );

#-----------------------------------------------------------------
# Includes
#-----------------------------------------------------------------

include_once get_template_directory() . '/framework/inc/custom-fonts.php'; // Load Custom Fonts
include_once get_template_directory() . '/framework/inc/custom-styles.php'; // Load Custom Styles

// Pagination function
include_once get_template_directory() . '/framework/inc/pagination.php';

//WP Alchemy
if( ! class_exists( 'WPAlchemy_MetaBox' ) ) {
	include_once get_template_directory() . '/framework/inc/wpalchemy/MetaBox-mod.php';	
}

if( ! class_exists( 'WPAlchemy_MediaAccess' ) ) {
	include_once get_template_directory() . '/framework/inc/wpalchemy/MediaAccess-mod.php';
}

add_action( 'init', 'media_center_metabox_styles' ); 
function media_center_metabox_styles(){
    if ( is_admin() ){ 
        wp_enqueue_style( 'wpalchemy-metabox', get_template_directory_uri() . '/framework/css/meta-boxes.css' );
    }
}

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

//Include metaboxes
include_once get_template_directory() . '/framework/metaboxes/mc-page-spec.php';

//Include Post Formats
include_once get_template_directory() . '/framework/inc/post-formats/load.php';

function register_mc_widgets() { 
	if ( class_exists( 'WC_Widget' ) ) {
		get_template_part( 'framework/widgets/class-mc-widget-brands-filter');
		get_template_part( 'framework/widgets/class-mc-widget-vertical-menu');
	}
	if ( class_exists( 'StaticBlockContent' ) && class_exists( 'WC_Widget' ) ) {
		get_template_part( 'framework/widgets/class-mc-static-block-widget');
	}
	get_template_part( 'framework/widgets/class-mc-widget', 'recent-posts' );
}
add_action( 'widgets_init', 'register_mc_widgets', 15 );

#-----------------------------------------------------------------
# Plugin Recommendations
#-----------------------------------------------------------------

require_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'media_center_theme_register_required_plugins' );

function media_center_theme_register_required_plugins() {
	
	$plugins = array(
		
		array(
			'name'     				=> 'WooCommerce',
			'slug'     				=> 'woocommerce',
			'source'   				=> 'https://downloads.wordpress.org/plugin/woocommerce.2.4.6.zip',
			'required' 				=> true,
			'version' 				=> '2.4.6',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'					=> 'ReduxFramework',
			'slug'					=> 'redux-framework',
			'source'				=> 'https://downloads.wordpress.org/plugin/redux-framework.3.5.7.zip',
			'required'				=> true,
			'version'				=> '3.5.7',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'external_url'			=> '',
		),

		array(
			'name'     				=> 'YITH Woocommerce Compare',
			'slug'     				=> 'yith-woocommerce-compare',
			'source'   				=> 'https://downloads.wordpress.org/plugin/yith-woocommerce-compare.2.0.3.zip',
			'required' 				=> false,
			'version' 				=> '2.0.3',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'YITH WooCommerce Wishlist',
			'slug'     				=> 'yith-woocommerce-wishlist',
			'source'   				=> 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.2.0.10.zip',
			'required' 				=> false,
			'version' 				=> '2.0.10',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
            'name'					=> 'Visual Composer',
            'slug'					=> 'js_composer',
            'source'				=> get_template_directory() . '/assets/plugins/js_composer.zip',
            'required'				=> false,
            'version'				=> '4.7.4',
            'force_activation'		=> false,
            'force_deactivation'	=> false,
            'external_url'			=> '',
        ),

        array(
            'name'					=> 'Media Center Extensions',
            'slug'					=> 'media-center-extensions',
            'source'				=> get_template_directory() . '/assets/plugins/media-center-extensions.zip',
            'required'				=> true,
            'version'				=> '2.0.6',
            'force_activation'		=> false,
            'force_deactivation'	=> false,
            'external_url'			=> '',
        ),

        array(
            'name'					=> 'Slider Revolution',
            'slug'					=> 'revslider',
            'source'				=> get_template_directory() . '/assets/plugins/revslider.zip',
            'required'				=> false,
            'version'				=> '5.0.9',
            'force_activation'		=> false,
            'force_deactivation'	=> false,
            'external_url'			=> '',
        ),

        array(
			'name'     				=> 'Regenerate Thumbnails',
			'slug'     				=> 'regenerate-thumbnails',
			'source'   				=> 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip',
			'required' 				=> false,
			'version' 				=> '2.2.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'Contact Form 7',
			'slug'     				=> 'contact-form-7',
			'source'   				=> 'https://downloads.wordpress.org/plugin/contact-form-7.4.2.2.zip',
			'required' 				=> false,
			'version' 				=> '4.2.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

	);

	$config = array(
		'domain'       		=> 'mediacenter',
		'default_path' 		=> '',
		'parent_menu_slug' 	=> 'themes.php',
		'parent_url_slug' 	=> 'themes.php',
		'menu'         		=> 'install-required-plugins',
		'has_notices'      	=> true,
		'is_automatic'    	=> false,
		'message' 			=> '',
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'mediacenter' ),
			'menu_title'                       			=> __( 'Install Plugins', 'mediacenter' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'mediacenter' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'mediacenter' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'mediacenter' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'mediacenter' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'mediacenter'  ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'mediacenter'  ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'mediacenter' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'mediacenter' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'mediacenter' ), // %1$s = dashboard link
			'nag_type'									=> 'updated'
		)
	);

	tgmpa( $plugins, $config );
}

#-----------------------------------------------------------------
# Nav Walker
#-----------------------------------------------------------------

require_once get_template_directory() . '/inc/classes/wp_bootstrap_navwalker.php';

#-----------------------------------------------------------------
# Category Walker
#-----------------------------------------------------------------

require_once get_template_directory() . '/inc/classes/wp_bootstrap_categorieswalker.php';

#-----------------------------------------------------------------
# Rev Slider Setup
#-----------------------------------------------------------------

if( function_exists( 'set_revslider_as_theme' ) ){
	set_revslider_as_theme();
}

#-----------------------------------------------------------------
# AJAX URL
#-----------------------------------------------------------------

add_action('wp_head','media_center_ajaxurl');
function media_center_ajaxurl() {
?>
    <script type="text/javascript">
        var media_center_ajaxurl = '<?php echo admin_url('admin-ajax.php', 'relative'); ?>';
    </script>
<?php
}

#-----------------------------------------------------------------
# Media Center Theme Setup
#-----------------------------------------------------------------

function iframe_the_content_filter( $content ){
	$content = str_replace( '<iframe', '<div class="embed-responsive embed-responsive-16by9"><iframe', $content );
	$content = str_replace( '</iframe>', '</iframe></div>', $content );
	return $content;
}

add_filter( 'the_content', 'iframe_the_content_filter' );

/**
 * Media Center Theme Setup
 */
if ( ! function_exists( 'media_center_theme_setup' ) ) :
function media_center_theme_setup(){

	global $media_center_theme_options;

	// Theme Support
	add_theme_support( 'woocommerce' );

	add_theme_support( 'title-tag' );

	// Theme Support
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio', 'quote', 'link', 'aside', 'status' ) ); // Post formats.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	// Register Nav Menus
	$nav_menus = array(
		'top-left'    =>  __( 'Top Bar Left Navigation', 'mediacenter' ),
		'top-right'   =>  __( 'Top Bar Right Navigation', 'mediacenter' ),
		'primary'     =>  __( 'Main Navigation', 'mediacenter' ),
		'departments' =>  __( 'Shop by Departments' , 'mediacenter' )
	);
	register_nav_menus( $nav_menus );

	// Theme Text Domain
	load_theme_textdomain( 'mediacenter', trailingslashit( WP_LANG_DIR ) . 'themes/' );
	
	// wp-content/themes/child-theme-name/languages/it_IT.mo
	load_theme_textdomain( 'mediacenter', get_stylesheet_directory() . '/languages' );
	
	// wp-content/themes/theme-name/languages/it_IT.mo
	load_theme_textdomain( 'mediacenter', get_template_directory() . '/languages' );

}
endif;
add_action( 'after_setup_theme', 'media_center_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 */
if( ! function_exists( 'media_center_content_width' ) ):
function media_center_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
endif;
add_action( 'template_redirect', 'media_center_content_width' );

/**
 * Enqueue scripts and styles for the front end.
 */
function media_center_scripts(){

	global $media_center_theme_options, $yith_woocompare;

	/*
	* CSS
	*/
	
	// Bootstrap Core CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	if ( is_rtl() ) {
		wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css' );
		wp_enqueue_style( 'media_center-main-style', get_template_directory_uri() . '/rtl.css' );
	} else {
		wp_enqueue_style( 'media_center-main-style', get_template_directory_uri() . '/style.css' );
	}

	

	if( isset( $media_center_theme_options['use_predefined_color'] ) && $media_center_theme_options['use_predefined_color'] ){
		$preset_color = isset( $media_center_theme_options['main_color'] ) ? $media_center_theme_options['main_color'] : 'green';
	} else {
		$preset_color = 'custom-color';
	}

	// Customizable CSS
	wp_enqueue_style( 'media_center-preset-color',  get_template_directory_uri() . '/assets/css/' . $preset_color . '.css' );
	
	// Javascript & CSS plugin styles
	wp_enqueue_style( 'media_center-owl-carousel',  get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'media_center-animate',  get_template_directory_uri() . '/assets/css/animate.min.css' );

	
	$use_default_font = isset( $media_center_theme_options['use_default_font'] ) ? $media_center_theme_options['use_default_font'] : true ;

	if( $use_default_font ){
		// Google Fonts
    	wp_enqueue_style( 'media_center-open-sans', media_center_font_url(), array(), null );
	}

	// Icons/Glyphs
	wp_enqueue_style( 'media_center-font-awesome',  get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	/*
	* Javascript
	*/

	wp_enqueue_script( 'media_center-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-echo', get_template_directory_uri() . '/assets/js/echo.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-css-browser-selector', get_template_directory_uri() . '/assets/js/css_browser_selector.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array( 'jquery' ), '1.10.2', true );
	wp_enqueue_script( 'media_center-bootstrap-slider', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array( 'jquery' ), '1.10.2', true );
    wp_enqueue_script( 'media_center-jquery-raty', get_template_directory_uri() . '/assets/js/jquery.raty.min.js', array( 'jquery' ), '1.10.2', true );
    wp_enqueue_script( 'media_center-jquery-prettyphoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.min.js', array( 'jquery' ), '1.10.2', true );
    wp_enqueue_script( 'media_center-jquery-customselect', get_template_directory_uri() . '/assets/js/jquery.customSelect.min.js', array( 'jquery' ), '1.10.2', true );

    $sticky_header = isset ( $media_center_theme_options['sticky_header'] ) ? $media_center_theme_options['sticky_header'] : true;
	
	if( $sticky_header ) {
		wp_enqueue_script( 'media_center-waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array( 'jquery' ), '1.10.2', true );
    	wp_enqueue_script( 'media_center-waypoints-sticky', get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js', array( 'jquery' ), '1.10.2', true );
	}

	$enable_live_search = isset( $media_center_theme_options['live_search'] ) ? $media_center_theme_options['live_search'] : true;

	if( $enable_live_search ) {
		wp_enqueue_script( 'wp_typeahead_js', get_template_directory_uri() . '/assets/js/typeahead.bundle.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'handlebars', get_template_directory_uri() . '/assets/js/handlebars.min.js', array( 'wp_typeahead_js' ), '', true );
	}

    wp_enqueue_script( 'media_center-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.10.2', true );
    wp_enqueue_script( 'media_center-jplayer', get_template_directory_uri() . '/assets/js/jquery.jplayer.min.js', array( 'jquery' ), '1.10.2', true );
    
    // Theme Scripts
	wp_enqueue_script( 'media_center-theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.10.2', true );

	$scroll_to_top = isset ( $media_center_theme_options['scroll_to_top'] ) ? $media_center_theme_options['scroll_to_top'] : true;
	$is_rtl_js = is_rtl() ? true : false ;

	$live_search_template = !empty( $media_center_theme_options['live_search_template'] ) ? $media_center_theme_options['live_search_template'] : '<p>{{value}}</p>' ;

	$mc_options = apply_filters( 'mc_localize_script_data', array(
		'rtl' 					=> $is_rtl_js,
		'ajaxurl'				=> admin_url( 'admin-ajax.php' ),
		'should_stick'			=> $sticky_header,
		'should_scroll'			=> $scroll_to_top,
		'live_search_template'	=> $live_search_template,
		'enable_live_search'	=> $enable_live_search,
		'ajax_loader_url'		=> get_template_directory_uri() . '/assets/images/ajax-loader.gif',
		'live_search_empty_msg'	=> __( 'Unable to find any products that match the currenty query', 'mediacenter' ),
	) );
	
	wp_localize_script( 'media_center-theme-scripts', 'mc_options', $mc_options );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'media_center_scripts' );

/* Admin Styles */
function media_center_admin_styles() {
    if ( is_admin() ) {
		if (class_exists('WPBakeryVisualComposerAbstract')) { 
			wp_enqueue_style('media_center_visual_composer', get_template_directory_uri() .'/framework/css/visual-composer.css', false, "1.0", 'all');
		}
    }
}
add_action( 'admin_enqueue_scripts', 'media_center_admin_styles' );

/** 
 * Dequeue Woocmmerce styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Register Open Sans Google font for Media Center.
 *
 * @return string
 */
function media_center_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'mediacenter' ) ) {
		$font_url = esc_url( add_query_arg( 'family', urlencode( 'Open Sans:400,600,700,800' ), "//fonts.googleapis.com/css" ) );
	}

	return $font_url;
}

#-----------------------------------------------------------------
# Register widgetized area and update sidebar with default widgets
#-----------------------------------------------------------------
if( ! function_exists( 'media_center_widgets_init' ) ):
function media_center_widgets_init() {
	
	$sidebars_widgets = wp_get_sidebars_widgets();	
	$footer_area_widgets_counter = "0";	
	if (isset($sidebars_widgets['footer-widget-area'])) $footer_area_widgets_counter  = count($sidebars_widgets['footer-widget-area']);
	
	switch ($footer_area_widgets_counter) {
		case 0:
			$footer_area_widgets_columns ='col-lg-12';
			break;
		case 1:
			$footer_area_widgets_columns ='col-lg-12 col-md-12 col-sm-12';
			break;
		case 2:
			$footer_area_widgets_columns ='col-lg-6 col-md-6 col-sm-12';
			break;
		case 3:
			$footer_area_widgets_columns ='col-lg-4 col-md-6 col-sm-12';
			break;
		case 4:
			$footer_area_widgets_columns ='col-lg-3 col-md-6 col-sm-12';
			break;
		case 5:
			$footer_area_widgets_columns ='col-md-15 col-lg-2 col-sm-12';
			break;
		case 6:
			$footer_area_widgets_columns ='col-lg-2 col-md-6 col-sm-12';
			break;
		default:
			$footer_area_widgets_columns ='col-lg-2 col-md-6 col-sm-12';
	}
	
	//default sidebar
	register_sidebar(array(
		'name'          => __( 'Sidebar', 'mediacenter' ),
		'id'            => 'default-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	
	//footer widget area
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'mediacenter' ),
		'id'            => 'footer-widget-area',
		'before_widget' => '<div class="' . $footer_area_widgets_columns . ' columns"><aside id="%1$s" class="widget clearfix %2$s"><div class="body">',
		'after_widget'  => '</div></aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//footer bottom widget area
	register_sidebar( array(
		'name'          => __( 'Footer Bottom Widget Area', 'mediacenter' ),
		'id'            => 'footer-bottom-widget-area',
		'before_widget' => '<div class="columns"><aside id="%1$s" class="widget clearfix %2$s"><div class="body">',
		'after_widget'  => '</div></aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	//catalog widget area
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'mediacenter' ),
		'id'            => 'catalog-widget-area',
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-12"><aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//product filters widget area
	register_sidebar( array(
		'name'          => __( 'Product Filters', 'mediacenter' ),
		'id'            => 'product-filters-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
endif;
add_action( 'widgets_init', 'media_center_widgets_init' );

#-----------------------------------------------------------------
# WooCommerce Template Settings
#-----------------------------------------------------------------

require_once get_template_directory() . '/framework/inc/woocommerce-template-functions.php';

#-----------------------------------------------------------------
# Media Center Blog Functions
#-----------------------------------------------------------------

require_once get_template_directory() . '/framework/inc/mediacenter-blog-functions.php';

#-----------------------------------------------------------------
# Header
#-----------------------------------------------------------------

// Displays part of the header

function media_center_display_header_part ( $part ){
	get_template_part( 'framework/templates/header/' . $part );
}

if( !function_exists( 'media_center_display_logo' ) ):
function media_center_display_logo( $default_logo ) {
	global $media_center_theme_options;

	$mc_logo = '';

	if ( !empty( $media_center_theme_options['use_text_logo'] ) && $media_center_theme_options['use_text_logo'] == '1' ){
		$mc_logo = '<span class="logo-text">' . $media_center_theme_options['logo_text'] . '</span>';
	} else {
		if ( !empty( $media_center_theme_options['site_logo']['url'] ) ) {
			$media_center_site_logo = $media_center_theme_options['site_logo'];
			$mc_logo = '<img alt="logo" src="' . $media_center_site_logo['url'] . '" width="' . $media_center_site_logo['width'] . '" height="' . $media_center_site_logo['height'] . '"/>';
		} else {
			$mc_logo = $default_logo;
		}
	}
    
    return $mc_logo;
}
endif;

add_filter( 'media_center_display_logo', 'media_center_display_logo' );

// Check to hide title

function media_center_should_hide_title() {
	global $mc_page_metabox;
	
	$postID = get_the_ID(); $cart_page_ID = get_option( 'woocommerce_cart_page_id' );

	return ( $mc_page_metabox->get_the_value( 'hide_title' ) === '1' ) || ( $cart_page_ID == $postID );
}

#-----------------------------------------------------------------
# The Breadcrumb
#-----------------------------------------------------------------
if( ! function_exists( 'media_center_get_category_parents' ) ) :
function media_center_get_category_parents( $id, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
	$category_parents = get_category_parents( $id, $link, $separator, $nicename, $visited );
	if( is_wp_error( $category_parents ) ) {
		$category_parents = '';
	} else {
		$category_parents = str_replace( '</a>', '</a></li>', str_replace( '<a', '<li><a', $category_parents ) );
	}
	return $category_parents;
}
endif;

if( ! function_exists( 'media_center_blog_link' ) ) :
function media_center_blog_link() {
	$blog_page_link = '';
	if ( get_option( 'show_on_front' ) == 'page' ){
		$blog_page_ID = get_option( 'page_for_posts' );
		$page = get_page( $blog_page_ID );
		$blog_page_link = '<a href="' . get_permalink( $blog_page_ID ) . '">' . $page->post_title . '</a>';
	}
	return $blog_page_link;
}
endif;


get_template_part( 'framework/inc/mediacenter-breadcrumb' );

#-----------------------------------------------------------------
# Navigation
#-----------------------------------------------------------------

// Top Bar Left Nav Menu
if( ! function_exists( 'media_center_top_left_nav_menu' ) ) :
function media_center_top_left_nav_menu(){
	global $media_center_theme_options;

	if( $media_center_theme_options['language_switcher_position'] == 'top_bar_left'){
		$enable_language_switcher = $media_center_theme_options['enable_language_switcher'];
	}else{
		$enable_language_switcher = false;
	}

	if( $media_center_theme_options['currency_switcher_position'] == 'top_bar_left'){
		$enable_currency_switcher = $media_center_theme_options['enable_currency_switcher'];
	}else{
		$enable_currency_switcher = false;
	}
	
	$top_left_menu = ''; 

	$languages_menu = $enable_language_switcher ? media_center_get_languages_menu() : '';
	$currencies_menu = $enable_currency_switcher ? media_center_get_currencies_menu() : '';

	if ( has_nav_menu ( 'top-left' ) ) {
		$top_left_menu .= wp_nav_menu( 
            array(
				'menu' 			    => 'top-left',
				'theme_location' 	=> 'top-left',
				'depth' 			=> 2,
				'container' 		=> false,
				'menu_class' 		=> 'top-left',
				'echo' 			    => 0 ,
				'walker' 			=> new wp_bootstrap_navwalker(),
				'items_wrap' 		=> '%3$s',
            )
        );
	} else {
		$pages = get_pages( array( 'parent' => 0, 'number' => '5', ) );
		foreach ( $pages as $page ){
			$top_left_menu .= '<li><a href="' . get_permalink( $page->ID ) .'">' . $page->post_title . '</a></li>';
		}
	}

	$top_left_menu = '<ul id="menu-top-left" class="top-left">' . $top_left_menu . $languages_menu . $currencies_menu . '</ul>';

	return $top_left_menu ;
}
endif;

// Top Bar Right Nav Menu
if( ! function_exists( 'media_center_top_right_nav_menu' ) ) :
function media_center_top_right_nav_menu(){
	global $media_center_theme_options;

	if( $media_center_theme_options['language_switcher_position'] == 'top_bar_right'){
		$enable_language_switcher = $media_center_theme_options['enable_language_switcher'];
	}else{
		$enable_language_switcher = false;
	}

	if( $media_center_theme_options['currency_switcher_position'] == 'top_bar_right'){
		$enable_currency_switcher = $media_center_theme_options['enable_currency_switcher'];
	}else{
		$enable_currency_switcher = false;
	}
	
	$top_right_menu = '';

	$languages_menu = $enable_language_switcher ? media_center_get_languages_menu() : '';
	$currencies_menu = $enable_currency_switcher ? media_center_get_currencies_menu() : '';

	if ( has_nav_menu ( 'top-right' ) ) {
		
		$top_right_menu .= wp_nav_menu( 
            array(
				'menu' 			    => 'top-right',
				'theme_location' 	=> 'top-right',
				'depth' 			=> 2,
				'container' 		=> false,
				'menu_class' 		=> 'right top-right',
				'echo' 			    => 0 ,
				'walker' 			=> new wp_bootstrap_navwalker(),
				'items_wrap' 		=> '%3$s',
            )
        );
	} else {
		$top_right_menu .= media_center_woocommerce_pages( true, '', '') ;
	}

	$top_right_menu = '<ul class="right top-right">' . $languages_menu . $currencies_menu . $top_right_menu . '</ul>';

	return $top_right_menu ;
}
endif;

// Languages Nav
if( ! function_exists( 'media_center_get_languages_menu' ) ) :
function media_center_get_languages_menu() {
	global $media_center_theme_options;

	$languages_menu = '';

	if ( function_exists( 'icl_get_languages' ) ) :

		if ( $media_center_theme_options['language_switcher_position'] == 'top_bar_left' ) {
			if( $media_center_theme_options['top_bar_left_menu_dropdown_trigger'] == 'hover' ) {
				$data_hover = 'data-hover="dropdown"';
			} else {
				$data_hover = '';
			}
		} elseif ( $media_center_theme_options['language_switcher_position'] == 'top_bar_right' ) {
			if( $media_center_theme_options['top_bar_right_menu_dropdown_trigger'] == 'hover' ) {
				$data_hover = 'data-hover="dropdown"';
			} else {
				$data_hover = '';
			}
		}
			
		$additional_languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
            
        if (count($additional_languages) > 1) { 
        	$languages_menu .= '<li class="dropdown"><a href="#" ' . $data_hover . ' data-toggle="dropdown" class="dropdown-toggle">' . ICL_LANGUAGE_NAME . '</a>';
			$languages_menu .= '<ul class="dropdown-menu">';
                    
            foreach( $additional_languages as $additional_language ) {
				if( !$additional_language['active'] ) {
					$langs[] = '<li><a href="'.$additional_language['url'].'">'.$additional_language['native_name'].'</a></li>';
				} 
            }
			$languages_menu .= join('', $langs);
                    
            $languages_menu .= '</ul>';
            $languages_menu .= '</li>';
        }
        
    endif;

    return $languages_menu;
}
endif;

// Currencies Menu
if( ! function_exists( 'media_center_get_currencies_menu' ) ) :
function media_center_get_currencies_menu() {
	
	$currencies_menu = '';

	if( class_exists( 'WCML_Multi_Currency_Support' ) ) {
		global $woocommerce_wpml, $sitepress, $media_center_theme_options;

		if ( $media_center_theme_options['currency_switcher_position'] == 'top_bar_left' ) {
			if( $media_center_theme_options['top_bar_left_menu_dropdown_trigger'] == 'hover' ) {
				$data_hover = 'data-hover="dropdown"';
			} else {
				$data_hover = '';
			}
		} elseif ( $media_center_theme_options['currency_switcher_position'] == 'top_bar_right' ) {
			if( $media_center_theme_options['top_bar_right_menu_dropdown_trigger'] == 'hover' ) {
				$data_hover = 'data-hover="dropdown"';
			} else {
				$data_hover = '';
			}
		}

		$settings = $woocommerce_wpml->get_settings();

		if( !isset( $settings['currencies_order'] ) ) {
            $currencies = $woocommerce_wpml->multi_currency_support->get_currency_codes();
        }else{
            $currencies = $settings['currencies_order'];
        }

		if(	!isset( $args['format'] ) ) {
            $args['format'] = isset($settings['wcml_curr_template']) && $settings['wcml_curr_template'] != '' ? $settings['wcml_curr_template'] : '%name% (%code%)' ;
        }

        $currencies_dropdown = '<ul class="mc_wcml_currency_switcher dropdown-menu">';
        $selected_currency  = '';
        $wc_currencies = get_woocommerce_currencies();

		foreach($currencies as $currency){
            if( $woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
				
				$currency_format = preg_replace( array('#%name%#', '#%symbol%#', '#%code%#'), array( $wc_currencies[$currency], get_woocommerce_currency_symbol( $currency ), $currency ), $args['format'] );                
                
                if( $currency == $woocommerce_wpml->multi_currency_support->get_client_currency() ){
                	$selected_currency = '<a href="#" ' . $data_hover . ' class="dropdown-toggle" data-toggle="dropdown">' . $currency_format . '</a>';
                }
                
                $currencies_dropdown .= '<li><a data-currency="' . $currency . '" href="#">' . $currency_format . '</a></li>';
        	}
        }

        $currencies_dropdown .= '</ul>';

        $currencies_menu = '<li class="dropdown">' . $selected_currency . $currencies_dropdown . '</li>';
	}

	return $currencies_menu;
}
endif;

// Primary Navigation
if( ! function_exists( 'media_center_primary_nav_menu' ) ) :
function media_center_primary_nav_menu(){
	$primary_nav_menu = '';

	if ( has_nav_menu( 'primary' ) ) {

        $primary_nav_menu .= wp_nav_menu( 
            array(
                'menu' 				=> 'primary',
                'theme_location' 	=> 'primary',
                'depth' 			=> 0,
                'container' 		=> false,
                'menu_class' 		=> 'navbar-nav nav',
                'echo' 				=> 0,
                'walker' 			=> new wp_bootstrap_navwalker()
            )
        );

    } else {
        $primary_nav_menu .= '<ul class="navbar-nav nav">';
        $primary_nav_menu .=  wp_list_categories(
            array(
                'title_li'     => '', 
                'hide_empty'   => 1 , 
                'taxonomy'     => 'product_cat',
                'hierarchical' => 1 ,
                'echo'         => 0 ,
                'depth'        => 1 ,
            )
        );
        $primary_nav_menu .= '</ul>';
    }

    return $primary_nav_menu;
}
endif;

// Departments Navigation
if( ! function_exists( 'media_center_department_nav_menu' ) ) :
function media_center_department_nav_menu(){
	$department_nav_menu = '';

	if ( has_nav_menu( 'departments' ) ) {

        $department_nav_menu .= wp_nav_menu( 
            array(
                'menu' 				=> 'departments',
                'theme_location' 	=> 'departments',
                'depth' 			=> 0,
                'container' 		=> false,
                'menu_class' 		=> 'dropdown-menu',
                'echo' 				=> 0,
                'walker' 			=> new wp_bootstrap_navwalker()
            )
        );

    } else {
        $department_nav_menu .= '<ul class="dropdown-menu">';
        $department_nav_menu .=  wp_list_categories(
			array(
				'title_li'		=> '', 
				'hide_empty'	=> 1 , 
				'taxonomy'		=> 'product_cat',
				'depth'			=> 2 ,
				'echo'			=> 0 ,
				'walker'		=> new wp_bootstrap_categorieswalker(),
				'dropdown_class'	=> 'submenu',
			)
		);
        $department_nav_menu .= '</ul>';
    }

    return $department_nav_menu;
}
endif;

if( ! function_exists( 'media_center_filter_products_query' ) ) :
function media_center_filter_products_query( $args, $atts ){
	global $woocommerce_loop;

	if( isset($atts['product_item_size']) ){
		$woocommerce_loop['product_item_size'] = $atts['product_item_size'];
		$woocommerce_loop['screen_width'] = 100;
	}

	return $args;
}
endif;

add_filter( 'woocommerce_shortcode_products_query', 'media_center_filter_products_query', 10, 2 );

if( ! function_exists( 'woocommerce_products_live_search' ) ) :
function woocommerce_products_live_search(){
	if ( isset( $_REQUEST['fn'] ) && 'get_ajax_search' == $_REQUEST['fn'] ) {

		$query_args = array(
			'posts_per_page' 	=> 10,
			'no_found_rows' 	=> true,
			'post_type'			=> 'product',
			'meta_query'		=> array(
				array(
					'key' => '_visibility',
					'value' => array( 'search', 'visible' ),
					'compare' => 'IN'
				)
			)
		);

		if( isset( $_REQUEST['terms'] ) ) {
			$query_args['s'] = $_REQUEST['terms'];
		}

        $search_query = new WP_Query( $query_args );
 
        $results = array( );
        if ( $search_query->get_posts() ) {
            foreach ( $search_query->get_posts() as $the_post ) {
                $title = get_the_title( $the_post->ID );
                if ( has_post_thumbnail( $the_post->ID ) ) {
					$post_thumbnail_ID = get_post_thumbnail_id( $the_post->ID );
					$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_ID, 'thumbnail' );
				}else{
					$dimensions = wc_get_image_size( 'thumbnail' );
					$post_thumbnail_src = array(
						wc_placeholder_img_src(),
						esc_attr( $dimensions['width'] ),
						esc_attr( $dimensions['height'] )
					);
				}

				$product = new WC_Product( $the_post->ID );
				$price = $product->get_price_html();
				$brand = woocommerce_show_brand( $the_post->ID, true );
				$title = html_entity_decode( $title , ENT_QUOTES, 'UTF-8' );
                
                $results[] = array(
                    'value' 	=> $title,
                    'url' 		=> get_permalink( $the_post->ID ),
                    'tokens' 	=> explode( ' ', $title ),
                    'image' 	=> $post_thumbnail_src[0],
                    'price'		=> $price,
                    'brand'		=> $brand,
                    'id'		=> $the_post->ID
                );
            }
        }
 
        wp_reset_postdata();
        echo json_encode( $results );
    }
    die();
}
endif;

add_action( 'wp_ajax_nopriv_products_live_search', 'woocommerce_products_live_search' );
add_action( 'wp_ajax_products_live_search', 'woocommerce_products_live_search' );