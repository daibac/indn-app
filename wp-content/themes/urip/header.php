	<!DOCTYPE html>
	<html <?php language_attributes(); ?> >

	<head>

	<!-- Meta UTF8 charset -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!-- viewport settings -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

	</head>

	<!-- BODY START=========== -->
	<body <?php body_class(); ?>>

	<?php do_action( 'urip_header_top' ); ?>
