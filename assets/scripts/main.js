/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

function scrollToAnchor(aid) {
    var aTag = $("#" + aid);
    $('html,body').animate({
        scrollTop: aTag.offset().top - $(".jump-nav").height()
    }, 'fast');
}

(function($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function() {
                // JavaScript to be fired on all pages
                var jumpNav = $(".jump-nav");
                var pageHead = $(".page-head");
                var header = $("header");

                var fixedHeight = header.height() + pageHead.height();

                $(window).scroll(function() {
                    if ($(this).scrollTop() > fixedHeight) {
                        jumpNav.addClass("fixed");
                        pageHead.addClass("jump-pad");
                    } else {
                        jumpNav.removeClass("fixed");
                        pageHead.removeClass("jump-pad");
                    }
                });

                $(".jump-nav a").on("click", function(e) {
                    e.preventDefault();
                    scrollToAnchor($(this).attr('name'));
                });
                $(window).load(function() {
                    $('.isotope').isotope({
                        masonry: {
                            columnWidth: '.item'
                        },
                        itemSelector: '.item',
                        percentPosition: true
                    });
                });


                imagesLoaded('.isotope', function() {
                    $('.isotope').addClass('loaded');
                    $('.isotope .item').each(function(i) {
                        $(this).delay(i * 300).queue(function() {
                            $(this).addClass("loaded").dequeue();
                        });
                    });

                });

            },
            finalize: function() {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function() {
                // JavaScript to be fired on the home page
                imagesLoaded('#full-bg', function() {
                    $fullBg = $("#full-bg");
                    $fullBg.css('background-image', 'url(' + $fullBg.find('img').attr('src') + ')');
                    $fullBg.addClass('loaded');
                });

            },
            finalize: function() {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function() {
                // JavaScript to be fired on the about us page
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
