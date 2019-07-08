<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage urip_
 * @since urip_ 1.0
 */

wp_enqueue_script('nt-fitvids');
wp_enqueue_script('nt-blogscripts');
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-box">
		<?php $embed = rwmb_meta('urip_video_embed', 'type=textarea'); ?>
		<?php if($embed!='') : ?>
		<div class="post-thumb blog-bg">
			<div class="media-element video-responsive"><?php echo ($embed); ?></div>
		</div>

		<?php else : ?>
		<?php
			$m4v = rwmb_meta('urip_video_m4v', 'type=text');
			$ogv = rwmb_meta('urip_video_ogv', 'type=text');
			$webm = rwmb_meta('urip_video_webm', 'type=text');
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, true);
			$urip_wp_video = '[video poster="'.$image_url[0].'" mp4="'.$m4v.'"  webm="'.$webm.'"]';
		?>

	    <div class="post-thumb"><?php echo do_shortcode($urip_wp_video); ?></div>
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
