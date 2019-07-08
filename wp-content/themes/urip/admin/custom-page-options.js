    
	
	jQuery(document).ready(function() {

			

            /********************************************************************************* UNLIMITED-PAGE.PHP   */
            if(jQuery('#page_template').val() == 'unlimited-page.php') {
                jQuery('#unlimited-page').show(); // show the meta box
            } else {
                jQuery('#unlimited-page').hide();  // hide your meta box
            }

            // UNLIMITED-PAGE.PHP
            // - outputs the template filename
            // - checking for console existance to avoid js errors in non-compliant browsers
            if (typeof console == "object") 
                console.log ('default value = ' + jQuery('#page_template').val());

            /*** Live adjustment of the meta box visibility */
            jQuery('#page_template').live('change', function(){
				if(jQuery(this).val() == 'unlimited-page.php') {
					jQuery('#unlimited-page').show(); // show the meta box
				} else {
					jQuery('#unlimited-page').hide(); // hide your meta box
                }

                // Debug only
                if (typeof console == "object") 
                    console.log ('live change value = ' + jQuery(this).val());
            }); 
			
			
			 /********************************************************************************* FRONTPAGE.PHP   */
            if(jQuery('#page_template').val() == 'frontpage.php') {
                jQuery('#frontpage').show(); // show the meta box
            } else {
                jQuery('#frontpage').hide();  // hide your meta box
            }

            // FRONTPAGE-PAGE.PHP
            // - outputs the template filename
            // - checking for console existance to avoid js errors in non-compliant browsers
            if (typeof console == "object") 
                console.log ('default value = ' + jQuery('#page_template').val());

            /*** Live adjustment of the meta box visibility */
            jQuery('#page_template').live('change', function(){
				if(jQuery(this).val() == 'frontpage.php') {
					jQuery('#frontpage').show(); // show the meta box
				} else {
					jQuery('#frontpage').hide(); // hide your meta box
                }

                // Debug only
                if (typeof console == "object") 
                    console.log ('live change value = ' + jQuery(this).val());
            }); 
			
			
			
	});