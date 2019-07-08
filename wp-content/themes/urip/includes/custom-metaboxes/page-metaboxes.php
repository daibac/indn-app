<?php


if ( ! is_admin() )
	return false;

add_filter( 'rwmb_meta_boxes', 'urip_ninetheme_register_page_meta_boxes' );
function urip_ninetheme_register_page_meta_boxes( $meta_boxes ) {


$prefix = 'urip_';
$meta_boxes = array();



/* ----------------------------------------------------- */
// Frontpage Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'frontpage-settings',
	'title' => 'Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'default',
	'fields' => array(

		array(
			'name' => 'Disable Hero Background Image',
			'id'   => $prefix . "bg_disable",
			'type' => 'checkbox',
		),
		array(
			'name' => 'Disable Page Title',
			'id'   => $prefix . "disable_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),

		array(
			'name'		=> 'Alternate Page Title',
			'id'		=> $prefix . "alt_title",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Page Subtitle',
			'id'		=> $prefix . "subtitle",
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),


		array(
			'name'     => esc_html__( 'Page header visibility', 'urip' ),
			'id'       => $prefix . "headeroption",
			'type'     => 'select',
			'options'  => array(
				'show' => esc_html__( 'visible', 'urip' ),
				'hidden' => esc_html__( 'hidden', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'show',

		),


		array(
			'name'     => esc_html__( 'Page header logo visibility', 'urip' ),
			'id'       => $prefix . "headerlogo",
			'type'     => 'select',
			'options'  => array(
				'show' 	=> esc_html__( 'visible', 'urip' ),
				'hidden' => esc_html__( 'hidden', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'show',

		),

		array(
			'name'     => esc_html__( 'Page header menu button visibility', 'urip' ),
			'id'       => $prefix . "headermenubutton",
			'type'     => 'select',
			'options'  => array(
				'show' => esc_html__( 'visible', 'urip' ),
				'hidden' => esc_html__( 'hidden', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'show',

		),

		array(
			'name'     => esc_html__( 'Page right menu contact us link visibility', 'urip' ),
			'id'       => $prefix . "contactuslink",
			'type'     => 'select',
			'options'  => array(
				'show' => esc_html__( 'visible', 'urip' ),
				'hidden' => esc_html__( 'hidden', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'show',

		),

		array(
			'name'     => esc_html__( 'Page menu position type. Right or top position', 'urip' ),
			'id'       => $prefix . "menutype",
			'type'     => 'select',
			'options'  => array(
				'menu1' => esc_html__( 'Right slide menu', 'urip' ),
				'menu2' => esc_html__( 'Header top menu', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'menu1',

		),

		array(
			'name'     => esc_html__( 'Unlimited page menu type. Metabox or default primary menu', 'urip' ),
			'id'       => $prefix . "header_menu_type",
			'type'     => 'select',
			'options'  => array(
				'm' => esc_html__( 'Metabox menu', 'urip' ),
				'p' => esc_html__( 'Primary menu', 'urip' ),
			),
			'multiple'    => false,
			'std'         => 'm',

		),

		array(
			'name'		=> 'Page header background color',
			'id'		=> $prefix . "headerbg",
			'clone'		=> false,
			'type'		=> 'color',
			'std'		=> ''
		),

		array(
			'name'		=> 'Page header menu button color',
			'id'		=> $prefix . "menubutton",
			'clone'		=> false,
			'type'		=> 'color',
			'std'		=> ''
		),

		array(
			'name'		=> 'Page header menu button hover color',
			'id'		=> $prefix . "menubuttonhover",
			'clone'		=> false,
			'type'		=> 'color',
			'std'		=> ''
		),

		array(
			'name' => esc_html__( 'Page header height', 'urip' ),
			'id'   => $prefix . "headerheight",
			'type' => 'number',
			'min'  => 0,
			'step' => 1,
		),

		array(
			'name' => esc_html__( 'Page header padding top', 'urip' ),
			'id'   => $prefix . "headerptop",
			'type' => 'number',
			'min'  => 0,
			'step' => 1,
		),

		array(
			'name' => esc_html__( 'Page header padding bottom', 'urip' ),
			'id'   => $prefix . "headerpbottom",
			'type' => 'number',
			'min'  => 0,
			'step' => 1,
		),

		array(
			'name'		=> 'Custom sidebar',
			'id'		=> $prefix . "sidebar",
			'type'		=> 'select',
			'options'	=> array(
				'select'		=> 'Select a Section',
				'left-sidebar'				=> 'left-sidebar',
				'right-sidebar'				=> 'right-sidebar',
				'no-sidebar'				=> 'no-sidebar'
			),
			'multiple'	=> false,
			'std'		=> 'right-sidebar'
		),

	)
);



$meta_boxes[] = array(
	'id' => 'frontpage',
	'title' => 'Frontpage Onepage Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'default',
	'fields' => array(


		array(
			'name'		=> 'Disable section from menu',
			'id'		=> $prefix . 'disable_section_from_menu',
			'type' => 'checkbox',
			'std'  => 0,
		),

		array(
			'name'		=> 'This is an frontpage section.',
			'id'		=> $prefix . 'separate_page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),

		array(
			'name'		=> 'Frontpage sections for scroll',
			'id'		=> $prefix . "assign_type",
			'type'		=> 'select',
			'options'	=> array(
			    'select'		=> 'Select a Section',
				'1'				=> 'Section 1',
				'2'				=> 'Section 2',
				'3'				=> 'Section 3',
				'4'				=> 'Section 4',
				'5'				=> 'Section 5',
				'6'				=> 'Section 6',
				'7'				=> 'Section 7',
				'8'				=> 'Section 8',
				'9'				=> 'Section 9',
				'10'			=> 'Section 10',
				'11'			=> 'Section 11',
				'12'			=> 'Section 12',
				'13'			=> 'Section 13',
				'14'			=> 'Section 14'
			),
			'multiple'	=> false,
			'std'		=> 'Select Custom Section'
		),
	)
);

$meta_boxes[] = array(
	'id' => 'price-table',
	'title' => 'Price table',
	'pages' => array( 'price' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(



		array(
			'name'		=> 'Price table name',
			'id'		=> $prefix . "table_name",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Table name price',
			'id'		=> $prefix . "table_price",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '$25'
		),

		array(
                'name'  => 'Table Features List',
                'desc'  => 'Format: 140GB or any text',
                'id'    => $prefix . 'features_list',
                'type'  => 'text',
                'std'   => 'Lorem ipsum dolor sit',
                'class' => 'custom-class',
                'clone' => true,
                'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
            ),


		array(
			'name'		=> 'Table name buy now button link',
			'id'		=> $prefix . "table_link",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '#'
		),

		array(
			'name'		=> 'Table name buy now button link text',
			'id'		=> $prefix . "table_link_text",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'Purchase Now'
		),

		array(
			'name'		=> 'Table animation delay',
			'id'		=> $prefix . "table_anime",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '0.3s'
		),

		array(
			'name'		=> 'Best value text',
			'id'		=> $prefix . "best_value",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'best value'
		),

		array(
			'name'		=> 'Is this the best price? Yes / No',
			'id'		=> $prefix . "best",
			'type'		=> 'select',
			'options'	=> array(
			    'select'		=> 'Select a Section',
				'yes'				=> 'Yes',
				'no'				=> 'No'
			),
			'multiple'	=> false,
			'std'		=> 'Select Custom Section'
		),

		array(
			'name'		=> 'Bootstrap offset. To leave space to the left.',
			'id'		=> $prefix . "offset",
			'type'		=> 'select',
			'options'	=> array(
			    'select'		=> 'Select a Section',
				'1'				=> '1',
				'2'				=> '2',
				'3'				=> '3',
				'4'				=> '4',
				'5'				=> '5',
				'6'				=> '6',
				'7'				=> '7',
				'8'				=> '8',
				'9'				=> '9',
				'10'			=> '10',
				'11'			=> '11',
				'12'			=> '12'
			),
			'multiple'	=> false,
			'std'		=> 'Select Custom Section'
		),


	)
);


$meta_boxes[] = array(
	'id' => 'team',
    'title' => esc_html__( 'Member Social Box', 'urip' ),
    'pages'    => array( 'team' ),
	'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
    'id' => 'mm_review',
    'fields' => array(
		array(
			'name'  => 'Social Icon Name',
			'desc'  => 'Format: facebook',
			'id'    => $prefix . 'social_icon',
			'type'  => 'text',
			'std'   => 'facebook',
			'class' => 'custom-class',
			'clone' => true,
			'sort_clone' => true,
			'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
		),

		array(
			'name'  => 'Social Url',
			'desc'  => 'Format: http://facebook.com',
			'id'    => $prefix . 'social_url',
			'type'  => 'text',
			'std'   => '#',
			'class' => 'custom-class',
		// Text labels displayed before and after value

		'clone' => true,
		'clone-group' => 'my-clone-group',
		),

	),
);


$meta_boxes[] = array(
	'id' => 'unlimited-page',
    'title' => esc_html__( 'Urip onepage menu', 'urip' ),
    'pages'    => array( 'page' ),
	'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
	'context' => 'side',
	'priority' => 'low',
    'fields' => array(
		array(
			'name'  => 'Menu item name',
			'desc'  => 'Format: Any text',
			'id'    => $prefix . 'section_name',
			'type'  => 'text',
			'std'   => 'Menu item name',
			'class' => 'custom-class',
			'clone' => true,
			'sort_clone' => true,
			'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
		),


		array(
			'name'  => 'Menu item Url',
			'desc'  => 'Format: #sectionname or http://yoururl.com',
			'id'    => $prefix . 'section_url',
			'type'  => 'text',
			'std'   => '#sectionname',
			'class' => 'custom-class',
			'clone' => true,
			'sort_clone' => true,
			'clone-group' => 'my-clone-group',
		),
    ),
);

/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for blog posts
/*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Gallery Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Gallery Style', 'urip'),
                'desc' => esc_html__('Select the gallery style.', 'urip'),
                'id'   => $prefix . 'gallery_style',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Slider', 'urip' ),
                    'value2' => esc_html__( 'Grid', 'urip' ),
                ),
                'std'         => 'value1'
            ),
            array(
                'name' => esc_html__('Select Images', 'urip'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'urip'),
                'id'   => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_gallery_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'value1'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_gallery_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Quote Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Quote Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The Quote', 'urip'),
                'desc' => esc_html__('Write your quote in this field.', 'urip'),
                'id'   => $prefix . 'quote_text',
                'type' => 'textarea',
                'rows' => 5
            ),
            array(
                'name' => esc_html__('The Author', 'urip'),
                'desc' => esc_html__('Enter the name of the author of this quote.', 'urip'),
                'id'   => $prefix . 'quote_author',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Background Color', 'urip'),
                'desc' => esc_html__('Choose the background color for this quote.', 'urip'),
                'id'   => $prefix . 'quote_bg',
                'type' => 'color'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'urip'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'urip'),
                'id'   => $prefix . 'quote_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('Divider.', 'urip'),
                'id'   => $prefix . 'quote_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_quote_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_quote_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Link Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Link Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('The URL', 'urip'),
                'desc' => esc_html__('Insert the URL you wish to link to.', 'urip'),
                'id'   => $prefix . 'the_link',
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__('Background Color', 'urip'),
                'desc' => esc_html__('Choose the background color for this link.', 'urip'),
                'id'   => $prefix . 'link_bg',
                'type' => 'color',
                'std'  => '#d5d85f'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'urip'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'urip'),
                'id'   => $prefix . 'link_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('Divider.', 'urip'),
                'id'   => $prefix . 'link_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_link_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_link_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Image Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Image Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Enable Lightbox', 'urip'),
                'desc' => esc_html__('Check this to enable the lightbox.', 'urip'),
                'id'   => $prefix . 'enable_lightbox',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
            array(
                'name' => esc_html__('Enter URL', 'urip'),
                'desc' => esc_html__('Insert the url for the image.', 'urip'),
                'id'   => $prefix . 'the_image_url',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_image_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_image_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Audio Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Audio Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'urip' ),
            'id'   => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'urip'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'urip'),
                'id'   => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'urip'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'urip'),
                'id'   => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'urip'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'urip'),
                'id'   => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'urip'),
                'desc' => esc_html__('Choose the color.', 'urip'),
                'id'   => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_audio_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_audio_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Status Post Format */

    $meta_boxes[] = array(
        'title'    => esc_html__('Status Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
                'name' => esc_html__('Style', 'urip'),
                'desc' => esc_html__('Select status style.', 'urip'),
                'id'   => $prefix . 'status_style',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Normal', 'urip' ),
                    'value2' => esc_html__( 'Background', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Static'
            ),
            array(
                'name' => esc_html__('Background Color', 'urip'),
                'desc' => esc_html__('Choose the background color for this status.', 'urip'),
                'id'   => $prefix . 'status_bg',
                'type' => 'color',
                'std'  => '#d5d85f'
            ),
            array(
                'name' => esc_html__('Background Opacity', 'urip'),
                'desc' => esc_html__('Choose the opacity of the background color.', 'urip'),
                'id'   => $prefix . 'status_bg_opacity',
                'type' => 'text',
                'std' => 80
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_status_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

    /* Video Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Video Settings', 'urip'),
        'pages'    => array('post'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'urip' ),
            'id'   => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'urip'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'urip'),
                'id'   => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'urip'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'urip'),
                'id'   => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'urip'),
                'desc' => esc_html__('The URL to the .webm video file.', 'urip'),
                'id'   => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'urip'),
                'desc' => esc_html__('Select the preview image for this video.', 'urip'),
                'id'   => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'video_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_video_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_video_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );


/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for portfolio
/*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Gallery Settings', 'urip'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
                'name' => esc_html__('Gallery Style', 'urip'),
                'desc' => esc_html__('Select the gallery style.', 'urip'),
                'id'   => $prefix . 'gallery_style',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Slider', 'urip' ),
                    'value2' => esc_html__( 'Grid', 'urip' ),
                ),
                'std'         => 'value1'
            ),
            array(
                'name' => esc_html__('Select Images', 'urip'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'urip'),
                'id'   => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_gallery_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'value1'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_gallery_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );




    /* Audio Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Audio Settings', 'urip'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'urip' ),
            'id'   => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'urip'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'urip'),
                'id'   => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'urip'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'urip'),
                'id'   => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'urip'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'urip'),
                'id'   => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'urip'),
                'desc' => esc_html__('Choose the color.', 'urip'),
                'id'   => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_audio_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_audio_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );



    /* Video Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Video Settings', 'urip'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'urip' ),
            'id'   => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'urip'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'urip'),
                'id'   => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'urip'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'urip'),
                'id'   => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'urip'),
                'desc' => esc_html__('The URL to the .webm video file.', 'urip'),
                'id'   => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'urip'),
                'desc' => esc_html__('Select the preview image for this video.', 'urip'),
                'id'   => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            ),
            array(
                'name' => esc_html__('Divider', 'urip'),
                'desc' => esc_html__('divider.', 'urip'),
                'id'   => $prefix . 'video_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('Show Meta Information', 'urip'),
                'desc' => esc_html__('Check this to show metadata.', 'urip'),
                'id'   => $prefix . 'show_video_meta',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Show Social Icons', 'urip'),
                'desc' => esc_html__('Check this to show Social Icons.', 'urip'),
                'id'   => $prefix . 'show_video_social_icons',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content', 'urip'),
                'desc' => esc_html__('Check this to show post content.', 'urip'),
                'id'   => $prefix . 'post_content',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            ),
			array(
                'name' => esc_html__('Post content heading', 'urip'),
                'desc' => esc_html__('Check this to show post content heading.', 'urip'),
                'id'   => $prefix . 'post_content_heading',
                'type' => 'select',
                'options'  => array(
                    'value1' => esc_html__( 'Yes', 'urip' ),
                    'value2' => esc_html__( 'No', 'urip' ),
                ),
                'multiple'    => false,
                'std'         => 'Yes'
            )
        )
    );

   return $meta_boxes;

}

function urip_admin_scripts() {
    wp_register_script('urip_custom_admin', get_template_directory_uri() . '/js/jquery.custom.admin.js');
    wp_register_script('urip_custom_page_options', get_template_directory_uri() . '/admin/custom-page-options.js');
    wp_enqueue_script('urip_custom_admin');
    wp_enqueue_script('urip_custom_page_options');
}

function urip_admin_styles() {
    wp_register_style('urip_options_css', get_template_directory_uri() . '/admin/admin-style.css');
    wp_register_style('urip_options_grey_css', get_template_directory_uri() . '/admin/admin-style-grey.css');
    wp_enqueue_style('urip_options_css');
    wp_enqueue_style('urip_options_grey_css');
}

add_action('admin_print_scripts', 'urip_admin_scripts');
add_action('admin_print_styles', 'urip_admin_styles');

?>
