<?php
if ( ! class_exists( 'OT_Loader' ) || ! is_admin() )
  return false;
add_action( 'init', 'custom_theme_options' );

function custom_theme_options() {
  /* OptionTree is not loaded yet, or this is not an admin request */

  /**
   * Get a copy of the saved settings array.
   */
  $saved_settings = get_option( ot_settings_id(), array() );

  $custom_settings = array(
    'contextual_help' => array(
      'sidebar'       => ''
    ),
'sections'        => array(
	array(
	'id'          => 'general',
	'title'       => 'General config'
	),
	array(
	'id'          => 'colors',
	'title'       => 'Theme color'
	),
	array(
	'id'          => 'header',
	'title'       => 'Header / logo options'
	),
	array(
	'id'          => 'headermobile',
	'title'       => 'Header / logo mobile options'
	),
	array(
	'id'          => 'headermenu',
	'title'       => 'Header menu icon'
	),
	array(
	'id'          => 'headerbackground',
	'title'       => 'Header parallax area'
	),
	array(
	'id'          => 'headersticky',
	'title'       => 'Header sticky options'
	),
	array(
	'id'  		  => 'topheadersocial',
	'title' 	  => 'Header top options'
	),

	array(
	'id'          => 'blogheader',
	'title'       => 'Blog pages header'
	),
	array(
	'id'          => 'sidebars',
	'title'       => 'Theme sidebars'
	),
	array(
	'id'          => 'copyright',
	'title'       => 'Footer'
	),
	array(
	'id'          => 'footerwidgetize',
	'title'       => 'Footer widgetize options'
	),
	array(
	'id'          => 'copyrightnews',
	'title'       => 'Footer parallax newsletter'
	),
	array(
	'id'          => 'copyrightlinks',
	'title'       => 'Footer links'
	),
	array(
	'id'          => 'copyrightsociallinks',
	'title'       => 'Footer social'
	),
	array(
	'id'          => 'copyrightapp',
	'title'       => 'Footer app'
	),
	array(
	'id'          => 'contact',
	'title'       => 'Contact popup'
	),
	array(
	'id'          => 'language',
	'title'       => 'Footer language dropdown'
	),
	array(
	'id'          => 'blog_post',
	'title'       => 'Blog & post'
	),
	array(
	'id'          => 'google_fonts',
	'title'       => 'Google fonts'
	),
	array(
	'id'          => 'typography',
	'title'       => 'Typography'
	),
	array(
	'id'          => 'css',
	'title'       => 'Custom CSS & JS'
	),

),

'settings'        => array(


  /**
   * blog post
   */
	array(
        'id'          => 'social_container',
        'label'       => esc_html__( 'Blog post social icons visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'If you want to use another icon set please choose icon set visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'blog_post',
        'operator'    => 'and'
	),
	array(
        'id'          => 'meta_container',
        'label'       => esc_html__( 'Blog post meta visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose meta visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'blog_post',
        'operator'    => 'and'
	),
  array(
		'id'          => 'urip_s_bg',
		'label'       => esc_html__( 'Blog single header/hero background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blog_post'
	),
  array(
		'id'          => 'urip_s_overlaybgcolor',
		'label'       => esc_html__( 'Blog single header/hero overlay background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blog_post'
	),
  array(
		'id'          => 'urip_b_bg',
		'label'       => esc_html__( 'Blog page header/hero background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blog_post'
	),
  array(
		'id'          => 'urip_b_overlaybgcolor',
		'label'       => esc_html__( 'Blog page header/hero overlay background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blog_post'
	),


/**
 * GOOGLE FONTS SETTINGS.
 */
	array(
	    'id'          => 'body_google_fonts',
	    'label'       => esc_html__( 'Google Fonts', 'urip'  ),
	    'desc'        => 'Add Google Font and after the save settings follow these steps Dashbourip > Appearance > Theme Options > Typography',
	    'type'        => 'google-fonts',
	    'section'     => 'google_fonts',
	    'operator'    => 'and'
	),
/**
* TYPOGRAPHY SETTINGS.
*/
	 array(
        'id'          => 'urip_tipigrof',
        'label'       => esc_html__( 'Typography', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof1',
        'label'       => esc_html__( 'Typography h1', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof2',
        'label'       => esc_html__( 'Typography h2', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof3',
        'label'       => esc_html__( 'Typography h3', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof4',
        'label'       => esc_html__( 'Typography h4', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof5',
        'label'       => esc_html__( 'Typography h5', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),
	 array(
        'id'          => 'urip_tipigrof6',
        'label'       => esc_html__( 'Typography h6', 'urip' ),
        'desc'        => 'The Typography option type is for adding typography styles to your site.',
        'type'        => 'typography',
        'section'     => 'typography',
        'operator'    => 'and'
      ),

	 array(
		  'label'       => esc_html__( 'Blog page menu type', 'urip' ),
		  'id'          => 'menutype',
		  'desc'        => esc_html__( '<b>Please choose blog page menu type. This setting is only related with blog list page</b>', 'urip' ),
		  'std'         => 'menuright',
		  'section'     => 'blogheader',
		  'type'        => 'select',
		  'choices'     => array(

			array(
			  'value'       => 'menutop',
			  'label'       => 'menu top'
			),
			array(
			  'value'       => 'menuright',
			  'label'       => 'right slide menu'
			)
		  )
	),

	array(
        'id'          => 'logovisibility',
        'label'       => esc_html__( 'Header logo visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose header logo visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'blogheader',
        'operator'    => 'and'
	),

	array(
        'id'          => 'menubutton',
        'label'       => esc_html__( 'Header menu button visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose header menu button visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'blogheader',
        'operator'    => 'and'
	),
	array(
		'id'          => 'urip_headerbg',
		'label'       => esc_html__( 'Blog header background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blogheader'
	),

	   array(
		'id'          => 'urip_menubutton',
		'label'       => esc_html__( 'Blog header  menu button  color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',

		'section'     => 'blogheader'
		),

	   array(
		'id'          => 'urip_menubuttonhover',
		'label'       => esc_html__( 'Blog header  menu button hover color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',

		'section'     => 'blogheader'
		),

	array(
		'id'          => 'menulinkcolor',
		'label'       => esc_html__( 'Blog header  top menu link  color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'blogheader'
	),

	array(
		'id'          => 'nt_urip_sticky_tab_header',
		'label'       => esc_html__( 'Sticky logo', 'urip' ),
		'type'        => 'tab',
		'section'     => 'headersticky'
	),
	array(
        'id'          => 'headerstickyonoff',
        'label'       => esc_html__( 'header sticky visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose header sticky visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'headersticky',
        'operator'    => 'and'
	),

	array(
        'id'          => 'clonepadding',
        'label'       => 'clone header padding top & bottom',
        'desc'        => 'You can use this option for clone header padding top & bottom with keyboard arrows',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'headersticky',
		'operator'    => 'and'
	),

	array(
        'id'          => 'cloneheight',
        'label'       => 'clone header height',
        'desc'        => 'You can use this option for clone header height with keyboard arrows',
        'std'         => '44',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'headersticky',
		'operator'    => 'and'
	),
	array(
		'id'          => 'nt_urip_sticky_tab_logo',
		'label'       => esc_html__( 'Sticky logo', 'urip' ),
		'type'        => 'tab',
		'section'     => 'headersticky'
	),
	array(
        'id'          => 'clonelogotop',
        'label'       => 'clone header logo top alignment value',
        'desc'        => 'You can use this option for clone header logo top alignment value with keyboard arrows',
        'std'         => '0',
        'type'        => 'numeric-slider',
		'min_max_step'=> '3,300',
        'section'     => 'headersticky',
		'operator'    => 'and'
	),

	array(
        'id'          => 'clonelogowidth',
        'label'       => 'clone header logo width',
        'desc'        => 'You can use this option for clone header logo width value with keyboard arrows',
        'std'         => '70',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'headersticky',
		'operator'    => 'and'
	),

	array(
        'id'          => 'clonelogoheight',
        'label'       => 'clone header logo height',
        'desc'        => 'You can use this option for clone header logo height value with keyboard arrows',
        'std'         => '44',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'headersticky',
		'operator'    => 'and'
	),

	array(
		'id'          => 'nt_urip_sticky_tab__clr',
		'label'       => esc_html__( 'Sticky header design', 'urip' ),
		'type'        => 'tab',
		'section'     => 'headersticky'
	),
	array(
		'id'          => 'clonebackground',
		'label'       => esc_html__( 'clone header background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'headersticky'
	),

	array(
		'id'          => 'clonemenucolor',
		'label'       => esc_html__( 'clone header menu button color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'headersticky'
	),

  array(
    'id'          => 'urip_h_r_bg',
    'label'       => esc_html__( 'Navigation right background color', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'headerrightoptions'
  ),
  array(
    'id'          => 'urip_h_r_i',
    'label'       => esc_html__( 'Navigation right item color', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'headerrightoptions'
  ),
  array(
    'id'          => 'urip_h_r_hi',
    'label'       => esc_html__( 'Navigation right item hover color', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'headerrightoptions'
  ),

	array(
        'id'          => 'contactpopupvisibility',
        'label'       => esc_html__( 'contact popup visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose contact popup visibility %s or %s. If you do not use popup contact select off', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'contact',
        'operator'    => 'and'
    ),
	array(
        'id'          => 'nt_contact_head',
        'label'       => 'Popup contact heading',
        'desc'        => 'Popup contact heading',
        'std'         => 'CONTACT US',
        'type'        => 'text',
        'section'     => 'contact'
    ),
	array(
        'id'          => 'nt_contact_desc',
        'label'       => 'Popup contact description',
        'desc'        => 'Popup contact description',
        'std'         => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas mollis interdum!',
        'type'        => 'text',
        'section'     => 'contact'
    ),
	array(
        'id'          => 'contactuslink',
        'label'       => esc_html__( 'Header slide menu contact us link visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose header slide menu contact us link visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'contact',
        'operator'    => 'and'
	),
	array(
        'id'          => 'contactuslinktext',
        'label'       => 'Header slide menu contact us link',
        'desc'        => 'Header slide menu contact us link',
        'std'         => 'Contact Us',
        'type'        => 'text',
        'section'     => 'contact'
    ),

	array(
		'id'          => 'themecolor1',
		'label'       => esc_html__( 'Theme color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		 'std'         => '#FFC55F',
		'section'     => 'colors'
	),
	array(
		'id'          => 'menudropdown',
		'label'       => esc_html__( 'Theme right slider menu background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'std'         => '#292c33',
		'section'     => 'colors'
	),
	array(
		'id'          => 'menudropdowncolor',
		'label'       => esc_html__( 'Theme right slider menu item color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'std'         => '#F5F5F5',
		'section'     => 'colors'
	),
  array(
    'id'          => 'urip_h_r_hi',
    'label'       => esc_html__( 'Theme right slider menu item hover color', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'colors'
  ),
	array(
        'id'          => 'forumlayout',
        'label'       => esc_html__( 'Buddypress Page Layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose Buddypress  page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'bloglayout',
        'label'       => esc_html__( 'Blog Layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose blog page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'pagelayout',
        'label'       => esc_html__( 'Default Page Layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose default page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'searchlayout',
        'label'       => esc_html__( 'Search page Layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose search page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),

	array(
        'id'          => 'postlayout',
        'label'       => esc_html__( 'Blog single page layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose post page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),

	array(
        'id'          => 'archivelayout',
        'label'       => esc_html__( 'Archive page layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose archive page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),

	array(
        'id'          => '404layout',
        'label'       => esc_html__( '404 page layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose 404 page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),
	array(
        'id'          => 'woosingle',
        'label'       => esc_html__( 'Shop single page layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose Shop single page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),
	array(
        'id'          => 'woopage',
        'label'       => esc_html__( 'Shop  page layout', 'urip' ),
        'desc'        => esc_html__( 'Please choose shop  page layout type', 'urip' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'sidebars',
        'operator'    => 'and'
	),

	array(
        'id'          => 'menuname',
        'label'       => esc_html__( 'Header menu name visibility', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose Header menu name visibility %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'headermenu',
        'operator'    => 'and'
	),

	array(
        'id'          => 'menuiconsize',
        'label'       => 'menu icon size',
        'desc'        => 'You can use this option for menu icon size with keyboard arrows',
        'std'         => '19',
        'type'        => 'numeric-slider',
		'min_max_step'=> '10,600',
        'section'     => 'headermenu',
		'operator'    => 'and'
	),

	array(
		'id'          => 'menubuttoncolor',
		'label'       => esc_html__( 'Header menu button color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'std'         => '#fff',
		'section'     => 'headermenu'
	),

	array(
        'id'          => 'otherpageheadbg',
        'label'       => 'Blog pages header  section background image',
        'desc'        => 'You can upload your image for parallax header',
        'type'        => 'upload',
        'section'     => 'headerbackground',
		'operator'    => 'and'
	),


	array(
		'id'          => 'otherpageheadbgcolor',
		'label'       => esc_html__( 'Header page background color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'std'         => '#fff',
		'section'     => 'headerbackground'
	),

	array(
        'id'          => 'breadcentered',
        'label'       => esc_html__( 'Blog Header breadcrumb area text center option', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Blog Header breadcrumb area text center option %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'headerbackground',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'logoimg',
        'label'       => 'Upload logo image',
        'desc'        => 'Upload logo image',
        'type'        => 'upload',
        'section'     => 'header'
	),

	array(
        'id'          => 'logoheight',
        'label'       => 'Header logo height',
        'desc'        => 'You can use this option for logo height with keyboard arrows',
        'std'         => '77',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,600',
        'section'     => 'header',
		'operator'    => 'and'
    ),

	array(
        'id'          => 'logowidth',
        'label'       => 'Header logo width',
        'desc'        => 'You can use this option for header logo width with keyboard arrows',
        'std'         => '123',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'header',
		'operator'    => 'and'
    ),

	array(
        'id'          => 'logomargin',
        'label'       => 'Header logo margin top',
        'desc'        => 'You can use this option for logo margin top with keyboard arrows',
        'std'         => '10',
        'type'        => 'numeric-slider',
	      'min_max_step'=> '-100,200',
        'section'     => 'header',
		'operator'    => 'and'
    ),

	array(
        'id'          => 'phonelogoheight',
        'label'       => 'Mobile device logo height',
        'desc'        => 'You can use this option for logo height with keyboard arrows',
        'std'         => '50',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,600',
        'section'     => 'headermobile',
		'operator'    => 'and'
    ),

	array(
        'id'          => 'phonelogowidth',
        'label'       => 'Mobile device header logo width',
        'desc'        => 'You can use this option for header logo width with keyboard arrows',
        'std'         => '70',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,300',
        'section'     => 'headermobile',
		'operator'    => 'and'
    ),

	array(
        'id'          => 'phonelogomargin',
        'label'       => 'Mobile device logo margin top with',
        'desc'        => 'You can use this option for logo margin top with keyboard arrows',
        'std'         => '10',
        'type'        => 'numeric-slider',
		'min_max_step'=> '-100,200',
        'section'     => 'headermobile',
		'operator'    => 'and'
    ),

	array(
		'id'        => 'nt_urip_generaltab1',
		'label'     => esc_html__( 'General Options', 'urip' ),
		'type'      => 'tab',
		'section'   => 'general'
	),
	array(
		  'label'       => esc_html__( 'Frontpage banner section', 'urip' ),
		  'id'          => 'headertypes',
		  'desc'        => esc_html__( '<b>Please choose frontpage banner type</b>', 'urip' ),
		  'std'         => '1',
		  'section'     => 'general',
		  'type'        => 'select',
		  'choices'     => array(

			array(
			  'value'       => '1',
			  'label'       => 'Frontpage header 1'
			),
			array(
			  'value'       => '2',
			  'label'       => 'Frontpage header 2'
			),
			array(
			  'value'       => '3',
			  'label'       => 'Frontpage header 3'
			),
			array(
			  'value'       => '4',
			  'label'       => 'Frontpage header 4'
			),
			array(
			  'value'       => '5',
			  'label'       => 'Frontpage header 5'
			)
		  )
	),

    array(
        'id'          => 'SmoothScroll',
        'label'       => esc_html__( 'SmoothScroll option', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Smooth scroll option %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'additionalcss',
        'label'       =>  esc_html__('Custom  CSS', 'urip' ),
        'desc'        =>  esc_html__('You can add additional css ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'desktopcss',
        'label'       =>  esc_html__('Responsive large desktop css', 'urip' ),
        'desc'        =>  esc_html__('You can add additional css ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'landscapecss',
        'label'       =>  esc_html__('Responsive Portrait tablet to landscape and desktop css', 'urip' ),
        'desc'        =>  esc_html__('You can add additional css ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'portraitcss',
        'label'       =>  esc_html__('Responsive  Landscape phone to portrait tablet css', 'urip' ),
        'desc'        =>  esc_html__('You can add additional css ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'phonescss',
        'label'       =>  esc_html__('Responsive  Landscape phones and down css', 'urip' ),
        'desc'        =>  esc_html__('You can add additional css ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'additionaljs',
        'label'       =>  esc_html__('Custom javascript', 'urip' ),
        'desc'        =>  esc_html__('You can add additional javascript ', 'urip' ),
        'type'        => 'css',
        'section'     => 'css'
	),

	array(
        'id'          => 'footerheight',
        'label'       => 'Footer height',
        'desc'        => 'margin value is the height of your footer',
        'std'         => '234',
        'type'        => 'numeric-slider',
		'min_max_step'=> '0,900',
        'section'     => 'copyright',
		'operator'    => 'and'
    ),

    array(
        'id'          => 'widgetizefooter',
        'label'       => esc_html__( 'widgetize footer section', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose footer widgetize section %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footerwidgetize',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'widgetizefooterbg',
        'label'       => 'footer widgetize parallax background image',
        'desc'        => 'footer widgetize parallax background image',
        'type'        => 'upload',
        'section'     => 'footerwidgetize'
	),

	array(
		'id'          => 'widgetize_w_h_c',
		'label'       => esc_html__( 'Widgetize footer widget heading color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',

		'section'     => 'footerwidgetize'
	),

	array(
		'id'          => 'widgetize_w_l_c',
		'label'       => esc_html__( 'Widgetize footer widget links color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'footerwidgetize'
	),

	array(
		'id'          => 'widgetize_w_l_b',
		'label'       => esc_html__( 'Widgetize footer widget links before dot color ', 'urip' ),
		'desc'        => esc_html__( 'Please select color', 'urip' ),
		'type'        => 'colorpicker',
		'section'     => 'footerwidgetize'
	),

	array(
        'id'          => 'mainfooter',
        'label'       => esc_html__( 'Footer main  section', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose footer main section %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'copyright',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'footernewsletter',
        'label'       => esc_html__( 'Footer newsletter section', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose footer newsletter section %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'copyrightnews',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'footerpowereds',
        'label'       => esc_html__( 'Footer copyright section', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose footer copyright section %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'copyright',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'footertotop',
        'label'       => esc_html__( 'Footer go to top button', 'urip' ),
        'desc'        => sprintf( esc_html__( 'Please choose to top button %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'copyright',
        'operator'    => 'and'
    ),

	array(
        'id'          => 'newsheader',
        'label'       => 'Footer  newsletter heading',
        'desc'        => 'Footer About',
        'std'         => 'Subscribe For Updates',
        'type'        => 'text',
        'section'     => 'copyrightnews'
    ),

	array(
        'id'          => 'newsdesc',
        'label'       => 'Footer newsletter description',
        'desc'        => 'Footer About',
        'std'         => 'Join our 622,314 subscribers and get access to the latest tools, freebies, product announcements and much more!',
        'type'        => 'text',
        'section'     => 'copyrightnews'
    ),

	array(
        'id'          => 'footerpowered',
        'label'       => 'Footer About',
        'desc'        => 'Footer About',
        'std'         => 'Launch beautiful, responsive websites faster with themes',
        'type'        => 'text',
        'section'     => 'copyright'
    ),

	array(
        'id'          => 'appheading',
        'label'       => 'Footer app template footer heading',
        'desc'        => 'Footer About',
        'type'        => 'textarea',
        'section'     => 'copyrightapp'
    ),

	array(
        'id'          => 'appdesc',
        'label'       => 'Footer app template footer description',
        'desc'        => 'You can add slogan / description for app template footer type.',
        'type'        => 'textarea',
        'section'     => 'copyrightapp'
    ),

	array(
        'id'          => 'newsletterlogo',
        'label'       => 'footer newsletter left image/ logo',
        'desc'        => 'footer newsletter left image/ logo',
        'type'        => 'upload',
        'section'     => 'copyrightnews'
    ),

	array(
        'id'          => 'footernewsletterbg',
        'label'       => 'footer newsletter parallax background image',
        'desc'        => 'footer newsletter parallax background image',
        'type'        => 'upload',
        'section'     => 'copyrightnews'
	),

	array(
        'id'          => 'footerlogo',
        'label'       => 'footer logo ',
        'desc'        => 'footer logo for app section',
        'type'        => 'upload',
        'section'     => 'copyright'
    ),

	array(
        'id'          => 'appimage',
        'label'       => 'Footer appstore image',
        'desc'        => 'Footer appstore image',
        'type'        => 'upload',
        'section'     => 'copyrightapp'
	),
	array(
        'id'          => 'appimageurl',
        'label'       => 'Footer appstore image url',
        'desc'        => 'Enter footer appstore image url',
        'std'         => 'http://playstore.com/myapp',
        'type'        => 'text',
        'section'     => 'copyrightapp'
	),

	array(
        'id'          => 'playimage',
        'label'       => 'Footer playstore image',
        'desc'        => 'Footer playstore image',
        'type'        => 'upload',
        'section'     => 'copyrightapp'
	),

	array(
        'id'          => 'playimageurl',
        'label'       => 'Footer google play image url',
        'desc'        => 'Enter footer  google play image url',
        'std'         => 'http://googleplay.com/myapp',
        'type'        => 'text',
        'section'     => 'copyrightapp'
	),

	array(
        'id'          => 'footerlinks',
        'label'       => 'Footer links',
        'desc'        => 'Footer links',
        'type'        => 'list-item',
        'section'     => 'copyrightlinks',
        'settings'    => array(

          array(
            'id'          => 'link_title',
            'label'       => 'Footer link title here',
            'desc'        => 'Enter Footer link title here',
                'type'        => 'text'
          ),
          array(
            'id'          => 'footer_link',
            'label'       => 'Footer link here',
            'desc'        => 'Enter Footer link  here',
                'type'        => 'text'
          ),
          array(
            'id'          => 'footer_target',
            'label'       => 'Footer target code here',
            'desc'        => 'http://www.w3schools.com/tags/att_a_target.asp',
                'type'        => 'text'
          )
        )
	),


	array(
        'id'          => 'social',
        'label'       => 'Footer Social Icons',
        'desc'        => 'Footer Social Icons',
        'type'        => 'list-item',
        'section'     => 'copyrightsociallinks',
        'settings'    => array(
			array(
				'id'          => 'social_text',
				'label'       => 'social icon name',
				'desc'        => 'Enter font awesome social icon name',
				'type'        => 'text'
			),
			array(
				'id'          => 'social_link',
				'label'       => 'Link',
				'desc'        => 'Enter font awesome social share link. Example : http://facebook.com/mypage',
				'type'        => 'text'
			),
			array(
				'id'          => 'footer_target',
				'label'       => 'Footer target code here',
				'desc'        => 'http://www.w3schools.com/tags/att_a_target.asp',
				'type'        => 'text'
			),
			array(
				'id'          => 'social_text_color',
				'label'       => esc_html__( 'Footer social item color ', 'urip' ),
				'desc'        => esc_html__( 'Please select color', 'urip' ),
				'type'        => 'colorpicker',
				'std'         => '#F5F5F5',
			),
        )
	),
  array(
    'id'          => 'footer_socialicon_color',
    'label'       => esc_html__( 'Footer social item color ', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'copyrightsociallinks',
  ),
  array(
    'id'          => 'footer_socialiconh_color',
    'label'       => esc_html__( 'Footer social item hover color ', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'copyrightsociallinks',
  ),
  array(
    'id'          => 'footer_copyright_color',
    'label'       => esc_html__( 'Footer copyright color ', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'copyrightsociallinks',
  ),
  array(
    'id'          => 'footer_copyrighth_color',
    'label'       => esc_html__( 'Footer copyright hover color ', 'urip' ),
    'desc'        => esc_html__( 'Please select color', 'urip' ),
    'type'        => 'colorpicker',
    'section'     => 'copyrightsociallinks',
  ),
	array(
        'id'          => 'language',
        'label'       => 'Footer language dropdown',
        'desc'        => 'Footer language dropdown',
        'type'        => 'list-item',
        'section'     => 'language',
        'settings'    => array(

          array(
            'id'          => 'language_text',
            'label'       => 'language name',
            'desc'        => 'Enter language name',
                'type'        => 'text'
          ),
          array(
            'id'          => 'language_link',
            'label'       => 'Link',
            'desc'        => 'Enter language link',
                'type'        => 'text'
          )
        )
	),

	array(
        'id'          => 'languagetext',
        'label'       => 'language dropdown text',
        'desc'        => 'language dropdown text',
        'std'         => 'Select a language',
        'type'        => 'text',
        'section'     => 'language'
	),

	// header top
	array(
		'id'        => 'nt_urip_header_mini_tab',
		'label'     => esc_html__( 'Header Top Options', 'urip' ),
		'type'      => 'tab',
		'section'   => 'topheadersocial'
	),
	array(
        'id'        => 'urip_header_mini_display',
        'label'     => esc_html( 'Header top visibility', 'urip' ),
        'desc'      => sprintf( esc_html( 'Please choose header top section display %s or %s.', 'urip' ), '<code>on</code>', '<code>off</code>' ),
        'std'       => 'off',
        'type'      => 'on-off',
        'section'   => 'topheadersocial',
    ),
	array(
		'id'    	=> 'urip_h_t_slogan',
		'label' 	=> esc_html( 'Header top left slogan text', 'urip' ),
		'desc'  	=> esc_html( 'Enter custom text', 'urip' ),
		'type'  	=> 'text',
		'section'   => 'topheadersocial',
	),

	array(
		'id'        => 'urip_header_mini_tab_soc',
		'label'     => esc_html__( 'Header Social', 'urip' ),
		'type'      => 'tab',
		'section'   => 'topheadersocial'
	),
	array(
        'id'        => 'urip_topheader_socials',
        'label'     => esc_html( 'Header top social icons', 'urip' ),
        'desc'      => esc_html( 'Add social icons', 'urip' ),
        'type'      => 'list-item',
        'section'   => 'topheadersocial',
        'settings'  => array(
			array(
				'id'    => 'urip_tsc',
				'label' => esc_html( 'Social icon classes', 'urip' ),
				'desc'  => esc_html( 'Enter social icon item classes. Examples: fa fa-twitter or another font family icon classes', 'urip' ),
				'type'  => 'text'
			),
			array(
				'id'    => 'urip_tsu',
				'label' => esc_html( 'Social icon URL', 'urip' ),
				'desc'  => esc_html( 'Enter URL / Link', 'urip' ),
				'type'  => 'text'
			)
      )
    ),
	array(
        'id'        => 'urip_tst',
        'label'     => esc_html( 'Social icons target type', 'urip' ),
        'desc'      => esc_html( 'Select target type. Default : _blank' , 'urip' ),
        'std'       => '_blank',
        'type'      => 'select',
        'section'   => 'topheadersocial',
        'operator'  => 'and',
        'choices'   => array(
        array(
            'value' => '_blank',
            'label' => esc_html( 'blank', 'urip' )
        ),
        array(
            'value' => '_self',
            'label' => esc_html( 'self', 'urip' )
        ),
        array(
            'value' => '_parent',
            'label' => esc_html( 'parent', 'urip' )
        ),
        array(
            'value' => '_top',
            'label' => esc_html( 'top', 'urip' )
        ),
      )
	),
	array(
		'id'        => 'urip_header_mini_color_tab',
		'label'     => esc_html__( 'Design Options', 'urip' ),
		'type'      => 'tab',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_bg_color',
		'label'     => esc_html( 'Header mini background color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_text_color',
		'label'     => esc_html( 'Header mini text color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_icon_bg',
		'label'     => esc_html( 'Header mini icon background color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_icon_border',
		'label'     => esc_html( 'Header mini icon border left-right color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_icon_color',
		'label'     => esc_html( 'Header mini icon text color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),
	array(
		'id'        => 'urip_header_mini_icon_hover',
		'label'     => esc_html( 'Header mini icon hover background color ', 'urip' ),
		'desc'      => esc_html( 'Please select color', 'urip' ),
		'type'      => 'colorpicker',
		'section'   => 'topheadersocial'
	),

    )
  );

 /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

}
