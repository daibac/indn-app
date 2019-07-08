jQuery(document).ready(function( $ ) {
	 

	$('.app-carousel').slick({
			infinite: true,
			autoplay: true,
			centerMode: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 2000,
			slidesToShow: 3,
			slidesToScroll: 1,
			variableWidth: true,
			responsive: [
			    {
			      breakpoint: 769,
			      settings: {
			        slidesToShow: 3
			      }
			    },
			    {
			      breakpoint: 569,
			      settings: {
				    dots: false,
			        slidesToShow: 1,
			        variableWidth: false,
			        fade: true,
					cssEase: 'linear'
			      }
			    }
			]
		});
		});




