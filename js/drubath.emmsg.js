(function ($) {

	// Emergency Message
    var headerMessage = $('#emergency-message'),

        hideMessage = function(){
            var hideMsg = $('#em-close');

            hideMsg.on('click', function(){
                headerMessage.velocity("fadeOut", { duration: 500 });
                Cookies.set('emClosed','hideThatJazz',{ expires: 7 });
                return false;
            });
        },

        cookies = function(){
            var cookie = Cookies.get('emClosed');

            if (cookie == 'hideThatJazz'){
                headerMessage.remove();
            }
        };

        // ---- 
        // Prep functions to run
        // ---- 

        Ready = function(){
            hideMessage();
            cookies();
        };


    // ----
    // Run everything
    // ----

    // Document.ready
    $(function() {
        Ready();
    });

})(jQuery);