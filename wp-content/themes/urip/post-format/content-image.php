<?php
/**
 * The template for displaying posts in the Image post format.
 *
 * @package WordPress
 * @subpackage urip
 * @since urip 1.0
*/
	wp_enqueue_style('swipebox');
	wp_enqueue_script('swipebox');
	wp_enqueue_script('nt-custom-swipebox');
?>


<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>

		<div class="post-thumb">

			<?php
			$image_link = rwmb_meta('urip_the_image_url', 'type=text');
			$enable_lightbox = rwmb_meta('urip_enable_lightbox', 'type=select');
			?>

			<?php if($image_link) : ?>
			<?php if($enable_lightbox == 'value1') : ?>
			<a class="swipebox" href="<?php echo  esc_url($image_link); ?>" title="<?php printf(esc_html__('Permanent Link to %s', 'urip'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php elseif($enable_lightbox == 'value2') : ?>
			<a href="<?php echo esc_url( $image_link ); ?>" title="<?php printf(esc_html__('Permanent Link to %s', 'urip'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php endif; ?>
			<?php else : ?>
			<?php if(is_single()) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf(esc_html__('Permanent Link to %s', 'urip'), get_the_title()); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php endif; endif; ?>

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
