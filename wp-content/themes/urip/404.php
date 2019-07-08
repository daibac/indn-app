
	
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
						
								<h1 class="all-caps text-shadow-medium blog-title"><?php  esc_html_e('404','urip');  ?></h1> 
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
			
			<?php if( ot_get_option( '404layout' ) == 'right-sidebar' || ot_get_option( '404layout' ) == '') { ?>
			<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
			<?php } elseif( ot_get_option( '404layout' ) == 'left-sidebar') { ?>
			<?php get_sidebar(); ?>
			<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
			<?php } elseif( ot_get_option( '404layout' ) == 'full-width') { ?>
			<div class="col-xs-12 full-width-index v">
			<?php } ?>
				<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'urip' ); ?></h3>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'urip' ); ?></p>
				<?php get_search_form(); ?>
			</div>
			
			<?php if( ot_get_option( '404layout' ) == 'right-sidebar' || ot_get_option( '404layout' ) == '') { ?>
				<?php get_sidebar(); ?>
			<?php } ?>
			
		</div>
	</div>
	</section>
	<?php get_footer(); ?>