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
						
									<h1 class="all-caps text-shadow-medium blog-title"><?php printf( esc_html__( 'Search Results for: %s', 'urip' ), get_search_query() ); ?></h1> 
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
	
	<section id="blog" class="urip-search-class">
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">
				
				<?php if( ot_get_option( 'searchlayout' ) == 'right-sidebar' || ot_get_option( 'searchlayout' ) == '') { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif( ot_get_option( 'searchlayout' ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif( ot_get_option( 'searchlayout' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>
					<?php if ( have_posts() ) : ?>

						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', 'search' );

						// End the loop.
						endwhile;

						// Previous/next page navigation.
						the_posts_pagination( array(
							
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'urip' ) . ' </span>',
						) );

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'content', 'none' );

					endif;
					?>	
					
					<?php wp_link_pages(); ?>
					</div><!-- #end sidebar+ content -->

					<?php if( ot_get_option( 'searchlayout' ) == 'right-sidebar' || ot_get_option( 'searchlayout' ) == '') { ?>
						<?php get_sidebar(); ?>
					<?php } ?>
					
				</div>
			</div> 
		</div>
	</section> 
	<?php get_footer(); ?>