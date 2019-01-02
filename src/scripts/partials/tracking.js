/* ===================================================================
    Facebook/Google Tracking
====================================================================== */

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
};

function track_event(name, category, value) {
    
    // Track Facebook
    fbq('trackCustom', name, {
        event_category: category,
        event_val: value 
    });
    
    // Track Google
    ga('send', {
        hitType: 'event',
        eventCategory: category,
        eventAction: name,
        eventLabel: value
    });
    
}

jQuery(function($) {    
    
    // Scroll Depth Tracking 
    var quarter = half = threeQuarter = whole = false;
    
    $(window).scroll(function() {
        
        var s = $(window).scrollTop(),
            d = $(document).height(),
            c = $(window).height();

        var scrollPercent = (s / (d-c)) * 100;
        
        if ( scrollPercent == 100 && whole === false) {
            track_event('scroll', 'scroll-depth', '100');
            whole = true;
        } else if (scrollPercent >= 75 && threeQuarter === false) {
            track_event('scroll', 'scroll-depth', '75');
            threeQuarter = true;
        } else if (scrollPercent >= 50 && half === false) {
            track_event('scroll', 'scroll-depth', '50');
            half = true;
        } else if (scrollPercent >= 25 && quarter === false) {
            track_event('scroll', 'scroll-depth', '25');
            quarter = true;
        }
        
    });
    
    // Stopgap solution for events on registration links @todo
    $('.register-episode-1').on('click', function() {
        track_event('register', 'leadership-series', 'top');
    });
    
    $('.register-episode-1a').on('click', function() {
        track_event('register', 'leadership-series', 'bottom');
    });
    
    $('.sa-track').on('click', function() {
        var data = $(this).attr('data-track');
        track_event(data, 'sa', 'click');
    });
    
    // Global Tracking for Buttons generated by shortcodes
    $('.tracking-button').on('click', function() {
        var category = $(this).attr('data-event-category'),
            name = $(this).attr('data-event-name'),
            value = $(this).attr('data-event-value');
            
        track_event(name, category, value);
    });
    
    // Track submitted forms
    $(document).bind('gform_confirmation_loaded', function(event, formId){
        track_event('submit', 'form', formId);
    });
    
    // Vimeo Tracking Code
    var iframes = document.querySelectorAll('iframe');
    
    iframes.forEach(function(iframe, i) {
        if (iframe.getAttribute('src').includes('vimeo')) {
            var player = new Vimeo.Player(iframe);
            var quarter = half = threeQuarter = ninety = false;
            var videoTitle = '';
            var inView = false;
            
            $(window).on('load scroll', function() {
                if ($(iframe).isInViewport() && inView == false) {
                    
                    // Track Facebook
                    fbq('trackCustom', 'video', {
                        event_detail: 'in_view',
                        video_title: videoTitle
                    });
                    
                    // Track Google
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'video',
                        eventAction: 'in_view',
                        eventLabel: videoTitle
                    });                    
                    
                    inView = true;
                }
            });
            
            player.getVideoTitle().then(function(title) {
                videoTitle = title;
            });
            
            player.on('play', function() {
                
                // Track Facebook
                fbq('trackCustom', 'video', {
                    event_detail: 'play',
                    video_title: videoTitle
                });
                
                // Track Google
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'video',
                    eventAction: 'play',
                    eventLabel: videoTitle
                });   
                                
            });
            
            player.on('pause', function() {
                
                // Track Facebook
                fbq('trackCustom', 'video', {
                    event_detail: 'pause',
                    video_title: videoTitle
                });
                
                // Track Google
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'video',
                    eventAction: 'pause',
                    eventLabel: videoTitle
                });   
            });
            
            player.on('timeupdate', function(e) {
                if (e.percent >= 0.25 && quarter == false) {
                    
                    // Track Facebook
                    fbq('trackCustom', 'video', {
                        event_detail: 'progress',
                        percentage: '25%',
                        video_title: videoTitle
                    });
                    
                    // Track Google
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'video',
                        eventAction: 'progress - 25%',
                        eventLabel: videoTitle
                    });   
                    
                    quarter = true;
                } else if (e.percent >= 0.50 && half == false) {
                    // Track Facebook
                    fbq('trackCustom', 'video', {
                        event_detail: 'progress',
                        percentage: '50%',
                        video_title: videoTitle
                    });
                    
                    // Track Google
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'video',
                        eventAction: 'progress - 50%',
                        eventLabel: videoTitle
                    });   
                    half = true;
                } else if (e.percent >= 0.75 && threeQuarter == false) {
                    // Track Facebook
                    fbq('trackCustom', 'video', {
                        event_detail: 'progress',
                        percentage: '75%',
                        video_title: videoTitle
                    });
                    
                    // Track Google
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'video',
                        eventAction: 'progress - 75%',
                        eventLabel: videoTitle
                    });   
                    threeQuarter = true;
                } else if (e.percent >= 0.90 && ninety == false) {
                    // Track Facebook
                    fbq('trackCustom', 'video', {
                        event_detail: 'progress',
                        percentage: '90%',
                        video_title: videoTitle
                    });
                    
                    // Track Google
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'video',
                        eventAction: 'progress - 90%',
                        eventLabel: videoTitle
                    });   
                    ninety = true;
                }
                
            });
            
            player.on('seeked', function(e) {
                var percent = e.percent * 100;
                
                // Track Facebook
                fbq('trackCustom', 'video', {
                    event_detail: 'seek',
                    percentage: Math.round(percent),
                    video_title: videoTitle
                });
                
                // Track Google
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'video',
                    eventAction: 'seeked to' + Math.round(percent) + '%',
                    eventLabel: videoTitle
                });                   
                
            });
            
            player.on('ended', function(e) {
                
                // Track Facebook
                fbq('trackCustom', 'video', {
                    event_detail: 'ended',
                    video_title: videoTitle
                });
                
                // Track Google
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'video',
                    eventAction: 'ended',
                    eventLabel: videoTitle
                });       
            });
        }
    });
    
    // India Tracking Code
    $('#gform_submit_button_24').on('click', function() {
        fbq('trackSingle', '174436890132477', 'Purchase');
    });
    
    $('.tracking-button[data-event-name="design thinking india"]:contains("Register")').on('click', function() {
        fbq('trackSingle', '174436890132477', 'Lead');
    });
    
    if ($('body').hasClass('page-id-6183')) {
        fbq('trackSingle', '174436890132477', 'CompleteRegistration');
    }
    
});
