<?php

/*
Plugin Name: Urip Shortcodes
Plugin URI: http://themeforest.net/user/Ninetheme
Description: Shortcodes for Ninetheme WordPress Themes - urip theme
Version: 8.2.2
Author: Ninetheme
Author URI: http://themeforest.net/user/Ninetheme
*/


// plugin version number for body classes
 function urip_plugin_version_class_names($classes) {
	if(function_exists('vc_set_as_theme')) {
  $urip_plugin_data = get_plugin_data( __FILE__ );
  $urip_plugin_version = $urip_plugin_data['Version'];

  $urip_theme_plugin_version =  'ninetheme-shortcode-plugin-version-' . $urip_plugin_version;

  $classes[] =  $urip_theme_plugin_version;

  return $classes;
 }
}

add_filter('body_class','urip_plugin_version_class_names');

/*-----------------------------------------------------------------------------------*/
/*	heading
/*-----------------------------------------------------------------------------------*/

function urip_vc_session( $atts, $content = null ) {
    extract( shortcode_atts(array(
		"css"       	=> 'show',
		"leftcolumn"    => 'show',
		"overlay"       => '1',
		"mockup_image"  => '',
		"time"       	=> '',
		"adress"        => '',
		"heading"       => '',
		"description"   => '',
		"speakers"      => ''
	), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$output = '';
	$output .= '<div class="session-wrapper '. $css_class . '">';
		$output .= '<div class="row">';

			if ($leftcolumn == 'show'){
				$output .= '<div class="col-lg-4 col-md-4 pull-left no-padding">';
					$output .= '<div class="session-meta">';
					$counter_imgs = wp_get_attachment_url( $mockup_image, 'events' );

						$output .= '<div class="session-meta-thumbnail">';
						if ($overlay == '1'){	$output .= '<div class="color-overlay"></div>'; }
						if ($counter_imgs != ''){	$output .= '<img src="'. esc_url($counter_imgs) . '" alt="Events Venue" />';}
						$output .= '</div> <!-- .session-meta-thumbnail -->';
						$output .= '<div class="session-meta-info">';
							$output .= '<div class="session-info-time">';
								$output .= '<span class="icon-clock4"></span> '. esc_attr($time) . '';
							$output .= '</div> <!--/ .session-info-time -->';
							$output .= '<div class="session-info-place">';
								$output .= '<span class="icon-library"></span> '. esc_attr($adress) . '';
							$output .= '</div> <!--/ .session-info-place -->';
						$output .= '</div> <!-- .session-meta-info -->';
					$output .= '</div> <!--/ .session-meta -->';
				$output .= '</div> <!--/ .col-lg-4 -->';
			}

			$leftcolumnc = ($leftcolumn == 'show') ? 'col-lg-8 col-md-8' : 'col-lg-12 col-md-12';

			$output .= '<div class="'. $leftcolumnc .' no-padding">';
				$output .= '<div class="session-description">';
					$output .= '<h4 class="session-title">'. esc_html($heading) . '</h4>';
					$output .= '<p>'. esc_html($description) . '</p>';
					$output .= '<div class="session-speaker">';
						$output .= '<span class="icon-user-tie"></span> '. esc_html($speakers) . '';
					$output .= '</div> <!--/ .session-speaker -->';
				$output .= '</div> <!--/ .session-description -->';
			$output .= '</div> <!--/ .col-lg-8 -->';
		$output .= '</div> <!--/ .row -->';
	$output .= '</div> <!--/ .session-wrapper -->';

return $output;
}
add_shortcode('vc_session', 'urip_vc_session');


/*-----------------------------------------------------------------------------------*/
/*	break
/*-----------------------------------------------------------------------------------*/

function urip_vc_break( $atts, $content = null ) {
	extract( shortcode_atts(array(
		"time"       => '',
		"description"       => ''
	), $atts) );

	$output = '';
	$output .= '<div class="session-break centered">';
		$output .= '<div class="row">';
			$output .= '<div class="col-lg-12">';
				$output .= '<div class="session-description">';
					$output .= '<div class="session-break-time">';
						$output .= '<span class="icon-clock4"></span> '. esc_attr($time) . '';
					$output .= '</div> <!--/ .session-break-time -->';
					$output .= '<h3 class="session-break-title">'. esc_attr($description) . '</h3>';
				$output .= '</div> <!--/ .session-description -->';
			$output .= '</div> <!-- col-lg-8 -->';
		$output .= '</div> <!--/ .row -->';
	$output .= '</div>';

return $output;
}
add_shortcode('vc_break', 'urip_vc_break');

/*-----------------------------------------------------------------------------------*/
/*	heading
/*-----------------------------------------------------------------------------------*/

function urip_vc_heading( $atts, $content = null ) {
    extract( shortcode_atts(array(
		"position"       => 'centered',
		"offset"       => '2',
		"heading"       => '',
		"slogan"       => ''
	), $atts) );

	$output = '';
	$output .= '<div class="container">';
		$output .= '<div class="row">';
			$output .= '<div class="col-lg-8 col-lg-offset-'. esc_attr($offset) . ' '. esc_attr($position) . '">';
				$output .= '<div class="col-lg-8 col-lg-offset-'. esc_attr($offset) . ' col-md-8 col-md-offset-'. esc_attr($offset) . ' centered">';
				if ($heading != ''){	$output .= '<p class="section-title">'. $heading . '</p>'; }
				if ($slogan != ''){	$output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
				$output .= '</div> <!--/ .col-lg-8 -->';
			$output .= '</div> <!--/ .col-lg-8 -->';

			$output .= '<div class="clearfix"></div>';
		$output .= '</div>';
	$output .= '</div>';
return $output;
}
add_shortcode('vc_heading', 'urip_vc_heading');

/*-----------------------------------------------------------------------------------*/
/*	agen slider  container
/*-----------------------------------------------------------------------------------*/

function urip_vc_timer( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "timer_date"      		=> '2017/12/12',
        "ratio"      		=> '5',
        "css"      		=> '',
        "mockup_image"      		=> '',
        "youtubelink"      		=> '',
        "sectionid"      		=> '',
        "heading"       => '',
        "slogan"       => '',
		'buttononelink' => '',
		'buttononetext' => ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	$counter_imgs = wp_get_attachment_url( $mockup_image, 'large' );

	wp_enqueue_script('nt-countdown');
	?>
	<script type="text/javascript">
		jQuery(document).ready(function( $ ) {
			$('.countdown-timer').countdown('<?php echo $timer_date ?>', function(event) {
			   var $this = $(this).html(event.strftime(''
				+ '<li><span class="time-number">%D</span> <span class="time-name">Days</span></li>'
				+ '<li><span class="time-number">%H</span> <span class="time-name">Hours</span></li>'
				+ '<li><span class="time-number">%M</span> <span class="time-name">Minutes</span></li>'
				+ '<li><span class="time-number">%S</span> <span class="time-name">Seconds</span></li>'));
			});
		});
	</script>
	<?php

	$output = '';
	$output .= '<style>';

		$output .= '#counter'. esc_attr($sectionid) . '  {
		background: url('. esc_url($counter_imgs) . ') ;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		}';

		if ($textcolor != ''){
			$output .= '.hero-content  p, .hero-content h1{color: '. esc_attr($textcolor) . ';}';
		}

	$output .= '</style>';

	$output .= '<section id="counter'. esc_attr($sectionid) . '" class="breaking centered '. $css_class . '" data-stellar-background-ratio="0.'. esc_attr($ratio) . '" >';
		$output .= '<div class="color-overlay">';
		$output .= '<div class="breaking-content">';
		$output .= '<div class="container">';
		$output .= '<div class="row">';
		$output .= '<div class="col-lg-12 centered">';
		$output .= '<h4>'. $heading . '</h4>';
		$output .= '<ul class="countdown-timer center"></ul>';
		$output .= '<p class="sub-lead">'. $slogan . '</p>';
		$output .= '<div id="breaking-subscribe" class=" breaking-subscribe the-subscribe-form">';
		$output .= '<div class="input-group">';
		$output .= ''. do_shortcode($content) . '';
		$output .= '</div> ';
		$output .= '</div> ';
	$output .= ' </div></div></div></div></div></section>';

return $output;
}
add_shortcode('vc_timer', 'urip_vc_timer');

/*-----------------------------------------------------------------------------------*/
/*	event
/*-----------------------------------------------------------------------------------*/

function urip_vc_event_about( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "mockup_image"      => '',
        "youtubelink"      	=> '',
        "sectionid"      	=> '',
        "heading"       	=> '',
        "css"       		=> '',
        "slogan"       		=> '',
		'buttononelink' 	=> '',
		'buttononetext' 	=> ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');

	$output = '';
	$output .= '<section id="introduction'. esc_attr($sectionid) .'" class="centered event-about introductionSection '. $css_class . '">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
				if ($heading != ''){ $output .= '	<p class="section-title">'. $heading . '</p> '; }
				if ($slogan != ''){	$output .= ' <h2 class="section-heading">'. $slogan . '</h2> '; }
			$output .= '</div> ';
				$output .= '<div class="clearfix"></div>';
				$output .= '<div class="col-lg-10 col-lg-offset-1">';
					$output .= '<p>'. $content . '</p>';
				$output .= '</div>';
				if ($buttononetext != ''){
					$output .= '<a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps">'. esc_attr($buttononetext) . '</a>';
				}
				$mockup_images = wp_get_attachment_url( $mockup_image, 'large' );
				$output .= '<div class="clearfix"></div>';
				$output .= '<div class="browser-mockup-wrapper" data-sr="enter bottom over 1s and move 80px wait 0.3s">';
					$output .= '<a href="'. esc_url($youtubelink) . '" class="swipebox-video play-btn animated pulse"><span class="icon-play2"></span></a>';
					$output .= '<img class="margin-top-40" src="'. esc_url($mockup_images) . '" alt="Browser Mockup" />';
				$output .= '</div>';
			$output .= '</div> ';
		$output .= '</div> ';
	$output .= '</section>';
return $output;
}
add_shortcode('vc_event_about', 'urip_vc_event_about');

/*-----------------------------------------------------------------------------------*/
/*	urip 5 header
/*-----------------------------------------------------------------------------------*/

function urip_vc_header_five_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      		=> '',
        "textcolor"      		=> '',
        "sectionid"      		=> '',
        "heading"       => '',
        "slogan"       => '',
        "date"       => '',
        "adress"       => '',
        "ratio"   		=> '',
		'buttononelink' => '',
		'buttononetext' => '',
		'buttontwolink' => '',
		'buttontwotext' => ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$output = '';
	$output .= '<style>';
		if ($textcolor != ''){  $output .= '.hero-content  p, .hero-content h1{color: '. esc_attr($textcolor) . ';}'; }
		$output .= ' .events-hero-container	 small, .events-hero-container	 h1, .events-hero-container	p {color: '. esc_attr($textcolor) . ';} ';
	$output .= '</style>';

	$output .= '<section class="events-hero-container SectionHero '. $css_class . '" heroid="hero'. esc_attr($sectionid) .'" data-stellar-background-ratio="0.'. esc_attr($ratio) . '" data-stellar-vertical-offset="0">
		<div class="container">
			<div class="vertical-center-wrapper">
				<div class="vertical-center-table">
					<div class="vertical-center-content">
						<div class="hero-content row">
							<div class="col-lg-8">
								<p class="lead all-caps text-shadow-small" data-sr="enter right over 1s and move 50px wait 0.3s">'. $heading . '</p>
								<h1 class="all-caps text-shadow-medium" data-sr="enter right over 1s and move 50px wait 0.4s">'. $slogan . '</h1>
								<div class="event-hero-info text-shadow-small" data-sr="enter right over 1s and move 50px wait 0.5s">
									<small><span class="event-hero-icon icon-calendar2"></span>'. esc_attr($date) . '</small>
									<small><span class="event-hero-icon icon-library"></span>'. esc_attr($adress) . '</small>
								</div> ';
								if ($buttononelink != ''){
								$output .= '<div data-sr="enter right over 1s and move 50px wait 0.6s">';
									$output .= '<a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps" rel="vimeo">'. esc_attr($buttononetext) . '</a>';
								$output .= '</div>';
								}
								if ($buttontwolink != ''){
								$output .= '<div data-sr="enter right over 1s and move 50px wait 0.6s">';
									$output .= '<a href="'. esc_url($buttontwolink) . '" class="cta cta-stroke all-caps" rel="vimeo">'. esc_attr($buttontwotext) . '</a>';
								$output .= '</div>';
								}
							$output .= '</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>';
return $output;
}
add_shortcode('vc_header_five_container', 'urip_vc_header_five_container');


/*-----------------------------------------------------------------------------------*/
/*	agen customer first  container
/*-----------------------------------------------------------------------------------*/

function vc_agen_client_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
		'css'      => '',
		'heading'      => '',
		'sectionid'      => ''
    ), $atts) );

	$output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="centered SectionClient">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="client-logo">';
					$output .= '<div class="the-logo col-lg-2 col-md-2">';
					$output .= '	<h5 class="top-logo-text all-caps" data-sr="enter left over 1s and move 50px wait .1s">'. $heading . '</h5>';
					$output .= '</div>';
						$output .= ''. do_shortcode($content) . '';
				$output .= '</div> ';
			$output .= '</div> ';
		$output .= '</div> ';
	$output .= '</section>';
return $output;
}

add_shortcode('vc_client_container', 'vc_agen_client_container');

/*-----------------------------------------------------------------------------------*/
/*	agen client
/*-----------------------------------------------------------------------------------*/

function vc_agen_client_img( $atts, $content = null ) {
    extract( shortcode_atts(array(
		'target'        => 'no',
		'agen_img'      => '',
		'agen_imgs_url' => '',
		'delay'         => ''
    ), $atts) );

	$output = '';
	$output .= '<div class="the-logo col-lg-2 col-md-2 col-sm-3 col-xs-12">';
		$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
		$target = ($target != 'no') ? ' target="_blank"' : '';
		if ($agen_imgs_url != ''){
		$output .= '<a '. esc_attr($target) . ' href="'. esc_url($agen_imgs_url) . '">';
		$output .= '<img src="'. esc_url($agen_imgs) . '" alt="Client Logo" data-sr="scale up 30% wait .'. esc_attr($delay) . 's"/>';
		$output .= '</a>';
		}else {
		$output .= '<a href="#0">';
		$output .= '<img src="'. esc_url($agen_imgs) . '" alt="Client Logo" data-sr="scale up 30% wait .'. esc_attr($delay) . 's"/>';
		$output .= '</a>';
		}
	$output .= '</div> ';
return $output;

}
add_shortcode('vc_client_item', 'vc_agen_client_img');

/*-----------------------------------------------------------------------------------*/
/*	What we do 2
/*-----------------------------------------------------------------------------------*/

function vc_agen_client_two_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
		'css'      					=> '',
		'sectionid'      			=> '',
		'agen_img_r'      			=> '',
		'agen_img_b'      			=> '',
		'agen_img_right_top'      	=> '',
		'agen_img_right_left'      	=> '',
		'agen_img_right_width'      => '',
		'agen_img_right_height'     => '',
		'agen_img_left_top'      	=> '',
		'agen_img_left_left'      	=> '',
		'agen_img_left_width'      	=> '',
		'agen_img_left_height'      => '',
		'imageposition'      		=> '',
		'agen_img_l'      			=> '',
		'agen_img_bottom_position'  => '',
		'agen_img_bottom_height'    => ''
    ), $atts) );

	$agen_img_left 		= wp_get_attachment_url( $agen_img_l, 'large' );
	$agen_img_right 	= wp_get_attachment_url( $agen_img_r, 'large' );
	$agen_img_bottom 	= wp_get_attachment_url( $agen_img_b, 'large' );

	$output = '';
	$output .= '<style>';
	if ($imageposition == 'left'){
		$output .= '.what-we-do-x:after {
		position: absolute;
		top: '. esc_attr($agen_img_right_top) . ' !important;
		right: '. esc_attr($agen_img_right_left) . ' !important;
		width: '. esc_attr($agen_img_right_width) . ' !important;
		height: '. esc_attr($agen_img_right_height) . ' !important;
		background: url('. esc_url($agen_img_right) . ') no-repeat !important;
		content: "";
		}';

		$output .= '.what-we-do-x:before {
		position: absolute;
		top: '. esc_attr($agen_img_left_top) . ' !important;
		left: '. esc_attr($agen_img_left_left) . ' !important;
		width: '. esc_attr($agen_img_left_width) . ' !important;
		height: '. esc_attr($agen_img_left_height) . ' !important;
		background: url('. esc_url($agen_img_left) . ') no-repeat !important;
		content: "";
		}';
	}

	if ($imageposition == 'bottom'){
		$output .= '.SectionIntroduction {
			position: relative;
			overflow: hidden;
			padding-bottom: 662px !important;
		}';

		$output .= '.SectionIntroduction:after {
			position: absolute;
			left: 0;
			bottom: '. esc_attr($agen_img_bottom_position) . ' !important;
			width: 100%;
			height: '. esc_attr($agen_img_bottom_height) . ' !important;
			background: url('. esc_url($agen_img_bottom) . ') top center no-repeat !important;
			content: "" !important;
		}';
	}
	$output .= '</style>';

	if ($imageposition == 'left'){
		$output .= '<section id="'. esc_attr($sectionid) . '" class="centered what-we-do-x what-we-doSection">';
	}
	if ($imageposition == 'bottom'){
		$output .= '<section id="'. esc_attr($sectionid) . '" class="SectionIntroduction centered">';
	}

		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= ''. do_shortcode($content) . '';
			$output .= '</div> ';
		$output .= '</div> ';
	$output .= '</section>';

	return $output;
}

add_shortcode('vc_client_two_container', 'vc_agen_client_two_container');

/*-----------------------------------------------------------------------------------*/
/*	What we do 2
/*-----------------------------------------------------------------------------------*/

function vc_agen_client_img_two( $atts, $content = null ) {
    extract( shortcode_atts(array(
		'heading'      	=> '',
		'a_d'     		=> '',
		'a_d_S'     	=> '',
		'a_heading'     => '',
		'btnlink'      	=> '',
		'slogan'      	=> '',
		'contactbutton' => '',
		'button_w'      => ''
    ), $atts) );

	$btnlink 	= ( $btnlink == '||' ) ? '' : $btnlink;
	$btnlink 	= vc_build_link( $btnlink );
	$btnhref 	= $btnlink['url'];
	$btntitle 	= $btnlink['title'];
	$btntarget 	= $btnlink['target'];

	$blink 		= ( $btnhref != '' )  ? 'href="'.esc_url( $btnhref ).'"' : '';
	$btext 		= ( $btntitle != '' ) ? ''.esc_html( $btntitle ).'' : '';
	$btar 		= ( $btntarget != '' ) ? 'target="'.esc_attr( $btntarget ).'"' : '';

	$output 	= '';
	$output .= '<div class="attention-box">';
		$output .= '<h5 class="all-caps">'. $a_heading . '</h5>';
		$output .= '<p><strong>'. $a_d_S . '</strong> '. $a_d . '</p>';
		$output .= '<a '. $blink . ' '. $btar . ' class="more">'. $btext . '</a>';

	$output .= '</div>';
		$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
		if ($heading != ''){	$output .= '<p class="section-title">'. $heading . '</p>'; }
		if ($slogan != ''){		$output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
		$output .= '</div> ';
		$output .= '<div class="clearfix"></div>';
		$output .= '<div class="col-lg-10 col-lg-offset-1">';
		$output .= ''.$content.'';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
		if ($contactbutton != 'disable'){
			if ($button_w != ''){ $output .= '<a href="#0" class="cta cta-default all-caps contact-trigger">'. esc_attr($button_w) . '</a>'; }
		}else {
			if ($button_w != ''){ $output .= '<a href="#0" class="cta cta-default all-caps">'. esc_attr($button_w) . '</a>'; }
		}
	return $output;
}
add_shortcode('vc_client_item_two', 'vc_agen_client_img_two');


/*-----------------------------------------------------------------------------------*/
/*	What we do 3
/*-----------------------------------------------------------------------------------*/

function urip_vc_what_we_do_event( $atts, $content = null ) {
    extract( shortcode_atts(array(
		'css'      		=> '',
		'sectionid'      		=> '',
		'heading'      		=> '',
		'slogan'      		=> '',
		'video_url'      	=> 'https://www.youtube.com/watch?v=Hhk4N9A0oCA',
		'mockup_image'      => '',
		'mockup_url_d'      => '1',
		'button_title'      => '',
		'button_url'     	=> ''
    ), $atts) );


	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');

	$output  = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="centered Sectionintroduction  '. esc_attr($css_class) . '">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
					if ($heading != ''){	$output .= '<p class="section-title">'. esc_attr($heading) . '</p>'; }
					if ($slogan != '') {	$output .= '<h2 class="section-heading">'. esc_attr($slogan) . '</h2>'; }
				$output .= '</div>';
				$output .= '<div class="clearfix"></div>';
				$output .= '<div class="col-lg-10 col-lg-offset-1">';
					$output .= ''.$content.'';
				$output .= '</div>';

				if ($button_title != 'disable'){$output .= '<a href="'. $button_url . '" class="scroll-to cta cta-default all-caps">'. $button_title . '</a>';}
				$output .= '<div class="clearfix"></div>';

				$output .= '<div class="browser-mockup-wrapper" style="visibility: visible; ">';
					$output .= '<a href="'. $video_url . '" class="swipebox-video play-btn animated pulse"><span class="icon-play2"></span></a>';
					$agen_img_left = wp_get_attachment_url( $mockup_image, 'large' );
					if ($agen_img_left != '') {
					$output .= '<img class="margin-top-40" src="'. $agen_img_left . '" alt="Browser Mockup">';
					}

					if ($mockup_url_d == '1') {
					$output .= '<img class="margin-top-40" src="'.get_stylesheet_directory_uri() .'/images/browser.png" alt="Browser Mockup">';
					}
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';

	return $output;
}
add_shortcode('vc_what_we_do_event', 'urip_vc_what_we_do_event');


/*-----------------------------------------------------------------------------------*/
/*	agen slider  container
/*-----------------------------------------------------------------------------------*/

function urip_vc_header_one_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "mailchimburl"  		=> 'http://ninetheme.us5.list-manage.com/subscribe/post?u=334b9676d304b0adb1983154f&id=05034da93e',
        "watchvideoicon"  		=> '',
        "css"   				=> '',
        "sectionid"   			=> '',
        "slogan"       			=> '',
        "agen_img"       		=> '',
        "color"       			=> '',
        "textcolor"       		=> '',
        "inputbg"       		=> '',
        "buttonbg"       		=> '',
        "buttontextcolor"       => '',
        "helpertext"       		=> '',
        "videobuttonbg"       	=> '',
        "videobuttontextcolor"  => '',
        "heading"       		=> '',
        "watchvideourl"   		=> '',
        "watchvideotext"   		=> '',
        "defaultform"   		=> '',
        "entermail"   			=> '',
        "submitbutton"   		=> '',
        "ratio"   				=> '',
        "emailalert"   			=> '',
		'buttononelink' 		=> '',
		'buttononetext' 		=> '',
		'buttontwolink' 		=> '',
		'buttontwotext' 		=> '',
		'leftbuttonbg' 			=> '',
		'leftbuttontextcolor' 	=> '',
		'rightbuttonbg' 		=> '',
		'rightbuttontextcolor' 	=> '',
		'contactbutton' 		=> '',
		'trigger_where' 		=> '',
		'scrolliconcolor' 		=> ''
    ), $atts) );

	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	?>
	<?php
		if ($defaultform == 'yes'){
		wp_enqueue_script('nt-ajaxchimp');
	?>
		<script type="text/javascript">
			jQuery(document).ready(function( $ ) {
				$('.the-subscribe-form').ajaxChimp({
					callback: mailchimpCallback,
					url: '<?php echo $mailchimburl ?>'
					// Replace the URL above with your mailchimp URL (put your URL inside '').
				});

				// callback function when the form submitted, show the notification box
				function mailchimpCallback(resp) {
					if (resp.result === 'success') {
						$('#subscribe-success-notification').addClass('show-up');
					}
					else if (resp.result === 'error') {
						 $('#subscribe-error-notification').addClass('show-up');
					}
				}
			});
		</script>
	<?php } ?>
	<?php

	$output = '';
	$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
	$output .= '<style>';
	$output .= ''. esc_attr($sectionid) . '  {
		background: '. esc_attr($color) . '  url('. esc_url($agen_imgs) . ') ;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		}';
		if ($textcolor != ''){ 	$output .= '.hero-content  p, .hero-content h1{color: '. esc_attr($textcolor) . ';}';}
	$output .= '</style>';

	$output .= '<section id="'. $sectionid .'" class="SectionHero parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="hero'. esc_attr($sectionid) . '">';
	$output .= '<div class="container">';
	$output .= '<div class="vertical-center-wrapper">';
	$output .= '<div class="vertical-center-table">';
	$output .= '<div class="vertical-center-content">';
	$output .= '<div class="hero-content row centered">';
		$output .= '<div class="col-lg-12">';
			if ($heading != ''){
				$output .= '<p class="lead all-caps text-shadow-small" data-sr="enter top over 1s and move 50px wait 0.4s">'. $heading . '</p>';
			}
			if ($slogan != ''){
				$output .= '<h1 class="all-caps text-shadow-medium" data-sr="enter top over 1s and move 50px wait 0.3s">'. $slogan . '</h1>';
			}
			$output .= '	<div class="row">';
				$output .= '	<div class="hero-subscribe-wrapper col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">';
				if ($defaultform == 'no'){
					$output .= '	<div class="the-subscribe-form-off" data-sr="enter bottom over .5s and move 10px wait 0.3s">';

							$output .= '<div class="input-group">';
								$output .= ''. do_shortcode($content) . '';
							$output .= ' </div> ';

						$output .= '</div>';
					} else {
					$output .= '<form id="hero-subscribe" class="the-subscribe-form" data-sr="enter bottom over .5s and move 10px wait 0.3s">';

						$output .= '<div class="input-group">';
						$output .= '<input type="email" class="form-control" placeholder="'. esc_attr($entermail) . '">';
							$output .= '<span class="input-group-btn">';
							$output .= '<button class="btn btn-subscribe" id="header-subscribe" type="submit">'. esc_attr($submitbutton) . '</button>';
						$output .= '</span>';
						$output .= '</div>';

					$output .= '</form>';
				}
				if ($emailalert != ''){
					$output .= ' <small class="helper-text" data-sr="enter bottom over .5s and move 50px wait 0.3s"> <em>'. esc_attr($emailalert) . '</em></small>';
				}
			$output .= '</div>';
		$output .= '</div>';

		if ($watchvideotext != ''){
			$output .= '<div data-sr="enter top over 1s and move 50px wait 0.5s">';
			$output .= '<a href="'. esc_url($watchvideourl) . '" class="swipebox-video cta cta-transparent all-caps" rel="vimeo"> '. esc_attr($watchvideotext) . ' <span class="'. esc_attr($watchvideoicon) . '"></span></a>';
			$output .= '</div>';
		}

		$trigger = 'contact-trigger';
		if ($trigger_where != 'left' || $trigger_where == ''){
			$trigger_out_right 	= ($contactbutton != 'disable') ? ''. esc_attr($trigger) . '' : '';
			}else {
			$trigger_out_left 	= ($contactbutton != 'disable') ? ''. esc_attr($trigger) . '' : '';
		}

		$output .= '<ul class="inline-cta">';
			if ($buttononelink != ''){
			$output .= '<li data-sr="enter right over 1s wait 0.3s"><a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps '. $trigger_out_left . '">'. esc_html($buttononetext) . '</a></li>';
			}
			if ($buttontwolink != ''){
				$output .= '<li data-sr="enter left  over 1s wait 0.3s"><a href="'. esc_url($buttontwolink) . '" class="cta cta-stroke all-caps '. $trigger_out_right . '">'. esc_html($buttontwotext) . '</a></li>';
			}
		$output .= '</ul> ';

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';

return $output;

}

add_shortcode('vc_header_one_container', 'urip_vc_header_one_container');

/*-----------------------------------------------------------------------------------*/
/*	header 2
/*-----------------------------------------------------------------------------------*/

function urip_vc_header_two_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      				=> '',
        "sectionid"      		=> '',
        "color"      			=> '',
        "rightcolor"      		=> '',
        "slogan"       			=> '',
        "parallax_bg"       	=> '',
        "agen_img"       		=> '',
        "heading"       		=> '',
        "watchvideourl"   		=> '',
        "watchyoutubevideourl"  => '',
        "accheading"   			=> '',
        "acclineone"   			=> '',
        "acclinetwo"   			=> '',
        "loginurl"   			=> '',
        "loginurltext"   		=> '',
        "termsone"   			=> '',
        "termstwo"   			=> '',
        "termsurl"   			=> '',
        "videocontainer"   		=> '',
        "video_c_mobile"   		=> '',
        "lefttextcolor"   		=> '',
        "righttextcolor"   		=> '',
        "rightlinkcolor"   		=> '',
        "ratio"   				=> ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	$parallax = wp_get_attachment_url( $parallax_bg, 'large' );

	$output = '';
	$output .= '<style>';
		$output .= '#hero'. esc_attr($sectionid) . '  { background: '. esc_attr($color) . '  url('. esc_url($parallax) . ') ; -webkit-background-size: cover; -moz-background-size: cover; background-size: cover; }';
		if ($rightcolor != '')			{ $output .= ' .hero-split-right{ background: '. esc_attr($rightcolor) . ' !important; }'; }
		if ($lefttextcolor != '')		{ $output .= '.register-left-column p, .register-left-column h2{color: '. esc_attr($lefttextcolor) . ';}'; }
		if ($righttextcolor != '')		{ $output .= '.register-right-column p, .register-left-column h4{color: '. esc_attr($righttextcolor) . ';}'; }
		if ($rightlinkcolor != '')		{ $output .= '.register-right-column a{color: '. esc_attr($rightlinkcolor) . ';}'; }
		if ($videocontainer == 'hide')	{ $output .= ' .embed-responsive-container{display: none !important;} '; }
		if ($video_c_mobile == 'hide')	{ $output .= ' @media (max-width: 767px) { .embed-responsive-container{ display: none !important; } } '; }
	$output .= '</style>';

	$output .= '<section class="SectionHero parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="hero'. esc_attr($sectionid) . '">';
	$output .= '<div class="hero-split-right"></div>';
	$output .= '<div class="container">';
		$output .= '<div class="vertical-center-wrapper">';
			$output .= '<div class="vertical-center-table">';
				$output .= '<div class="vertical-center-content">';
				$output .= '	<div class="hero-content row">';

						// start column
						$output .= '<div class="col-lg-6 col-md-6  margin-top-40 register-left-column">';
							if ($heading != ''){ 	$output .= '<p class="lead zero-bottom text-shadow-xsmall" data-sr="enter top over 1s and move 50px wait 0.4s">'. $heading . '</p>';  }
							if ($slogan != ''){ 	$output .= '<h2 class="text-shadow-medium" data-sr="enter top over 1s and move 50px wait 0.3s">'. $slogan . '</h2>'; }

							$output .= '<div class="row embed-responsive-container">';
								$output .= '<div class="col-lg-10">';
									$output .= '<div class="embed-responsive embed-responsive-16by9" data-sr="enter bottom over 1s and move 75px">';
										if ($watchvideourl != ''){
										$output .= '<iframe src="https://player.vimeo.com/video/'. esc_attr($watchvideourl) . '?color=19a9e5&title=0&byline=0&portrait=0" width="470" height="265" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
										}
										if ($watchyoutubevideourl != ''){
										$output .= '<iframe width="470" height="265" src="'. $watchyoutubevideourl . '" frameborder="0" allowfullscreen></iframe>';
										}
										if ($agen_img != ''){
										$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
										$output .= '<img src="'. $agen_imgs . '" alt="'. $heading . '">';
										}
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
						// end column

						// start column
						$output .= '<div class="hero-form-wrapper col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 centered" data-sr="over 1.25s">';
							if ($accheading != ''){ $output .= '	<h4 class="all-caps margin-bot-15">'. esc_attr($accheading) . '</h4>'; }
							$output .= '<p class="zero-bottom">';
							if ($acclineone != ''){ $output .= ''. esc_attr($acclineone) . '<br>'; }
							if ($loginurl != '')  { $output .= ''. esc_attr($acclinetwo) . '<a href="'. esc_url($loginurl) . '" class="more">'. esc_attr($loginurltext) . '</a>'; }
							$output .= '</p>';
							$output .= '<div class="register-form margin-top-32 margin-bot-5" id="register-form">';
								$output .= ''. do_shortcode($content) . '';
							$output .= '</div> ';
							if ($termstwo != ''){ $output .= '<p class="zero-bottom">'. esc_attr($termsone) . '<a href="'. esc_url($termsurl) . '" class="more">'. esc_attr($termstwo) . '</a></p>'; }
						$output .= '</div>';
						// end column

					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div> ';
	$output .= '</div> ';
	$output .= '</section>';
return $output;

}

add_shortcode('vc_header_two_container', 'urip_vc_header_two_container');

/*-----------------------------------------------------------------------------------*/
/*	header 2
/*-----------------------------------------------------------------------------------*/

function urip_vc_header_three_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      					=> '',
        "watchvideotext"      		=> '',
        "watchvideourl"      		=> '',
        "bottomidicon"      		=> '',
        "watchvideoicon"      		=> '',
        "sectionid"      			=> '',
        "bottomid"      			=> '',
        "slogan"       				=> '',
        "parallax_bg"       		=> '',
        "heading"       			=> '',
        "color"       				=> '',
        "textcolor"       			=> '',
		"ratio"   					=> '',
		'sliderone' 				=> '',
		'slidertwo' 				=> '',
		'sliderthree' 				=> '',
		'sliderfour' 				=> '',
		'buttononelink' 			=> '',
		'buttononetext' 			=> '',
		'buttontwolink' 			=> '',
		'buttontwotext' 			=> '',
		'buttonthreelink' 			=> '',
		'buttonthreetext' 			=> '',
		'leftbuttonbg' 				=> '',
		'leftbuttontextcolor' 		=> '',
		'rightbuttonbg' 			=> '',
		'rightbuttontextcolor' 		=> '',
		'threebuttontextcolor' 		=> '',
		'threebuttonbg' 			=> '',
		'contactbutton' 			=> '',
		'scrolliconcolor'		 	=> ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	wp_enqueue_script('nt-animatedHeadline');
	$parallax = wp_get_attachment_url( $parallax_bg, 'large' );
	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');

	$output = '';
	$output .= '<style>';
		$output .= '#hero'. esc_attr($sectionid) . '  {
		background: '. esc_attr($color) . '  url('. esc_url($parallax) . ') ;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		}';

		if ($textcolor != ''){
			$output .= '.hero-content  p, .hero-content h1, .animated-headline.slide b{color: '. esc_attr($textcolor) . ';}';
		}

		if ($leftbuttonbg != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta{background-color: '. esc_attr($leftbuttonbg) . '; border-color: '. esc_attr($leftbuttonbg) . ';}';
		}
		if ($leftbuttontextcolor != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta{color: '. esc_attr($leftbuttontextcolor) . ';}';
		}
		if ($rightbuttonbg != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta-stroke{background-color: '. esc_attr($rightbuttonbg) . '; border-color: '. esc_attr($rightbuttonbg) . ';}';
		}
		if ($rightbuttontextcolor != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta-stroke{color: '. esc_attr($rightbuttontextcolor) . ';}';
		}

		if ($threebuttonbg != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta-stroke.button-three{background-color: '. esc_attr($threebuttonbg) . '; border-color: '. esc_attr($threebuttonbg) . ';}';
		}
		if ($threebuttontextcolor != ''){
			$output .= '#hero'. esc_attr($sectionid) . ' .hero-content a.cta-stroke.button-three{color: '. esc_attr($threebuttontextcolor) . ';}';
		}
		if ($scrolliconcolor != ''){
			$output .= '#hero'. esc_attr($sectionid) . '.scroll-link{color: '. esc_attr($scrolliconcolor) . ';}';
		}
	$output .= '</style>';

	$output .= '<section class="SectionHero parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="hero'. esc_attr($sectionid) . '">';
		$output .= '<div class="container">';
			$output .= '<div class="vertical-center-wrapper">';
				$output .= '<div class="vertical-center-table">';
					$output .= '<div class="vertical-center-content">';
					$output .= '	<div class="hero-content row centered">';
							$output .= '<div class="col-lg-12">';

								if ($heading != ''){
								$output .= '<p class="lead all-caps text-shadow-small margin-bot-30" data-sr="enter bottom over 1s and move 50px wait 0.4s">'. $heading . '</p>';
								}
								if ($slogan != ''){
								$output .= '<h1 class="all-caps text-shadow-medium" data-sr="enter bottom over 1s and move 50px wait 0.3s">'. $slogan . '</h1>';
								}

								$output .= '<h1 class="all-caps animated-headline slide" data-sr="enter bottom over 1s and move 50px wait 0.3s">';
									$output .= '<span class="animated-words-wrapper">';
										if ($sliderone != ''){
										$output .= '<b class="is-visible">'. esc_attr($sliderone) . '</b>';
										}
										if ($slidertwo != ''){
										$output .= '<b>'. esc_attr($slidertwo) . '</b>';
										}
										if ($sliderthree != ''){
										$output .= '<b>'. esc_attr($sliderthree) . '</b>';
										}
										if ($sliderfour != ''){
										$output .= '<b>'. esc_attr($sliderfour) . '</b>';
										}
									$output .= '</span>';
								$output .= '</h1>';

								$output .= '<ul class="inline-cta">';
								if ($buttononelink != ''){
									$output .= '<li data-sr="enter right over 1s wait 0.3s"><a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps button-one">'. esc_attr($buttononetext) . '</a></li>';
								}
								if ($buttontwolink != ''){
									if ($contactbutton != 'disable'){
									$output .= '<li data-sr="enter left  over 1s wait 0.3s"><a href="'. esc_url($buttontwolink) . '" class="cta cta-stroke all-caps contact-trigger button-two">'. esc_attr($buttontwotext) . '</a></li>';
									}else {
									$output .= '<li data-sr="enter left  over 1s wait 0.3s"><a href="'. esc_url($buttontwolink) . '" class="cta cta-stroke all-caps button-two">'. esc_attr($buttontwotext) . '</a></li>';
									}
								}
								if ($buttonthreetext != ''){
									if ($contactbutton != 'disable'){
										$output .= '<li data-sr="enter left  over 1s wait 0.3s"><a href="'. esc_url($buttonthreelink) . '" class="cta cta-stroke all-caps contact-trigger button-three">'. esc_attr($buttonthreetext) . '</a></li>';
										}else {
										$output .= '<li data-sr="enter left  over 1s wait 0.3s"><a href="'. esc_url($buttonthreelink) . '" class="cta cta-stroke all-caps button-three">'. esc_attr($buttonthreetext) . '</a></li>';
									}
								}
								$output .= '</ul> ';

								if ($watchvideotext != ''){
								$output .= '<div data-sr="enter top over 1s and move 50px wait 0.5s">';
									$output .= '<a href="'. esc_url($watchvideourl) . '" class="swipebox-video cta cta-transparent all-caps" rel="vimeo"> '. esc_attr($watchvideotext) . ' <span class="'. esc_attr($watchvideoicon) . '"></span></a>';
								$output .= '</div>';
						}

								if ($bottomid != ''){
								$output .= '<a href="#'. esc_attr($bottomid) . '" class="scroll-to scroll-link"><span class="'. esc_attr($bottomidicon) . '" data-sr="enter top top 1s and move 50px wait 0.3s"></span></a>';
								}

							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div> ';
		$output .= '</div> ';
	$output .= '	</section>';


return $output;

}

add_shortcode('vc_header_three_container', 'urip_vc_header_three_container');
/*-----------------------------------------------------------------------------------*/
/*	header 4
/*-----------------------------------------------------------------------------------*/

function urip_vc_header_four_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      		=> '',
        "sectionid"      		=> '',
		"heading"       => '',
        "slogan"       => '',
        "parallax_bg"       => '',
        "playstore_bg"       => '',
        "appstore_bg"       => '',
        "mockup_bg"       => '',
        "icon_bg"       => '',
		 "ratio"   		=> '',
		'buttononelink' => '',
		'textcolor' => '',
		'color' => '',
		'buttontwolink' => ''
    ), $atts) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$parallax = wp_get_attachment_url( $parallax_bg, 'large' );
		$output = '';
		$output .= '<style>';
		$output .= '#hero'. esc_attr($sectionid) . '  {
			background: '. esc_attr($color) . '  url('. esc_url($parallax) . ') ;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
			}';

			if ($textcolor != ''){ $output .= '.hero-content  p, .hero-content h1, .animated-headline.slide b{color: '. esc_attr($textcolor) . ';}'; }
		$output .= '</style>';
		$output .= '<section class="SectionHero parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="hero'. esc_attr($sectionid) . '">';
			$output .= '<div class="color-overlay">';
			$output .= '<div class="container">';
				$output .= '<div class="vertical-center-wrapper">';
					$output .= '<div class="vertical-center-table">';
						$output .= '<div class="vertical-center-content">';
						$output .= '	<div class="hero-content row">';


								$output .= '<div class="hero-app-content-left col-lg-4 col-md-4 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-6 col-xs-offset-3" data-sr="enter bottom over 1s and move 200px wait 0.5s">';
									if ($mockup_bg != ''){
										$output .= '<div class="hero-mockup">';
										$mockup = wp_get_attachment_url( $mockup_bg, 'large' );
										$output .= '	<img src="'. esc_url($mockup) . '" alt="'. $heading . '" />';
										$output .= '</div> <!--/ .hero-mockup -->';
									}
									$output .= '</div> <!--/ .hero-app-content-left -->';

									$output .= '<div class="hero-app-content-right col-lg-8 col-md-8 col-sm-12 col-xs-12">';
									if ($icon_bg != ''){
										$icon = wp_get_attachment_url( $icon_bg, 'large' );
										$output .= '<img class="margin-bot-32 visible-lg visible-md" src="'. esc_url($icon) . '" alt="App Icon">';
									}
									if ($heading != ''){
										$output .= '<p class="lead all-caps">'. $heading . '</p>';
									}
										if ($slogan != ''){
										$output .= '<h1 class="all-caps margin-bot-15">'. $slogan . '</h1>';
										}
										$output .= '<ul class="inline-cta" data-sr="enter bottom over 1s and move 100px wait 0.6s">';
											if ($buttononelink != ''){
											$output .= '<li>';
											$output .= '<a href="'. esc_url($buttononelink) . '" class="store-btn">';
												$appstore = wp_get_attachment_url( $appstore_bg, 'large' );
												$output .= '<img src="'. esc_url($appstore) . '" alt="Appstore"/>';
												$output .= '</a>';
											$output .= '</li>';
											}
											if ($buttontwolink != ''){
											$output .= '<li>';
												$output .= '<a href="'. esc_url($buttontwolink) . '" class="store-btn">';
												$playstore = wp_get_attachment_url( $playstore_bg, 'large' );
													$output .= '<img src="'. esc_url($playstore) . '" alt="Playstore"/>';
													$output .= '</a>';
											$output .= '</li>';
											}
										$output .= '</ul>';

								$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div> ';
			$output .= '</div> ';
		$output .= '	</section>';


return $output;

}

add_shortcode('vc_header_four_container', 'urip_vc_header_four_container');

/*-----------------------------------------------------------------------------------*/
/*	agen heading
/*-----------------------------------------------------------------------------------*/

function vc_agen_slider_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
       "watchvideotexts"   		=> ''
    ), $atts) );

	$output = '';
	$output .= ''. esc_url($watchvideotexts) . '';
	return $output;

}

add_shortcode('vc_header_one_content', 'vc_agen_slider_item');

/*-----------------------------------------------------------------------------------*/
/*	agen services container
/*-----------------------------------------------------------------------------------*/

function vc_agen_services_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      		=> '',
        "sectionid"      		=> ''
    ), $atts) );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="gray-bg centered how-it-worksSection '. $css_class . '">';
		$output .= '<div class="container-full">';
			$output .= '<div class="row">';
				$output .= '<ul class="how-it-works-col">';
					$output .= ''. do_shortcode($content) . '';
				$output .= '</ul>';
				$output .= '</div>';
			$output .= '</div>';
	$output .= '</section>';
	return $output;
}

add_shortcode('vc_services_container', 'vc_agen_services_container');

/*-----------------------------------------------------------------------------------*/
/*	agen services 1 item
/*-----------------------------------------------------------------------------------*/

function vc_agen_services_item_one( $atts, $content = null ) {
   extract( shortcode_atts(array(
      "heading"       	=> '',
      "bgclass"       	=> '',
      "agen_img"   		=> '',
      "agen_img_back"   	=> '',
      "delay"   			=> '',
      "disablearrow"      => '',
      "disable"         => 'no',
      "buttononelink"     => '',
      "buttononetext"     => ''
   ), $atts) );

	$img_back_s = wp_get_attachment_url( $agen_img_back, 'large' );

	$output = '';
	$output .= '<style>';
   	if ($disable != 'yes' ){
		$output .= 'ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover  {
		  background: url('. $img_back_s . ') no-repeat center center !important;
		}';
      }
		if ($buttononelink != ''){
			$output .= ' ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ' .how-it-works-info:after{
			background: none !important;
			}';
		}

		if ($disablearrow != 'hide' ){
			$output .= ' 	ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ' .how-it-works-info:after{
			  display: block; margin-top: 32px; width: 100%; height: 50px;  background: url( '.get_stylesheet_directory_uri() .'/images/arrow.png) no-repeat right;
			  content: "";
			}';
		}
		if ($disable == 'yes' ){
			$output .= '
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-title {
             opacity: 1 !important;
         }
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover {
             background: none !important;
         }
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-info {
             visibility: hidden !important;
         }
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-title img {
            opacity: 1 !important;
         }
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-info,
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-info p,
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-info p strong,
         ul.how-it-works-col li.bgclass'. esc_attr($bgclass) . ':hover .how-it-works-title h4 {
            color: #2a2a2a !important;
         }
         ';
		}
	$output .= '</style>';

	$output .= '<li class="col-lg-4 col-md-4 col-sm-4 bgclass'. esc_attr($bgclass) . ' ">';
		$output .= '<div class="how-it-works-title">';

		$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
		$output .= '<img src="'. $agen_imgs . '" alt="'. $heading . '" data-sr="enter bottom over 1s and move 80px wait '. esc_attr($delay) . 's">';
		$output .= '<h4>'. $heading . '</h4>';
			$output .= '</div> ';

			$output .= '<div class="how-it-works-info">';
			if ($heading != ''){	$output .= '<h4>'. $heading . '</h4>'; }
				$output .= '<p> '.$content.'</p> ';
			if ($buttononelink != ''){ 	$output .= '	<a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps">'. esc_attr($buttononetext) . '</a>'; }
			$output .= '</div> ';
	$output .= '</li> ';
	return $output;
}

add_shortcode('vc_services_item_one', 'vc_agen_services_item_one');



/*-----------------------------------------------------------------------------------*/
/*	agen services 2
/*-----------------------------------------------------------------------------------*/

function agen_vc_services_section_two( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"      		=> '',
        "heading"      		=> '',
        "sectionid"       => '',
        "slogan"       => '',
        'buttononelink'       => '',
		'buttononetext'       => '',
		'custom_url'       => '',
		'contact'       => ''
    ), $atts) );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

		$output = '';
		$output .= '<section id="'. esc_attr($sectionid) . '" class="'. $css_class . '">';
				$output .= '<div class="container">';
					$output .= '<div class="row">';

						$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
						if ($heading != ''){ $output .= '<p class="section-title">'. $heading . '</p>'; }
						if ($slogan != ''){ $output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
						$output .= '</div> ';
						$output .= '<div class="clearfix"></div>';

							$output .= ''. do_shortcode($content) . '';

						$output .= '<div class="clearfix"></div>';
						$output .= '<div class="col-lg-12 centered n-margin-top-20">';
							if ($contact != 'no'){
								$output .= '<a  class="cta cta-default all-caps contact-trigger">'. esc_attr($buttononetext) . '</a>';
							}

							if ($custom_url != 'no'){
								$output .= '<a href="'. esc_url($buttononelink) . '" class="cta cta-default all-caps">'. esc_attr($buttononetext) . '</a>';
							}
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</section>';
		return $output;
}

add_shortcode('vc_services_section_two', 'agen_vc_services_section_two');

/*-----------------------------------------------------------------------------------*/
/*	agen services 2 item
/*-----------------------------------------------------------------------------------*/

function vc_agen_services_item_two( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "icon"     	=> '',
        "heading"       => '',
        "description"   => '',
        "buttononelink"   		=> '',
        "buttononetext"   		=> ''
    ), $atts) );

	$output = '';
	$output .= '<div class="the-feature col-lg-4 col-md-4 col-sm-6">';
		if ($buttononelink != ''){ $output .= '<a href="'. esc_attr($buttononelink) . '">'; }
		if ($icon != ''){		$output .= '<span class="feature-icon icon-'. esc_attr($icon) . '"></span>'; }
		if ($heading != ''){		$output .= '<h4 class="feature-title">'. $heading . '</h4>'; }
		if ($description != ''){	$output .= '<p>'. esc_attr($description) . '</p>'; }
		if ($buttononelink != ''){ $output .= '</a>'; }
		$output .= '</div>';
	 return $output;
}

add_shortcode('vc_services_item_two', 'vc_agen_services_item_two');

/*-----------------------------------------------------------------------------------*/
/*	agen services 3
/*-----------------------------------------------------------------------------------*/

function urip_vc_urip_tab_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
		"css"      		=> '',
		"sectionid"     => '',
		"heading"      	=> '',
        "agen_img"      => '',
        "hide_left"     => '',
        "hide_right"    => '',
        "color"         => '',
        'quotedesc'     => '',
		'quoteheading'  => ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	wp_enqueue_script('expandableGallery');
	wp_enqueue_style('expandableGallery');

	$output = '';
	$output .= '<style>';
		$output .= '.featurettes-quote-wrapper .vertical-center-content {background:'. esc_attr($color) . ' !important;}';

		if ($agen_img != ''){
		$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
		$output .= '.featurettes-quote-wrapper  { background: url("'. $agen_imgs . '") no-repeat center center !important;     background-size: cover !important; }'; }
	$output .= '</style>';

	$output .= '<section id="'. esc_attr($sectionid) . '" class="expandable-gallery gray-bg no-padding '. $css_class . '">';
		$output .= '<div class="container-full">';
			$output .= '<div class="row">';

			$half = 'col-lg-6 col-md-6';
			$full = 'col-lg-12 col-md-12';
			$left_out 	= ($hide_left 	== 'v') ? ''. $full . '' : ''. $half . '';
			$right_out 	= ($hide_right 	== 'v')? ''. $full . '' : ''. $half . '';


				if ( $hide_left == 'v' || $hide_left == '' ){
					$output .= '<div class="two-blocks-col '. $left_out . ' ">';
						if ($heading != ''){  	$output .= '<h3>'. $heading . '</h3>'; }
						$output .= '<div class="content-tab-wrapper" role="tabpanel">';
							$output .= ''. do_shortcode($content) . '';
						$output .= '</div> ';
					$output .= '</div> ';
				}

				if ( $hide_right == 'v' || $hide_right == '' ){
					$output .= '<div class="featurettes-quote-wrapper '. $right_out . ' no-padding">';
						$output .= '<div class="vertical-center-wrapper">';
							$output .= '<div class="vertical-center-table">';
								$output .= '<div class="vertical-center-content">';
									$output .= '<div class="featurettes-quote centered">';
									if ($quotedesc != ''){ 			$output .= ''. esc_attr($quotedesc) . ''; }
									if ($quoteheading != ''){ 			$output .= '<h4 class="featurettes-quote-author">- '. esc_attr($quoteheading) . '</h4>'; }
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}

			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';

	return $output;
}

add_shortcode('vc_urip_tab_container', 'urip_vc_urip_tab_container');


/*-----------------------------------------------------------------------------------*/
/*	agen servicesitem3
/*-----------------------------------------------------------------------------------*/

function urip_vc_urip_tab_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "iconone"     	=> '',
        "icontwo"     	=> '',
        "iconthree"     	=> '',
        "iconfour"     	=> '',
        "iconsix"     	=> '',
        "headingone"       => '',
        "headingtwo"       => '',
        "headingthree"       => '',
        "headingfour"       => '',
        "headingsix"       => '',
        "descriptionone"   => '',
        "descriptiontwo"   => '',
        "descriptionthree"   => '',
        "descriptionfour"   => '',
        "descriptionsix"   => '',
        "linkone"   		=> '',
        "linktwo"   		=> '',
        "linkthree"   		=> '',
        "linkfour"   		=> '',
        "linksix"   		=> ''
    ), $atts) );

		$output = '';
		$output .= '<ul class="nav nav-tabs" role="tablist">';
			if ($headingone != ''){ $output .= '<li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab"> <span class="icon-'. esc_attr($iconone) . '"></span>'. esc_attr($headingone) . '</a></li>'; }
			if ($headingtwo != ''){ $output .= '<li role="presentation"><a href="#second" aria-controls="second" role="tab" data-toggle="tab">				<span class="icon-'. esc_attr($icontwo) . '"></span>'. esc_attr($headingtwo) . '</a></li>';}
			if ($headingthree != ''){ $output .= '<li role="presentation"><a href="#third" aria-controls="second" role="tab" data-toggle="tab">				<span class="icon-'. esc_attr($iconthree) . '"></span>'. esc_attr($headingthree) .'</a></li>';}
			if ($headingfour != ''){ $output .= '<li role="presentation"><a href="#fourth" aria-controls="third" role="tab" data-toggle="tab">				<span class="icon-'. esc_attr($iconfour) . '"></span>'. esc_attr($headingfour) . '</a></li>';}
			if ($headingsix != ''){ $output .= '<li role="presentation"><a href="#fifth" aria-controls="fourth" role="tab" data-toggle="tab">				<span class="icon-'. esc_attr($iconsix) . '"></span>'. esc_attr($headingsix) . '</a></li>';}
		$output .= '</ul>';

			$output .= '<div class="tab-content">';
				if ($headingone != ''){
				$output .= '<div role="tabpanel" class="tab-pane in active" id="first">';
					$output .= '<p>'. $descriptionone . '</p>';
					if ($linkone != ''){ $output .= '<a href="'. esc_attr($linkone) . '" class="more">'.esc_html__('Read More', 'urip').'</a>'; }
				$output .= '</div> ';
				}
				if ($headingtwo != ''){
				$output .= '<div role="tabpanel" class="tab-pane" id="second">';
					$output .= '<p>'. $descriptiontwo . '</p>';
					if ($linktwo != ''){ $output .= '<a href="'. esc_attr($linktwo) . '" class="more">'.esc_html__('Read More', 'urip').'</a>'; }
				$output .= '</div> ';
				}
				if ($headingthree != ''){
				$output .= '<div role="tabpanel" class="tab-pane" id="third">';
					$output .= '<p>'. $descriptionthree . '</p>';
					if ($linkthree != ''){ $output .= '	<a href="'. esc_attr($linkthree) . '" class="more">'.esc_html__('Read More', 'urip').'</a>'; }
				$output .= '</div> ';
				}
				if ($headingfour != ''){
				$output .= '<div role="tabpanel" class="tab-pane" id="fourth">';
					$output .= '<p>'. $descriptionfour . '</p>';
					if ($linkfour != ''){ $output .= '<a href="'. esc_attr($linkfour) . '" class="more">'.esc_html__('Read More', 'urip').'</a>'; }
				$output .= '</div> ';
				}
				if ($headingsix != ''){
				$output .= '<div role="tabpanel" class="tab-pane" id="fifth">';
					$output .= '<p>'. $descriptionsix . '</p>';
					if ($linksix != ''){ $output .= '	<a href="'. esc_attr($linksix) . '" class="more">'.esc_html__('Read More', 'urip').'</a>'; }
				$output .= '</div> ';
				}
			$output .= '</div>';
		 return $output;
}

add_shortcode('vc_urip_tab_item', 'urip_vc_urip_tab_item');


/*-----------------------------------------------------------------------------------*/
/*	agen services 3
/*-----------------------------------------------------------------------------------*/

function urip_vc_urip_progress_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
		"sectionid"      		=> '',
		"heading"      		=> '',
        "agen_img"       		=> '',
        "color"       		=> '',
        'quotedesc'       => '',
		'quoteheading'       => ''
    ), $atts) );

	wp_enqueue_script('expandableGallery');
	wp_enqueue_style('expandableGallery');

	$output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="expandable-gallery gray-bg no-padding">';
		$output .= '<div class="container-full">';
			$output .= '<div class="row">';
				$output .= '<div class="two-blocks-col col-lg-6 col-md-6">';
				if ($heading != ''){  $output .= '<h3>'. $heading . '</h3>'; }
				$output .= ''. do_shortcode($content) . '';
				$output .= '</div> ';

				$output .= '<style>';
				$output .= '.featurettes-quote-wrapper .vertical-center-content {background:'. esc_attr($color) . ' !important;}';
				if ($agen_img != ''){
				$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
				$output .= '.featurettes-quote-wrapper  {
				background: url("'. $agen_imgs . '") no-repeat center center !important;
				}'; }
				$output .= '</style>';

				$output .= '<div class="featurettes-quote-wrapper col-lg-6 col-md-6 no-padding">';
					$output .= '<div class="vertical-center-wrapper">';
						$output .= '<div class="vertical-center-table">';
							$output .= '<div class="vertical-center-content">';
								$output .= '<div class="featurettes-quote centered">';
								if ($quotedesc != ''){		$output .= ''. esc_attr($quotedesc) . ''; }
								if ($quoteheading != ''){		$output .= '<h4 class="featurettes-quote-author">- '. esc_attr($quoteheading) . '</h4>'; }
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';

	return $output;
}

add_shortcode('vc_urip_progress_container', 'urip_vc_urip_progress_container');

/*-----------------------------------------------------------------------------------*/
/*	agen servicesitem3
/*-----------------------------------------------------------------------------------*/

function urip_vc_urip_progress_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "heading"     	=> '',
        "color"     	=> '',
        "value"     	=> ''
    ), $atts) );

	$output = '';
	$output = '<div id="skillbar" class="skill-bar-wrapper"></div> ';
		$output .= '<div class="skill-bar-wrapper"> ';
			if ($heading != ''){ $output .= '<p class="progress-title">'. $heading . '</p> '; }
			$output .= '<div class="progress"> ';
			$output .= '	<div class="progress-bar '. $color . '-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-percent="'. $value . '%"></div> ';
			$output .= '</div>';
		$output .= '</div>';
	 return $output;
}

add_shortcode('vc_urip_progress_item', 'urip_vc_urip_progress_item');


/*-----------------------------------------------------------------------------------*/
/*	counter
/*---------------------------------- -------------------------------------------------*/

function urip_vc_urip_counter_item_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "delay"       => '10',
        "time"       => '1000',
        "css"       => '',
        "color"       => '',
        "iconcolor"       => '',
        "countercolor"       => '',
        "countercolortitle"       => '',
        "agen_img"       => '',
		"ratio"   		=> '',
        "sectionid"       => ''
    ), $atts) );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	wp_enqueue_script('nt-counterup');
	wp_enqueue_script('nt-custom-counter');
	wp_localize_script('nt-custom-counter', 'countedit' , array( $delay, $time ));

	$output = '';
	$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
	$output .= '<style>';
		$output .= '#counter'. esc_attr($sectionid) . '  {
		background: '. esc_attr($color) . '  url('. esc_url($agen_imgs) . ') ;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		}';
		if ($iconcolor != ''){ $output .= '#counter'. esc_attr($sectionid) . ' .urip-orange-color{color: '. esc_attr($iconcolor) . ';}'; }
		if ($countercolor != ''){  $output .= '#counter'. esc_attr($sectionid) . ' .counter{color: '. esc_attr($countercolor) . ';}'; }
		if ($countercolortitle != ''){  $output .= '#counter'. esc_attr($sectionid) . ' .counter-title{color: '. esc_attr($countercolortitle) . ';}'; 	}

	$output .= '</style>';
		$output .= '<section id="counter'. esc_attr($sectionid) . '" class="parallax-sections breaking centered counter'. esc_attr($sectionid) . ' counterSection '. $css_class . '" data-stellar-background-ratio="0.'. esc_attr($ratio) . '">';
				$output .= '<div class="color-overlay">';
					$output .= '<div class="breaking-content">';
						$output .= '<div class="container">';
							$output .= '<div class="row">';
								$output .= ''. do_shortcode($content) . '';
								$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</section>';
		return $output;
}

add_shortcode('urip_counter_item_container', 'urip_vc_urip_counter_item_container');

/*-----------------------------------------------------------------------------------*/
/*	agen servcies item 4
/*-----------------------------------------------------------------------------------*/

function urip_vc_urip_counter_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "icon"     	=> '',
        "heading"       => '',
        "color"   => '',
        "counter"   		=> '',
        "icondelays"   		=> ''
    ), $atts) );

	$output = '';
	$output .= '<style>';
	$output .= '	icon-'. esc_attr($icon) . '.urip-orange-color { color: '. esc_attr($color) . ' ; } ';
	$output .= '</style>';

	$output .= '<div class="col-lg-3 col-md-3 col-sm-3">';
	if ($icon != ''){$output .= '<span class="counter-icon icon-'. esc_attr($icon) . ' urip-orange-color" data-sr="scale up 20% wait '. esc_attr($icondelays) . 's"></span>'; }
	if ($counter != ''){		$output .= '<span class="counter">'. esc_attr($counter) . '</span>'; }
	if ($heading != ''){		$output .= '<span class="counter-title">'. $heading . '</span>'; }
	$output .= '</div>';
	return $output;
}

add_shortcode('urip_counter_item', 'urip_vc_urip_counter_item');


/*-----------------------------------------------------------------------------------*/
/*	features 2
/*-----------------------------------------------------------------------------------*/

function urip_vc_features_two_container( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'css'           => '',
		'images'        => '',
		'heading'       => '',
		'description'   => '',
		'thumb_size'    => 'full-size',
		'sectionid'     => '',
		'number'        => '',
		'buttononelink' => '',
		'buttononetext' => ''
    ), $atts ) );

	$array_images = explode(",", $images);

	wp_enqueue_script('expandableGallery');
	wp_enqueue_style('expandableGallery');

	$clientItem = '';
	$clientItem .= '<section id="'. esc_attr($sectionid) . '" class="expandable-gallery'. esc_attr($number) . ' gray-bg no-padding workingon">';
	$clientItem .= '<div class="container-full">';
	$clientItem .= '<div class="row">';
	$clientItem .= '<div class="expandable-gallery-wrapper col-lg-6 col-md-6 no-padding">';
		$clientItem .= '<ul class="expandable-gallery-item">';
			$count = $images;
			$i = 0;
			foreach($array_images as $single_image) {
				$img_size = '';
					$img_size = wpb_getImageBySize(array('attach_id' => (int)$single_image, 'thumb_size' => $thumb_size));
				$clientItem .='<li class="selecteds">';
					$clientItem .= $img_size['thumbnail'];
				$clientItem .='</li>';
			}
			$i++;
		$clientItem .= '</ul>';

		$clientItem .= '<ul class="expandable-gallery-nav">';
			$clientItem .= '<li><a href="#0" class="expand-prev inactive">Next</a></li>';
			$clientItem .= '<li><a href="#0" class="expand-next">Prev</a></li>';
		$clientItem .= '</ul>';

		$clientItem .= '<a href="#0" class="expandable-close">Close</a>';

	$clientItem .= '</div>';

	$clientItem .= '<div class="expandable-gallery-info two-blocks-col col-lg-6 col-md-6">';
		if ($heading != '')		{	$clientItem .= '<h3>'. $heading . '</h3>';   }
		if ($description != '')	{	$clientItem .= '<p>'. $description . '</p>'; }
				$clientItem .= '<ul class="checklist">';
					$clientItem .= ''. do_shortcode($content) . '';
				$clientItem .= '</ul> ';
				if ($buttononetext != ''){ $clientItem .= '<a href="'. esc_url($buttononelink) . '" class="more">'. esc_attr($buttononetext) . '</a>'; }
				$clientItem .= '</div>';
			$clientItem .= '</div>';
		$clientItem .= '</div>';
	$clientItem .= '</section>';
	return $clientItem;
}

add_shortcode('vc_features_two_container', 'urip_vc_features_two_container');

/*-----------------------------------------------------------------------------------*/
/*	app slider
/*-----------------------------------------------------------------------------------*/

function urip_vc_app_slider( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'css' => '',
		'images' => '',
		'heading' => '',
		'slogan' => '',
		'agen_img' => '',
		'thumb_size' => 'full-size',
		'sectionid' => ''
    ), $atts ) );

	wp_enqueue_script('slick');
	wp_enqueue_script('custom-slick');
	wp_enqueue_style('slick');
	wp_enqueue_style('slick-theme');

		$array_images = explode(",", $images);
		$clientItem = '';

			$clientItem .= '<section id="'. esc_attr($sectionid) . '" class="SectionScreenshots">';
				$clientItem .= '<div class="container">';
					$clientItem .= '<div class="row">';
						$clientItem .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
					if ($heading != ''){		$clientItem .= '<p class="section-title">'. $heading . '</p>'; }
					if ($slogan != ''){		$clientItem .= '<h2 class="section-heading">'. $slogan . '</h2>';  }
						$clientItem .= '</div> <!--/ .col-lg-8 -->';
					$clientItem .= '	<div class="clearfix"></div>';
					$clientItem .= '</div> ';
				$clientItem .= '</div> ';

				$clientItem .= '<div class="container-full">';
					$clientItem .= '<div class="row">';
						$clientItem .= '<div class="col-lg-12 no-padding">';
							$clientItem .= '<div class="app-carousel">';
								$i = 0;
									foreach($array_images as $single_image) {

										$img_size = '';

											$img_size = wpb_getImageBySize(array('attach_id' => (int)$single_image, 'thumb_size' => $thumb_size));

										$clientItem .='<div class="carousel-item">';
											$clientItem .= $img_size['thumbnail'];
										$clientItem .='</div>';

										$i++;
									}
							$clientItem .= '</div>';

						if ($agen_img != ''){
							$clientItem .= '<div class="phone-frame">';
								$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
								$clientItem .= '<img src="'. $agen_imgs . '" alt="iPhone Frame"/>';
							$clientItem .= '	</div> <!--/ .phone-frame -->';
						}
						$clientItem .= '</div>';
					$clientItem .= '</div>';
				$clientItem .= '</div>';
			$clientItem .= '</section>';

	return $clientItem;

}

add_shortcode('vc_app_slider', 'urip_vc_app_slider');

/*-----------------------------------------------------------------------------------*/
/*	why us
/*-----------------------------------------------------------------------------------*/

function urip_vc_why_container( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'css' => '',
		'bgcolor' => '',
		'leftheading' => '',
		'icon' => '',
		'heading' => '',
		'slogan' => '',
		'agen_img' => '',
		'imageposition' => '',
		'sectionid' => ''
    ), $atts ) );

	$output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="SectionWhyus" style="background-color:'. esc_attr($bgcolor) . ';">';
	$output .= '	<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
					if ($heading != ''){	$output .= '<p class="section-title">'. $heading . '</p>'; }
					if ($slogan != ''){	$output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
			$output .= '</div>';

			if ($imageposition == 'left'){
			$output .= '	<div class="clearfix"></div>';

				$output .= '<div class="col-lg-6 col-md-6 col-sm-12 col-sm-offset-0 col-xs-8 col-xs-offset-2">';
					$output .= '<div class="half-phone-mockup">';
					$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
					$output .= '	<img class="opacity-one" src="'. $agen_imgs . '" alt="iPhone Side 1" data-sr="enter bottom over 1s and move 200px wait 0.3s"/>';
				$output .= '	</div>';
				$output .= '</div>';

			$output .= '	<div class="col-lg-6 col-md-6">';
					$output .= '<div class="why-us-content">';
						$output .= '<span class="why-us-icon icon-'. esc_attr($icon) . '" data-sr="scale up 40% wait .2s"></span>';
						$output .= '<h3>'. esc_attr($leftheading) . '</h3>';
							$output .= ''. $content . '';
					$output .= '</div>';
				$output .= '</div>';

			} else {

			$output .= '	<div class="col-lg-6 col-md-6">';
					$output .= '<div class="why-us-content">';
						$output .= '<span class="why-us-icon icon-'. esc_attr($icon) . '" data-sr="scale up 40% wait .2s"></span>';
						$output .= '<h3>'. esc_attr($leftheading) . '</h3>';
							$output .= ''. $content . '';
					$output .= '</div>';
				$output .= '</div>';

				$output .= '<div class="col-lg-6 col-md-6 col-sm-12 col-sm-offset-0 col-xs-8 col-xs-offset-2">';
					$output .= '<div class="half-phone-mockup">';
					$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
					$output .= '	<img class="opacity-one" src="'. $agen_imgs . '" alt="iPhone Side 1" data-sr="enter bottom over 1s and move 200px wait 0.3s"/>';
				$output .= '	</div>';
				$output .= '</div>';
			}
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';
	return $output;
}

add_shortcode('vc_why_container', 'urip_vc_why_container');



/*-----------------------------------------------------------------------------------*/
/*	feat 2 item
/*-----------------------------------------------------------------------------------*/

function urip_vc_features_two_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "features_list"     	=> ''
    ), $atts) );
	$output = '';
	$output .= '<li>'. esc_attr($features_list) . '</li>';
	return $output;
}

add_shortcode('vc_features_two_item', 'urip_vc_features_two_item');


/*-----------------------------------------------------------------------------------*/
/*	price table
/*-----------------------------------------------------------------------------------*/

function urip_price_table($atts){
  extract(shortcode_atts(array(
    'css'      			=> '',
    'post_number'      	=> '',
    'order'      		=> 'DESC',
    'orderby'      		=> 'date',
    'categories' 	=> 'all',
    'sectionid' 		=> '',
    'heading' 			=> '',
    'col' 			=> '3',
    'slogan' 			=> ''
  ), $atts));

    $output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="centered">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';

				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
					if ($heading != ''){ $output .= '<p class="section-title">'. $heading . '</p>'; 	}
					if ($slogan != '') { $output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
				$output .= '</div> ';

				$output .= '<div class="clearfix"></div>';
					$output .= '<ul class="pricing">';

						global $post;
						$args = array(
							'post_type' 		=> 'price',
							'posts_per_page' 	=> $post_number,
							'order' 		 	=> $order,
							'orderby' 		 	=> $orderby,
							'post_status' 	 	=> 'publish'
						);

						if($categories != 'all'){
							$str = $categories;
							$arr = explode(',', $str);
							$args['tax_query'][] = array( 'taxonomy' => 'price_category', 'field' => 'slug', 'terms' => $arr );
						}

						// start items
						$urip_price_query = new WP_Query($args);
						if( $urip_price_query->have_posts() ) :
						while ($urip_price_query->have_posts()) :
						$urip_price_query->the_post();

						$offsetcolumn 	= get_post_meta( get_the_ID(), 'urip_offset', true );
						$anime			= get_post_meta( get_the_ID(), 'urip_table_anime', true );
						$best 			= get_post_meta( get_the_ID(), 'urip_best', true );
						$best_value 	= get_post_meta( get_the_ID(), 'urip_best_value', true );
						$table_price 	= get_post_meta( get_the_ID(), 'urip_table_price', true );
						$contents 		= get_post_meta( get_the_ID(), 'urip_features_list', true );
						$table_name 	= get_post_meta( get_the_ID(), 'urip_table_name', true );
						$table_link 	= get_post_meta( get_the_ID(), 'urip_table_link', true );
						$table_link_txt = get_post_meta( get_the_ID(), 'urip_table_link_text', true );
						$value 			= ($best =='yes') ? 'best-value' : '';
						$column 			= ($col !='') ? $col : '3';
            if($column =='2'){
              $column ='6';
            }elseif($column =='3'){
              $column ='4';
            }elseif($column =='4'){
              $column ='3';
            }elseif($column =='6'){
              $column ='2';
            }

						$output .= '<div class=" col-md-offset-'. esc_attr($offsetcolumn) . ' col-lg-'. esc_attr($column) . ' col-md-'. esc_attr($column) . ' col-sm-'. esc_attr($column) . ' col-sm-offset-0 col-xs-8 col-xs-offset-2">';
							$output .= '<li class="price '.$value.'" data-sr="enter bottom over 1s and move 80px wait '.$anime.'">';

								if( $table_name !='' ){ $output .= '<h5 class="price-title">'.$table_name.'</h5>'; }
								if( $best_value !='' ){ $output .= '<span class="best-value-label">'.$best_value.'</span>'; }
								if( $table_price !='' ){ $output .= '<div class="price-amount">'.$table_price.'</div>'; }
								if( $contents !='' ){
									$output .= '<ul class="price-feature">';
									foreach ($contents as $content)
										   {  $output .= '<li>'.$content.'</li>'; }
									$output .= '</ul>';
								}
								if( $table_link_txt !='' ){ $output .= '	<a href="'.$table_link.'" class="price-button all-caps">'.$table_link_txt.'</a>	';}

							$output .= '</li>';
						$output .= '</div>';

						endwhile;
						endif;
						wp_reset_postdata(); // end items

					$output .='</ul>';


			$output .='</div>';
		$output .='</div>';
	$output .='</section>';
	return $output;
}
add_shortcode('pricetable', 'urip_price_table');




/*-----------------------------------------------------------------------------------*/
/*	tab 1 container
/*-----------------------------------------------------------------------------------*/

function urip_vc_tab_one_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "agen_img"     	=> ''
    ), $atts) );

	$output = '';
	$output .='<div class="col-lg-6 col-md-6">';
		if ($agen_img != ''){
			$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
			$output .='<img class="  margin-bot-8 large-image-mockup" src="'. $agen_imgs . '" alt="'. get_the_title() .'"/>';
		}
	$output .='</div> ';

	$output .='<div class="col-lg-6 col-md-6">';
		$output .='<div class="panel-group accordion-wrapper" id="accordion" role="tablist" aria-multiselectable="true"> ';
			$output .= ''. do_shortcode($content) . '';
		$output .='</div>';
	$output .='</div>';
	return $output;
}

add_shortcode('vc_tab_one_container', 'urip_vc_tab_one_container');

/*-----------------------------------------------------------------------------------*/
/*	tab 1 item
/*-----------------------------------------------------------------------------------*/

function urip_vc_tab_one_item_one( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "accordionid"     	=> '',
        "heading"     		=> '',
        "readlink"     		=> '',
        "readtext"     		=> '',
        "panelactives"   	=> 'yes'
    ), $atts) );

	$output = '';

	$output .='	<div class="panel panel-default">';

			if ($panelactives == 'yes'){
			$output .='<div class="panel-heading panel-active" role="tab" id="'. $accordionid . '_heading">';
				$output .='<h4 class="panel-title">';
					$output .='<a href="#'. $accordionid . '" class="" data-toggle="collapse" data-parent="#accordion" 	aria-expanded="false" aria-controls="'. $accordionid . '">'. $heading . '</a>';
				$output .='</h4> ';
			} else {
			$output .='<div class="panel-heading" role="tab" id="'. $accordionid . '_heading">';
				$output .='<h4 class="panel-title">';
					$output .='<a href="#'. $accordionid . '" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="'. $accordionid . '">'. $heading . '</a>';
				$output .='</h4> ';
			}
			$output .='</div> ';

			if ($panelactives == 'yes'){
			$output .='<div id="'. $accordionid . '" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="'. $accordionid . '_heading">';
			} else {
			$output .='<div id="'. $accordionid . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'. $accordionid . '_heading">';
			}

			$output .='<div class="panel-body">';
				$output .=''. $content . '';
			if ($readtext != ''){ $output .='	<a href="'. $readlink . '" class="more">'. $readtext . '</a>'; }
			$output .='</div> ';
			$output .='</div> ';
		$output .='</div> ';

		 return $output;
}

add_shortcode('vc_tab_one_item_one', 'urip_vc_tab_one_item_one');

/*-----------------------------------------------------------------------------------*/
/*	tab 2 container
/*-----------------------------------------------------------------------------------*/

function urip_vc_tab_two_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "agen_img"     	=> '',
		 "buttononelink"     	=> '',
        "buttononetext"     	=> '',
        "videolink"     	=> '',
        "agen_img"     	=> ''
    ), $atts) );

	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');

	$output = '';
	$output .='<div class="col-lg-10 col-lg-offset-1 centered">';
		$output .=''. $content . '';

			if ($buttononetext != ''){
				$output .='	<a href="'. $buttononelink . '" class="cta cta-stroke all-caps">'. $buttononetext . '</a>';
			}
			$output .='<div class="clearfix"></div>';

			$output .='<div class="browser-mockup-wrapper">';
			if ($videolink != ''){
				$output .='	<a href="'. $videolink . '" class="swipebox-video play-btn animated pulse"><span class="icon-play2"></span></a>';
			}
			if ($agen_img != ''){
				$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
				$output .='	<img class="margin-top-40" src="'. $agen_imgs . '" alt="Browser Mockup" />';
			}

		$output .='</div>';
	$output .='	</div>';
	return $output;
}

add_shortcode('vc_tab_two_container', 'urip_vc_tab_two_container');

/*-----------------------------------------------------------------------------------*/
/*	tab 1 container
/*-----------------------------------------------------------------------------------*/

function urip_vc_tab_three_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "sectionid"     	=> '',
        "agen_img"     		=> '',
		"agen_img_width"    => '',
        "agen_img_height"   => '',
        "agen_img_top"     	=> ''
    ), $atts) );

		$output = '';

		if ($agen_img != ''){
		$output .='	<div class="side-feature col-lg-7 col-md-12">';
		} else {
		$output .='	<div class="side-feature col-lg-12 col-md-12">';
		}
			$output .='<div class="row">';
				$output .= ''. do_shortcode($content) . '';
			$output .='</div>';

		$output .='</div>';

		if ($agen_img != ''){ $output .= '<style>'; $agen_imgs = wp_get_attachment_url( $agen_img, 'large' );						 $output .= '#'. esc_attr($sectionid) . '.perspective-mockup-bg:before  { background: url("'. $agen_imgs . '") no-repeat !important; position: absolute; width: '. $agen_img_width . '; height: '. $agen_img_height . '; content: ""; top: '. $agen_img_top . '; }'; $output .= '</style>'; }

		if ($agen_img != ''){
			$output .='<div class="col-lg-5 visible-lg">';
				$output .='<div id="'. esc_attr($sectionid) . '" class="perspective-mockup-bg"></div>';
			$output .='</div>';
		}
	return $output;
}

add_shortcode('vc_tab_three_container', 'urip_vc_tab_three_container');


/*-----------------------------------------------------------------------------------*/
/*	tab 3 item
/*-----------------------------------------------------------------------------------*/

function urip_vc_tab_three_item_one( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "icon"     	=> '',
		"heading"     	=> '',
        "description"     	=> ''
    ), $atts) );

	$output = '';

	if ($icon != ''){
		$output .='<div class="side-feature-icon col-lg-2 col-md-2 col-sm-4 col-xs-3">';
		$output .='<span class="icon-'. $icon . ' urip-blue-color"></span>';
	$output .='</div>';
	}
	$output .='<div class="side-feature-info col-lg-10 col-md-10 col-sm-6 col-xs-9">';

		$output .='<h4>'. $heading . '</h4>';
		$output .='<p>'. $description . '</p>';

	$output .='	</div>';

	 return $output;
}

add_shortcode('vc_tab_three_item_one', 'urip_vc_tab_three_item_one');

/*-----------------------------------------------------------------------------------*/
/*	tab 3 item
/*-----------------------------------------------------------------------------------*/

function urip_vc_parallax_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"     		=> '',
        "sectionid"     => '',
        "agen_img"     	=> '',
        "appstore_bg"   => '',
        "playstore_bg"  => '',
        "notice"     	=> '',
		"heading"     	=> '',
		"buttononelink" => '',
		"buttononetext" => '',
		"playstorelink" => '',
		"appstorelink"  => '',
		"color"     	=> '',
		"ratio"     	=> '',
        "description"   => ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );

	$output = '';
	$output .= '<style>';
		$output .= '#breakout'. esc_attr($sectionid) . '  {
		background:   url('. esc_url($agen_imgs) . ') ;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		background-size: cover;
		}';

		if ($color != ''){
			$output .= '#breakout'. esc_attr($sectionid) . ' .subscribe-section-content  p, #breakout'. esc_attr($sectionid) . ' .subscribe-section-content h4{color: '. esc_attr($color) . ';}';
		}
	$output .= '</style>';

	$output .= '<section class="breaking centered parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="breakout'. esc_attr($sectionid) . '">';
		$output .='<div class="color-overlay">';
			$output .='<div class="breaking-content">';
				$output .='<div class="container">';
					$output .='<div class="row">';

						$output .='<div class="col-lg-12 centered">';

						if ($heading != ''){ $output .='<h4>'. $heading . '</h4>';}
						if ($description != ''){ 	$output .='<p class="sub-lead">'. $description . '</p>'; }

						if ($buttononetext != ''){ 	$output .='<a href="'. $buttononelink . '" class="cta cta-default all-caps clearfix" data-sr="enter bottom over 1s and move 75px">'. $buttononetext . '</a>';}
						$output .='<div class="clearfix"></div>';


						if ($appstorelink != '' && $playstorelink != '' ){
								 $output .='<ul class="inline-cta">';
									$appstore = wp_get_attachment_url( $appstore_bg, 'large' );
									 $output .='<li data-sr="enter left over 1s">';
										 $output .='<a href="'. $appstorelink . '" class="store-btn"><img src="'. $appstore . '" alt="Appstore"/></a>';
								 $output .='	</li>';
									 $playstore = wp_get_attachment_url( $playstore_bg, 'large' );
									 $output .='<li data-sr="enter right over 1s">';
										 $output .='<a href="'. $playstorelink . '" class="store-btn"><img src="'. $playstore . '" alt="Playstore"/></a>';
									 $output .='</li>';

								$output .='	</ul>';
						}

						if ($notice != ''){ $output .='<small data-sr="enter bottom over 1s and move 75px wait 0.2s"><em>'. $notice . '</em></small>';}

						$output .='</div>';
					$output .='</div>';
				$output .='</div>';
			$output .='</div>';
		$output .='</div>';
	$output .='</section>';
	return $output;
}
add_shortcode('vc_parallax_item', 'urip_vc_parallax_item');

/*-----------------------------------------------------------------------------------*/
/*	team
/*-----------------------------------------------------------------------------------*/

function urip_vc_team($atts){
  extract(shortcode_atts(array(
    'bg_img_w'      	=> '270',
    'bg_img_h'      	=> '310',
    'filter_heading' 	=> 'Everyone',
    'css' 				    => '',
    'team_type' 		  => '',
    'column' 			    => '3',
    'sectionid'			  => '',
    'heading' 		    => '',
    'post_number'   	=> '',
    'slogan' 			    => ''
  ), $atts));

  $output = '';
	$output .='<section id="'. esc_attr($sectionid) .'" class="teamSection">';
		$output .='	<div class="container">';
			$output .='	<div class="row">';
				$output .='	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
				if ($heading != ''){ $output .= '<p class="section-title">'. $heading . '</p>'; }
				if ($slogan != ''){ $output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
					$output .='</div> ';
					$output .='<div class="clearfix"></div>';
					$output .='<div class="the-team-wrapper">';

						if ($team_type == 'sidebar'){
						$output .='<div class="col-lg-3  col-md-3">';
						$output .='	<h4 class="all-caps hidden-xs">'. $heading . '</h4>';
						$output .='<a href="#0" id="mobile-team-filter" class="mobile-filter-select visible-xs"><h4 class="all-caps">'. $heading . '<span class="icon-chevron-thin-down"></span></h4></a>';
							$terms = get_terms("team_category"); $count = count($terms);
							$output .='<ul class="filter">';
								$output .='<li class="current all"><a href="#0">'. esc_attr($filter_heading) . '</a></li>';
									if ( $count > 0 ){
										foreach ( $terms as $term ) {
											$termname = strtolower($term->name);
											$termname = str_replace(' ', '-', $termname);
											$output .='<li class="'. $termname .'"><a href="#0">'. $term->name .'</a></li>';
										}
									}
							$output .='</ul> ';
							$output .='	</div> ';
						}

						if ($team_type == 'sidebar'){
						$output .='<div class="col-lg-9 col-md-9">';
						} else {
						$output .='<div class="col-lg-12 col-md-12">';
						}

						$output .='<div class="row">';
							$output .='<ul id="team_grid">';

								global $post;
								$args = array(
									'post_type' 		=> 'team',
									'posts_per_page' 	=> $post_number,
									'post_status'    	=> 'publish'
								);

								// start items
								$urip_team_query = new WP_Query($args);
								if( $urip_team_query->have_posts() ) :
								while ($urip_team_query->have_posts()) :
								$urip_team_query->the_post();

								$terms = get_the_terms( $post->ID, 'team_category' );

								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term )
									{
										$links[] = $term->name;
									}
									$links = str_replace(' ', '-', $links);
									$tax = join( " ", $links );
								else :
								$tax = '';
								endif;

								$column_out = ($column != '') ? ''.$column.'' : '3';
                if($column_out =='2'){
                  $column_out ='6';
                }elseif($column_out =='3'){
                  $column_out ='4';
                }elseif($column_out =='4'){
                  $column_out ='3';
                }elseif($column_out =='6'){
                  $column_out ='2';
                }
									$output .='<li class="col-lg-'.$column_out.' col-md-6 col-sm-6 col-sm-offset-0 col-xs-12 col-xs-offset-0 team-item" data-type="'. strtolower($tax).'" data-id="id-1-' . get_the_ID() . '">';

										$output .='<div class="team-item-content">';

											$thumb 		= get_post_thumbnail_id();
											$img_url 	= wp_get_attachment_url( $thumb,'full' );
											$image   	= aq_resize( $img_url, $bg_img_w, $bg_img_h, true, true, true );

											$output .='	<img src="'. $image .'" alt="'.get_the_title().'"/>';
											$output .='<div class="team-info centered">';
												$output .='	<h6>'.get_the_title().'</h6>';
												$output .='<small>'. get_the_content() .'</small>';

												$contents = get_post_meta( get_the_ID(), 'urip_social_icon', true );
												$socialurl = get_post_meta( get_the_ID(), 'urip_social_url', true );
												if($contents) {
													$output .='<ul class="team-social">';
														foreach (array_combine($contents, $socialurl) as $content => $url) {
															$output .='	<li><a target="_blank" href="'.$url.'"><span class="icon-'.$content.'"></span></a></li>';
														}
													$output .= '</ul>';
												}

											$output .='</div> ';

										$output .='</div> ';
										$output .='</li>';
									endwhile;
									endif;
									wp_reset_postdata(); // end items

								$output .='</ul>';
							$output .='</div> ';
						$output .='</div>';
				$output .='	</div>';
				$output .='</div> ';
			$output .='</div> ';
		$output .='</section>';
	return $output;
}
add_shortcode('vc_team', 'urip_vc_team');

/*-----------------------------------------------------------------------------------*/
/*	port
/*-----------------------------------------------------------------------------------*/

function urip_vc_port($atts){
	extract(shortcode_atts(array(
		'css' 						=> '',
		'sectionid' 				=> '',
		'heading' 					=> '',
		'posttype' 					=> '',
		'dribbble'					=> '',
		'link' 						=> '',
		'dribbble_bg_img' 			=> '',
		'dribbble_arrow_img' 		=> '',
		'seemore' 					=> '',
		'icon_fontawesome'      	=> '',
		'image_grid' 				=> 'mixi',
		'image_grids' 				=> 'full',
		'slogan' 					=> ''
    ), $atts));

	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');


	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

    $output = '';
	$output .='<section id="'. esc_attr($sectionid) .'" class="gray-bg portfolioSection '. $css_class . '">';
		$output .='	<div class="container">';
			$output .='	<div class="row">';

				$output .='	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
					if ($heading != ''){
					$output .= '<p class="section-title">'. $heading . '</p>';
				}
				if ($slogan != ''){
					$output .= '<h2 class="section-heading margin-top-min-13">'. $slogan . '</h2>';
				}

				$output .= '</div> <!--/ .col-lg-8 -->';
			$output .= '</div> <!--/ .row -->';
		$output .= '</div> <!--/ .container -->';

		$output .= '<div class="container-full">';
			$output .= '<div class="row">';
				$output .='<a href="#0" id="mobile-portfolio-filter" class="mobile-filter-select visible-xs"><h4 class="all-caps">'. esc_html__('Select Category','urip').'<span class="icon-chevron-thin-down"></span></h4></a>';

				$terms = get_terms("portfolio_category");
				$count = count($terms);
				$output .='<ul class="portfolio-filter">';
					$output .='<li class="current all"><a href="#0">'. esc_html__('All','urip').'</a></li>';
					if ( $count > 0 ){
						foreach ( $terms as $term ) {
							$termname = strtolower($term->name);
							$termname = str_replace(' ', '-', $termname);
							$output .='<li class="'.$term->slug.'"><a href="#0">'.$term->name.'</a></li>';
						}
					}
				$output .='</ul> ';

				$output .='	<ul class="portfolio-list" id="portfolio_grid">';

					global $post;
					$args = array(
						'post_type' 		=> 'portfolio',
						'posts_per_page' 	=> -1,
						'order'          	=> 'DESC',
						'orderby'        	=> 'date',
						'post_status'    	=> 'publish'
					);

					// start items
					$urip_portf_query = new WP_Query($args);
					if( $urip_portf_query->have_posts() ) :
					while ($urip_portf_query->have_posts()) :
					$urip_portf_query->the_post();

					$terms = get_the_terms( $post->ID, 'portfolio_category' );
					if ( $terms && ! is_wp_error( $terms ) ) :
						$links = array();
						foreach ( $terms as $term )  {
							$links[] = $term->slug;
						}
						$links = str_replace(' ', '-', $links);	// change space via -
						$tax = join( " ", $links );		// add space between array items
					else :
						$tax = '';
					endif;

					// strtolower for string lowercase
					$output .='<li data-type="'. strtolower($tax).'" data-id="port-' . get_the_ID() . '">';
						$output .='<figure>';
							$blog_thumbnail		=   wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $image_grid );
							$blog_thumbnails	=   wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $image_grids );
							if ($posttype != 'linkable'){
							$output .='	<a href="'.$blog_thumbnails[0].'" class="swipebox" title="'.get_the_title().'">';
							} else {
							$output .='	<a href="'.get_permalink().'" title="'.get_the_title().'">';
							}
									$output .='<img src="'.$blog_thumbnail[0].'" alt="Portfolio"/>';
									$output .='<figcaption>';
										$output .='<div class="caption-content">';
											$output .='<small><em>'.get_the_title().'</em></small>';
											$output .='<p>'.get_the_content().'</p>';
										$output .='</div>';
									$output .='</figcaption>';
							$output .='	</a> ';
						$output .='</figure>';
				$output .='	</li>';

				endwhile;
				endif;
				wp_reset_postdata(); // end items

				$dribbble_bg 	= wp_get_attachment_url( $dribbble_bg_img, 'mixi' );
				$dribbble_arrow = wp_get_attachment_url( $dribbble_arrow_img, 'large' );

				if ($dribbble != 'hidden'){
					$output .= '<li class="ext-link" data-type="all" data-id="port-10">';
						if ($link != ''){
						$output .= '<a href="'.esc_attr( $link ).'" target="_blank" >';
						} else {
						$output .= '<a href="#0">';
						}
						$output .= '<figure>';
							if ($dribbble_bg != ''){
							$output .= '	<img src="'. $dribbble_bg . '" alt="Portfolio">';
							}
								$output .= '<figcaption>';
									$output .= '<div class="ext-link-content">';

									if($icon_fontawesome == true) {
									$output .= '<span class="'.$icon_fontawesome.'"></ispan>';
									}
									if ($seemore != ''){
									$output .= '<p>'. $seemore . '</p>';
									}
									if ($dribbble_arrow != ''){
									$output .= '<img src="'. $dribbble_arrow . '" alt="Dribble Arrow">';
									}

								$output .= '	</div>';
								$output .= '</figcaption>';
							$output .= '</figure>';
						$output .= '</a>';
					$output .= '</li>';
				}

			$output .='</ul>';
		$output .='</div> ';
	$output .='</div>';
	$output .='</section>';
	return $output;
}
add_shortcode('vc_port', 'urip_vc_port');

/*-----------------------------------------------------------------------------------*/
/*	tab custom cont
/*-----------------------------------------------------------------------------------*/

function urip_vc_customer_testi_container( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"     	=> '',
        "sectionid"     	=> '',
        "slogan"     	=> '',
		"heading"     	=> '',
		"buttononelink"     	=> '',
		"buttononetext"     	=> ''
    ), $atts) );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$output = '';
	$output .= '	<section id="'. esc_attr($sectionid) . '" class="gray-bg centered '. $css_class . '">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered">';
				if ($heading != ''){ $output .= '<p class="section-title">'. $heading . '</p>'; }
				if ($slogan != ''){ $output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
				$output .= '</div>';
				$output .= '<div class="clearfix"></div>';
				$output .= '<div class="customer-box-wrapper centered margin-bot-35">';
				$output .= '	<ul class="customer-logos">';
					$output .= ''. do_shortcode($content) . '';
				$output .= '</ul> ';
				$output .= '</div>';
				$output .= '<div class="clearfix"></div>';
				if ($buttononelink != ''){ 	$output .='<a href="'. $buttononelink . '" class="cta cta-default all-caps">'. $buttononetext . '</a>'; }
			$output .= '	</div> ';
		$output .= '</div> ';
	$output .= '</section>';
	return $output;
}

add_shortcode('vc_customer_testi_container', 'urip_vc_customer_testi_container');

/*-----------------------------------------------------------------------------------*/
/*	tab cust item
/*-----------------------------------------------------------------------------------*/

function urip_vc_customer_testi_item( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "agen_img"     	=> '',

		"review"     	=> '',
		"buttononelink"     	=> '',
		"buttononetext"     	=> ''
    ), $atts) );

	$output = '';

		$output .= '<li class="center-customer-logo">';
			$output .= '<div class="vertical-center-wrapper">';
				$output .= '<div class="vertical-center-table">';
					$output .= '<div class="vertical-center-content">';
						if ($agen_img != ''){
						$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
						$output .= '<img class="customer-logo" src="'. $agen_imgs . '" alt="'. get_the_title() .'"/>';
						}
					$output .= '</div>';
				$output .= '</div>';
		$output .= '	</div> ';

		$output .= '	<div class="customer-quote">';

				$output .= '<small>'. $review . '</small>';

				$output .= '<span class="customer-link all-caps"> ';
				if ($buttononelink != ''){ 	$output .='<a href="'. $buttononelink . '">'. $buttononetext . '</a>';
				}
				$output .= '</span>';

			$output .= '</div> ';
		$output .= '</li>';

		 return $output;
}

add_shortcode('vc_customer_testi_item', 'urip_vc_customer_testi_item');

/*-----------------------------------------------------------------------------------*/
/*	tab cust item
/*-----------------------------------------------------------------------------------*/

function urip_vc_newsletter( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "css"     	=> '',
        "agen_img"     	=> '',
        "agen_imgss"     	=> '',
		"sectionid"     	=> '',
		"ratio"     	=> '',
		"color"     	=> '',
		"heading"     	=> '',
		"slogan"     	=> ''
    ), $atts) );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

	$output = '';

		$agen_imgs = wp_get_attachment_url( $agen_img, 'large' );
		$output .= '<style>';

		$output .= '#subscribe-section'. esc_attr($sectionid) . '  {
			background:   url('. esc_url($agen_imgs) . ') ;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
			}';

			if ($color != ''){
				$output .= '#subscribe-section'. esc_attr($sectionid) . ' .subscribe-section-content  p, #subscribe-section'. esc_attr($sectionid) . ' .subscribe-section-content h4{color: '. esc_attr($color) . ';}';
			}

		$output .= '</style>';

		$output .= '<section class="breaking parallax-sections '. $css_class . '"  data-stellar-background-ratio="0.'. esc_attr($ratio) . '" id="subscribe-section'. esc_attr($sectionid) . '">';
				$output .= '<div class="color-overlay">';
					$output .= '<div class="breaking-content">';
						$output .= '<div class="container">';
							$output .= '<div class="row">';
							$agen_imgsn = wp_get_attachment_url( $agen_imgss, 'large' );
						if ($agen_imgsn != ''){
							$output .= '	<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-4 centered">';
								$output .= '<img class="subscribe-icon" src="'. $agen_imgsn . '" alt="'. $heading . '" data-sr="scale up 40% wait .2s"/>';
							$output .= '</div> ';
						}
						if ($agen_imgsn != ''){
							$output .= '<div class="subscribe-section-content col-lg-5 col-md-5 col-sm-7">';

						} else {
							$output .= '<div class="subscribe-section-content col-lg-8 col-md-8 col-sm-7">';
						}
										if ($heading != ''){
										$output .= '<h4>'. $heading . '</h4>';
									}
									if ($slogan != ''){
										$output .= '<p>'. $slogan . '</p>';
									}

									$output .= '<form id="footer-subscribe" class="the-subscribe-form">';
										$output .= '<div class="input-group">';
											$output .= ''.do_shortcode($content).'';
								        $output .= '</div> ';
									$output .= '</form> ';
								$output .= '</div> ';
							$output .= '</div> ';
						$output .= '</div> ';
					$output .= '</div> ';
				$output .= '</div> ';
			$output .= '</section>';

		 return $output;
}

add_shortcode('vc_newsletter', 'urip_vc_newsletter');



/*-----------------------------------------------------------------------------------*/
/*	tab cust item
/*-----------------------------------------------------------------------------------*/

function urip_nt_app_moc( $atts, $content = null ) {
    extract( shortcode_atts(array(
		"css"     	=> '',
		"sectionid"     	=> '',
		"heading"     		=> '',
		"slogan"     		=> '',
		"iconone"     		=> '',
        "icontwo"     		=> '',
        "iconthree"     	=> '',
        "iconfour"    	 	=> '',
        "iconfive"    	 	=> '',
        "iconsix"     		=> '',
        "headingone"        => '',
        "headingtwo"        => '',
        "headingthree"      => '',
        "headingfour"       => '',
        "headingfive"       => '',
        "headingsix"        => '',
        "descriptionone"    => '',
        "descriptiontwo"    => '',
        "descriptionthree"  => '',
        "descriptionfour"   => '',
        "descriptionfive"   => '',
        "descriptionsix"    => '',
        "linkone"   		=> '',
        "linktwo"   		=> '',
        "linkthree"   		=> '',
        "linkfour"   		=> '',
        "linkfive"   		=> '',
        "linksix"   		=> ''
    ), $atts) );

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ),  $atts );
	$output = '';
	$output .= '<section id="'. esc_attr($sectionid) . '" class="'. $css_class . '">';
		$output .= '<div class="container">';
			$output .= '<div class="row">';
				$output .= '<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 centered margin-bot-5">';
					if ($heading != ''){ $output .= '<p class="section-title">'. $heading . '</p>'; }
					if ($slogan != '') { $output .= '<h2 class="section-heading">'. $slogan . '</h2>'; }
				$output .= '</div>';

				$output .= '<div class="clearfix"></div>';

				$output .= '<div class="col-lg-4 col-md-4 col-sm-12 left-features">';
					$output .= '<div class="row">';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4 col-xs-12">';
							$output .= '<a href="'. esc_url($linkone) . '">';
								$output .= '<span class="feature-icon icon-'. esc_attr($iconone) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingone) . '</h4>';
								$output .= '<p>'. esc_attr($descriptionone) . '</p>';
							$output .= '</a>';
						$output .= '</div>';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4">';
							$output .= '<a href="'. esc_url($linktwo) . '">';
							$output .= '	<span class="feature-icon icon-'. esc_attr($icontwo) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingtwo) . '</h4>';
								$output .= '<p>'. esc_attr($descriptiontwo) . '</p>';
							$output .= '</a>';
						$output .= '</div>';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4">';
							$output .= '<a href="'. esc_url($linkthree) . '">';
								$output .= '<span class="feature-icon icon-'. esc_attr($iconthree) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingthree) . '</h4>';
								$output .= '<p>'. esc_attr($descriptionthree) . '</p>';
							$output .= '</a>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';

				$output .= ''.do_shortcode($content).'';

				$output .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-features">';
					$output .= '<div class="row">';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4 col-xs-12">';
							$output .= '<a href="'. esc_url($linkfour) . '">';
								$output .= '<span class="feature-icon icon-'. esc_attr($iconfour) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingfour) . '</h4>';
								$output .= '<p>'. esc_attr($descriptionfour) . '</p>';
							$output .= '</a>';
						$output .= '</div>';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4">';
							$output .= '<a href="'. esc_url($linkfive) . '">';
								$output .= '<span class="feature-icon icon-'. esc_attr($iconfive) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingfive) . '</h4>';
								$output .= '<p>'. esc_attr($descriptionfive) . '</p>';
							$output .= '</a>';
						$output .= '</div>';
						$output .= '<div class="the-feature col-lg-12 col-md-12 col-sm-4">';
							$output .= '<a href="'. esc_url($linksix) . '">';
								$output .= '<span class="feature-icon icon-'. esc_attr($iconsix) . '"></span>';
								$output .= '<h4 class="feature-title">'. esc_attr($headingsix) . '</h4>';
								$output .= '<p>'. esc_attr($descriptionsix) . '</p>';
							$output .= '</a>';
						$output .= '</div> ';
					$output .= '</div> ';
				$output .= '</div> ';
			$output .= '</div> ';
		$output .= '</div> ';
	$output .= '</section>';
	return $output;
}
add_shortcode('nt_app_moc', 'urip_nt_app_moc');

/*-----------------------------------------------------------------------------------*/
/*	tab cust item
/*-----------------------------------------------------------------------------------*/

function urip_nt_app_moc_image( $atts, $content = null ) {
    extract( shortcode_atts(array(
        "agen_imgss"     	=> ''
    ), $atts) );

	$output = '';
	$output .= '<div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">';
		$output .= '<div class="middle-phone-mockup">';
		$agen_imgsn = wp_get_attachment_url( $agen_imgss, 'large' );
		$output .= '<img src="'. $agen_imgsn . '" alt="phone mockup" data-sr="enter bottom over 1s and move 200px"/>';
		$output .= '</div>';
	$output .= '</div>';
 return $output;
}
add_shortcode('nt_app_moc_image', 'urip_nt_app_moc_image');
?>
