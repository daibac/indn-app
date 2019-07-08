	<?php
		get_header();
		get_template_part('page_header');

		$headerbg = rwmb_meta('urip_headerbg', 					'type=color');
		$menubutton = rwmb_meta('urip_menubutton', 				'type=color');
		$menubuttonhover = rwmb_meta('urip_menubuttonhover', 	'type=color');
		$headerheight = rwmb_meta('urip_headerheight', 			'type=number');
		$headerptop = rwmb_meta('urip_headerptop', 				'type=number');
		$headerpbottom = rwmb_meta('urip_headerpbottom', 		'type=number');

		$urip_att=get_post_thumbnail_id();
		$urip_image_src = wp_get_attachment_image_src( $urip_att, 'full' );
		$urip_image_src = $urip_image_src[0];

	?>

	<style>
		<?php if ($urip_image_src): ?>
			.blog-layout #hero  {
			  background: url(<?php echo esc_url($urip_image_src); ?>) no-repeat center center fixed !important;
			  background-size: cover !important;
			  height: auto !important;
			}
		<?php endif; ?>
		<?php if($headerbg) : ?>
			#main-header.the-origin-header { background-color: <?php echo esc_attr($headerbg); ?>; }
		<?php endif; ?>
		<?php if($headerheight) : ?>
			#main-header.the-origin-header { height: <?php echo esc_attr($headerheight); ?>px; }
		<?php endif; ?>
		<?php if($headerptop) : ?>
			#main-header.the-origin-header { padding-top: <?php echo esc_attr($headerptop); ?>px; }
		<?php endif; ?>
		<?php if($headerpbottom) : ?>
			#main-header.the-origin-header { padding-bottom: <?php echo esc_attr($headerpbottom); ?>px; }
		<?php endif; ?>
		<?php if($menubutton) : ?>
			a.menu-toggle { color: <?php echo esc_attr($menubutton); ?>; }
		<?php endif; ?>
		<?php if($menubuttonhover) : ?>
			a.menu-toggle:hover { color: <?php echo esc_attr($menubuttonhover); ?>; }
		<?php endif; ?>
	</style>

	<section id="hero">
		<div class="color-overlay">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<!-- BEGIN Hero Content -->
							<div class="hero-content row centered">
								<div class="col-lg-12">
									<h1 class="all-caps text-shadow-medium blog-title"><?php the_title(); ?></h1>
									<div class="blog-meta">
										<ul>
										<li>
										<?php esc_html_e('Totals', 'urip'); ?></span> : <span class="theme"><?php global $woocommerce; echo esc_html( $woocommerce->cart->get_cart_subtotal() );?></li>
										</ul>
									</div>
								</div> <!--/ .col-lg-12 -->
							</div> <!--/ .row -->
							<!-- END Hero Content -->
						</div> <!--/ .vertical-center-content -->
					</div> <!--/ .vertical-center-table -->
				</div> <!-- / .vertical-center-wrapper -->
			</div> <!--/ .container -->
		</div> <!--/ .color-overlay -->
	</section>
	<section id="blog">

	<div class="container has-margin-bottom">
		<div class="row">
			<div class="col-md-12-off has-margin-bottom-off">

			<?php if( ot_get_option( 'woopage' ) == 'right-sidebar' || ot_get_option( 'woopage' ) == '') { ?>
				<div class="col-lg-9  col-md-9 col-sm-9 index float-right posts">
			<?php } elseif( ot_get_option( 'woopage' ) == 'left-sidebar') { ?>

				<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
					<?php dynamic_sidebar( 'shop-page-sidebar' ); ?>
				</div>
				<div class="col-lg-9  col-md-9 col-sm-9 index float-left posts">

			<?php } elseif( ot_get_option( 'woopage' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
			<?php } ?>

				<?php woocommerce_content(); ?>

           </div><!-- #end sidebar+ content -->

			<?php if( ot_get_option( 'woopage' ) == 'right-sidebar' || ot_get_option( 'woopage' ) == '') { ?>
				<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
					<?php dynamic_sidebar( 'shop-page-sidebar' ); ?>
				</div>
			<?php } ?>

			</div>
		</div>
	</div>	</section>
	<?php get_footer(); ?>
