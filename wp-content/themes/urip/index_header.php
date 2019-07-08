
	<?php // this file for index.php and blog inner pages
		$headerbg 			= 	ot_get_option('urip_headerbg');
		$menubutton 		= 	ot_get_option('urip_menubutton');
		$menubuttonhover 	= 	ot_get_option('urip_menubuttonhover');
		$menulinkcolor 		= 	ot_get_option('menulinkcolor');
		$headerheight 		= 	ot_get_option('urip_headerheight');
		$headerptop 		= 	ot_get_option('urip_headerptop');
		$headerpbottom 		= 	ot_get_option('urip_headerpbottom');
		$headerpbottom 		= 	ot_get_option('urip_headerpbottom');


			wp_enqueue_script( 'headhesive' );

		?>

	<style>
		#main-header.the-origin-header { background-color: <?php echo  esc_attr($headerbg); ?>; }
		#main-header.the-origin-header { height: <?php echo  esc_attr($headerheight); ?>px; }
		#main-header.the-origin-header { padding-top: <?php echo  esc_attr($headerptop); ?>px; }
		#main-header.the-origin-header { padding-bottom: <?php echo  esc_attr($headerpbottom); ?>px; }
		a.menu-toggle 				   { color: <?php echo  esc_attr($menubutton); ?>; }
		a.menu-toggle:hover 		   { color: <?php echo  esc_attr($menubuttonhover); ?>; }
		#main-header.the-origin-header .navbar-nav>li>a { color: <?php echo  esc_attr($menulinkcolor); ?>; }
	</style>

	<?php if ( ot_get_option('menutype') == 'menutop') : ?>
	<header id="main-header" class="the-header the-origin-header header-navbar">
		<div class="container">
			<div class="navbar-header">
				<?php if ( ot_get_option('menubutton') != 'off') : ?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
					<span class="icon-menu5">
				</button>
			<?php endif; ?>
				<?php if ( ot_get_option('logovisibility') != 'off') : ?>
					<?php if ( ot_get_option( 'logoimg' ) ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand logo"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="<?php echo get_the_title(); ?>"></a> <!-- Your Logo -->
					<?php  else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php echo get_the_title(); ?>"></a> <!-- Your Logo -->
					<?php endif; ?>
				<?php endif; ?>
			</div> <!--/ .navbar-header -->
			<div id="navbar" class="collapse navbar-collapse">
            <?php

               if ( has_nav_menu( 'main-menu' ) ) {
               wp_nav_menu(
                     array(
                        'menu'              => 'main-menu',
                        'theme_location' 	=> 'main-menu',
                        'container' 		=> '',
                        'fallback_cb' 		=> 'show_top_menu',
                        'menu_class' 		=> 'main-nav navbar-nav all-caps pull-right menu-top',
                        'menu_id' 			=> 'main-nav',
                        'echo' 				=> true,
                        'walker' 			=> new description_walker(),
                        'depth' 			=> 2
                     )
               );
               } else {
            ?>
                  <li><a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php echo esc_html__('Add a menu','urip'); ?></a></li>
            <?php } ?>
			</div> <!--/ #navbar -->
		</div> <!--/ .container -->
	</header>
	<?php endif; ?>

	<?php if ( ot_get_option('menutype') == 'menuright' || ot_get_option('menutype') == '') : ?>
	<header id="main-header" class="the-header the-origin-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 logo-container-off">
				<?php if ( ot_get_option('logovisibility') != 'off') : ?>
					<?php if ( ot_get_option( 'logoimg' ) ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo esc_url( ot_get_option( 'logoimg' ) ) ?>" alt="<?php echo get_the_title(); ?>"></a> <!-- Your Logo -->
					<?php  else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php echo get_the_title(); ?>"></a> <!-- Your Logo -->
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( ot_get_option('menubutton') != 'off') : ?>
					<a href="#0" id="nav-menu-trigger" class="menu-toggle pull-right all-caps"><?php if ( ot_get_option('menuname') == 'on') : ?><?php esc_html_e('Menu','urip') ?><?php endif; ?><span class="icon-menu5"></span></a> <!-- Menu Toggle -->
				<?php endif; ?>
				</div> <!--/ .col-lg-12 -->
			</div> <!--/ .row -->
		</div> <!--/ .container -->
	</header>
	<?php endif; ?>

	<?php if ( ot_get_option('menutype') == 'menuright' || ot_get_option('menutype') == '') : ?>
	<nav id="nav-wrapper">
		<a class="nav-close" href="#0"><span class="icon-cross2"></span></a>
			<?php
          if ( has_nav_menu( 'main-menu' ) ) {
          wp_nav_menu(
                array(
                   'menu'             => 'main-menu',
                   'theme_location' 	=> 'main-menu',
                   'container' 				=> '',
                   'fallback_cb' 			=> 'show_top_menu',
                   'menu_class' 			=> 'main-nav all-caps right-slide-menu-container menu-right',
                   'menu_id' 					=> 'main-nav',
                   'echo' 						=> true,
                   'walker' 					=> new description_walker(),
                   'depth' 						=> 2
                )
          );
        } else {
     	?>
      	<li><a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php echo esc_html__('Add a menu','urip'); ?></a></li>
    	<?php } // endif

				wp_nav_menu(
					array(
						'menu' 						=> 'extra-menu',
						'theme_location' 	=> 'extra-menu',
						'container' 			=> '',
						'fallback_cb' 		=> 'show_top_menu',
						'menu_class' 			=> 'secondary-nav extra-menu',
						'menu_id' 				=> '',
						'echo' 						=> true,
						'walker' 					=> new description_walker(),
						'depth' 					=> 2
					)
				); // wp_nav_menu

			 if ( ot_get_option('contactuslink') != 'off') : ?>
				<ul class="secondary-nav">
					<li>
						<a class="contact-trigger">
							<?php echo ot_get_option('contactuslinktext'); ?>
						</a>
					</li>
				</ul>
			<?php endif; ?>

	</nav>
	<?php endif; ?>


	<main id="main-content" class="blog-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ); ?>px;"> <!-- margin value is the height of your footer -->
