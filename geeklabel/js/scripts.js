(function ($) {
	"use strict";
	$(document).ready(function(){
		if($("#clients").length){
			$("#clients .view-content").owlCarousel({
				loop:true,
				margin:100,
				nav:true,
				slideBy:1,
				autoplay:true,
				autoplayTimeout:5000,
				navText : ["<i class='fa fa-chevron-left fa-2x'></i>","<i class='fa fa-chevron-right fa-2x'></i>"],
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:3
					}
				}
			});
		}
		
		if($('.btn-scroll').length){
			$('.btn-scroll').click(function(e){
				var anchort = $(this).attr('href');
				$('html, body').animate({
					scrollTop: $(anchort).offset().top
				}, 1000);
				e.preventDefault();
			});
		}
	});
}(jQuery));	
