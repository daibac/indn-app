	<?php
		get_header();
		get_template_part('page_header');
	?>

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
										<li> <?php esc_html_e('Totals', 'urip'); ?></span> : <span class="theme"><?php global $woocommerce; echo esc_html( $woocommerce->cart->get_cart_subtotal() );?></li>
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

	<section id="blog" >
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">

				<?php if( ot_get_option( 'woosingle' ) == 'right-sidebar' || ot_get_option( 'woosingle' ) == '') { ?>
				<div class="col-lg-9  col-md-9 col-sm-9 index float-right posts">
				<?php } elseif( ot_get_option( 'woosingle' ) == 'left-sidebar') { ?>

					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					</div>

				<div class="col-lg-9  col-md-9 col-sm-9 index float-left posts">
				<?php } elseif( ot_get_option( 'woosingle' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

				<?php woocommerce_content(); ?>

				</div><!-- #end sidebar+ content -->

				<?php if( ot_get_option( 'woosingle' ) == 'right-sidebar' || ot_get_option( 'woosingle' ) == '') { ?>
					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					</div>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
