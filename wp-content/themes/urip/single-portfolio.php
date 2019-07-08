	<?php
	
		get_header(); 
		get_template_part('index_header');

		$att				=	get_post_thumbnail_id();
		$image_src 			= 	wp_get_attachment_image_src( $att, 'full' );
		$image_src 			= 	$image_src[0]; 
		$image_continer 	= 	$image_src ? 'style="background-position: center;  background-image: url( ' . $image_src . ' )"' : 'style="background-position: center;  background-image: url(' . get_template_directory_uri() . '/images/stocks/stock.jpg )"';								
		
	?> 
		

	<section id="hero" <?php echo ($image_continer); ?>>
		<div class="color-overlay">
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
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		?>
	</section>
	
	<?php get_footer(); ?>