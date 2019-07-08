	<?php
	/*
	Template name: Unlimited Template
	*/
		get_header();
		$headerbg 			= 	rwmb_meta( 'urip_headerbg' );
		$menubutton 		= 	rwmb_meta( 'urip_menubutton' );
		$menubuttonhover 	= 	rwmb_meta( 'urip_menubuttonhover' );
		$headerheight 		= 	rwmb_meta( 'urip_headerheight' );
		$headerptop 		= 	rwmb_meta( 'urip_headerptop' );
		$headerpbottom 		= 	rwmb_meta( 'urip_headerpbottom' );
		$headeroption 		= 	rwmb_meta( 'urip_headeroption' );
		$headerlogo 		= 	rwmb_meta( 'urip_headerlogo' );
		$headermenubutton	= 	rwmb_meta( 'urip_headermenubutton' );
		$contactuslink 		= 	rwmb_meta( 'urip_contactuslink' );
		$menutype 			= 	rwmb_meta( 'urip_menutype' );
		$header_menu_type 	= 	rwmb_meta( 'urip_header_menu_type' );

		if( $headeroption  !='hidden' ) :
			wp_enqueue_script( 'headhesive' );
		endif;
	?>

	<style>
		#main-header.the-origin-header { background-color: <?php echo  esc_attr($headerbg); ?>; }
		#main-header.the-origin-header { height: <?php echo  esc_attr($headerheight); ?>px; }
		#main-header.the-origin-header { padding-top: <?php echo  esc_attr($headerptop); ?>px; }
		#main-header.the-origin-header { padding-bottom: <?php echo  esc_attr($headerpbottom); ?>px; }
		a.menu-toggle 				   { color: <?php echo  esc_attr($menubutton); ?>; }
		a.menu-toggle:hover 		   { color: <?php echo  esc_attr($menubuttonhover); ?>; }
	</style>

	<?php if( ($headeroption) !='hidden' && ($menutype) =='menu1') : ?>
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
	<nav id="nav-wrapper">
		<a class="nav-close" href="#0"><span class="icon-cross2"></span></a>
		<?php
			if( ( $header_menu_type ) == 'm' ) :

				$menu_item_name 		=  rwmb_meta( 'urip_section_name' );
				$menu_item_url 			=  rwmb_meta( 'urip_section_url' );

				if( ( $menu_item_name ) !='' || ( $menu_item_url ) !='' ){
					echo '  <ul id="main-nav" class="main-nav all-caps left-menu-container">';
						foreach (array_combine($menu_item_name, $menu_item_url) as $content => $url)  {
							echo ' 	<li><a href="'.$url.'">'.$content.'</a></li>';
						}
					echo '</ul>';
				}

			endif; ?>

			<?php
			if( ( $header_menu_type ) == 'p' ) :
				wp_nav_menu(
					array(
						'menu'              => 'main-menu',
						'theme_location' 	=> 'main-menu',
						'container' 		=> '',
						'fallback_cb' 		=> 'show_top_menu',
						'menu_class' 		=> 'main-nav all-caps',
						'menu_id' 			=> 'main-nav',
						'echo' 				=> true,
						'depth' 			=> 2
					)
				);
				wp_nav_menu(
					array(
						'menu' => 'extra-menu',
						'theme_location' => 'extra-menu',
						'container' => '',
						'fallback_cb' => 'show_top_menu',
						'menu_class' => 'secondary-nav',
						'menu_id' => 'main-nav',
						'echo' => true,
						'walker' => new description_walker(),
						'depth' => 2
					)
				);
			endif;
		 ?>


		 			<?php 	if( $contactuslink !='hidden') : ?>
		 				<ul class="secondary-nav"> <li><a class="contact-trigger"><?php echo ot_get_option('contactuslinktext'); ?></a></li> </ul>
		 			<?php  endif;  ?>


	</nav>
	<?php endif; ?>

	<?php if( ($headeroption) !='hidden' && ($menutype) =='menu2') : ?>
	<header id="main-header" class="the-header the-origin-header header-navbar">
		<div class="container">
			<div class="navbar-header">
			<?php if( ($headermenubutton) !='hidden') : ?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"> <span class="icon-menu5"> </button>
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

				<?php
					if( ( $header_menu_type ) == 'm' ) :
						$section_name 	=  rwmb_meta( 'urip_section_name' );
						$section_url 	=  rwmb_meta( 'urip_section_url' );
						if( ( $section_name ) !='' || ( $section_url ) !='' ){
							echo '  <ul class="navbar-nav all-caps pull-right">';
								foreach (array_combine($section_name, $section_url) as $content => $url)  {
									echo ' 	<li><a href="'.$url.'">'.$content.'</a></li>';
								}
							echo '</ul>';
						}
					endif;

					if( ( $header_menu_type ) == 'p' ) :
						wp_nav_menu(
							array(
								'menu'              => 'main-menu',
								'theme_location' 	=> 'main-menu',
								'container' 		=> '',
								'fallback_cb' 		=> 'show_top_menu',
								'menu_class' 		=> 'main-nav navbar-nav all-caps pull-right',
								'menu_id' 			=> 'main-nav',
								'echo' 				=> true,
								'depth' 			=> 2
							)
						);
					endif;
				?>

			</div> <!--/ #navbar -->
		</div> <!--/ .container -->
	</header>
	<?php endif; ?>

	<?php if ( ot_get_option('headertypes') == '1') { ?>
	<main id="main-content" class="hero-subscribe-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ) ?>px;"> <!-- margin value is the height of your footer -->
	<?php } else 	 if  ( ot_get_option('headertypes') == '2') { ?>
	<main id="main-content" class="hero-form-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ) ?>px;"> <!-- margin value is the height of your footer -->
	<?php } else 	 if  ( ot_get_option('headertypes') == '3') { ?>
	<main id="main-content" class="creative-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ) ?>px;"> <!-- margin value is the height of your footer -->
	<?php } else 	 if  ( ot_get_option('headertypes') == '4') { ?>
	<main id="main-content" class="app-layout" style="margin-bottom: <?php echo esc_attr( ot_get_option( 'footerheight' ) ) ?>px;"> <!-- margin value is the height of your footer -->
	<?php } ?>

	<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				the_content();
			endwhile;
		endif;
	?>

	<?php get_footer(); ?>
