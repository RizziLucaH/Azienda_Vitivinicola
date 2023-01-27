

	var html = document.documentElement;
		var body = document.body;

		var scroller = {
		target: document.querySelector(".scroll-container"),
		ease: 0.09, // <= scroll speed
		endY: 0,
		y: 0,
		resizeRequest: 1,
		scrollRequest: 0,
		};

		var requestId = null;

		TweenLite.set(scroller.target, {
		rotation: 0.01,
		force3D: true
		});

		window.addEventListener("load", onLoad);

		function onLoad() {    
		updateScroller();  
		window.focus();
		window.addEventListener("resize", onResize);
		document.addEventListener("scroll", onScroll); 
		}

		function updateScroller() {
		
		var resized = scroller.resizeRequest > 0;
			
		if (resized) {    
			var height = scroller.target.clientHeight;
			body.style.height = height + "px";
			scroller.resizeRequest = 0;
		}
			
		var scrollY = window.pageYOffset || html.scrollTop || body.scrollTop || 0;

		scroller.endY = scrollY;
		scroller.y += (scrollY - scroller.y) * scroller.ease;

		if (Math.abs(scrollY - scroller.y) < 0.05 || resized) {
			scroller.y = scrollY;
			scroller.scrollRequest = 0;
		}
		
		TweenLite.set(scroller.target, { 
			y: -scroller.y 
		});
		
		requestId = scroller.scrollRequest > 0 ? requestAnimationFrame(updateScroller) : null;
		}

		function onScroll() {
		scroller.scrollRequest++;
		if (!requestId) {
			requestId = requestAnimationFrame(updateScroller);
		}
		}

		function onResize() {
		scroller.resizeRequest++;
		if (!requestId) {
			requestId = requestAnimationFrame(updateScroller);
		}
		}	


		const controller = new ScrollMagic.Controller();

		var forEach = function(array, callback, scope) {
			for (var i = 0; i < array.length; i++) {
				callback.call(scope, i, array[i]);
			}
		};

		var myNodeList = document.querySelectorAll(".img-loader");

		forEach(myNodeList, function(index, value) {
			const tween = TweenMax.to(value, 2, { borderTopLeftRadius:"100%", borderTopRightRadius:"100%", delay:0.3, height: 0, ease: Power2.easeOut });
			
			const itemScene = new ScrollMagic.Scene({
				triggerElement: value,
				triggerHook: 0.6,
				reverse: false
			})
			.setTween(tween)
			.addTo(controller);
		});