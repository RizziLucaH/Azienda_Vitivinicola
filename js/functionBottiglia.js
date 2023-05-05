(function($) { "use strict";
		
	//Page cursors

    // document.getElementsByTagName("body")[0].addEventListener("mousemove", function(n) {
    //     t.style.left = n.clientX + "px", 
	// 	t.style.top = n.clientY + "px", 
	// 	e.style.left = n.clientX + "px", 
	// 	e.style.top = n.clientY + "px", 
	// 	i.style.left = n.clientX + "px", 
	// 	i.style.top = n.clientY + "px"
    // });
	
	$(document).ready(function() {
		
		/* Hero Case study images */			
		$('.case-study-name:nth-child(1)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(1)').addClass("show");
			$('.case-study-name:nth-child(1)').addClass('active');
		})
		$('.case-study-name:nth-child(2)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(2)').addClass("show");
			$('.case-study-name:nth-child(2)').addClass('active');
		})
		$('.case-study-name:nth-child(3)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(3)').addClass("show");
			$('.case-study-name:nth-child(3)').addClass('active');
		})
		$('.case-study-name:nth-child(4)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(4)').addClass("show");
			$('.case-study-name:nth-child(4)').addClass('active');
		})
		$('.case-study-name:nth-child(5)').on('mouseenter', function() {
			$('.case-study-name.active').removeClass('active');
			$('.case-study-images li.show').removeClass("show");
			$('.case-study-images li:nth-child(5)').addClass("show");
			$('.case-study-name:nth-child(5)').addClass('active');
		})
		$('.case-study-name:nth-child(1)').trigger('mouseenter')
					
	});

	
	
	
})(jQuery); 