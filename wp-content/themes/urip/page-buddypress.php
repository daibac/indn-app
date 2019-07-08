

	<?php
	/*
	Template name: Buddypress
	*/
	get_header();
	get_template_part('page_header');

	$headerbg 			= 	rwmb_meta('urip_headerbg', 'type=color');
	$menubutton 		= 	rwmb_meta('urip_menubutton', 'type=color');
	$menubuttonhover 	= 	rwmb_meta('urip_menubuttonhover', 'type=color');
	$headerheight 		= 	rwmb_meta('urip_headerheight', 'type=number');
	$headerptop 		= 	rwmb_meta('urip_headerptop', 'type=number');
	$headerpbottom 		= 	rwmb_meta('urip_headerpbottom', 'type=number');
	?>

	<style>
		<?php if($headerbg) : ?>
		#main-header.the-origin-header { background-color: <?php echo  esc_attr($headerbg); ?>; }
		<?php endif; ?>
		<?php if($headerheight) : ?>
		#main-header.the-origin-header { height: <?php echo  esc_attr($headerheight); ?>px; } 
		<?php endif; ?>
		<?php if($headerptop) : ?>
		#main-header.the-origin-header { padding-top: <?php echo  esc_attr($headerptop); ?>px; } 
		<?php endif; ?>
		<?php if($headerpbottom) : ?>
		#main-header.the-origin-header { padding-bottom: <?php echo  esc_attr($headerpbottom); ?>px; } 
		<?php endif; ?>
		<?php if($menubutton) : ?>
		a.menu-toggle { color: <?php echo  esc_attr($menubutton); ?>; }
		<?php endif; ?>
		<?php if($menubuttonhover) : ?>
		a.menu-toggle:hover { color: <?php echo  esc_attr($menubuttonhover); ?>; }
		<?php endif; ?>
	</style>

	<?php if((get_post_meta( get_the_ID(), 'urip_disable_title', true )!= true) ){ ?>
	<section id="hero">
		<div class="color-overlay">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<div class="hero-content row centered">
								<div class="col-lg-12">
								<h1 class="all-caps text-shadow-medium blog-title">
								<?php if(get_post_meta( get_the_ID(), 'urip_alt_title', true )){ echo get_post_meta( get_the_ID(), 'urip_alt_title', true ); } else { the_title(); } ?>
								</h1>
									<div class="blog-meta">
										<ul>
										<li><?php if(get_post_meta( get_the_ID(), 'urip_subtitle', true )){ echo ''.get_post_meta( get_the_ID(), 'urip_subtitle', true ).''; } ?></li>
										</ul>
									</div>
								</div> <!--/ .col-lg-12 -->
							</div> <!--/ .row -->
						</div> <!--/ .vertical-center-content -->
					</div> <!--/ .vertical-center-table -->
				</div> <!-- / .vertical-center-wrapper -->
			</div> <!--/ .container -->
		</div> <!--/ .color-overlay -->
	</section>
	<?php } ?>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off  has-margin-bottom-off">
					<?php if( ot_get_option( 'forumlayout' ) == 'right-sidebar') { ?>
					<div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
					<?php } elseif( ot_get_option( 'forumlayout' ) == 'left-sidebar') { ?>
					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3">
						<?php dynamic_sidebar( 'buddy-page-sidebar' ); ?>
					</div>
					<div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
					<?php } elseif( ot_get_option( 'forumlayout' ) == 'full-width') { ?>
					<div class="col-xs-12 full-width-index v">
					<?php } ?>
						<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'page' );
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile;
						?>
					</div>

					<?php if( ot_get_option( 'forumlayout' ) == 'right-sidebar') { ?>
						<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3">
							<?php dynamic_sidebar( 'buddy-page-sidebar' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
