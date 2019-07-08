<?php



// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'urip_vc_row_class', 10, 2 );
function urip_vc_row_class( $class_string, $tag ) {
  if (  $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'container bootstrap', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }

  return $class_string; // Important: you should always return modified or original $class_string
}

vc_set_as_theme( $disable_updater = false );
vc_is_updater_disabled();

vc_remove_element(  "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );


/* START VISUAL COMPOSER CUSTOMIZATION */


//FOR ROW EXTRA ATTR
$urip_background_one_attributes = array(

	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background position Y-X axis', 'urip' ),
		'param_name'  	=> 'urip_bg_position',
		'description' 	=> esc_html__('Change position Y-X axis for bg image.', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
		'value'       	=> array(
			esc_html__('Select Y-X position', 	'urip' )	=> '',
			esc_html__('Left-Top', 		'urip' )	=> 'left top',
			esc_html__('Left-Center', 	'urip' )	=> 'left center',
			esc_html__('Left-Bottom', 	'urip' )	=> 'left bottom',
			esc_html__('Right-Top', 	'urip' )	=> 'right top',
			esc_html__('Right-Center', 	'urip' )	=> 'right center',
			esc_html__('Right-Bottom', 	'urip' )	=> 'right bottom',
			esc_html__('Center-Top', 	'urip' )	=> 'center top',
			esc_html__('Center-Center', 'urip' )	=> 'center center',
			esc_html__('Center-Bottom', 'urip' )	=> 'center bottom',
			esc_html__('Custom', 		'urip' )	=> 'custom',
		),
	),

	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position Y axis', 'urip'),
		'param_name' 	=> 'urip_bg_positiony',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
		'dependency' 	=> array(
						'element' 	=> 'urip_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis', 'urip'),
		'param_name' 	=> 'urip_bg_positionx',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
		'dependency' 	=> array(
						'element' 	=> 'urip_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis offset', 'urip'),
		'param_name' 	=> 'urip_bg_xoffset',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: 40px or 25% ...etc', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
		'dependency' 	=> array(
						'element' 	=> 'urip_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background size', 'urip'),
		'param_name' 	=> 'urip_bg_size',
		'description' 	=> esc_html__('Change size for bg image.example: 100px or 100% or 100vh', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 992px )', 'urip' ),
		'param_name'  	=> 'urip_bg_ontablet',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the row background image when the screen width maximum 992px', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 768px )', 'urip' ),
		'param_name'  	=> 'urip_bg_onmobile',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the row background image when the screen width maximum 768px', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 480px )', 'urip' ),
		'param_name'  	=> 'urip_bg_onphone',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the row background image when the screen width maximum 480px', 'urip'),
		'group' 		=> esc_html__('Design Options','urip'),
	),
);
vc_add_params( 'vc_row', $urip_background_one_attributes );


//FOR ROW 480 RESOLUTION
$urip_vc_row_responsive_attributes = array(

	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Add container ?', 'urip'),
		'param_name'  	=> 'urip_container_display',
		'weight' 	  	=> 1,
		'value'       	=> array(
			'Add container'=>'true',
		), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is only for Row stretch : Default and Row stretch : Stretch row.', 'urip')
	),

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_row_992_responsive',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_row_768_responsive',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_row_480_responsive',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),

);
vc_add_params( 'vc_row', $urip_vc_row_responsive_attributes );


//FOR ROW EXTRA 3 OVERLAY ATTR
$urip_row_overlay_attributes = array(

	//OVERLAY 1
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_html__('Overlay Color', 'urip'),
		'param_name'	=> 'overlaybg',
		'description'	=> esc_html__('Add color.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Width', 'urip'),
		'param_name'	=> 'overlaywidth',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Height', 'urip'),
		'param_name'	=> 'overlayheight',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Top offset', 'urip'),
		'param_name'	=> 'overlaytop',
		'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Left offset', 'urip'),
		'param_name'	=> 'overlayleft',
		'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Right offset', 'urip'),
		'param_name'	=> 'overlayright',
		'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Bottom offset', 'urip'),
		'param_name'	=> 'overlaybottom',
		'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under 992px ?', 'urip'),
		'param_name'  	=> 'overlay992',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum 992px', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under 768px ?', 'urip'),
		'param_name'  	=> 'overlay768',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum 768px', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under overlay480px ?', 'urip'),
		'param_name'  	=> 'overlay480',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum overlay480px', 'urip'),
		'group' 		=> esc_html__('Overlay 1','urip'),
	),

	//OVERLAY 2
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_html__('Overlay Color', 'urip'),
		'param_name'	=> 'overlaybg2',
		'description'	=> esc_html__('Add color.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Width', 'urip'),
		'param_name'	=> 'overlaywidth2',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Height', 'urip'),
		'param_name'	=> 'overlayheight2',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Top offset', 'urip'),
		'param_name'	=> 'overlaytop2',
		'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Left offset', 'urip'),
		'param_name'	=> 'overlayleft2',
		'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Right offset', 'urip'),
		'param_name'	=> 'overlayright2',
		'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Bottom offset', 'urip'),
		'param_name'	=> 'overlaybottom2',
		'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under 992px ?', 'urip'),
		'param_name'  	=> 'overlay2_992',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum 992px', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under 768px ?', 'urip'),
		'param_name'  	=> 'overlay2_768',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum 768px', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Display under overlay480px ?', 'urip'),
		'param_name'  	=> 'overlay2_480',
		'value'       	=> array(
			'Hide overlay'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is for disabling the overlay color when the screen width maximum 480px', 'urip'),
		'group' 		=> esc_html__('Overlay 2','urip'),
	),
);
vc_add_params( 'vc_row', $urip_row_overlay_attributes );

//FOR COLUMN
$urip_vc_column_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_column_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_column_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_column_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),

);
vc_add_params( 'vc_column', $urip_vc_column_responsive_attributes );

//FOR COLUMN INNER
$urip_vc_column_inner_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_colinner_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_colinner_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'urip' ),
		'param_name' 	=> 'urip_vc_colinner_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'urip' ),
		'group' 		=> esc_html__('Responsive Extra','urip'),
	),

);
vc_add_params( 'vc_column_inner', $urip_vc_column_inner_responsive_attributes );




/* END VISUAL COMPOSER CUSTOMIZATION */


/*-----------------------------------------------------------------------------------*/
/*	what we do 3
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_what_we_do_event_2integrateWithVC' );
function vc_what_we_do_event_2integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Event what we do", "urip" ),
      "base" => "vc_what_we_do_event",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event about section", "urip"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your description", "urip"),
        ),

		array(
            "type" => "textarea_html",
            "heading" => esc_html__("You can add any content. Default content a contactform.", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Section content area", "urip"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'If you want to use default mockup image select show', 'urip' ),
			'param_name' => 'mockup_url_d',
			'value' => array(
				esc_html__( 'select type', 'urip' ) => 'centered',
				esc_html__( 'show', 'urip' ) => '1',
				esc_html__( 'hide', 'urip' ) => '2'
			),
			'description' => esc_html__( 'Select type', 'urip' ),
		),

		array(
            "type" => "attach_image",
            "heading" => esc_html__("Section bottom  image", "urip"),
            "param_name" => "mockup_image",
            "description" => esc_html__("Add Section bottom area image, example is mockup", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Popup video url", "urip"),
            "param_name" => "video_url",
            "description" => esc_html__("Example : https://www.youtube.com/watch?v=Hhk4N9A0oCA", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Button url", "urip"),
            "param_name" => "button_url",
            "description" => esc_html__("Example : #features or http://www.yourwebsite.com", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Button title", "urip"),
            "param_name" => "button_title",
            "description" => esc_html__("Example : https://www.youtube.com/watch?v=Hhk4N9A0oCA", "urip"),
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_what_we_do_event_2 extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	event
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_session_integrateWithVC' );
function vc_session_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Event session", "urip" ),
      "base" => "vc_session",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event about section", "urip"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "description",
            "description" => esc_html__("Add your description", "urip"),
        ),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Layout type. Show or hide left image column', 'urip' ),
			'param_name' => 'leftcolumn',
			'value' => array(
				esc_html__( 'select layout type', 'urip' ) => 'centered',
				esc_html__( 'show', 'urip' ) => 'show',
				esc_html__( 'hide', 'urip' ) => 'show'
			),
			'description' => esc_html__( 'Select type', 'urip' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Left image column overlay backgground visibility', 'urip' ),
			'param_name' => 'overlay',
			'value' => array(
				esc_html__( 'select type', 'urip' ) => 'centered',
				esc_html__( 'show', 'urip' ) => '1',
				esc_html__( 'hide', 'urip' ) => '2'
			),
			'description' => esc_html__( 'Select type', 'urip' ),
		),


		 array(
            "type" => "attach_image",
            "heading" => esc_html__("Section left column image", "urip"),
            "param_name" => "mockup_image",
            "description" => esc_html__("Add Section left column image", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("time", "urip"),
            "param_name" => "time",
            "description" => esc_html__("Add event time . Example : 09.00 - 10.00", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("adress", "urip"),
            "param_name" => "adress",
            "description" => esc_html__("Add event adress . Example : Hall A - Urip Expo Center", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("speakers", "urip"),
            "param_name" => "speakers",
            "description" => esc_html__("Add event adress . Example : John Doe, Kandy Kahre", "urip"),
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_session extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	break
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_break_integrateWithVC' );
function vc_break_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Session break", "urip" ),
      "base" => "vc_break",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event time lable break section", "urip"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Break time", "urip"),
            "param_name" => "time",
            "description" => esc_html__("Add your time.", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "description",
            "description" => esc_html__("Add your description", "urip"),
        ),

      ),
   ) );
}
class WPBakeryShortCode_vc_break extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	vc_heading
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_heading_integrateWithVC' );
function vc_heading_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Section heading", "urip" ),
      "base" => "vc_heading",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event section top headind and slogan", "urip"),
      "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your description", "urip"),
        ),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Texts position', 'urip' ),
			'param_name' => 'position',
			'value' => array(
				esc_html__( 'select position', 'urip' ) => 'centered',
				esc_html__( 'centered', 'urip' ) => 'centered',
				esc_html__( 'Left', 'urip' ) => 'alignedleft'
			),
			'description' => esc_html__( 'Select Texts position', 'urip' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Content offset', 'urip' ),
			'param_name' => 'offset',
			'value' => array(
				esc_html__( 'select offset', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select offset number. Default is 2', 'urip' ),
		),


      ),
   ) );
}
class WPBakeryShortCode_vc_heading extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	timer
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_timer_integrateWithVC' );
function vc_timer_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Timer parallax", "urip" ),
      "base" => "vc_timer",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event countdown timer section", "urip"),
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your header section ID - optional. If you use color options it would be mandatory ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your description", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("timer date", "urip"),
            "param_name" => "timer_date",
            "description" => esc_html__("Add your timer date. Example : 2015/12/08", "urip"),
        ),

		 array(
            "type" => "textarea_html",
            "heading" => esc_html__("You can add any content. Default content a contactform.", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Section content area", "urip"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("Section video mockup image", "urip"),
            "param_name" => "mockup_image",
            "description" => esc_html__("Add video mockup image", "urip"),
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_timer extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	vc_event_about
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_event_about_integrateWithVC' );
function vc_event_about_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Event about", "urip" ),
      "base" => "vc_event_about",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Event about with video popup.", "urip"),
      "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your header section ID - optional. If you use color options it would be mandatory ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("slogan", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your header slogan", "urip"),
        ),

		 array(
            "type" => "textarea_html",
            "heading" => esc_html__("You can add any content", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Section content area", "urip"),
        ),


		array(
            "type" => "href",
            "heading" => esc_html__("button first link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add your button link. ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button first link text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add your button link text ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Popup video url", "urip"),
            "param_name" => "youtubelink",
            "description" => esc_html__("Add your video page url. https://www.youtube.com/watch?v=Hhk4N9A0oCA", "urip"),
        ),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("Section video mockup image", "urip"),
            "param_name" => "mockup_image",
            "description" => esc_html__("Add video mockup image", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),


      ),
   ) );
}
class WPBakeryShortCode_vc_event_about extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/* Counter
/*-----------------------------------------------------------------------------------*/


add_action( 'vc_before_init', 'urip_counter_item_container_integrateWithVC' );
function urip_counter_item_container_integrateWithVC() {


vc_map( array(
    "name" => esc_html__("Counter", "urip"),
    "base" => "urip_counter_item_container",
    "as_parent" => array('only' => 'urip_counter_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"icon"                   => "icon-wpb-row",
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(


       array(
            "type" => "attach_image",
            "heading" => esc_html__("Section parallax background image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add your Section background image", "urip"),
        ),



		array(
            "type" => "colorpicker",
			"heading" => esc_html__("Background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select color", "urip"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your section ID - optional", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("icon color", "urip"),
            "param_name" => "iconcolor",
            "description" => esc_html__("select icon color", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("counter   color", "urip"),
            "param_name" => "countercolor",
            "description" => esc_html__("select  counter color", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("counter title  color", "urip"),
            "param_name" => "countercolortitle",
            "description" => esc_html__("select  title counter color", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("counter delay", "urip"),
            "param_name" => "delay",
            "description" => esc_html__("You can set different delay. Default value : 10", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("counter time", "urip"),
            "param_name" => "time",
            "description" => esc_html__("You can set different time. Default value : 1000", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Counter item", "urip"),
    "base" => "urip_counter_item",
    "content_element" => true,
    "as_child" => array('only' => 'urip_counter_item_container'),
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(

      array(
            "type" => "textfield",
            "heading" => esc_html__("icon", "urip"),
            "param_name" => "icon",
            "description" => esc_html__("Add your icon name. Example : happy ", "urip"),

        ),

		 array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your heading", "urip"),
        ),


		 array(
            "type" => "colorpicker",
            "heading" => esc_html__("icon color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("Add your icon color", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("counter number", "urip"),
            "param_name" => "counter",
            "description" => esc_html__("Add your counter number. Example : 5000", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("icon delay", "urip"),
            "param_name" => "icondelays",
            "description" => esc_html__("Add your counter number. Example : .2 ", "urip"),
        ),

    )
) );

}


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_urip_counter_item_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_urip_counter_item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	app features
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'app_ftrsxs_integrateWithVC' );
function app_ftrsxs_integrateWithVC() {

   vc_map( array(
	"name" => esc_html__( "App Features", "urip" ),
	"base" => "nt_app_moc",
	"as_parent" => array('only' => 'nt_app_moc_image'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"icon"                   => "icon-wpb-row",
	"category" => esc_html__( "Urip", "urip"),

      "params" => array(

	    array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "urip"),
            "param_name" => "section_id",
            "description" => esc_html__("Add section id", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section Design options', 'urip' ),
            'param_name' => 'css',
			"description" => esc_html__("You can use this options for section design", "urip"),
		),
        // tab1
        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon first features", "urip"),
            "param_name" => "iconone",
            "description" => esc_html__("Add Icon Name. Example : pencil", "urip"),
			'group' 	 => esc_html__( 'Column 1', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading first features", "urip"),
            "param_name" => "headingone",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 1', 'urip' ),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Description first features ", "urip"),
            "param_name" => "descriptionone",
            "description" => esc_html__("Add Your Description first features", "urip"),
			'group' 	 => esc_html__( 'Column 1', 'urip' ),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("features first read more link", "urip"),
            "param_name" => "linkone",
            "description" => esc_html__("Add Your features first read more link", "urip"),
			'group' 	 => esc_html__( 'Column 1', 'urip' ),
        ),
		// features2
	    array(
            "type" => "textfield",
            "heading" => esc_html__("Icon second features", "urip"),
            "param_name" => "icontwo",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Column 2', 'urip' ),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading second features", "urip"),
            "param_name" => "headingtwo",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 2', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description second features ", "urip"),
            "param_name" => "descriptiontwo",
            "description" => esc_html__("Add Your Description second features", "urip"),
			'group' 	 => esc_html__( 'Column 2', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("features second read more link", "urip"),
            "param_name" => "linktwo",
            "description" => esc_html__("Add Your features second read more link", "urip"),
			'group' 	 => esc_html__( 'Column 2', 'urip' ),
        ),

		// features3

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon three", "urip"),
            "param_name" => "iconthree",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Column 3', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading third features", "urip"),
            "param_name" => "headingthree",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 3', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description third features ", "urip"),
            "param_name" => "descriptionthree",
            "description" => esc_html__("Add Your Description third features", "urip"),
			'group' 	 => esc_html__( 'Column 3', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("features third read more link", "urip"),
            "param_name" => "linkthree",
            "description" => esc_html__("Add Your features third read more link", "urip"),
			'group' 	 => esc_html__( 'Column 3', 'urip' ),
        ),


		// features4
		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon four", "urip"),
            "param_name" => "iconfour",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Column 4', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading fourth features", "urip"),
            "param_name" => "headingfour",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 4', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description fourth features ", "urip"),
            "param_name" => "descriptionfour",
            "description" => esc_html__("Add Your Description fourth features", "urip"),
			'group' 	 => esc_html__( 'Column 4', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("features fourth read more link", "urip"),
            "param_name" => "linkfour",
            "description" => esc_html__("Add Your features fourth read more link", "urip"),
			'group' 	 => esc_html__( 'Column 4', 'urip' ),
        ),

			// features5

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon fifth", "urip"),
            "param_name" => "iconfive",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Column 5', 'urip' ),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading fifth features", "urip"),
            "param_name" => "headingfive",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 5', 'urip' ),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Description fifth features ", "urip"),
            "param_name" => "descriptionfive",
            "description" => esc_html__("Add Your Description fifth features", "urip"),
			'group' 	 => esc_html__( 'Column 5', 'urip' ),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("features fifth read more link", "urip"),
            "param_name" => "linkfive",
            "description" => esc_html__("Add Your features fifth read more link", "urip"),
			'group' 	 => esc_html__( 'Column 5', 'urip' ),
        ),
		// features6
		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon sixth", "urip"),
            "param_name" => "iconsix",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Column 6', 'urip' ),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading sixth features", "urip"),
            "param_name" => "headingsix",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Column 6', 'urip' ),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Description sixth features ", "urip"),
            "param_name" => "descriptionsix",
            "description" => esc_html__("Add Your Description sixth features", "urip"),
			'group' 	 => esc_html__( 'Column 6', 'urip' ),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("features sixth read more link ", "urip"),
            "param_name" => "linksix",
            "description" => esc_html__("Add Your features sixth read more link", "urip"),
			'group' 	 => esc_html__( 'Column 6', 'urip' ),
        ),
      ),
	    "js_view" => 'VcColumnView'
   ) );

	vc_map( array(
		"name" => esc_html__("Center image", "urip"),
		"base" => "nt_app_moc_image",
		"content_element" => true,
		"as_child" => array('only' => 'nt_app_moc'),
		"category" => esc_html__( "Urip", "urip"),
		"params" => array(
			 array(
				"type" => "attach_image",
				"heading" => esc_html__("center phone mockup", "urip"),
				"param_name" => "agen_imgss",
				"description" => esc_html__("Add your center phone mockup", "urip")
			),
		)
	) );
}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_nt_app_moc extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_nt_app_moc_image extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	vc_header_five_container
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_header_five_container_integrateWithVC' );
function vc_header_five_container_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Frontpage header 5 ", "urip" ),
      "base" => "vc_header_five_container",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Hero event section", "urip"),
      "params" => array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your header section ID - optional. If you use color options it would be mandatory ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("slogan", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your header slogan", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Event date", "urip"),
            "param_name" => "date",
            "description" => esc_html__("Add your Event date", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Event adress", "urip"),
            "param_name" => "adress",
            "description" => esc_html__("Add your Event adress", "urip"),
        ),



		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section text color", "urip"),
            "param_name" => "textcolor",
            "description" => esc_html__("select hero section text color", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button first link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add your button first link. NOTE: If you want to use 2 button please leave blank video options", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button first link text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add your button first link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button two link", "urip"),
            "param_name" => "buttontwolink",
            "description" => esc_html__("Add your button two link", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button two link text", "urip"),
            "param_name" => "buttontwotext",
            "description" => esc_html__("Add your button two link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		 array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Contact popup class option', 'urip' ),
		'param_name' => 'contactbutton',
		'value' => array(
			esc_html__( 'select', 'urip' ) => 'disable',
			esc_html__( 'yes', 'urip' ) => 'active',
			esc_html__( 'no', 'urip' ) => 'disable'
		),
		'description' => esc_html__( 'If you want to use popup contact you can select yes', 'urip' )
		),
	   array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),


      ),
   ) );
}
class WPBakeryShortCode_vc_header_five_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	first header
/*-----------------------------------------------------------------------------------*/


add_action( 'vc_before_init', 'slider_agen_integrateWithVC' );
function slider_agen_integrateWithVC() {


vc_map( array(
    "name" => esc_html__("Frontpage header 1", "urip"),
    "base" => "vc_header_one_container",
    "as_parent" => array('only' => 'vc_header_one_content'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"icon"                   => "icon-wpb-row",
	"category" => esc_html__( "Urip", "urip"),
	"description" => esc_html__("Hero subscribe section", "urip"),
    "params" => array(


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Default form', 'urip' ),
			'param_name' => 'defaultform',
			'value' => array(
				esc_html__( 'select form type', 'urip' ) => 'disable',
				esc_html__( 'yes', 'urip' ) => 'yes',
				esc_html__( 'no', 'urip' ) => 'no'
			),

			'description' => esc_html__( 'If you want to use default html form please select "yes" and do not use contact form 7', 'urip' )
		),

		  array(
            "type" => "textfield",
            "heading" => esc_html__("mailchimp url", "urip"),
            "param_name" => "mailchimburl",
            "description" => esc_html__("Add your mailchimp url if you use default mailchimp form", "urip"),
			'group' 	 => esc_html__( 'Mailchimp', 'urip' ),
        ),

		  array(
            "type" => "textfield",
            "heading" => esc_html__("mail input placeholder text", "urip"),
            "param_name" => "entermail",
            "description" => esc_html__("Add your mail input placeholder text if you use default mailchimp form", "urip"),
			'group' 	 => esc_html__( 'Mailchimp', 'urip' ),
        ),

		 array(
            "type" => "textfield",
            "heading" => esc_html__("submit button text", "urip"),
            "param_name" => "submitbutton",
            "description" => esc_html__("Add your submit button text if you use default mailchimp form", "urip"),
			'group' 	 => esc_html__( 'Mailchimp', 'urip' ),
        ),

       array(
            "type" => "attach_image",
            "heading" => esc_html__("Section parallax background image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Section parallax background image", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section heading & slogan text color", "urip"),
            "param_name" => "textcolor",
            "description" => esc_html__("select hero section heading & slogan text color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section form input background color", "urip"),
            "param_name" => "inputbg",
            "description" => esc_html__("select hero section form input background color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section form button background color", "urip"),
            "param_name" => "buttonbg",
            "description" => esc_html__("select hero section form button background color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section form button text color", "urip"),
            "param_name" => "buttontextcolor",
            "description" => esc_html__("select hero section form button text color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section form helper line text color", "urip"),
            "param_name" => "helpertext",
            "description" => esc_html__("select hero section form helper line text color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section video button background color", "urip"),
            "param_name" => "videobuttonbg",
            "description" => esc_html__("select hero section video button background color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section video button text color", "urip"),
            "param_name" => "videobuttontextcolor",
            "description" => esc_html__("select hero section video button text color -optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),

        array(
            "type" => "textfield",
            "heading" => esc_html__("section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add your header section ID - optional. If you use color options it would be mandatory ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add your header heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("slogan", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your header slogan", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("email alert", "urip"),
            "param_name" => "emailalert",
            "description" => esc_html__("Add your email alert", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Video url", "urip"),
            "param_name" => "watchvideourl",
            "description" => esc_html__("Add your Video url ", "urip"),
			'group' 	 => esc_html__( 'Video', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Video text", "urip"),
            "param_name" => "watchvideotext",
            "description" => esc_html__("Add your Video text ", "urip"),
			'group' 	 => esc_html__( 'Video', 'urip' ),
        ),

		array(
		"type" => "textfield",
		"heading" => esc_html__("Video button icon", "urip"),
		"param_name" => "watchvideoicon",
		"description" => esc_html__("Add your video button icon name like :  icon-youtube5 . Icon list here : https://icomoon.io/#preview-free", "urip"),
		'group' 	 => esc_html__( 'Video', 'urip' ),
		),

		 array(
            "type" => "textarea_html",
            "heading" => esc_html__("Contact form shortcode", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Add your Video text ", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section left button background color", "urip"),
            "param_name" => "leftbuttonbg",
            "description" => esc_html__("select hero section left button background color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),


		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section left button text color", "urip"),
            "param_name" => "leftbuttontextcolor",
            "description" => esc_html__("select hero section left button text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right button background color", "urip"),
            "param_name" => "rightbuttonbg",
            "description" => esc_html__("select hero section right button background color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section scroll icon text color", "urip"),
            "param_name" => "scrolliconcolor",
            "description" => esc_html__("select hero section scroll icon text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right button text color", "urip"),
            "param_name" => "rightbuttontextcolor",
            "description" => esc_html__("select hero section right button text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section text color", "urip"),
            "param_name" => "textcolor",
            "description" => esc_html__("select hero section text color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Popup contact form button position', 'urip' ),
			'param_name' => 'trigger_where',
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
			'value' => array(
				esc_html__( 'select position', 'urip' ) => '',
				esc_html__( 'right', 'urip' ) => 'right',
				esc_html__( 'left', 'urip' )  => 'left'
			),

			'description' => esc_html__( 'If you want to use left button for contact form please select "left" or other', 'urip' )
		),
		array(
            "type" => "href",
            "heading" => esc_html__("button first link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add your button first link. NOTE: If you want to use 2 button please leave blank video options", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button first link text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add your button first link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button two link", "urip"),
            "param_name" => "buttontwolink",
            "description" => esc_html__("Add your button two link", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button two link text", "urip"),
            "param_name" => "buttontwotext",
            "description" => esc_html__("Add your button two link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		 array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Contact popup class option', 'urip' ),
		'param_name' => 'contactbutton',
		'value' => array(
			esc_html__( 'select', 'urip' ) => 'disable',
			esc_html__( 'yes', 'urip' ) => 'active',
			esc_html__( 'no', 'urip' ) => 'disable'
		),
		'description' => esc_html__( 'If you want to use popup contact you can select yes', 'urip' )
	),

	array(
		'type' 		 => 'css_editor',
		'heading'	 => esc_html__( 'Section design', 'urip' ),
		'param_name' => 'css',
		'group' 	 => esc_html__( 'Section design', 'urip' ),
	),

    )
) );

}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_header_one_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_header_one_content extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	header 2
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_header_two_container_integrateWithVC' );
function vc_header_two_container_integrateWithVC() {
   vc_map( array(
      "name" 	 => esc_html__( "Frontpage header 2", "urip" ),
      "base" 	 => "vc_header_two_container",
	  "icon"     => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Hero register section", "urip"),
      "params"   => array(

	  array(
            "type" => "textfield",
			"heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Enter any unique section id", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
		),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("section left column  text color", "urip"),
            "param_name" => "lefttextcolor",
            "description" => esc_html__("select section left column text color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("section right column  background color", "urip"),
            "param_name" => "rightcolor",
            "description" => esc_html__("select section right column background color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("section right column  text color", "urip"),
            "param_name" => "righttextcolor",
            "description" => esc_html__("select section right column text color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("section right column  link color", "urip"),
            "param_name" => "rightlinkcolor",
            "description" => esc_html__("select section right column link color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

	   array(
            "type" => "attach_image",
            "heading" => esc_html__("parallax background image", "urip"),
            "param_name" => "parallax_bg",
            "description" => esc_html__("Add Your parallax background image", "urip"),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
        ),

		array(
            "type" => "attach_image",
            "heading" => esc_html__("Image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("If you don't use video you can add image", "urip"),
			'group' 	 => esc_html__( 'Left Column', 'urip' ),
        ),


		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
			'group' 	 => esc_html__( 'Left Column', 'urip' ),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Enter your description", "urip"),
			'group' 	 => esc_html__( 'Left Column', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("vimeo video url number", "urip"),
            "param_name" => "watchvideourl",
            "description" => esc_html__("Add your vimeo video url number like : 93094247 ", "urip"),
			'group' 	 => esc_html__( 'Left Column', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("Youtube video url number", "urip"),
            "param_name" 	=> "watchyoutubevideourl",
            "description" 	=> esc_html__("Add your youtube  embed video url number like ( in the iframe ) : https://www.youtube.com/embed/_hlyLQBkqOs ", "urip"),
			'group' 	 	=> esc_html__( 'Left Column', 'urip' ),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Video area visibility', 'urip' ),
			'param_name' => 'videocontainer',
			'value' => array(
				esc_html__( 'select', 'urip' ) => 'disable',
				esc_html__( 'visible', 'urip' ) => 'yes',
				esc_html__( 'hide', 'urip' ) => 'hide'
			),
			'description' 	=> esc_html__( 'If you want to use video / image you can select visible', 'urip' ),
			'group' 	 	=> esc_html__( 'Left Column', 'urip' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Video area mobile visibility', 'urip' ),
			'param_name' => 'video_c_mobile',
			'value' => array(
				esc_html__( 'select', 'urip' ) 	=> 'disable',
				esc_html__( 'visible', 'urip' ) => 'yes',
				esc_html__( 'hide', 'urip' ) 	=> 'hide'
			),
			'description' 	=> esc_html__( 'If you want to use on mobile you can select visible', 'urip' ),
			'group' 	 	=> esc_html__( 'Left Column', 'urip' ),
		),

		array(
            "type" => "textfield",
            "heading" => esc_html__("right column account heading", "urip"),
            "param_name" => "accheading",
			'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account heading", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("right column account description line 1", "urip"),
            "param_name" => "acclineone",
          'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account description line 1", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("right column account description line 2", "urip"),
            "param_name" => "acclinetwo",
          'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account description line 2", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("right column account description login url", "urip"),
            "param_name" => "loginurl",
           'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account description login url", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("right column account description login url text", "urip"),
            "param_name" => "loginurltext",
          'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account description login url text", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("right column terms  description ", "urip"),
            "param_name" => "termsone",
            "description" => esc_html__("Add your right column account terms  description", "urip"),
			'group' 	 => esc_html__( 'Right Column', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("right column terms  url ", "urip"),
            "param_name" => "termsurl",
           'group' 	 => esc_html__( 'Right Column', 'urip' ),
            "description" => esc_html__("Add your right column account terms  url", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("right column terms  url text", "urip"),
            "param_name" => "termstwo",
            "description" => esc_html__("Add your right column account terms  url text", "urip"),
			'group' 	 => esc_html__( 'Right Column', 'urip' ),
        ),

		array(
            "type" => "textarea_html",
            "heading" => esc_html__("contact form shortcode", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Add your contact form or any shortcode here", "urip"),
			'group' 	 => esc_html__( 'Right Column', 'urip' ),
        ),

		array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Contact popup class option', 'urip' ),
		'param_name' => 'contactbutton',
		'value' => array(
			esc_html__( 'select', 'urip' ) => 'disable',
			esc_html__( 'yes', 'urip' ) => 'active',
			esc_html__( 'no', 'urip' ) => 'disable'
		),
		'description' => esc_html__( 'If you want to use popup contact you can select yes', 'urip' )
		),

	array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_header_two_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	header 3
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_header_three_container_integrateWithVC' );
function vc_header_three_container_integrateWithVC() {
   vc_map( array(
      "name" 	 => esc_html__( "Frontpage header 3", "urip" ),
      "base" 	 => "vc_header_three_container",
	  "icon"     => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Hero creative section", "urip"),
      "params"   => array(

	  array(
            "type" => "textfield",
			"heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Enter any unique section id", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section left button background color", "urip"),
            "param_name" => "leftbuttonbg",
            "description" => esc_html__("select hero section left button background color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section left button text color", "urip"),
            "param_name" => "leftbuttontextcolor",
            "description" => esc_html__("select hero section left button text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right/center button background color", "urip"),
            "param_name" => "rightbuttonbg",
            "description" => esc_html__("select hero section right/center button background color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),


		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right/center button text color", "urip"),
            "param_name" => "rightbuttontextcolor",
            "description" => esc_html__("select hero section right/center button text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right button background color", "urip"),
            "param_name" => "threebuttonbg",
            "description" => esc_html__("select hero section right button background color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),


		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section right button text color", "urip"),
            "param_name" => "threebuttontextcolor",
            "description" => esc_html__("select hero section right button text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section scroll icon text color", "urip"),
            "param_name" => "scrolliconcolor",
            "description" => esc_html__("select hero section scroll icon text color - optional", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),


		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section text color", "urip"),
            "param_name" => "textcolor",
            "description" => esc_html__("select hero section text color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),


		array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
		),
	   array(
            "type" => "attach_image",
            "heading" => esc_html__("parallax background image", "urip"),
            "param_name" => "parallax_bg",
            "description" => esc_html__("Add Your parallax background image", "urip"),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Enter your description", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("text slider item 1", "urip"),
            "param_name" => "sliderone",
            "description" => esc_html__("Add your text slider text like : Portfolio Showcase ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("text slider item 2", "urip"),
            "param_name" => "slidertwo",
            "description" => esc_html__("Add your text slider words like : Portfolio Showcase ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("text slider item 3", "urip"),
            "param_name" => "sliderthree",
            "description" => esc_html__("Add your text slider words like : Portfolio Showcase ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("text slider item 4", "urip"),
            "param_name" => "sliderfour",
            "description" => esc_html__("Add your text slider words like : Portfolio Showcase ", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button first link", "urip"),
            "param_name" => "buttononelink",
           'group' 	 => esc_html__( 'Buttons', 'urip' ),
            "description" => esc_html__("Add your button first link", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button first link text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add your button first link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button two link", "urip"),
            "param_name" => "buttontwolink",
           'group' 	 => esc_html__( 'Buttons', 'urip' ),
            "description" => esc_html__("Add your button two link", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button two link text", "urip"),
            "param_name" => "buttontwotext",
            "description" => esc_html__("Add your button two link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("button three link", "urip"),
            "param_name" => "buttonthreelink",
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
            "description" => esc_html__("Add your button three link", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("button three link text", "urip"),
            "param_name" => "buttonthreetext",
            "description" => esc_html__("Add your button three link text ", "urip"),
			'group' 	 => esc_html__( 'Buttons', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("bottom arrow id", "urip"),
            "param_name" => "bottomid",
            "description" => esc_html__("Add your bottom arrow id like : what-we-do", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("bottom arrow icon", "urip"),
            "param_name" => "bottomidicon",
            "description" => esc_html__("Add your bottom arrow icon name like : icon-chevron-thin-down. Icon list here : https://icomoon.io/#preview-free", "urip"),
        ),



		 array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Contact popup class option', 'urip' ),
		'param_name' => 'contactbutton',
		'value' => array(
			esc_html__( 'select', 'urip' ) => 'disable',
			esc_html__( 'yes', 'urip' ) => 'active',
			esc_html__( 'no', 'urip' ) => 'disable'
		),
		'description' => esc_html__( 'If you want to use popup contact you can select yes', 'urip' )
	),

	array(
		"type" => "href",
		"heading" => esc_html__("Video url", "urip"),
		"param_name" => "watchvideourl",
		"description" => esc_html__("Add your Video url ", "urip"),
		'group' 	 => esc_html__( 'Video', 'urip' ),
	),

	array(
		"type" => "textfield",
		"heading" => esc_html__("Video text", "urip"),
		"param_name" => "watchvideotext",
		"description" => esc_html__("Add your Video text ", "urip"),
		'group' 	 => esc_html__( 'Video', 'urip' ),
	),

	array(
		"type" => "textfield",
		"heading" => esc_html__("Video button icon", "urip"),
		"param_name" => "watchvideoicon",
		'group' 	 => esc_html__( 'Video', 'urip' ),
		"description" => esc_html__("Add your video button icon name like :  icon-youtube5 . Icon list here : https://icomoon.io/#preview-free", "urip"),
	),

	array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_header_three_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	header 4
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_header_four_container_integrateWithVC' );
function vc_header_four_container_integrateWithVC() {
   vc_map( array(
      "name" 	 => esc_html__( "Frontpage header 4", "urip" ),
      "base" 	 => "vc_header_four_container",
	  "icon"     => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
	  "description" => esc_html__("Hero apps section", "urip"),
      "params"   => array(

	  array(
            "type" => "textfield",
			"heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Enter any unique section id", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Enter your description", "urip"),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("hero section text color", "urip"),
            "param_name" => "textcolor",
            "description" => esc_html__("select hero section text color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
			'group' 	 => esc_html__( 'Colors', 'urip' ),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
		),

		array(
            "type" => "attach_image",
            "heading" => esc_html__("parallax background image", "urip"),
            "param_name" => "parallax_bg",
            "description" => esc_html__("Add Your parallax background image", "urip"),
			'group' 	 => esc_html__( 'Parallax', 'urip' ),
        ),


		array(
            "type" => "attach_image",
            "heading" => esc_html__("right column icon/image", "urip"),
            "param_name" => "icon_bg",
            "description" => esc_html__("Add Your right column icon/image", "urip")
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("left column phone mockup", "urip"),
            "param_name" => "mockup_bg",
            "description" => esc_html__("Add Your left column phone mockup", "urip"),
			'group' 	 => esc_html__( 'Left image', 'urip' ),
        ),

		array(
            "type" => "attach_image",
            "heading" => esc_html__("playstore button", "urip"),
            "param_name" => "playstore_bg",
            "description" => esc_html__("Add Your playstore button image", "urip")
        ),


		array(
            "type" => "href",
            "heading" => esc_html__("playstore link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add your playstore link", "urip"),
        ),

		array(
            "type" => "attach_image",
            "heading" => esc_html__("appstore button image", "urip"),
            "param_name" => "appstore_bg",
            "description" => esc_html__("Add Your appstore image", "urip")
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("appstore button link", "urip"),
            "param_name" => "buttontwolink",
            "description" => esc_html__("Add your appstore button link", "urip"),
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_header_four_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	Urip client 1
/*-----------------------------------------------------------------------------------*/


add_action( 'vc_before_init', 'Client_slider_agen_integrateWithVC' );
function Client_slider_agen_integrateWithVC() {


vc_map( array(
    "name" => esc_html__("Client slider", "urip"),
    "base" => "vc_client_container",
    "as_parent" => array('only' => 'vc_client_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"icon"                   => "icon-wpb-row",
	"category" => esc_html__( "Urip", "urip"),
	"description" => esc_html__("Trusted By", "urip"),
    "params" => array(
       array(
            "type" => "textfield",
            "heading" => esc_html__("Your section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your section id", "urip")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Your slogan", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your slogan", "urip")
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Client slider Item", "urip"),
    "base" => "vc_client_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_client_container'),
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(


		array(
            "type" => "attach_image",
            "heading" => esc_html__("Client image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your client image", "urip"),
        ),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Client image show delay time', 'urip' ),
			'param_name' => 'delay',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7'
			),
			'description' => esc_html__( 'Select Client image show delay time', 'urip' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Client image target option', 'urip' ),
			'param_name' => 'target',
			'value' => array(
				esc_html__( 'select target', 'urip' ) => 'disable',
				esc_html__( 'open in the new windows', 'urip' ) => 'yes',
				esc_html__( 'open in the same windows', 'urip' ) => 'no'
			),
			'description' => esc_html__( 'Select Client image target option', 'urip' ),
		),

		array(
            "type" => "href",
            "heading" => esc_html__("Client image url", "urip"),
            "param_name" => "agen_imgs_url",
            "description" => esc_html__("Add Your client image url", "urip"),
        )

    )
) );

}


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Vc_Client_Container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Vc_Client_Item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Urip client 2
/*-----------------------------------------------------------------------------------*/


add_action( 'vc_before_init', 'Client_Two_slider_agen_integrateWithVC' );
function Client_Two_slider_agen_integrateWithVC() {


vc_map( array(
    "name" 						=> esc_html__("What we do 2", "urip"),
    "base" 						=> "vc_client_two_container",
    "as_parent" 				=> array('only' => 'vc_client_item_two'),
    "content_element" 			=> true,
    "show_settings_on_create" 	=> true,
	"icon"                   	=> "icon-wpb-row",
	"category" 					=> esc_html__( "Urip", "urip"),
    "params" 					=> array(

	   array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'image position', 'urip' ),
			'param_name' 	=> 'imageposition',
			'value' 		=> array(
				esc_html__( 'select image position', 'urip' ) => 'disable',
				esc_html__( 'left right image', 'urip' ) => 'left',
				esc_html__( 'bottom image', 'urip' ) => 'bottom'
			),
			'description' => esc_html__( 'Select image position', 'urip' )
		),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("section id", "urip"),
            "param_name" 	=> "sectionid",
            "description" 	=> esc_html__("Enter your section id", "urip")
        ),
        array(
            "type" 			=> "attach_image",
            "heading" 		=> esc_html__("What we do section left image", "urip"),
            "param_name" 	=> "agen_img_l",
            "description" 	=> esc_html__("Add Your What we do section left image", "urip"),
			'group' 	 	=> esc_html__( 'Left image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section left image position > top.", "urip"),
            "param_name" 	=> "agen_img_left_top",
            "description" 	=> esc_html__("Enter what we do section left image position > top. Default : 10px", "urip"),
			'group' 	 	=> esc_html__( 'Left image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section left image position > left.", "urip"),
            "param_name" 	=> "agen_img_left_left",
            "description" 	=> esc_html__("Enter what we do section left image position > left. Default : -61px", "urip"),
			'group' 	 	=> esc_html__( 'Left image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section left image > width.", "urip"),
            "param_name" 	=> "agen_img_left_width",
            "description" 	=> esc_html__("Enter what we do section left image > width. Default : 279px ", "urip"),
			'group' 	 	=> esc_html__( 'Left image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section left image > height.", "urip"),
            "param_name" 	=> "agen_img_left_height",
            "description" 	=> esc_html__("Enter what we do section left image > height. Default : 693px", "urip"),
			'group' 	 	=> esc_html__( 'Left image', 'urip' ),
        ),
		array(
            "type" 			=> "attach_image",
            "heading" 		=> esc_html__("What we do section right image", "urip"),
            "param_name" 	=> "agen_img_r",
            "description" 	=> esc_html__("Add Your What we do section right image", "urip"),
			'group' 	 	=> esc_html__( 'Right image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section right image position > top.", "urip"),
            "param_name" 	=> "agen_img_right_top",
            "description" 	=> esc_html__("Enter what we do section right image position > top. Default : 0px  ", "urip"),
			'group' 	 	=> esc_html__( 'Right image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section right image position > right.", "urip"),
            "param_name" 	=> "agen_img_right_left",
            "description" 	=> esc_html__("Enter what we do section left image position > right. Default : -61px", "urip"),
			'group' 	 	=> esc_html__( 'Right image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section right image > width.", "urip"),
            "param_name" 	=> "agen_img_right_width",
            "description" 	=> esc_html__("Enter what we do section right image > width. Default : 306px", "urip"),
			'group' 	 	=> esc_html__( 'Right image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section right image > height.", "urip"),
            "param_name" 	=> "agen_img_right_height",
            "description" 	=> esc_html__("Enter what we do section right image > height. Default : 665px", "urip"),
			'group' 		=> esc_html__( 'Right image', 'urip' ),
        ),
		array(
            "type" 			=> "attach_image",
            "heading" 		=> esc_html__("What we do section bottom image", "urip"),
            "param_name" 	=> "agen_img_b",
            "description" 	=> esc_html__("Add Your What we do section bottom image", "urip"),
			'group' 	 	=> esc_html__( 'Bottom image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section bottom image > width.", "urip"),
            "param_name" 	=> "agen_img_bottom_position",
            "description" 	=> esc_html__("Enter what we do section bottom position. Default : -65px", "urip"),
			'group' 	 	=> esc_html__( 'Bottom image', 'urip' ),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("What we do section bottom image > width.", "urip"),
            "param_name" 	=> "agen_img_bottom_height",
            "description" 	=> esc_html__("Enter what we do section bottom height. Default : 665px ", "urip"),
			'group' 	 	=> esc_html__( 'Bottom image', 'urip' ),
        ),
		array(
            'type' 			=> 'css_editor',
            'heading'	 	=> esc_html__( 'Section design', 'urip' ),
            'param_name' 	=> 'css',
            'group' 	 	=> esc_html__( 'Section design', 'urip' ),
		),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" 				=> esc_html__("What we do 2 inner", "urip"),
    "base" 				=> "vc_client_item_two",
    "content_element" 	=> true,
    "as_child" 			=> array('only' => 'vc_client_two_container'),
	"category" 			=> esc_html__( "Urip", "urip"),
    "params" 			=> array(

		array(
			"type" 			=> "textfield",
			"heading" 		=> esc_html__("heading", "urip"),
			"param_name" 	=> "a_heading",
			"description" 	=> esc_html__("Add your heading ", "urip"),
			'group' 	 	=> esc_html__( 'Attention', 'urip' ),
        ),
		//btn 1
		array(
			'type'          => 'vc_link',
			'heading'       => esc_html__('Button  (Link)', 'urip' ),
			'param_name'    => 'btnlink',
			'description'   => esc_html__('Add button title and link.', 'urip' ),
			'group' 	 	=> esc_html__( 'Attention', 'urip' ),
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> esc_html__("heading", "urip"),
			"param_name" 	=> "heading",
			"description" 	=> esc_html__("Add your heading ", "urip"),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("slogan", "urip"),
            "param_name" 	=> "slogan",
            "description" 	=> esc_html__("Add your slogan ", "urip"),
        ),
		array(
            "type" 			=> "textarea_html",
            "heading" 		=> esc_html__("Content", "urip"),
            "param_name" 	=> "content",
            "description" 	=> esc_html__("Add your content text ", "urip"),
        ),
		array(
            "type" 			=> "textfield",
            "heading" 		=> esc_html__("Popup Contact form button", "urip"),
            "param_name" 	=> "button_w",
            "description" 	=> esc_html__("If you use popup contact form enter your text should be like : Touch me", "urip"),
        ),

    )
) );

}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Vc_Client_Two_Container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Vc_Client_Two_Item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	blog
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'agen_blog_integrateWithVC' );
function agen_blog_integrateWithVC() {
	vc_map( array(
	"name" 		=> esc_html__( "Price Table", "urip" ),
	"base" 		=> "pricetable",
	"icon"        => "icon-wpb-row",
	"category" 	=> esc_html__( "Urip", "urip"),
	"params" 		=> array(
    array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Price table column number', 'urip' ),
			'param_name' 	=> 'col',
			'value' 		=> array(
				esc_html__( 'select price table column number', 'urip' ) => '3',
				esc_html__( '2', 'urip' ) => '6',
				esc_html__( '3', 'urip' ) => '4',
				esc_html__( '4', 'urip' ) => '3',
				esc_html__( '6', 'urip' ) => '2',
			),
			'description' => esc_html__( 'Select price item column number.', 'urip' ),
		),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'urip' ),
            'param_name' => 'heading',
            "description" => esc_html__("Add Your Title", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'slogan', 'urip' ),
            'param_name' => 'slogan',
            "description" => esc_html__("Add Your slogan", "urip"),
        ),
		 array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Section ID', 'urip' ),
            'param_name' => 'sectionid',
            "description" => esc_html__("Add Your Section ID", "urip"),
        ),
        array(
            'type' 			=> 'textfield',
            'heading' 		=> esc_html__( 'Post Count', 'urip' ),
            'param_name' 	=> 'post_number',
            "description" 	=> esc_html__("You can control with number your posts.", "urip"),
        ),
        array(
            'type' 			=> 'textfield',
            'heading' 		=> esc_html__( 'Order', 'urip' ),
            'param_name' 	=> 'order',
            "description" 	=> esc_html__("You can control with : DESC or ASC", "urip"),
        ),
        array(
            'type' 			=> 'textfield',
            'heading' 		=> esc_html__( 'Order by', 'urip' ),
            'param_name' 	=> 'orderby',
            "description" 	=> esc_html__("You can control with WordPress order by options. ", "urip"),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Category', 'urip' ),
            'param_name' => 'categories',
            "description" => esc_html__("Enter post category or write all", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
	),
   ));
}
class WPBakeryShortCode_Blog extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	services 1
/*-----------------------------------------------------------------------------------*/


vc_map( array(
    "name" => esc_html__("How it works", "urip"),
    "base" => "vc_services_container",
	"icon"                   => "icon-wpb-row",
    "as_parent" => array('only' => 'vc_services_item_one'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Section ID", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section ID", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("How it works Item", "urip"),
    "base" => "vc_services_item_one",
    "content_element" => true,
    "as_child" => array('only' => 'vc_services_container'),
    "params" => array(

        array(
            "type" => "attach_image",
            "heading" => esc_html__("How it works image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your How it works item  image", "urip")
        ),

		 array(
            "type" => "attach_image",
            "heading" => esc_html__("How it works hover image", "urip"),
            "param_name" => "agen_img_back",
            "description" => esc_html__("Add Your How it works item hover background image", "urip")
        ),

		 array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Hover arrow show?', 'urip' ),
			'param_name' => 'disablearrow',
			'value' => array(
				esc_html__( 'select arrow visibility', 'urip' ) => 'disable',
				esc_html__( 'show', 'urip' ) => 'show',
				esc_html__( 'hide', 'urip' ) => 'hide'
			),
			'description' => esc_html__( 'Select arrow visibility', 'urip' )
		),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Disable hover effect/background?', 'urip' ),
        'param_name' => 'disable',
        'value' => array(
           esc_html__( 'select  visibility', 'urip' ) => 'yes',
           esc_html__( 'yes', 'urip' ) => 'yes',
           esc_html__( 'no', 'urip' ) => 'no'
        ),
        'description' => esc_html__( 'Select arrow visibility', 'urip' )
     ),
		 array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("Background class", "urip"),
            "param_name" => "bgclass",
            "description" => esc_html__("Enter your any background class for hover effect. example: one , two ", "urip"),
        ),

		   array(
            "type" => "textarea_html",
            "heading" => esc_html__("Content", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Add your content text ", "urip"),
        ),

		  array(
            "type" => "href",
            "heading" => esc_html__("button link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Enter button link", "urip"),
        ),

		  array(
            "type" => "textfield",
			"heading" => esc_html__("button text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Enter button text", "urip"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("delay", "urip"),
            "param_name" => "delay",
            "description" => esc_html__("Enter delay. Example : 0.3 ", "urip"),
        ),

    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Vc_Services_Container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Services_Item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	services 2
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" 				=> esc_html__("Features first", "urip"),
		"base" 				=> "vc_services_section_two",
		"icon"                   => "icon-wpb-row",
		"as_parent"			=> array('only' => 'vc_services_item_two'),
		"content_element"   => true,
		"show_settings_on_create" => true,
		"category" 			=> esc_html__( "Urip", "urip"),
		"params" 			=> array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section id for scroll. If you use with multiple page for onepage write number like one, two , three", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your Section heading", "urip"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Section slogan", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add Your Section description/slogan", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("Section button 1 link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add Your Section  button link", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section button 1 text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add Your Section  button text", "urip"),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Contact popup class option', 'urip' ),
			'param_name' => 'contact',
			'value' => array(
				esc_html__( 'select', 'urip' ) => 'disable',
				esc_html__( 'add', 'urip' ) => 'add',
				esc_html__( 'no', 'urip' ) => 'no'
			),
			'description' => esc_html__( 'If you want to use popup contact you can select add', 'urip' )
		),

		  array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Use custom button url and text', 'urip' ),
			'param_name' => 'custom_url',
			'value' => array(
				esc_html__( 'select', 'urip' ) => 'disable',
				esc_html__( 'add', 'urip' ) => 'add',
				esc_html__( 'no', 'urip' ) => 'no'
			),
			'description' => esc_html__( 'If you want to use custom url you can select add', 'urip' )
		),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),


    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Our Features Item", "urip"),
    "base" => "vc_services_item_two",
    "content_element" => true,
    "as_child" => array('only' => 'vc_services_section_two'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon", "urip"),
            "param_name" => "icon",
            "description" => esc_html__("Add Icon Name. Icon list here : https://icomoon.io/#preview-free", "urip"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add heading", "urip"),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description Area", "urip"),
            "param_name" => "description",
            "description" => esc_html__("Add Your description", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("Section button link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add Your Section  button link, optional", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section button text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add Your Section  button text", "urip"),
        ),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Vc_Services_Section_Two extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Vc_Services_Item_Two extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	screen slider
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_app_slider_integrateWithVC' );
function vc_app_slider_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "App screenshot slider", "urip" ),
      "base" => "vc_app_slider",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
      "params" => array(

	    array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add heading", "urip"),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description Area", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add Your description", "urip"),
        ),
	   array(
            "type" => "attach_image",
            "heading" => esc_html__("Phone mockup image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your browser or any image", "urip")
        ),
        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'urip' ),
            'param_name' => 'images',
            "description" => esc_html__("Add Your images", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
      ),
   ) );
}
class WPBakeryShortCode_vc_app_slider extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	whyus
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_why_container_integrateWithVC' );
function vc_why_container_integrateWithVC() {
vc_map( array(
	"name" => esc_html__( "Why us section", "urip" ),
	"base" => "vc_why_container",
	"icon"                   => "icon-wpb-row",
	"category" => esc_html__( "Urip", "urip"),
	"params" => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'image position', 'urip' ),
			'param_name' => 'imageposition',
			'value' => array(
				esc_html__( 'select image position', 'urip' ) => 'disable',
				esc_html__( 'left', 'urip' ) => 'left',
				esc_html__( 'right', 'urip' ) => 'right'
			),
			'description' => esc_html__( 'Select image position', 'urip' )
		),
	    array(
            "type" => "colorpicker",
            "heading" => esc_html__("background color", "urip"),
            "param_name" => "bgcolor",
            "description" => esc_html__("Add bg color", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add heading", "urip"),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("slogan ", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("Add your slogan", "urip"),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("left column mockup image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your left column mockup image", "urip")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("icon", "urip"),
            "param_name" => "icon",
            "description" => esc_html__("Add your icon", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("left heading", "urip"),
            "param_name" => "leftheading",
            "description" => esc_html__("Add your icon", "urip"),
        ),
		array(
            "type" => "textarea_html",
            "heading" => esc_html__("content", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Add your content recommended text / paragraphs", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
      ),
   ) );
}
class WPBakeryShortCode_vc_why_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	features two
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" 						=> esc_html__("Features two", "urip"),
		"base" 						=> "vc_features_two_container",
		"icon"            => "icon-wpb-row",
		"as_parent"					=> array('only' => 'vc_features_two_item'),
		"content_element"   		=> true,
		"show_settings_on_create" 	=> true,
		"category" 					=> esc_html__( "Urip", "urip"),
		"params" 					=> array(

		 array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'urip' ),
            'param_name' => 'images',
            "description" => esc_html__("Add Your images", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section id", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section number for duplicate", "urip"),
            "param_name" => "number",
            "description" => esc_html__("Add Your Section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your Section heading", "urip"),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Section description", "urip"),
            "param_name" => "description",
            "description" => esc_html__("Add Your Section description/slogan", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Section button 1 link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add Your Section  button link", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section button 1 text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add Your Section  button text", "urip"),
        ),

		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Right column list item", "urip"),
    "base" => "vc_features_two_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_features_two_container'),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("List item", "urip"),
            "param_name" => "features_list",
            "description" => esc_html__("Add list item ", "urip"),
        ),
    )
) );


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_features_two_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_features_two_item extends WPBakeryShortCode {
    }
}

/*-----------------------------------------------------------------------------------*/
/*	features three
/*-----------------------------------------------------------------------------------*/

	vc_map( array(
		"name" 						=> esc_html__("Features three + Tab", "urip"),
		"base" 						=> "vc_urip_tab_container",
		"icon"              		=> "icon-wpb-row",
		"as_parent"					=> array('only' => 'vc_urip_tab_item'),
		"content_element"   		=> true,
		"show_settings_on_create" 	=> true,
		"category" 					=> esc_html__( "Urip", "urip"),
		"params" 					=> array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your Section heading", "urip"),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Section right image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your Section  right qutoe background image", "urip"),
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Right quote column background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("Add Right quote column background color", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Quote name", "urip"),
            "param_name" => "quoteheading",
            "description" => esc_html__("Add Your Quote name", "urip"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Quote comment", "urip"),
            "param_name" => "quotedesc",
            "description" => esc_html__("Add Your Quote comment", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Left column visibility', 'urip' ),
			'param_name' 	=> 'hide_left',
			'value' 		=> array(
				esc_html__( 'select visibility', 'urip' ) => 'x',
				esc_html__( 'visible', 'urip' ) => 'v',
				esc_html__( 'hide', 'urip' ) 	=> 'h'
			),
			'description' 	=> esc_html__( 'Select image position', 'urip' )
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Right column visibility', 'urip' ),
			'param_name' 	=> 'hide_right',
			'value' 		=> array(
				esc_html__( 'select visibility', 'urip' ) => 'x',
				esc_html__( 'visible', 'urip' ) => 'v',
				esc_html__( 'hide', 'urip' ) 	=> 'h'
			),
			'description' 	=> esc_html__( 'Select image position', 'urip' )
		),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Features three tab item", "urip"),
    "base" => "vc_urip_tab_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_urip_tab_container'),
    "params" => array(


        // tab1
        array(
            "type" => "textfield",
            "heading" => esc_html__("Icon first tab", "urip"),
            "param_name" => "iconone",
            "description" => esc_html__("Add Icon Name. Example : pencil ", "urip"),
			'group' 	 => esc_html__( 'Tab 1', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading first tab", "urip"),
            "param_name" => "headingone",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Tab 1', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description first tab ", "urip"),
            "param_name" => "descriptionone",
            "description" => esc_html__("Add Your Description first tab", "urip"),
			'group' 	 => esc_html__( 'Tab 1', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Tab first read more link", "urip"),
            "param_name" => "linkone",
            "description" => esc_html__("Add Your Tab first read more link", "urip"),
			'group' 	 => esc_html__( 'Tab 1', 'urip' ),
        ),

		// tab2

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon second tab", "urip"),
            "param_name" => "icontwo",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Tab 2', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading second tab", "urip"),
            "param_name" => "headingtwo",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Tab 2', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description second tab ", "urip"),
            "param_name" => "descriptiontwo",
            "description" => esc_html__("Add Your Description second tab", "urip"),
			'group' 	 => esc_html__( 'Tab 2', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Tab second read more link", "urip"),
            "param_name" => "linktwo",
            "description" => esc_html__("Add Your Tab second read more link", "urip"),
			'group' 	 => esc_html__( 'Tab 2', 'urip' ),
        ),

		// tab3

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon three", "urip"),
            "param_name" => "iconthree",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Tab 3', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading third tab", "urip"),
            "param_name" => "headingthree",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Tab 3', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description third tab ", "urip"),
            "param_name" => "descriptionthree",
            "description" => esc_html__("Add Your Description third tab", "urip"),
			'group' 	 => esc_html__( 'Tab 3', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Tab third read more link", "urip"),
            "param_name" => "linkthree",
            "description" => esc_html__("Add Your Tab third read more link", "urip"),
			'group' 	 => esc_html__( 'Tab 3', 'urip' ),
        ),


		// tab4
		 array(
            "type" => "textfield",
            "heading" => esc_html__("Icon four", "urip"),
            "param_name" => "iconfour",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Tab 4', 'urip' ),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("heading fourth tab", "urip"),
            "param_name" => "headingfour",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Tab 4', 'urip' ),
        ),

		array(
            "type" => "textarea",
            "heading" => esc_html__("Description fourth tab ", "urip"),
            "param_name" => "descriptionfour",
            "description" => esc_html__("Add Your Description fourth tab", "urip"),
			'group' 	 => esc_html__( 'Tab 4', 'urip' ),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Tab fourth read more link", "urip"),
            "param_name" => "linkfour",
            "description" => esc_html__("Add Your Tab fourth read more link", "urip"),
			'group' 	 => esc_html__( 'Tab 4', 'urip' ),
        ),

		// tab5

		array(
            "type" => "textfield",
            "heading" => esc_html__("Icon fifth", "urip"),
            "param_name" => "iconsix",
            "description" => esc_html__("Add Icon Name", "urip"),
			'group' 	 => esc_html__( 'Tab 5', 'urip' ),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading fifth tab", "urip"),
            "param_name" => "headingsix",
            "description" => esc_html__("Add heading", "urip"),
			'group' 	 => esc_html__( 'Tab 5', 'urip' ),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Description fifth tab ", "urip"),
            "param_name" => "descriptionsix",
            "description" => esc_html__("Add Your Description fifth tab", "urip"),
			'group' 	 => esc_html__( 'Tab 5', 'urip' ),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("Tab fifth read more link", "urip"),
            "param_name" => "linksix",
            "description" => esc_html__("Add Your Tab fifth read more link", "urip"),
			'group' 	 => esc_html__( 'Tab 5', 'urip' ),
        ),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_urip_tab_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_urip_tab_item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	features three
/*-----------------------------------------------------------------------------------*/


	vc_map( array(
		"name" 				=> esc_html__("Progress", "urip"),
		"base" 				=> "vc_urip_progress_container",
		"icon"              => "icon-wpb-row",
		"as_parent"			=> array('only' => 'vc_urip_progress_item'),
		"content_element"   => true,
		"show_settings_on_create" => true,
		"category" 			=> esc_html__( "Urip", "urip"),
		"params" 			=> array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section id", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add Your Section heading", "urip"),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Section right image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your Section  right qutoe background image", "urip"),
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Right quote column background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("Add Right quote column background color", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Quote name", "urip"),
            "param_name" => "quoteheading",
            "description" => esc_html__("Add Your Quote name", "urip"),
        ),
		array(
            "type" => "textarea",
            "heading" => esc_html__("Quote comment", "urip"),
            "param_name" => "quotedesc",
            "description" => esc_html__("Add Your Quote comment", "urip"),
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Progress item", "urip"),
    "base" => "vc_urip_progress_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_urip_progress_container'),
    "params" => array(
        // tab1
        array(
            "type" => "textfield",
            "heading" => esc_html__("progress name", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Add progress name", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("progress value", "urip"),
            "param_name" => "value",
            "description" => esc_html__("Add progress value. Example : 80", "urip"),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'progress color', 'urip' ),
			'param_name' => 'color',
			'value' => array(
				esc_html__( 'select progress color', 'urip' ) => 'disable',
				esc_html__( 'orange', 'urip' ) => 'orange',
				esc_html__( 'red', 'urip' ) => 'red',
				esc_html__( 'teal', 'urip' ) => 'teal',
				esc_html__( 'grey', 'urip' ) => 'grey',
				esc_html__( 'blue', 'urip' ) => 'blue'
			),
			'description' => esc_html__( 'Select progress color', 'urip' ),
		),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_urip_progress_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_urip_progress_item extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	tab 1
/*-----------------------------------------------------------------------------------*/


vc_map( array(
    "name" => esc_html__("Tab first content", "urip"),
    "base" => "vc_tab_one_container",
	"icon"                   => "icon-wpb-row",
    "as_parent" => array('only' => 'vc_tab_one_item_one'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Tab 1 left comun image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your Tab 1 left comun image", "urip")
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Tab first Item", "urip"),
    "base" => "vc_tab_one_item_one",
    "content_element" => true,
    "as_child" => array('only' => 'vc_tab_one_container'),
    "params" => array(
		 array(
            "type" => "textfield",
			"heading" => esc_html__("accordion id", "urip"),
            "param_name" => "accordionid",
            "description" => esc_html__("Enter your accordion id", "urip"),
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),
		array(
            "type" => "textarea_html",
			"heading" => esc_html__("Background class", "urip"),
            "param_name" => "content",
            "description" => esc_html__("You can add any html / text element", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Read more text", "urip"),
            "param_name" => "readtext",
            "description" => esc_html__("Enter button text", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("button link", "urip"),
            "param_name" => "readlink",
            "description" => esc_html__("Enter button link", "urip"),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Active panel', 'urip' ),
			'param_name' => 'panelactives',
			'value' => array(
				esc_html__( 'select Active panel', 'urip' ) => 'disable',
				esc_html__( 'yes', 'urip' ) => 'yes',
				esc_html__( 'no', 'urip' ) => 'no'
			),
			'description' => esc_html__( 'Select Active panel. NOTE : You just select one active panel.', 'urip' ),
		),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_tab_one_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_tab_one_item_one extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	tab 2 content
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_tab_two_container_integrateWithVC' );
function vc_tab_two_container_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Tab second content", "urip" ),
      "base" => "vc_tab_two_container",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
      "params" => array(

	   array(
            "type" => "attach_image",
            "heading" => esc_html__("browser or any image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your browser or any image", "urip")
        ),

       array(
            "type" => "textarea_html",
			"heading" => esc_html__("Right side content editor", "urip"),
            "param_name" => "content",
            "description" => esc_html__("You can add any html / text element", "urip"),
        ),

		array(
            "type" => "href",
            "heading" => esc_html__("Section button link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add Your Section  button link", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section button text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add Your Section  button text", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("Popup video link", "urip"),
            "param_name" => "videolink",
            "description" => esc_html__("Add you popup video link, default youtube", "urip"),
        ),
      ),
   ) );
}
class WPBakeryShortCode_vc_tab_two_container extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	tab 1
/*-----------------------------------------------------------------------------------*/


vc_map( array(
    "name" => esc_html__("Tab third content", "urip"),
    "base" => "vc_tab_three_container",
	"icon"                   => "icon-wpb-row",
    "as_parent" => array('only' => 'vc_tab_three_item_one'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(

		array(
            "type" => "textfield",
            "heading" => esc_html__("Section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your Section id if you want to use different images on the tabs", "urip"),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Tab 3 right column image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your Tab 3 right column image", "urip")
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Right image width", "urip"),
            "param_name" => "agen_img_width",
            "value" => "787px",
            "description" => esc_html__("Right image width ", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("Right image height", "urip"),
            "param_name" => "agen_img_height",
            "value" => "625px",
            "description" => esc_html__("Right image height ", "urip"),
        ),

		 array(
            "type" => "textfield",
            "heading" => esc_html__("Right image top position", "urip"),
            "param_name" => "agen_img_top",
            "value" => "0px",
            "description" => esc_html__("Right image top position like 0px", "urip"),
        ),

    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Tab third Item", "urip"),
    "base" => "vc_tab_three_item_one",
    "content_element" => true,
    "as_child" => array('only' => 'vc_tab_three_container'),
    "params" => array(
		array(
            "type" => "textfield",
			"heading" => esc_html__("icon name", "urip"),
            "param_name" => "icon",
            "description" => esc_html__("Enter your icon name. Enter icon name after icon- block. Icon list here : https://icomoon.io/#preview-free", "urip"),
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),
		array(
            "type" => "textarea",
			"heading" => esc_html__("description", "urip"),
			 "param_name" => "description",
            "description" => esc_html__("Enter your description", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Read more text", "urip"),
            "param_name" => "readtext",
            "description" => esc_html__("Enter button text", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("button link", "urip"),
            "param_name" => "readlink",
            "description" => esc_html__("Enter button link", "urip"),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Active panel', 'urip' ),
			'param_name' => 'panelactive',
			'value' => array(
				esc_html__( 'select Active panel', 'urip' ) => 'disable',
				esc_html__( 'yes', 'urip' ) => 'yes',
				esc_html__( 'no', 'urip' ) => 'no'
			),
			'description' => esc_html__( 'Select Active panel. NOTE : You just select one active panel.', 'urip' ),
		),

    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_tab_three_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vc_tab_three_item_one extends WPBakeryShortCode {
    }
}


/*-----------------------------------------------------------------------------------*/
/*	tab 2 content
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_parallax_item_integrateWithVC' );
function vc_parallax_item_integrateWithVC() {
   vc_map( array(
      "name" 		=> esc_html__( "Parallax section", "urip" ),
      "base" 		=> "vc_parallax_item",
	  "icon"        => "icon-wpb-row",
	  "category" 	=> esc_html__( "Urip", "urip"),
      "params" 		=> array(

	   array(
            "type" => "attach_image",
            "heading" => esc_html__("parallax background image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your parallax background image", "urip")
        ),

	  array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),

       array(
            "type" => "textfield",
			"heading" => esc_html__("sectionid", "urip"),
            "param_name" => "uniqu1",
            "description" => esc_html__("Enter any unique section id", "urip"),
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),

		array(
            "type" => "textfield",
			"heading" => esc_html__("description", "urip"),
            "param_name" => "description",
            "description" => esc_html__("Enter your description", "urip"),
        ),

      array(
            "type" => "href",
            "heading" => esc_html__("Section button link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add Your Section  button link", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Section button text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add Your Section  button text", "urip"),
        ),

		array(
            "type" => "textfield",
            "heading" => esc_html__("textfield", "urip"),
            "param_name" => "notice",
            "description" => esc_html__("Add your notice for under button", "urip"),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("appstore icon image", "urip"),
            "param_name" => "appstore_bg",
            "description" => esc_html__("Add Your appstore icon image", "urip")
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("appstore link", "urip"),
            "param_name" => "appstorelink",
            "description" => esc_html__("Add Your appstore link", "urip"),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("playstore icon image", "urip"),
            "param_name" => "playstore_bg",
            "description" => esc_html__("Add Your playstore icon image", "urip")
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("playstore link", "urip"),
            "param_name" => "playstorelink",
            "description" => esc_html__("Add Your playstore link", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
      ),
   ) );
}
class WPBakeryShortCode_vc_parallax_item extends WPBakeryShortCode {
}

/*-----------------------------------------------------------------------------------*/
/*	team
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_team_integrateWithVC' );
function vc_team_integrateWithVC() {
   vc_map( array(
      "name" 		=> esc_html__( "Team", "urip" ),
      "base" 		=> "vc_team",
	  "icon"        => "icon-wpb-row",
	  "category" 	=> esc_html__( "Urip", "urip"),
      "params" 		=> array(

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Team type', 'urip' ),
			'param_name' => 'team_type',
			'value' => array(
				esc_html__( 'select team section type', 'urip' ) => 'disable',
				esc_html__( 'sidebar', 'urip' ) => 'sidebar',
				esc_html__( 'default', 'urip' ) => 'default'
			),
			'description' => esc_html__( 'Select team type. sidebar menu or default grid', 'urip' ),
		),

    array(
    'type'        	=> 'dropdown',
    'heading'     	=> esc_html__('Team member column number', 'forsant' ),
    'param_name'  	=> 'column',
    'description' 	=> esc_html__('Select team item column number', 'forsant'),
    'value'       	=> array(
      esc_html__( 'select team section type', 'urip' ) => '',
      esc_html__( '6', 'urip' ) => '6',
      esc_html__( '4', 'urip' ) => '4',
      esc_html__( '3', 'urip' ) => '3',
      esc_html__( '2', 'urip' ) => '2',
    ),
  ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'urip' ),
            'param_name' => 'heading',
            "description" => esc_html__("Add Your Title", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'slogan', 'urip' ),
            'param_name' => 'slogan',
            "description" => esc_html__("Add Your slogan", "urip"),
        ),
		 array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Section ID', 'urip' ),
            'param_name' => 'sectionid',
            "description" => esc_html__("Add Your Section ID", "urip"),
        ),
		array(
            'type' 			=> 'textfield',
            'heading' 		=> esc_html__( 'Team member count', 'urip' ),
            'param_name' 	=> 'post_number',
            "description" 	=> esc_html__("You can control with number your team member description lenght. Example : 100 ", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Team member filter first iten name', 'urip' ),
            'param_name' => 'filter_heading',
            "description" => esc_html__("You can change defaut Everyone name, add your custom text", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Team member image crop width', 'urip' ),
            'param_name' => 'bg_img_w',
            "description" => esc_html__("You can change image width", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Team member image crop height', 'urip' ),
            'param_name' => 'bg_img_h',
            "description" => esc_html__("You can change image height", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),

      ),
   ) );
}
class WPBakeryShortCode_vc_team extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	team
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_port_integrateWithVC' );
function vc_port_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Portfolio", "urip" ),
      "base" => "vc_port",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
      "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'urip' ),
            'param_name' => 'heading',
            "description" => esc_html__("Add Your Title", "urip"),
        ),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'slogan', 'urip' ),
            'param_name' => 'slogan',
            "description" => esc_html__("Add Your slogan", "urip"),
        ),
		 array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Section ID', 'urip' ),
            'param_name' => 'sectionid',
            "description" => esc_html__("Add Your Section ID", "urip"),
        ),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'portfolio type', 'urip' ),
			'param_name' => 'posttype',
			'value' => array(
				esc_html__( 'select portfolio type', 'urip' ) => 'disable',
				esc_html__( 'popup', 'urip' ) => 'popup',
				esc_html__( 'linkable', 'urip' ) => 'linkable'
			),
			'description' => esc_html__( 'Select portfolio type. Popup or linkable', 'urip' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'dribbble column visibility', 'urip' ),
			'param_name' => 'dribbble',
			'value' => array(
				esc_html__( 'select', 'urip' ) => 'disable',
				esc_html__( 'show', 'urip' ) => 'show',
				esc_html__( 'hidden', 'urip' ) => 'hidden'
			),
			'description' => esc_html__( 'Select dribbble column visibility', 'urip' ),
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Add your dribbble or any website link', 'urip' ),
			'param_name' => 'link',
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
			'description' => esc_html__( 'Add your dribbble or any website link. You can select target for new window / tab', 'urip' ),
		),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("dribbble column background image", "urip"),
            "param_name" => "dribbble_bg_img",
            "description" => esc_html__("Add dribbble column background image", "urip"),
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
        ),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("dribbble column arrow image", "urip"),
            "param_name" => "dribbble_arrow_img",
            "description" => esc_html__("Add your dribbble column arrow image", "urip"),
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
        ),

		array(
			'type' => 'checkbox',
			'param_name' => 'add_icon',
			'heading' => esc_html__( 'Add icon?', 'urip' ),
			'description' => esc_html__( 'Add icon next to section title.', 'urip' ),
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'urip' ),
			'param_name' => 'icon_fontawesome',
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
			'value' => 'fa fa-dribbble',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
			'description' => esc_html__( 'Select icon from library.', 'urip' ),
		),
		array(
            'type' => 'textfield',
            'heading' => esc_html__( 'See more description', 'urip' ),
            'param_name' => 'seemore',
            "description" => esc_html__("Add See more description", "urip"),
			'group' 	 => esc_html__( 'Dribbble', 'urip' ),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
      ),
   ) );
}
class WPBakeryShortCode_vc_port extends WPBakeryShortCode {
}


/*-----------------------------------------------------------------------------------*/
/*	tab 1
/*-----------------------------------------------------------------------------------*/


vc_map( array(
    "name" => esc_html__("Customer section", "urip"),
    "base" => "vc_customer_testi_container",
	"icon"                   => "icon-wpb-row",
    "as_parent" => array('only' => 'vc_customer_testi_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
	"category" => esc_html__( "Urip", "urip"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Add Your section id", "urip")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("add your heading ", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "description" => esc_html__("add your description / slogan ", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("More Stories button link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Add your more stories button link or leave empty", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("More Stories button text", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Add your more stories button text or leave empty", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => esc_html__("Customer section item", "urip"),
    "base" => "vc_customer_testi_item",
    "content_element" => true,
    "as_child" => array('only' => 'vc_customer_testi_container'),
    "params" => array(
		array(
            "type" => "attach_image",
            "heading" => esc_html__("customer logo", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add your customer logo", "urip")
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "description" => esc_html__("Enter your heading", "urip"),
        ),
		array(
            "type" => "textarea",
			"heading" => esc_html__("customer review", "urip"),
			"param_name" => "review",
            "description" => esc_html__("Enter your customer review", "urip"),
        ),
		array(
            "type" => "href",
            "heading" => esc_html__("customer name link", "urip"),
            "param_name" => "buttononelink",
            "description" => esc_html__("Enter customer name link or leave empty", "urip"),
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("customer name", "urip"),
            "param_name" => "buttononetext",
            "description" => esc_html__("Enter customer name", "urip"),
        ),
    )
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_customer_testi_container extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_vvc_customer_testi_item extends WPBakeryShortCode {
    }
}



/*-----------------------------------------------------------------------------------*/
/*	newsletter
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'vc_newsletter_integrateWithVC' );
function vc_newsletter_integrateWithVC() {
   vc_map( array(
      "name" => esc_html__( "Newsletter", "urip" ),
      "base" => "vc_newsletter",
	  "icon"                   => "icon-wpb-row",
	  "category" => esc_html__( "Urip", "urip"),
      "params" => array(
	    array(
            "type" => "attach_image",
            "heading" => esc_html__("parallax background image", "urip"),
            "param_name" => "agen_img",
            "description" => esc_html__("Add Your parallax background image", "urip")
        ),
		array(
            "type" => "colorpicker",
			"heading" => esc_html__("parallax background color", "urip"),
            "param_name" => "color",
            "description" => esc_html__("select parallax background color", "urip"),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'parallax background scroll ratio', 'urip' ),
			'param_name' => 'ratio',
			'value' => array(
				esc_html__( 'select delay', 'urip' ) => 'disable',
				esc_html__( '1', 'urip' ) => '1',
				esc_html__( '2', 'urip' ) => '2',
				esc_html__( '3', 'urip' ) => '3',
				esc_html__( '4', 'urip' ) => '4',
				esc_html__( '5', 'urip' ) => '5',
				esc_html__( '6', 'urip' ) => '6',
				esc_html__( '7', 'urip' ) => '7',
				esc_html__( '8', 'urip' ) => '8',
				esc_html__( '9', 'urip' ) => '9'
			),
			'description' => esc_html__( 'Select parallax background scroll ratio', 'urip' ),
		),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Newsletter left image", "urip"),
            "param_name" => "agen_imgss",
            "description" => esc_html__("Add Your Newsletter left image", "urip")
        ),
        array(
            "type" => "textfield",
			"heading" => esc_html__("section id", "urip"),
            "param_name" => "sectionid",
            "description" => esc_html__("Enter any unique section id", "urip"),
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("heading", "urip"),
            "param_name" => "heading",
            "value" => "Still confused choosing the right plan?",
            "description" => esc_html__("Enter your heading", "urip"),
        ),
		array(
            "type" => "textfield",
			"heading" => esc_html__("description", "urip"),
            "param_name" => "slogan",
            "value" => "Register now and get free access to all of our premium services for 7 days.",
            "description" => esc_html__("Enter your description", "urip"),
        ),
		array(
            "type" => "textarea_html",
            "heading" => esc_html__("contact form shortcode", "urip"),
            "param_name" => "content",
            "description" => esc_html__("Add your contact form shortcode here", "urip"),
        ),
		array(
            'type' 		 => 'css_editor',
            'heading'	 => esc_html__( 'Section design', 'urip' ),
            'param_name' => 'css',
            'group' 	 => esc_html__( 'Section design', 'urip' ),
		),
      ),
   ) );
}
class WPBakeryShortCode_vc_newsletter extends WPBakeryShortCode {
}?>
