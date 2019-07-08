<?php
/**
 *
 * @package WordPress
 * @subpackage urip
 * @since urip
 *
*/


/* Set default theme constants */

define( 'URIP_THEME_VERSION', wp_get_theme()->Version );

/*************************************************
## Google webfonts
*************************************************/

	function urip_fonts_url() {
    $urip_font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'urip' ) ) {
        $urip_font_url = add_query_arg( 'family', urlencode( 'Montserrat|Droid Serif|Varela+Round:400,700,400italic' ), "//fonts.googleapis.com/css" );
    }
    return $urip_font_url;
}


/*************************************************
## Styles and Scripts
*************************************************/


function urip_scripts() {

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'nt-helper', 								get_template_directory_uri() . '/css/helper.css', 										URIP_THEME_VERSION, false);
	wp_enqueue_style( 'bootstrap', 								get_template_directory_uri() . '/css/bootstrap.min.css', 								URIP_THEME_VERSION, false);
	wp_enqueue_style( 'icomoon', 								get_template_directory_uri() . '/fonts/icomoon/icomoon.css', 							URIP_THEME_VERSION, false);
	wp_enqueue_style( 'font-awesome', 							get_template_directory_uri() . '/fonts/font-awesome.min.css', 							URIP_THEME_VERSION, false);
	wp_register_style( 'swipebox', 								get_template_directory_uri() . '/css/swipebox.css', 									URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-animatecss', 							get_template_directory_uri() . '/css/animate.min.css',									URIP_THEME_VERSION, false);
	wp_register_style( 'nt-flexslider', 						get_template_directory_uri() . '/js/flexslider/flexslider.css', 						URIP_THEME_VERSION, false);
	wp_register_style( 'slick', 								get_template_directory_uri() . '/js/slick/slick.css"', 									URIP_THEME_VERSION, false);
	wp_register_style( 'slick-theme', 							get_template_directory_uri() . '/js/slick/slick-theme.css"', 							URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-stylemain', 							get_template_directory_uri() . '/css/style.css', 										URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-responsivecss', 						get_template_directory_uri() . '/css/style-responsive.css', 							URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-style-blog', 							get_template_directory_uri() . '/css/style-blog.css', 									URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-wordpress-style', 					get_template_directory_uri() . '/css/wordpress.css',							 		URIP_THEME_VERSION, false);
	wp_enqueue_style( 'nt-update', 								get_template_directory_uri() . '/css/update.css', 										URIP_THEME_VERSION, false);

	if ( is_rtl() ) {
	wp_enqueue_style( 'nt-rtl', 								get_template_directory_uri() . '/css/rtl.css', 											URIP_THEME_VERSION, false);
	}

	wp_register_style( 'expandableGallery', 					get_template_directory_uri() . '/css/expandableGallery.css', 							URIP_THEME_VERSION, false);
	wp_enqueue_style( 'ninetheme_urip-fonts', 					urip_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'style', 									get_stylesheet_uri() );

	wp_enqueue_script( 'modernizr', 	 						get_template_directory_uri() .  '/js/modernizr.js', array('jquery'), 	 				URIP_THEME_VERSION, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', 	 						get_template_directory_uri() .  '/js/bootstrap.min.js', array('jquery'), 				URIP_THEME_VERSION, true);
	wp_enqueue_script( 'waypoints', 	 						get_template_directory_uri() .  '/js/waypoints.min.js', array('jquery'), 				URIP_THEME_VERSION, true);
	wp_register_script('nt-counterup', 							get_template_directory_uri() . '/js/minified/jquery.counterup.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_register_script('nt-custom-counter', 					get_template_directory_uri() . '/js/custom/custom-counter.js', array('jquery'), 		URIP_THEME_VERSION, true);
	wp_register_script('nt-animatedHeadline', 					get_template_directory_uri() . '/js/minified/animatedHeadline.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_register_script('swipebox', 								get_template_directory_uri() . '/js/minified/jquery.swipebox.min.js', array('jquery'),  	URIP_THEME_VERSION, true);
	wp_register_script('nt-custom-swipebox', 					get_template_directory_uri() . '/js/custom/custom-swipebox.js', array('jquery'), 		URIP_THEME_VERSION, true);
	wp_register_script('slick', 								get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), 				URIP_THEME_VERSION, true);
	wp_register_script('custom-slick', 							get_template_directory_uri() . '/js/custom/custom-slick.js', array('jquery'), 			URIP_THEME_VERSION, true);
	wp_register_script( 'nt-ajaxchimp', 	 					get_template_directory_uri() . '/js/minified/jquery.ajaxchimp.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_register_script('nt-custom-mailchimb', 					get_template_directory_uri() . '/js/custom/custom-mailchimb.js', array('jquery'), 		URIP_THEME_VERSION, true);

	if ( ot_get_option('contactpopupvisibility') == 'on') {
	wp_register_script('nt-custom-contact', 					get_template_directory_uri() . '/js/custom/custom-contact.js', array('jquery'), 		URIP_THEME_VERSION, true);
	}

	wp_register_script( 'nt-flexslider', 	 					get_template_directory_uri() .  '/js/jquery.flexslider.js', array('jquery'), 			URIP_THEME_VERSION, true);
	wp_register_script( 'nt-fitvids', 	 	 					get_template_directory_uri() .  '/js/jquery.fitvids.js', array('jquery'), 				URIP_THEME_VERSION, true);
	wp_register_script( 'nt-blogscripts', 	 					get_template_directory_uri() .  '/js/blog-script.js', array('jquery'),		 			URIP_THEME_VERSION, true);

	wp_enqueue_script( 'jquery-stellar', 						get_template_directory_uri()  .  '/js/jquery.stellar.min.js', array('jquery'), 			URIP_THEME_VERSION, true);

	if ( ot_get_option('SmoothScroll') == 'on') {
	wp_enqueue_script( 'SmoothScroll', 							get_template_directory_uri()  .  '/js/minified/SmoothScroll.min.js', array('jquery'), 	URIP_THEME_VERSION, true);
	}

	wp_enqueue_script( 'classie', 	 							get_template_directory_uri()  .  '/js/minified/classie.min.js', array('jquery'), 		URIP_THEME_VERSION, true);
	wp_enqueue_script( 'jquery-nav', 	 						get_template_directory_uri() .  '/js/minified/jquery.nav.min.js', array('jquery'), 		URIP_THEME_VERSION, true);

	wp_register_script( 'expandableGallery', 	 			    get_template_directory_uri() .  '/js/minified/expandableGallery.min.js', array('jquery'), URIP_THEME_VERSION, true);

	wp_enqueue_script(  'easing', 	 						    get_template_directory_uri() .  '/js/jquery.easing.min.js', array('jquery'), 			URIP_THEME_VERSION, true);
	wp_enqueue_script(  'jquery-css-transform', 	 			get_template_directory_uri() .  '/js/minified/jquery-css-transform.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_enqueue_script(  'jquery-animate-css-rotate-scale', 	    get_template_directory_uri() .  '/js/minified/jquery-animate-css-rotate-scale.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_enqueue_script(  'jquery-quicksand', 	 				get_template_directory_uri() .  '/js/minified/jquery.quicksand.min.js', array('jquery'), URIP_THEME_VERSION, true);
	wp_enqueue_script(  'headhesive', 	 					    get_template_directory_uri() .  '/js/minified/headhesive.min.js', array('jquery'), 		URIP_THEME_VERSION, true);
	wp_enqueue_script(  'scrollReveal', 	 				 	get_template_directory_uri() .  '/js/minified/scrollReveal.min.js', array('jquery'), 	URIP_THEME_VERSION, true);

	wp_enqueue_script(  'urip', 	 						    get_template_directory_uri() .  '/js/urip.js', array('jquery'), 						URIP_THEME_VERSION, true);
	wp_enqueue_script(  'nt-updatejs', 	 					    get_template_directory_uri() .  '/js/update.js', array('jquery'), 						URIP_THEME_VERSION, true);
	wp_enqueue_script(  'expandableNav', 	 				    get_template_directory_uri() .  '/js/minified/expandableNav.min.js', array('jquery'), 	URIP_THEME_VERSION, true);
	wp_register_script( 'nt-countdown', 	 				    get_template_directory_uri() .  '/js/jquery.countdown.min.js', array('jquery'), 		URIP_THEME_VERSION, true);
	wp_register_script( 'nt-custom-timer', 	 				    get_template_directory_uri() .  '/js/custom-timer.js', array('jquery'), 				URIP_THEME_VERSION, true);

	wp_enqueue_script(  'html5shiv', 							get_template_directory_uri()  .  '/js/html5shiv.min.js', 		array('jquery'), '3.7.2', false );
	wp_script_add_data( 'html5shiv', 							'conditional', 'lt IE 9' );

	wp_enqueue_script(  'respond', 								get_template_directory_uri()  .  '/js/respond.min.js', 			array('jquery'), '1.4.2', false );
	wp_script_add_data( 'respond', 								'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'urip_scripts' );


/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/

	// Metabox plugin check
	if ( ! function_exists( 'rwmb_meta' ) ) {
		function rwmb_meta( $key, $args = '', $post_id = null ) {
			return false;
		}
	}

	if(function_exists('vc_set_as_theme')) {
			require_once get_template_directory() . '/includes/visualcomposer/ninetheme-shortcodes.php';
	}

	require_once get_template_directory() . '/includes/custom-metaboxes/page-metaboxes.php';
	require_once get_template_directory() . '/includes/aq-resizer.php';
	require_once get_template_directory() . '/includes/custom-style.php';
	require_once get_template_directory() . '/includes/template-tags.php';
   // woocommerce
   if ( class_exists( 'woocommerce' ) ) {
	     require_once get_template_directory() . '/includes/woocommerce/woocommerce.php';
   }
   // Option tree controllers
   if ( ! class_exists( 'OT_Loader' ) ){

      function ot_get_option() {
         return false;
      }

   }

   // add filter for  options panel loader
   add_filter( 'ot_show_pages', 		'__return_false' );
   add_filter( 'ot_show_new_layout', 	'__return_false' );

   // Theme options admin panel setings file
   include_once get_template_directory() . '/includes/theme-options.php';

	function urip_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'urip_custom_excerpt_length', 999 );


/*************************************************
## Theme svg support
*************************************************/

function urip_svg_mime_type( $mimes = array() ) {
	$mimes['svg']  = 'images/svg+xml';
	$mimes['svgz'] = 'images/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'urip_svg_mime_type' );


/*************************************************
## Register Menu
*************************************************/

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $object->classes ) ? array() : (array) $object->classes;
			$icon_class = $classes[0];
			$classes = array_slice($classes,1);
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
			$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
			$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
			$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';

			if( $icon_class != '' ) { $icon_classes = '';	}else{ $icon_classes = ''; 	}
		    if( $object->object == 'page' ) {

                $varpost 			= get_post($object->object_id);
                $separate_page 		= get_post_meta($object->object_id, "urip_separate_page", true);
                $disable_menu 		= get_post_meta($object->object_id, "urip_disable_section_from_menu", true);
				$current_page_id 	= get_option('page_on_front');
				$output .= $indent . '<li  class="" >';
                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {
                	if ( $separate_page == false )
	                	$attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
	                else{
	                	if (is_front_page())
	                		$attributes .= ' href="#' . $varpost->post_name . '"';
	                	else
	                		$attributes .= ' href="' .  ''.home_url().'/#' . $varpost->post_name . '"';
	                }
	                $object_output = $args->before;
					if( $separate_page != true ) {
		            $object_output .= '<a'. $attributes .' class="external" >';
					 } else {
		            $object_output .= '<a'. $attributes .' class="external" >';
					}
		            $object_output .= $args->link_before . $icon_classes .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
		            $object_output .= $args->link_after;
		            $object_output .= '</a>';
		            $object_output .= $args->after;
		            $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
                }
           } else {
           		$output .= $indent . '<li>';
                $attributes .= ! empty( $object->url ) ? ' class="external" href="' . esc_attr( $object->url ) .'"' : '';
	            $object_output = $args->before;
	            $object_output .= '<a'. $attributes .' class="external">';
	            $object_output .= $args->link_before . $icon_classes .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	            $object_output .= $args->link_after;
	            $object_output .= '</a>';
	            $object_output .= $args->after;
	            $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
	        }
      }
}

/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function urip_theme_setup() {

	add_editor_style();

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
   add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'video', 'audio',  'quote', 'image','aside', 'portfolio'));
   // woocommerce
	if ( class_exists( 'woocommerce' ) ) {
		add_theme_support( 'woocommerce' );
	}

	add_post_type_support( 'portfolio', 'post-formats' );

	add_image_size( 'blog-thumb', 780, 9999, false ); 		// Blog thumbnails
	add_image_size( 'gallery-thumb', 1120, 9999, false ); 	// Gallery thumbnails
	add_image_size( 'member-thumb', 650, 650, true); 		// Team Member thumbnails
	add_image_size( 'full-size',  9999, 9999, false ); 		// Full Size
	add_image_size( 'mixi',  750, 750, true);
	add_image_size( 'mini', 80, 80 ); //80 pixels wide
	add_image_size( 'midi', 360, 300 ); //300 pixels wide
	add_image_size( 'events', 400, 260 ); // event section

	register_nav_menus( array(
		'main-menu' =>   'Primary Navigation Menu',
		'extra-menu' =>  'Extra Menu',
	) );

}
add_action( 'after_setup_theme', 'urip_theme_setup' );


/*************************************************
## Word Limiter
*************************************************/
function urip_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}


/*************************************************
## Widget columns
*************************************************/


function urip_widgets_init() {
	register_sidebar( array(
		'name' 			=> esc_html__( 'Blog Sidebar', 'urip' ),
		'id' 			=> 'sidebar-1',
		'description'   => esc_html__( 'These are widgets for the Blog page.','urip' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title"><span>',
		'after_title'   => '</span></h5>'
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Widgetize footer', 'urip' ),
		'id' 			=> 'widgetizefooter',
		'description'   => esc_html__( 'These are widgets for the footer newsletter.','urip' ),
		'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-3"><div class="widget  %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>'
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Newsletter', 'urip' ),
		'id' 			=> 'newsletter',
		'description'   => esc_html__( 'These are widgets for the footer newsletter.','urip' )
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Contact form', 'urip' ),
		'id' 			=> 'contactform',
		'description'   => esc_html__( 'These are widgets for the popup contact form','urip' )
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Shop single Sidebar', 'urip' ),
		'id' 			=> 'shop-sidebar',
		'description'   => esc_html__( 'These are widgets for the Shop single Sidebar.','urip' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Woo  shop page Sidebar', 'urip' ),
		'id' 			=> 'shop-page-sidebar',
		'description'   => esc_html__( 'These are widgets for the shop page Sidebar.','urip' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> esc_html__( 'Buddypress Pages Sidebar', 'urip' ),
		'id' 			=> 'buddy-page-sidebar',
		'description'   => esc_html__( 'These are widgets for the buddypress page sidebar.','urip' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'urip_widgets_init' );

/*************************************************
## ot google fonts settings
*************************************************/

function change_ot_google_fonts_api_key( $key ) {
	  return "AIzaSyAacQUh4LEjzqHt5z9fUrcApLtpstj8nF0";
	}
	//option tree body google fonts api key
	add_filter( 'ot_google_fonts_api_key', 'change_ot_google_fonts_api_key' );
	

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'urip_register_required_plugins' );
function urip_register_required_plugins() {

    $plugins = array(

			array(
				'name'         =>  esc_html__('Contact Form 7', "urip"),
				'slug'         => 'contact-form-7',
			),
			array(
				'name'         => esc_html__('Widget for Contact Form 7', "urip"),
				'slug'         => 'widget-contact-form-7',
			),
			array(
				'name'         => esc_html__('Woocommerce', "urip"),
				'slug'         => 'woocommerce',
			),
			array(
				'name'				=> esc_html__('Theme Options Panel', "ekme"),
				'slug'			=> 'option-tree',
				'source'		=> get_theme_file_path() . '/plugins/option-tree.zip',
				'required'		=> true,
			),
			array(
				'name'         => esc_html__('Meta Box', "urip"),
				'slug'         => 'meta-box',
				'required'     => true,
			),
			array(
				'name'         => esc_html__('Easy Google Webfonts', "urip"),
				'slug'         => 'easy-google-fonts',
				'required'     => false,
			),
			array(
				'name'         => esc_html__('Breadcrumb navxt', "urip"),
				'slug'         => 'breadcrumb-navxt',
				'required'     => true,
			),
			array(
				'name'         => esc_html__('Custom post type', "urip"),
				'slug'         => 'mb-custom-post-type',
				'required'     => false,
			),
			array(
				'name'         => esc_html__('Simple page sidebars', "urip"),
				'slug'         => 'simple-page-sidebars',
				'required'     => false,
			),
			array(
				'name'         => 'Portfolio post type',
				'slug'         => 'portfolio-post-type',
			),
			array(
				'name'		   	=> esc_html__('Envato Auto Update Theme', "urip"),
				'slug'		   	=> 'envato-market-update-theme',
				'source'       	=> get_template_directory() . '/plugins/envato-market-update-theme.zip',
				'required'	   	=> false,
			),
			array(
				'name'         	=> esc_html__('Visual Composer', "urip"),
				'slug'         	=> 'visual_composer',
				'source'        => get_template_directory() . '/plugins/visual_composer.zip',
				'required'     	=> true,
			),
			array(
				'name'         	=> esc_html__('Revolution Slider', "urip"),
				'slug'         	=> 'revolution_slider',
				'source'        => get_template_directory() . '/plugins/revolution_slider.zip',
				'required'     	=> false,
			),
			array(
				'name'         	=> esc_html__('Price Tables', 'urip'),
				'slug'         	=> 'price-table-type',
				'source'        => get_template_directory() . '/plugins/price-table-type.zip',
				'required'     	=> true,
			),
			array(
				'name'         => 'Team post type',
				'slug'         => 'team-post-type',
				'source'       => get_template_directory() . '/plugins/team-post-type.zip',
				'required'     => false,
			),
			array(
				'name'         	=> esc_html__('Easy Installer', "urip"),
				'slug'         	=> 'easy_installer',
				'source'          => get_template_directory() . '/plugins/easy_installer.zip',
				'required'     	=> true,
			),
      array(
	      'name'         => esc_html__('Urip Shortcodes', "urip"),
	      'slug'         => 'urip-shortcodes',
	      'source'       => get_template_directory() . '/plugins/urip-shortcodes.zip',
	      'required'     => true,
	      'version'      => '8.2.2',
      ),
    );

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}



/*************************************************
## urip Comment
*************************************************/

	if ( ! function_exists( 'urip_comment' ) ) :
	function urip_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
	?>
   <div class="container">
   <div class="comments">
   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'urip' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'urip' ), ' ' ); ?></p>
	  <?php
		break;
	   default :
	  ?>
        <div class="comments">
            <ul>
				<li class="comment">
					<span class="who">
						<?php echo get_avatar( $comment, 80 ); ?>
					</span>
					<div class="who-comment">
					<p class="name"><?php comment_author(); ?></p>
					<?php comment_text(); ?>
                    <?php edit_comment_link( __( '<i class="fa fa-pencil"></i> Edit', 'urip' ), ' ' ); ?>
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    <span class="meta-data"><time class="comment-date" pubdate datetime="<?php comment_time( 'c' ); ?>"><?php comment_date(); ?> <?php esc_html_e( 'at', 'urip' ); ?> <?php comment_time(); ?></time></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'urip' ); ?></em>
					<?php endif; ?>
					</div>
				</li>
            </ul>
		</div>
	  <?php
		break;
	  endswitch;
	 }
	endif;

	// add theme version number in body classes
	function urip_class_names($classes) {

		$theme_name =  'ninetheme-theme-name-' . wp_get_theme();
		$theme_version =  'theme-version-' . wp_get_theme()->get( 'Version' );

		$classes[] =  $theme_name;
		$classes[] =  $theme_version;

		return $classes;
	}

	add_filter('body_class','urip_class_names');
