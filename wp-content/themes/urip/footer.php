	<?php
	/**
	* The template for displaying the footer
	*
	*
	* @package WordPress
	* @subpackage urip
	* @since urip 1.0
	*/
	?>

	<?php if ( ot_get_option('widgetizefooter') != 'off') : ?>
		<section
		id="footer-widget-section"
		class="breaking parallax-sections"
		id="footer-widget-section" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="40"
		style="background: url(<?php echo esc_url(ot_get_option('widgetizefooterbg') ); ?>) no-repeat bottom center; background-size: cover;">
			<div class="color-overlay">
				<div class="footer-widget-wrapper">
					<div class="container">
						<div class="row">
							<div id="footer-subscribe" class="the-subscribe-form-off">
								<?php dynamic_sidebar( 'widgetizefooter' ); ?>
							</div> <!--/ .row -->
						</div> <!--/ .row -->
					</div> <!--/ .container -->
				</div> <!--/ .footer-widget-wrapper -->
			</div><!--/ .color-overlay -->
		</section>
	<?php endif; ?>

	<?php if ( ot_get_option('footernewsletter') != 'off') : ?>
		<section id="subscribe-section"   	class="breaking parallax-sections" 	style="background: url(<?php echo esc_url(ot_get_option('footernewsletterbg') ); ?>) 	no-repeat bottom center; background-size: cover;">
			<div class="color-overlay">
				<div class="breaking-content">
					<div class="container">
						<div class="row">
							<?php if( ot_get_option( 'newsletterlogo' ) !='' ) : ?>
								<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-4 centered">
									<img class="subscribe-icon" src="<?php echo esc_url(ot_get_option('newsletterlogo') ); ?>"
									alt="Open Envelope Icon"
									data-sr="scale up 40% wait .2s"/>
								</div> <!--/ .col-lg-3 -->
							<?php endif; ?>
							<div class="subscribe-section-content col-lg-5 col-md-5 col-sm-7">
								<?php if( ot_get_option( 'newsheader' ) !='' ) : ?>
									<h4><?php echo esc_html(ot_get_option('newsheader') ); ?></h4>
								<?php endif; ?>

								<?php if( ot_get_option( 'newsdesc' ) !='' ) : ?>
									<p><?php echo esc_html(ot_get_option('newsdesc') ); ?></p>
								<?php endif; ?>
								<div id="footer-subscribe" class="the-subscribe-form-off">
									<?php dynamic_sidebar( 'newsletter' ); ?>
								</div>
							</div> <!--/ .col-lg-5 -->
						</div> <!--/ .row -->
					</div> <!--/ .container -->
				</div> <!--/ .breaking-content -->
			</div><!--/ .color-overlay -->
		</section>
	<?php endif; ?>

	</main>

	<?php if ( ot_get_option('mainfooter') != 'off') : ?>
	<footer id="main-footer" >
		<div class="container">
			<div class="row">
			<div class="footer-content col-lg-12 centered">
					<?php if( ot_get_option( 'footerlogo' ) !='' ) : ?>
						<img class="margin-bot-40" src="<?php echo esc_url(ot_get_option('footerlogo') ); ?>" alt="Footer App Icon" />
					<?php endif; ?>
					<?php if( ot_get_option( 'appheading' ) !='' ) : ?>
						<p class="lead margin-top-8 margin-bot-25"><?php echo ot_get_option('appheading') ; ?></p>
					<?php endif; ?>
					<?php if( ot_get_option( 'appdesc' ) !='' ) : ?>
						<p><?php echo ot_get_option('appdesc') ; ?></p>
					<?php endif; ?>
					<ul class="inline-cta">
					<?php if( ot_get_option( 'appimage' ) !='' ) : ?>
						<li><a href="<?php echo esc_url(ot_get_option('appimageurl') ); ?>" class="store-btn"><img src="<?php echo esc_url(ot_get_option('appimage') ); ?>" alt="Appstore"/></a></li>
						<?php endif; ?>
						<?php if( ot_get_option( 'playimage' ) !='' ) : ?>
						<li><a href="<?php echo esc_url(ot_get_option('playimageurl') ); ?>" class="store-btn"><img src="<?php echo esc_url(ot_get_option('playimage') ); ?>" alt="Playstore"/></a></li>
					<?php endif; ?>
					</ul> <!--/ .inline-cta -->
				</div> <!--/ .footer-content -->

				 <?php $menulinks = ot_get_option( 'footerlinks' );
					if ($menulinks) {
						echo '<ul class="footer-nav all-caps">';
						foreach($menulinks as $key => $value) {

							echo '<li><a
							title="'.$value['link_title'].'"
							target="'.$value['footer_target'].'"
							href="'.$value['footer_link'].'"
							>'.$value['link_title'].'</a></li>';

						}
						echo '</ul>';
					} else { ?> <?php } ?>

					<?php $slide = ot_get_option( 'social' );
					if ($slide) {
						echo '<ul class="footer-social">';
						foreach($slide as $key => $value) {

							echo '<li>';
								echo '<a title="'.$value['social_text'].'" target="'.$value['footer_target'].'" href="'.$value['social_link'].'">';
								echo '<span class="icon-'.$value['social_text'].'-with-circle "></span>';
								echo '</a>';
							echo '</li>';
						}
						echo '</ul>';
					} ?>

						<?php  if ($slide) { ?>
							<style>
								<?php  if ($slide) { ?>
									<?php foreach($slide as $key => $value) { ?>
										.footer-<?php echo esc_attr( $value['social_text'] ); ?>-hovered { background-color: <?php echo esc_attr( $value['social_text_color'] ); ?> !important;}
									<?php } ?>
								<?php } ?>
							</style>
							<script type="text/javascript">
								jQuery(document).ready(function( $ ) {
									<?php  if ($slide) { ?>
										<?php foreach($slide as $key => $value) { ?>
											$(".footer-social .icon-<?php echo esc_attr( $value['social_text'] ); ?>-with-circle").hover(function() { $("#main-footer").toggleClass("footer-<?php echo esc_attr( $value['social_text'] ); ?>-hovered") });
										<?php } ?>
									<?php } ?>
								});
							</script>
						<?php } ?>



				<?php if( ot_get_option( 'footerpowered' ) !='' ) : ?>
					<div class="copyright">
						<p><?php echo esc_html(ot_get_option('footerpowered') ); ?></p>

						<?php
							$language = ot_get_option( 'language' );
							if( ot_get_option( 'language' ) !='' ) :
						?>
							<div class="language">
							<span class="icon-globe"></span>
							<a tabindex="0"
								role="button"
								data-toggle="popover"
								data-trigger="focus"
								data-html="true"
								data-placement="top"
								data-content="
								<ul class='language-selection'>
								 <?php
									foreach($language as $key => $value) {
										echo "<li><a href='".$value['language_link']."'>".$value['language_text']."</a></li>"; }?>
										</ul>" ><?php echo esc_html(ot_get_option('languagetext') ); ?> <span class="icon-chevron-small-up"></span></a>
							</div> <!--/ .language -->
						<?php endif; ?>
					</div> <!--/ .copyright -->
				<?php endif; ?>

			</div> <!--/ .row -->
		</div> <!--/ .container -->
	</footer>
	<?php endif; ?>

	<?php if ( ot_get_option('footertotop') != 'off') : ?>
		<a id="to-top"><span class="icon-chevron-thin-up"></span></a>
	<?php endif; ?>

	<?php get_template_part( 'contact_map', 'page' ); ?>

	<?php wp_footer(); ?>
	</body>
</html>
