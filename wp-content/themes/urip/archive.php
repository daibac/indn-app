
	
	<?php
	

	 get_header(); 
	get_template_part('index_header');

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
						
								<h1 class="all-caps text-shadow-medium blog-title"><?php  esc_html_e('Archive','urip');  ?></h1> 
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
	
	<section id="blog">
	<div class="container has-margin-bottom">
		<div class="row">
			<div class="col-md-12-off has-margin-bottom-off">
			
			<?php if( ot_get_option( 'archivelayout' ) == 'right-sidebar' || ot_get_option( 'archivelayout' ) == '') { 	?>
			<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
			<?php } elseif( ot_get_option( 'archivelayout' ) == 'left-sidebar') { ?>
			<?php get_sidebar(); ?>
			<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
			<?php } elseif( ot_get_option( 'archivelayout' ) == 'full-width') { ?>
			<div class="col-xs-12 full-width-index v">
			<?php } ?>

			 <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'post-format/content', get_post_format() );
				endwhile;

				the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous page', 'urip' ),
					'next_text'          => esc_html__( 'Next page', 'urip' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'urip' ) . ' </span>',
				) );
				else :
					get_template_part( 'content', 'none' );
				endif;
			?>
			</div><!-- #end sidebar+ content -->

			<?php if( ot_get_option( 'archivelayout' ) == 'right-sidebar' || ot_get_option( 'archivelayout' ) == '') { 	?>
				<?php get_sidebar(); ?>
			<?php } ?>
				
			</div>
		</div>
	</div>
	</section>
	<?php get_footer(); ?>
