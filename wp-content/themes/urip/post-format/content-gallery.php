	<?php 
		wp_enqueue_style('nt-flexslider');	
		wp_enqueue_script('nt-flexslider');	
		wp_enqueue_script('nt-blogscripts');	
	?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-bg">
				<?php
					$images = rwmb_meta( 'urip_gallery_image', 'type=image_advanced' );
					$urips_gallery_style = rwmb_meta('urip_gallery_style', 'type=select');	
				
				?>
				<?php  if($urips_gallery_style == 'value1') : 
				?>
					<div class="flexslider">
						<ul class="slides">
							<?php
								foreach ( $images as $image ) {
									echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
								}
							?>
						</ul>
					</div>
				<?php else : ?>
				<?php
					wp_enqueue_style('swipebox');
					wp_enqueue_script('swipebox');
					wp_enqueue_script('nt-custom-swipebox');
				?>
					<div class="entry-media">
						<div class="gallery-content clearfix">
							<ul class="row">
								<?php
									foreach ( $images as $image ) {
										echo "<li class='col-sm-4'><a class='swipebox'  href='{$image['full_url']}'><img src='{$image['full_url']}' alt='{$image['alt']}' /></a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
		</div><!-- Ends Post Media -->

		<div class="content-container">
			<div class="entry-header">
				<?php
					if ( ! is_single() ) :
						the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			</div><!-- .entry-header -->
			<?php if ( ot_get_option('meta_container') != 'off') : ?>
			<ul class="entry-meta">
				<li> <?php the_time('F j, Y'); ?></li>
				<li>  <?php esc_html_e('in', 'urip'); ?>  <?php the_category(', '); ?></li>
				<li><?php the_author(); ?></li>
				<?php the_tags( '<li>', ',', '</li> '); ?>
			</ul>
			<?php endif; ?>	
		</div>
		
		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading %s', 'urip' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			?>
		</div><!-- .entry-content -->
		
		<?php if ( ot_get_option('social_container') != 'off') : ?>
			<!-- I got these buttons from simplesharebuttons.com -->
			<div id="share-buttons">
				<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><i class="icon-facebook"></i></a>
				<a href="http://twitter.com/share?url=<?php echo get_permalink(); ?>" target="_blank"><i class="icon-twitter"></i></a>
				<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank"><i class="icon-google-plus"></i></a>
				<a href="http://reddit.com/submit?url=<?php echo get_permalink(); ?>" target="_blank"><i class="icon-reddit"></i></a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank"><i class="icon-linkedin"></i></a>
				<a href="http://www.stumbleupon.com/submit?url=<?php echo get_permalink(); ?>&title=Simple Share Buttons" target="_blank"><i class="icon-stumbleupon"></i></a>
			</div>
		<?php endif; ?>	
				
		</article><!-- #post-## -->

