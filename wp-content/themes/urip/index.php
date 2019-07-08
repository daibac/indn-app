	<?php

		get_header();
		get_template_part('index_header');
		$urip_s_bgcolor 		= 	ot_get_option('urip_b_bg');
		$urip_s_overlaybgcolor 		= 	ot_get_option('urip_b_overlaybgcolor');

	?>

	<section id="hero" style="background:<?php echo esc_url($urip_s_bgcolor); ?> !important;">
		<div class="color-overlay" style="background:<?php echo esc_url($urip_s_overlaybgcolor); ?> !important;">
			<div class="container">
				<div class="vertical-center-wrapper">
					<div class="vertical-center-table">
						<div class="vertical-center-content">
							<!-- BEGIN Hero Content -->
							<div class="hero-content row centered">
								<?php
									$urip_current_blog_page_id = get_option('page_for_posts');
									if((get_post_meta( $urip_current_blog_page_id, 'urip_disable_title', true )!= true) ){
								?>
								<div class="col-lg-12">
										<h1 class="all-caps text-shadow-medium blog-title">
										<?php
											if(get_post_meta( $urip_current_blog_page_id, 'urip_alt_title', true )){
												echo get_post_meta( $urip_current_blog_page_id, 'urip_alt_title', true );
											}
											else {
												echo esc_html_e('Our Blog','urip');
											}
										?>
									</h1>
									<div class="blog-meta">
										<ul>
											<?php if(get_post_meta( $urip_current_blog_page_id, 'urip_subtitle', true )){
											echo '<li>';
												echo get_post_meta( $urip_current_blog_page_id, 'urip_subtitle', true );
											echo '</li>';
											}  ?>
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

				<?php if( ot_get_option( 'bloglayout' ) == 'right-sidebar' || ot_get_option( 'bloglayout' ) == '') { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif( ot_get_option( 'bloglayout' ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif( ot_get_option( 'bloglayout' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'post-format/content', get_post_format() );
							endwhile;

							the_posts_pagination( array(
								'prev_text'          => esc_html__( 'Previous page', 'urip' ),
								'next_text'          => esc_html__( 'Next page', 'urip' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '', 'urip' ) . ' </span>',
							) );

							else :
							get_template_part( 'content', 'none' );
						endif;
					?>
				</div>

				<?php if( ot_get_option( 'bloglayout' ) == 'right-sidebar' || ot_get_option( 'bloglayout' ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

			</div>
		</div>
	</section>

	<?php get_footer(); ?>
