
	<!--
	=================================
	== BEGIN CONTACT MODAL CONTENT ==
	=================================
	-->
	
	<?php if ( ot_get_option('contactpopupvisibility') == 'on') : ?>
	<div class="contact-overlay overlay-scale">
		<a class="overlay-close"><?php esc_html_e( 'Close', 'urip' ); ?></a>
		<div class="container">
			<div class="row">
				<div class="contact-content col-lg-10 col-lg-offset-1 centered">
					<h2 class="all-caps"> <?php echo esc_attr( ot_get_option( 'nt_contact_head' ) ); ?></h2>
					<p><?php echo esc_attr( ot_get_option( 'nt_contact_desc' ) ); ?></p>
					<!-- BEGIN Contact Form -->
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
						<div class="contact-form" id="contact-form-off">
							<?php dynamic_sidebar( 'contactform' ); ?>
						</div> <!--/ .contact-form -->
					</div> <!--/ .col-lg-6 -->
					<!--/ END Contact Form -->
				</div> <!--/ .contact-content -->
			</div> <!--/ .row -->
		</div> <!--/ .container -->
	</div> <!--/ .contact-overlay -->
	<?php 	wp_enqueue_script('nt-custom-contact'); ?>
	<?php endif; ?>
	

	<!-- BEGIN Subscribe Form Alert/Notification -->
	<div id="subscribe-error-notification" class="notif-box">

		<span class="icon-bullhorn notif-icon"></span>
		<p><?php esc_html_e( 'Subscribe error, please review your email address.', 'urip' ); ?></p>
		<a class="notification-close"><?php esc_html_e( 'Close', 'urip' ); ?></a>

	</div> <!--/ #error-notification -->

	<div id="subscribe-success-notification" class="notif-box">

		<span class="icon-checkmark notif-icon"></span>
		<p><?php esc_html_e( 'You are now subscribed, thank you!', 'urip' ); ?></p>
		<a class="notification-close"><?php esc_html_e( 'Close', 'urip' ); ?></a>

	</div> <!--/ #success-notification -->
	<!-- END Subscribe Form Alert/Notifications -->


	<!-- BEGIN Contact Form Alert/Notifications -->
	<div id="error-notification" class="notif-box">

		<span class="icon-bullhorn notif-icon"></span>
		<p><?php esc_html_e( 'There was a problem with your submission. Please check the field(s) with red label below.', 'urip' ); ?></p>
		<a class="notification-close"><?php esc_html_e( 'Close', 'urip' ); ?></a>

	</div> <!--/ #error-notification -->

	<div id="success-notification" class="notif-box">

		<span class="icon-checkmark notif-icon"></span>
		<p><?php esc_html_e( 'Your message has been sent. We will get back to you soon!', 'urip' ); ?></p>
		<a class="notification-close"><?php esc_html_e( 'Close', 'urip' ); ?></a>

	</div> <!--/ #success-notification -->
	<!-- END Contact Form Alert/Notifications -->
	
	
	
	