
	<?php // this file for page.php

	$headeroption 		= 		rwmb_meta('urip_headeroption', 		'type=select');
	$headerlogo 			= 		rwmb_meta('urip_headerlogo', 		'type=select');
	$headermenubutton = 		rwmb_meta('urip_headermenubutton', 	'type=select');
	$contactuslink 		= 		rwmb_meta('urip_contactuslink', 	'type=select');
	$menutype 				= 		rwmb_meta('urip_menutype', 			'type=select');

	if( $headeroption  !='hidden' ) :
	wp_enqueue_script( 'headhesive' );
	endif;


	?>

	<?php // right slide menu
	if( ( $headeroption ) !='hidden' && ($menutype) == 'menu1' || ( $headeroption ) =='') :
	?>
	<header id="main-header" class="the-header the-origin-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 logo-container-off">
					<?php if( ($headerlogo) !='hidden') : ?>
						<?php if (esc_url( ot_get_option( 'logoimg' ) )) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="Urip Logo"></a> <!-- Your Logo -->
						<?php  else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Urip Logo"></a> <!-- Your Logo -->
						<?php endif; ?>
					<?php endif; ?>
					<?php if( ($headermenubutton) !='hidden') : ?>
						<a href="#0" id="nav-menu-trigger" class="menu-toggle pull-right all-caps"><?php if ( ot_get_option('menuname') == 'on') : ?><?php esc_html_e('Menu','urip') ?><?php endif; ?><span class="icon-menu5"></span></a> <!-- Menu Toggle -->
					<?php endif; ?>
				</div> <!--/ .col-lg-12 -->
			</div> <!--/ .row -->
		</div> <!--/ .container -->
	</header>
	<?php endif; ?>

	<?php // right slide menu
	if( ( $headeroption ) !='hidden' && ($menutype) == 'menu1' || ( $headeroption ) =='') :
	?>
	<nav id="nav-wrapper">
		<a class="nav-close" href="#0"><span class="icon-cross2"></span></a>
			<?php
				wp_nav_menu(array(
				'menu'            => 'main-menu',
				'theme_location' 	=> 'main-menu',
				'container' 		=> '',
				'fallback_cb' 		=> 'show_top_menu',
				'menu_class' 		=> 'main-nav all-caps right-slide-menu-container menu-right',
				'menu_id' 			=> 'main-nav',
				'echo' 				=> true,
				'depth' 				=> 2
				));

				wp_nav_menu(array(
				'menu' 				=> 'extra-menu',
				'theme_location' 	=> 'extra-menu',
				'container' 		=> '',
				'fallback_cb' 		=> 'show_top_menu',
				'menu_class' 		=> 'secondary-nav',
				'menu_id' 			=> '',
				'echo' 				=> true,
				'walker' 			=> new description_walker(),
				'depth' 				=> 2
				));
			?>
			<?php if( (  $contactuslink ) !='hidden' || ( $contactuslink ) == null ) : ?>
				<ul class="secondary-nav">
					<li><a class="contact-trigger"><?php echo ot_get_option('contactuslinktext'); ?></a></li>
				</ul>
			<?php endif; ?>
	</nav>
	<?php endif; ?>

	<?php if( ($headeroption) !='hidden' && ($menutype) =='menu2') : ?>
	<header id="main-header" class="the-header the-origin-header header-navbar">
		<div class="container">
			<div class="navbar-header">

			<?php if( ($headermenubutton) !='hidden') : ?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
					<span class="icon-menu5">
				</button>
			<?php endif; ?>

				<?php if( ($headerlogo) !='hidden') : ?>
					<?php if (esc_url( ot_get_option( 'logoimg' ) )) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand logo"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="Urip Logo"></a> <!-- Your Logo -->
					<?php  else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Urip Logo"></a> <!-- Your Logo -->
					<?php endif; ?>
				<?php endif; ?>

			</div> <!--/ .navbar-header -->

			<div id="navbar" class="collapse navbar-collapse">

					<?php wp_nav_menu(array(
						'menu'            => 'main-menu',
						'theme_location' 	=> 'main-menu',
						'container' 		=> '',
						'fallback_cb' 		=> 'show_top_menu',
						'menu_class' 		=> 'main-nav navbar-nav all-caps pull-right',
						'menu_id' 			=> 'main-nav',
						'echo' 				=> true,
						'walker' 			=> new description_walker(),
						'depth' 				=> 2
						)); ?>

			</div> <!--/ #navbar -->

		</div> <!--/ .container -->
	</header>
	<?php endif; ?>



	<main id="main-content" class="blog-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ) ?>px;"> <!-- margin value is the height of your footer -->
