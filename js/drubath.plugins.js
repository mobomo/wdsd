(function ($) {
    $(function() {

		// Swipebox
		// For full settings see http://brutaldesign.github.io/swipebox/#options
		// Usage:
		/**
	     *  <a class="swipebox" href="*target*"></a>
	     */

		if (Drupal.settings.swipebox_enabled) {
	        var swipeBox = $('.swipebox');
	        if (swipeBox.length > 0) {
	            swipeBox.swipebox({
	            	useCSS : true, // false will force the use of jQuery for animations
					useSVG : true, // false to force the use of png for buttons
					initialIndexOnArray : 0, // which image index to init when a array is passed
					hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
					hideBarsDelay : 3000, // delay before hiding bars on desktop
					videoMaxWidth : 1140, // videos max width
					beforeOpen: function() {}, // called before opening
					afterOpen: null, // called after opening
					afterClose: function() {}, // called after closing
					loopAtEnd: false // true will return to the first image after the last image is reached
	            });
	        }
	    }

	    // Slick
	    // For full settings see http://kenwheeler.github.io/slick/#settings
	    // Usage:
	    /**
	     *  <div class="slick">
		 *		<div>your content</div>
		 *		<div>your content</div>
		 *		<div>your content</div>
		 *	</div>
	     */

		if (Drupal.settings.slick_enabled) {
	        var slickCarousel = $('.slick');
	        if (slickCarousel.length > 0) {
	            slickCarousel.slick({
	            	autoplay: false,
	            	autoplaySpeed: 3000,
	            	dots: false,
	            	dotsClass: 'carousel-dots',
	            	fade: false,
	            	arrows: true,
	            	pauseOnHover: true,
	            	pauseOnDotsHover: false,
	            	rows: 1,
	            	speed: 300
	            });
	        }
	    }

	    // MatchHeight
	    // For full settings see http://brm.io/jquery-match-height/
	    // Usage:
	    /**
	     *  <ul>
		 *		<li class="matchHeight">these will be equal heights</li>
		 *		<li class="matchHeight">these will be equal heights</li>
		 *		<li class="matchHeight">these will be equal heights</li>
		 *	</ul>
	     */

		if (Drupal.settings.matchHeight_enabled) {
			var matchHeight = $('.matchHeight');
			matchHeight.matchHeight();
	    }
	    
    });
})(jQuery);