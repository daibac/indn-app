<?php

if ( is_admin() )
	return false;


/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package urip
 */

if ( ! function_exists( 'urip_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function urip_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<ul class="pager">

			<?php if ( get_next_posts_link() ) : ?>
			<li class="previous"><?php next_posts_link( esc_html__( ' Older posts', 'urip' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="next"><span class="icon-facebook"></span><?php previous_posts_link( esc_html__( 'Newer posts ', 'urip' ) ); ?></li>
			<?php endif; ?>

		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'urip_sermon_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function urip_sermon_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<!-- Navigation -->
	<ul class="pager">
		<li class="previous"><?php previous_post_link( '%link', _x( '<i class="fa fa-angle-left"></i> %title ', 'Previous post link', 'urip' ) ); ?></li>
		<li class="next"><?php next_post_link(     '%link', _x( '%title <i class="fa fa-angle-right"></i> ', 'Next post link',     'urip' ) ); ?><li>
	</ul>
	<?php
}
endif;

if ( ! function_exists( 'urip_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function urip_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<!-- Navigation -->
	<ul class="pager">
	<?php $next_post = get_next_post();
	if (!empty( $next_post )):
	$nexty=$next_post->post_title;
	if (strlen($nexty) > 15){$newshort = substr($nexty,0,25).'...';}else{$newshort=$nexty;}
	endif; ?>

	<?php $prev_post = get_previous_post();
	if (!empty( $prev_post )):
	$previ=$prev_post->post_title;
	if (strlen($previ) > 15){$newshortprev = substr($previ,0,25).'...';}else{$newshortprev=$previ;}
	endif; ?>


		<li class="previous"><?php if (!empty( $prev_post )): next_post_link('%link', $newshortprev ); endif; ?></li>
		<li class="next"><?php if (!empty( $next_post )): next_post_link('%link', $newshort ); endif; ?><li>
	</ul>
	<?php
}
endif;


// header mini
if ( ! function_exists( 'urip_header_top_section' ) ) :
	function urip_header_top_section() {
	if ( ot_get_option( 'urip_header_mini_display' ) =='on' )  {

	$urip_h_t_slogan 		= 	ot_get_option( 'urip_h_t_slogan' );
	$urip_h_t_slogan_c 		= 	$urip_h_t_slogan !='' ? $urip_h_t_slogan : 'Welcome visitor!';
	$urip_header_top_social = 	ot_get_option( 'urip_htsicons' );
?>
		<div class="header-mini-area">
			<div class="container">
				<div class="row">

					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 mobile-centered">
						<?php  if ( $urip_h_t_slogan_c != '' ) { ?>
							<span class="header-slogan float-left"><?php echo esc_html( $urip_h_t_slogan_c ); ?></span>
						<?php } ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-centered">
						<div class="header-social float-right">
							<ul class="header-social-list inline-block-list">

								<?php
									if ( $urip_header_top_social != 'off' ) {
										$urip_topheader_socials = ot_get_option( 'urip_topheader_socials', array() );
										if ( ! empty( $urip_topheader_socials ) ) {
											foreach( $urip_topheader_socials as $tsocial ) {
											$urip_tst 	= ot_get_option( 'urip_tst' );
											$urip_slt 	= $urip_tst ? 'target="'. $urip_tst .'"' : '';

												echo '<li><a href="'. esc_url( $tsocial['urip_tsu'] ) .'" '. $urip_slt .' title="'. esc_attr($tsocial['title']) .'"><i class="'. esc_attr( $tsocial['urip_tsc'] ) .'"></i></a></li>';
											}

										}
									}
								?>

							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

<?php
	} // urip_header_mini_display
	} // urip_header_top_section
endif;

add_action('urip_header_top',  'urip_header_top_section');
