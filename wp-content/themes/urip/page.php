	<?php
		get_header();
		get_template_part('page_header');

		$headerbg 					= rwmb_meta('urip_headerbg' );
		$menubutton 				= rwmb_meta('urip_menubutton' );
		$menubuttonhover 		= rwmb_meta('urip_menubuttonhover' );
		$headerheight 			= rwmb_meta('urip_headerheight' );
		$headerptop 				= rwmb_meta('urip_headerptop' );
		$headerpbottom 			= rwmb_meta('urip_headerpbottom' );
		$urip_alt_title 		= rwmb_meta('urip_alt_title' );
		$urip_subtitle 			= rwmb_meta('urip_subtitle' );
		$urip_disable_title = rwmb_meta('urip_disable_title' );

		$urip_bg_disable		=	rwmb_meta('urip_bg_disable' );
		$urip_att						=	get_post_thumbnail_id();
		$urip_image_src 		= wp_get_attachment_image_src( $urip_att, 'full' );
		$urip_image_src 		= $urip_image_src[0];

	?>

	<style>

			<?php if ($urip_image_src): ?>
				.blog-layout #hero  {
				  background: url(<?php echo  esc_url($urip_image_src); ?>) no-repeat center center fixed !important;
				  background-size: cover !important;
				  height: auto !important;
				}
			<?php endif; ?>
		<?php if ($urip_bg_disable ==true): ?>
			.blog-layout #hero  {
				background: none!important;
				background-size: none!important;
			}
		<?php endif; ?>

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

	<section id="hero">
		<div class="color-overlay">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<!-- BEGIN Hero Content -->
							<div class="hero-content row centered">
								<?php  if( $urip_disable_title !='1' ){ ?>
									<div class="col-lg-12">
										<h1 class="all-caps text-shadow-medium blog-title"><?php  if( $urip_alt_title ){ echo esc_attr( $urip_alt_title );  } else { the_title(); } ?> </h1>
										<div class="blog-meta">
											<ul>
												<li><?php  if( $urip_subtitle ){ echo esc_attr( $urip_subtitle );  } ?></li>
												<li><?php if(function_exists('bcn_display')) { bcn_display(); } ?></li>
											</ul>
										</div>
									</div> <!--/ .col-lg-12 -->
								<?php } ?>
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
				<div class="col-md-12-off  has-margin-bottom-off">

				<?php  if(get_post_meta( get_the_ID(), 'urip_sidebar', true )== 'right-sidebar') { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif(get_post_meta( get_the_ID(), 'urip_sidebar', true )== 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif(get_post_meta( get_the_ID(), 'urip_sidebar', true )== 'no-sidebar') { ?>
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

				<?php  if( get_post_meta( get_the_ID(), 'urip_sidebar', true )== 'right-sidebar') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
