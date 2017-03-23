(function ($) {

    /*
        1. Set everything up as variables, e.g:
     
            myFunction = function(){
                var saveEverythingAsVariables = $('#everything');

                ... jquery in here
            }
     
        2. Then add function to required launcher, e.g:

            Ready = function(){
                myfunction();
            }
    */

    var 
        // General purpose vars
        htmlBody = $('html,body'),
        Window = $(window),
        Document = $(document),
        Wrapper = $('#main-content'),

        // Make all external links open in new window
        externalLinks = function(){
            var extLink = Wrapper.find($('a[href^="http"],a[href^="https"]'));
            extLink.attr('target','_blank');
        },

        // Ajax page loading
        ajaxLoading = function(){
            if ($.support.pjax) {                
                Document.pjax('a:not(a[href^="http"],a[href^="mailto"],a[target="_blank"], #admin-menu-account a)', Wrapper);

                Document.on('pjax:clicked', function() {
                    Wrapper.addClass('animated fadeOutUp');
                    htmlBody.velocity("scroll", { duration: 350, easing: "ease-in-out" });
                });
            }
        },

        // Smooth scrolling
        smoothScroll = function(){
            Wrapper.on('click', '.scroll', function() {
                var $target = $(this.hash);
                $target.velocity("scroll", { duration: 300, offset: -60, easing: "ease-in-out" });
                return false;
            });
        },

        // Mobile nav
        mobileNav = function(){
            var menuToggle = $('#nav-toggle'),
                nav = $('#main-menu');
                
            menuToggle.on('click', function(){
                nav.slideToggle(250);
                $(this).toggleClass('active');
                return false;
            });
        },

        // add class to links added in ckeditor
        linkButton = function(){
            var section = $("section[class='usa-section']"),
                cklink = section.find($('p a'));
            cklink.addClass( "usa-button usa-button-big" );
        },
        pfont = function(){
            var section = $("section[class='usa-section']"),
                ckpfont = section.find($('p'));
            ckpfont.addClass( "usa-font-lead" );
        },

        // ---- 
        // Prep functions to run
        // ----

        Ready = function(){
            externalLinks();
            ajaxLoading();
            smoothScroll();
            mobileNav();
            linkButton();
            pfont();
        },

        Load = function(){

        },

        Unload = function(){

        };

    // ----
    // Run everything
    // ----

    // Document.ready
    $(function() {
        Ready();
    });

    // When page is loaded
    Window.load(function() {
        Load();
    });

    // When leaving page
    Window.unload(function() {
        Unload();
    });

})(jQuery);
