<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage urip
 * @since urip 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Article Image -->
		<div class="article-img">
		<?php
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'span5' );
			$image_src = $image_src[0]; ?>
			<img src="<?php echo esc_url($image_src); ?>" alt="<?php printf( get_the_title() ); ?>">
		<?php  ?>
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
		the_excerpt();
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
