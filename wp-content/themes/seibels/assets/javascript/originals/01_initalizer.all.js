 /**
 * Initialize jQuery Plugins
 **/
jQuery( document ).ready(function() {

	// Handle FOUC
	jQuery('.no-fouc').removeClass('no-fouc');

	if (!jQuery( "body" ).hasClass( "no-sr" ) && !jQuery("body").hasClass("ie9")) {
    	window.sr = ScrollReveal().reveal('.sr', { viewFactor: 0.05 });
	}

    if(jQuery("#estimated-time").length != 0) {
        jQuery('article').readingTime();
    }
    jQuery('.gfield input').each(function() {
        if (jQuery(this).attr( "placeholder" ) != undefined) {
            jQuery(this).floatlabel();
        }
    });
    // jQuery('.match-header').matchHeight({ byRow: false });

    jQuery('ul.slimmenu').slimmenu( {
        resizeWidth: '640',
        collapserTitle: '',
        animSpeed: 'medium',
        easingEffect: null,
        indentChildren: false,
        childrenIndenter: '&nbsp;',
        expandIcon: '<svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19l-742-741q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"/></svg>',
        collapseIcon: '<svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19l-531-531-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"/></svg>',
    });

    jQuery('.search-button').featherlight({
        namespace: 'fl-modal',
        variant: 'fl-search',
        closeIcon: '&#10005;',
        afterContent: function(event){
            setTimeout(function() {
                jQuery( 'input#s' ).focus();
            }, 500);
        },
    });
    
    // jQuery(window).paroller();
});

/* jQuery.holdReady( true );
setTimeout(function() {
	jQuery.holdReady( false );
}, 2000); */