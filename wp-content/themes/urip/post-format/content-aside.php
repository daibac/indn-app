<?php
/**
 * The template for displaying posts in the Aside post format.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-box">
		<div class="entry-wrap">
			<div class="entry-content">
				<?php the_content(esc_html__('Read More', 'urip')); ?>
				<?php wp_link_pages( array( 'before' => '<div class="post-pagination"><em class="page-links-title">' . esc_html__( 'Pages:', 'urip' ) . '</em>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div>
			<?php if(is_single()) : get_template_part('content', 'entry-footer'); endif; ?>
		</div>
	</div>
</article><!-- End .hentry -->