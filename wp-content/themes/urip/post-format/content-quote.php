<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage urip_
 * @since urip_ 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-box">
		<?php
			$quote_text = rwmb_meta('urip_quote_text', 'type=textarea');
			$quote_author = rwmb_meta('urip_quote_author', 'type=text');
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, true);
			$color = rwmb_meta('urip_quote_bg', 'type=color');
			$opacity = rwmb_meta('urip_quote_bg_opacity', 'type=slider');
			$opacity = $opacity / 100;
		?>

		<div class="post-thumb">
			<div class="ql_wrapper">
				<?php if(has_post_thumbnail()) : ?>
				<div class="entry-media" style="background-image: url(<?php echo esc_url($image_url[0]); ?>); ">
				<?php else : ?>
				<div class="entry-media">
				<?php endif; ?>
					<div class="ql_overlay" style="background-color: <?php echo  esc_attr($color); ?>; opacity: <?php echo  esc_attr($opacity); ?>;"></div>
					<div class="ql_textwrap">
						<h3><a href="<?php the_permalink(); ?>"><?php echo  esc_html($quote_text); ?></a></h3>
						<p><a href="#" target="_blank" style="color: #ffffff;"><?php echo  esc_html($quote_author); ?></a></p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

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
			<?php 	the_content( sprintf(  esc_html__( 'Continue reading %s', 'urip' ), the_title( '<span class="screen-reader-text">', '</span>', false ))); ?>
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
