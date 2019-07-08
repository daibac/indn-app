	<?php
		/*
		Template name: Fullwidth Template
		*/
		get_header();
		get_template_part('page_header');

		$headerbg 			= rwmb_meta('urip_headerbg', 					'type=color');
		$menubutton 		= rwmb_meta('urip_menubutton', 					'type=color');
		$menubuttonhover 	= rwmb_meta('urip_menubuttonhover', 			'type=color');
		$headerheight 		= rwmb_meta('urip_headerheight', 				'type=number');
		$headerptop 		= rwmb_meta('urip_headerptop', 					'type=number');
		$headerpbottom 		= rwmb_meta('urip_headerpbottom', 				'type=number');
		$urip_alt_title 	= rwmb_meta('urip_alt_title', 					'type=text');
		$urip_subtitle 		= rwmb_meta('urip_subtitle', 					'type=text');
		$urip_disable_title = rwmb_meta('urip_disable_title', 				'type=checkbox');

		$urip_att			= get_post_thumbnail_id();
		$urip_image_src 	= wp_get_attachment_image_src( $urip_att, 'full' );
		$urip_image_src 	= $urip_image_src[0];

	?>

	<style>
		<?php if ($urip_image_src): ?>
			.blog-layout #hero  {
			  background: url(<?php echo esc_url( $urip_image_src ); ?>) no-repeat center center fixed !important;
			  background-size: cover !important;
			  height: auto !important;
			}
		<?php endif; ?>
		<?php if($headerbg) : ?>
			#main-header.the-origin-header { background-color: <?php echo  esc_attr( $headerbg ); ?>; }
		<?php endif; ?>
		<?php if($headerheight) : ?>
			#main-header.the-origin-header { height: <?php echo  esc_attr( $headerheight ); ?>px; }
		<?php endif; ?>
		<?php if($headerptop) : ?>
			#main-header.the-origin-header { padding-top: <?php echo  esc_attr( $headerptop ); ?>px; }
		<?php endif; ?>
		<?php if($headerpbottom) : ?>
			#main-header.the-origin-header { padding-bottom: <?php echo  esc_attr( $headerpbottom ); ?>px; }
		<?php endif; ?>
		<?php if($menubutton) : ?>
			a.menu-toggle { color: <?php echo  esc_attr( $menubutton ); ?>; }
		<?php endif; ?>
		<?php if($menubuttonhover) : ?>
			a.menu-toggle:hover { color: <?php echo  esc_attr( $menubuttonhover ); ?>; }
		<?php endif; ?>
	</style>

	<?php  if( $urip_disable_title !='1' ){ ?>
	<section id="hero">
		<div class="color-overlay">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<div class="hero-content row centered">

								<?php  if( $urip_disable_title !='1' ){ ?>
									<div class="col-lg-12">
										<h1 class="all-caps text-shadow-medium blog-title">
											<?php
												if( $urip_alt_title ){
													echo esc_attr( $urip_alt_title );
												} else {
													the_title();
												}
											?>
										</h1>
										<div class="blog-meta">
											<ul>
												<li><?php  if( $urip_subtitle ){ echo esc_attr( $urip_subtitle );  } ?></li>
												<li><?php if(function_exists('bcn_display')) { bcn_display(); } ?></li>
											</ul>
										</div>
									</div> <!--/ .col-lg-12 -->
								<?php } ?>

							</div> <!--/ .row -->
						</div> <!--/ .vertical-center-content -->
					</div> <!--/ .vertical-center-table -->
				</div> <!-- / .vertical-center-wrapper -->
			</div> <!--/ .container -->
		</div> <!--/ .color-overlay -->
	</section>
	<?php } ?>

	<section id="blog">
		<div class="container-off has-margin-bottom">
			<div class="row-off">
				<div class="col-md-12-off has-margin-bottom">
					<?php
						if (have_posts()) :
							while (have_posts()) :
								the_post();
								the_content();
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
