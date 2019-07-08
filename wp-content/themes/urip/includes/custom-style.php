<?php

if ( is_admin() )
	return false;


/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package urip
*/

/* HEADER ------------------------------------------- */

function urip_custom_styling() { ?>


	<style>

	<?php if( current_user_can('administrator')): ?>
		#main-header.the-origin-header, .notif-box, .contact-overlay { top: 32px;}
		.header-clone { top: 32px;}
		@media (max-width: 767px) {
			.navbar-default { top: 47px;}
		}
	<?php endif; ?>

	<?php if( is_customize_preview('administrator')): ?>
		#main-header.the-origin-header, .header-clone, .notif-box , .contact-overlay{ top: 0px;}
	<?php endif; ?>

	<?php if( current_user_can('editor')) : ?>
		#main-header.the-origin-header, .notif-box , .contact-overlay{ top: 32px;}
		@media (max-width: 767px) {
		 .navbar-default { top: 47px;}
		}
	 .header-clone { top: 32px;}
	<?php endif; ?>

	.vc_editor #main-header {display:none !important;}
	@media (max-width: 768px){
		.admin-bar .navbar-fixed-top{ top: 46px; }
	}
	@media (max-width: 600px){
		.admin-bar .header-clone { top: 46px; margin-top: 0px !important; }
	}
	@media (max-width: 480px){
		.navbar-fixed-top { top: 46px; }
	}

	<?php if ( ot_get_option( 'urip_header_mini_display' ) =='on' )  :?>
	#main-header.the-origin-header, .notif-box, .contact-overlay { top: 72px;}
	<?php endif; ?>

	<?php if( ot_get_option( 'logowidth' ) !='' ) : ?>
	.the-origin-header a.logo img { width:<?php echo esc_attr(ot_get_option('logowidth')); ?>px !important; }
	<?php endif; ?>
	<?php if( ot_get_option( 'logoheight' ) !='' ) : ?>
	.the-origin-header a.logo  img { height:<?php echo esc_attr(ot_get_option('logoheight')); ?>px !important; }
	<?php endif; ?>
	<?php if( ot_get_option( 'logomargin' ) !='' ) : ?>
	.the-origin-header a.logo img { margin-top:<?php echo esc_attr(ot_get_option('logomargin')); ?>px !important; }
	<?php endif; ?>
	<?php if( ot_get_option( 'menubuttoncolor' ) !='' ) : ?>
	the-origin-header a.menu-toggle { color: <?php echo ot_get_option('menubuttoncolor'); ?>;}
	<?php endif; ?>
	<?php if ( ot_get_option('headerstickyonoff') == 'off' ) : ?>
	.header-clone {display: none;}
	<?php endif; ?>

	<?php if ( ot_get_option('headerstickyonoff') != 'off') : ?>
	.header-clone {
		padding: <?php echo esc_attr(ot_get_option('clonepadding')); ?>px 0 !important;
		height: <?php echo esc_attr(ot_get_option('cloneheight')); ?>px !important;
		background: <?php echo esc_attr(ot_get_option('clonebackground')); ?>;
	}
	.header-clone a.menu-toggle { color: <?php echo esc_attr(ot_get_option('clonemenucolor')); ?>;}
	.header-clone .logo img {
		top:<?php echo esc_attr(ot_get_option('clonelogotop')); ?>px !important;
		width:<?php echo esc_attr(ot_get_option('clonelogowidth')); ?>px !important;
		height:<?php echo esc_attr(ot_get_option('clonelogoheight')); ?>px !important;
	}
	<?php endif; ?>

	<?php if ( ot_get_option('menuiconsize') != '') : ?>
	a.menu-toggle span { font-size: <?php echo esc_attr(ot_get_option('menuiconsize')); ?>px; }
	<?php endif; ?>


	@media (max-width: 640px) {
		<?php if(esc_attr( ot_get_option( 'phonelogowidth' ) !='' )) : ?>
		.the-origin-header a.logo img { width:<?php echo esc_attr(ot_get_option('phonelogowidth')); ?>px !important; }
		<?php endif; ?>
		<?php if(esc_attr( ot_get_option( 'phonelogoheight' ) !='' )) : ?>
		.the-origin-header a.logo  img{ height:<?php echo esc_attr(ot_get_option('phonelogoheight')); ?>px !important; }
		<?php endif; ?>
		<?php if(esc_attr( ot_get_option( 'phonelogomargin' ) !='' )) : ?>
		.the-origin-header a.logo img{ margin-top:<?php echo esc_attr(ot_get_option('phonelogomargin')); ?>px !important; }
		<?php endif; ?>
	}

	<?php if(esc_attr( ot_get_option( 'otherpageheadbgcolor' ) !='' )) : ?>
	.blog-layout #hero { background: <?php echo esc_attr( ot_get_option( 'otherpageheadbgcolor' ) ) ?>; }
	<?php endif; ?>

	<?php if(esc_attr( ot_get_option( 'otherpageheadbg' ) !='' )) : ?>
	.blog-layout #hero {
	  background: url(<?php echo esc_attr( ot_get_option( 'otherpageheadbg' ) ) ?>) no-repeat center center fixed !important;
	  background-size: cover !important;
	}
   <?php else: ?>
	.blog-layout #hero {
	  background: url(<?php echo get_template_directory_uri() . '/images/stocks/stock.jpg' ?>) no-repeat center center fixed !important;
	  background-size: cover !important;
	}
	<?php endif; ?>

	<?php if(esc_attr( ot_get_option( 'otherpageheadbg' ) =='' )) : ?>
	.blog-layout #hero {
		background: #eee;
		background-size: cover;
		height: auto;
	}
	<?php endif; ?>



	<?php if ( ot_get_option('breadcentered') != 'off') : ?>
	.blog-layout #hero .hero-content {   text-align: left !important; }
	<?php endif; ?>

	.slick-dots li.slick-active button:before , .mobile-filter-select.select-active , #success-notification, #subscribe-success-notification,.required-field:after , .contact-form .submit-btn , .price:hover .price-button, .price:hover .price-label,.price:hover .price-amount, .panel-heading.panel-active a, .section-tab .nav > li.active > a, p a:after, 	a.more:after , 	p.section-title:after, 	.cta-default, 	.panel-heading.panel-active a:after, 	.panel-heading.panel-active a:hover, 	.register-form .submit-btn, 	#footer-subscribe .btn-subscribe, 	#to-top:hover, 	.price.best-value .price-button, 	.price.best-value:hover .price-button, 	.price.best-value .price-amount, 	.price.best-value:hover .price-amount
 	{ background-color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; }
	.slick-dots li.slick-active button:before
	{ box-shadow: 0 0 0 4px <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; }

	ul.portfolio-filter li.current a , 	.app-layout .customer-quote .customer-link a , 	ul.filter li.current a, 	.why-us-icon , 	.the-feature:hover .feature-title , 	.content-tab-wrapper .nav > li.active > a span[class^="icon-"], 	ul.checklist li:before, 	.cta-stroke:hover, .cta-stroke:focus , 	.cta-stroke , 	.urip-blue-color, 	a, a:hover, 	.entry-meta, 	.urip-orange-color
	{ color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; }

	.why-us-icon, 	.price:hover .price-amount, 	ul.pricing .price:hover , 	.content-tab-wrapper .nav-tabs, 	.cta-stroke, 	.price.best-value .price-amount, 	.price.best-value:hover .price-amount, 	ul.pricing .price.best-value, ul.pricing .price.best-value:hover
	{ border-color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>; 	}

	.content-tab-wrapper .nav-tabs > li.active:before
	{border-top-color: <?php echo esc_attr( ot_get_option( 'themecolor1' ) ) ?>;}

	#nav-wrapper  { background-color: <?php echo esc_attr( ot_get_option( 'menudropdown' ) ) ?>; }
	#nav-wrapper .main-nav li a, .secondary-nav li a{ color: <?php echo esc_attr( ot_get_option( 'menudropdowncolor' ) ) ?>; }
	#nav-wrapper .main-nav li a:hover, .secondary-nav li a:hover{ color: <?php echo esc_attr( ot_get_option( 'urip_h_r_hi' ) ) ?>; }
	#footer-widget-section .widget-title {color: <?php echo esc_attr( ot_get_option( 'widgetize_w_h_c' ) ) ?>; }
	#footer-widget-section .widget ul li a {color: <?php echo esc_attr( ot_get_option( 'widgetize_w_l_c' ) ) ?>; }
	#footer-widget-section .widget ul li:before {color: <?php echo esc_attr( ot_get_option( 'widgetize_w_l_b' ) ) ?>; }

	ul.footer-social li a{color: <?php echo esc_attr( ot_get_option( 'footer_socialicon_color' ) ) ?>!important; }
	#main-footer.footer-instagram-hovered li a	,	#main-footer.footer-facebook-hovered li a	,	#main-footer.footer-twitter-hovered li a	,	#main-footer.footer-linkedin-hovered li a	,	#main-footer.footer-google-hovered li a	,	#main-footer.footer-dribbble-hovered li a	,	#main-footer.footer-pinterest-hovered li a	,	#main-footer.footer-vimeo-hovered li a {color: <?php echo esc_attr( ot_get_option( 'footer_socialiconh_color' ) ) ?>!important; }

	#main-footer .copyright{color: <?php echo esc_attr( ot_get_option( 'footer_copyright_color' ) ) ?>!important; }
	#main-footer.footer-instagram-hovered .copyright,#main-footer.footer-facebook-hovered .copyright,#main-footer.footer-twitter-hovered .copyright,#main-footer.footer-linkedin-hovered .copyright,#main-footer.footer-google-hovered .copyright,#main-footer.footer-dribbble-hovered .copyright,#main-footer.footer-pinterest-hovered .copyright,#main-footer.footer-vimeo-hovered .copyright{color: <?php echo esc_attr( ot_get_option( 'footer_copyrighth_color' ) ) ?>!important; }

	<?php $ninetheme_urip_tipigrof = ot_get_option( 'ninetheme_urip_tipigrof', array() ); ?>
	<?php if($ninetheme_urip_tipigrof) { ?>
	body{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof1 = ot_get_option( 'ninetheme_urip_tipigrof1', array() ); ?>
	<?php if( $ninetheme_urip_tipigrof1 ) { ?>
	h1{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof1['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof1['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof1['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof1['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof1['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof1['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof1['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof1['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof1['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof1['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof2 = ot_get_option( 'ninetheme_urip_tipigrof2', array() ); ?>
	<?php if($ninetheme_urip_tipigrof2) { ?>
	h2{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof2['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof2['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof2['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof2['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof2['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof2['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof2['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof2['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof2['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof2['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof3 = ot_get_option( 'ninetheme_urip_tipigrof3', array() ); ?>
	<?php if($ninetheme_urip_tipigrof3) { ?>
	h3{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof3['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof3['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof3['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof3['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof3['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof3['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof3['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof3['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof3['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof3['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof4 = ot_get_option( 'ninetheme_urip_tipigrof4', array() ); ?>
	<?php if($ninetheme_urip_tipigrof4) { ?>
	h4{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof4['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof4['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof4['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof4['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof4['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof4['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof4['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof4['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof4['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof4['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof5 = ot_get_option( 'ninetheme_urip_tipigrof5', array() ); ?>
	<?php if($ninetheme_urip_tipigrof5) { ?>
	h5{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof5['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof5['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof5['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof5['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof5['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof5['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof5['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof5['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof5['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof5['text-transform'] ) ; ?>;
	}
	<?php } ?>


	<?php $ninetheme_urip_tipigrof6 = ot_get_option( 'ninetheme_urip_tipigrof6', array() ); ?>
	<?php if($ninetheme_urip_tipigrof6) { ?>
	h6{
	color:		<?php echo esc_attr( $ninetheme_urip_tipigrof6['font-color'] ) ; ?>;
	font-family: <?php echo esc_attr( $ninetheme_urip_tipigrof6['font-family'] ) ; ?>;
	font-size:<?php echo esc_attr( $ninetheme_urip_tipigrof6['font-size'] ) ; ?>;
	font-style:<?php echo esc_attr( $ninetheme_urip_tipigrof6['font-style'] ) ; ?>;
	font-variant:<?php echo esc_attr( $ninetheme_urip_tipigrof6['font-variant'] ) ; ?>;
	font-weight: <?php echo esc_attr( $ninetheme_urip_tipigrof6['font-weight'] ) ; ?>;
	letter-spacing: <?php echo esc_attr( $ninetheme_urip_tipigrof6['letter-spacing'] ) ; ?>;
	line-height:   <?php echo esc_attr( $ninetheme_urip_tipigrof6['line-height'] ) ; ?>;
	text-decoration:<?php echo esc_attr( $ninetheme_urip_tipigrof6['text-decoration'] ) ; ?>;
	text-transform: <?php echo esc_attr( $ninetheme_urip_tipigrof6['text-transform'] ) ; ?>;
	}
	<?php } ?>

	<?php if(ot_get_option('additionalcss')) {
		echo  ot_get_option( 'additionalcss' ) ;
	} ?>

	<?php if(esc_attr( ot_get_option( 'phonelogowidth' ) !='' )) : ?>
	.the-origin-header a.logo img { width:<?php echo esc_attr(ot_get_option('phonelogowidth')); ?>px; }
	<?php endif; ?>

	<?php if(esc_attr( ot_get_option( 'desktopcss' ) !='' )) : ?>
	/* Large desktop */
	@media (min-width: 1200px) { <?php echo esc_attr(ot_get_option('desktopcss')); ?> }
	<?php endif; ?>
	<?php if(esc_attr( ot_get_option( 'landscapecss' ) !='' )) : ?>
	/* Portrait tablet to landscape and desktop */
	@media (min-width: 768px) and (max-width: 979px) { <?php echo esc_attr(ot_get_option('landscapecss')); ?> }
	 <?php endif; ?>
	 <?php if(esc_attr( ot_get_option( 'portraitcss' ) !='' )) : ?>
	/* Landscape phone to portrait tablet */
	@media (max-width: 767px) { <?php echo esc_attr(ot_get_option('portraitcss')); ?> }
	 <?php endif; ?>
	 <?php if(esc_attr( ot_get_option( 'phonescss' ) !='' )) : ?>
	/* Landscape phones and down */
	@media (max-width: 480px) { <?php echo esc_attr(ot_get_option('phonescss')); ?> }
	<?php endif; ?>
	<?php
	//header mini area
	$urip_hmbc 		=	esc_attr( ot_get_option( 'urip_header_mini_bg_color' ) );
	$urip_hmtc		=	esc_attr( ot_get_option( 'urip_header_mini_text_color' ) );
	$urip_hmib		=	esc_attr( ot_get_option( 'urip_header_mini_icon_bg' ) );
	$urip_hmibc		=	esc_attr( ot_get_option( 'urip_header_mini_icon_border' ) );
	$urip_hmic		=	esc_attr( ot_get_option( 'urip_header_mini_icon_color' ) );
	$urip_hmihc		=	esc_attr( ot_get_option( 'urip_header_mini_icon_hover' ) );
	?>
.header-mini-area {background-color:<?php echo esc_attr($urip_hmbc); ?>!important;}
.header-mini-area {color:<?php echo esc_attr($urip_hmtc); ?>!important;}
.header-mini-area .header-social-list > li {background-color:<?php echo esc_attr($urip_hmib); ?>!important;}
.header-mini-area .header-social-list > li {border-color:<?php echo esc_attr($urip_hmibc); ?>!important;}
.header-mini-area .header-social-list > li:hover {background-color:<?php echo esc_attr($urip_hmihc); ?>!important;border-color:<?php echo esc_attr($urip_hmihc); ?>!important;}
.header-mini-area .header-social-list > li a {color:<?php echo esc_attr($urip_hmic); ?>!important;}


	</style>

	<?php if ( ot_get_option( 'additionaljs' ) !='' ): ?>
		<script type="text/javascript">
			<?php if(ot_get_option('additionaljs')) {
				echo  ot_get_option( 'additionaljs' ) ;
			} ?>
		</script>
	<?php endif; ?>

<?php }
add_action('wp_head','urip_custom_styling');
