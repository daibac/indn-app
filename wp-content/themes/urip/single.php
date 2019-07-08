	<?php

		get_header();
		get_template_part('index_header');
		$urip_s_bgcolor 		= 	ot_get_option('urip_s_bg');
		$urip_s_overlaybgcolor 		= 	ot_get_option('urip_s_overlaybgcolor');

		$urip_s_att					=	get_post_thumbnail_id();
		$urip_s_image_src 	= 	wp_get_attachment_image_src( $urip_s_att, 'full' );
		$urip_s_image_src 	= 	$urip_s_image_src[0];
	?>


	<section id="hero" style="background-image: url(<?php echo esc_url($urip_s_image_src); ?>) !important; background:<?php echo esc_url($urip_s_bgcolor); ?> !important;">
		<div class="color-overlay" style="background:<?php echo esc_url($urip_s_overlaybgcolor); ?> !important;">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<!-- BEGIN Hero Content -->
							<div class="hero-content row centered">
								<div class="col-lg-12">
									<h1 class="all-caps text-shadow-medium blog-title"><?php  the_title();  ?></h1>
									<div class="blog-meta">
										<ul>
											<li><?php if(function_exists('bcn_display')) { bcn_display(); } ?></li>
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

	<section id="blog" class="urip-single-class">
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">

				<?php if( ot_get_option( 'postlayout' ) == 'right-sidebar' || ot_get_option( 'postlayout' ) == '') { ?>
				<div class="col-lg-8 col-md-8 col-sm-12 index float-right posts">
				<?php } elseif( ot_get_option( 'postlayout' ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8 col-md-8 col-sm-12 index float-left posts">
				<?php } elseif( ot_get_option( 'postlayout' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'post-format/content', get_post_format() ); ?>
						<?php
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // end of the loop. ?>
					<?php urip_post_nav(); ?>
				</div><!-- #end sidebar+ content -->

				<?php if( ot_get_option( 'postlayout' ) == 'right-sidebar' || ot_get_option( 'postlayout' ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
