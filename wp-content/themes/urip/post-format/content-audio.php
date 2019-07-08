<?php
	global $smof_data;
	global $blog_post_type;
	wp_enqueue_script('nt-fitvids');
	wp_enqueue_script('nt-blogscripts');
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
		$mp3 = rwmb_meta('urip_audio_mp3', 'type=text');
		$oga = rwmb_meta('urip_audio_ogg', 'type=text');
		$sc_url = rwmb_meta('urip_audio_sc', 'type=text');
		$sc_color = rwmb_meta('urip_audio_sc_color', 'type=color');
		$urip_wp_audio = '[audio mp3="'.$mp3.'"  ogg="'.$oga.'"]';
		$soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode($sc_url).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$sc_color.'"></iframe>';
	?>

		<?php if($sc_url!='') : ?>
		<div class="post-thumb blog-bg"><?php echo ($soundcloud_audio); ?></div>
		<?php else : ?>
		<div class="post-thumb blog-bg">
			<?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
			<?php echo do_shortcode($urip_wp_audio); ?>
		</div>
		<?php endif; ?>

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
