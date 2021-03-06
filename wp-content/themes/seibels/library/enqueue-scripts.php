<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */

// Defer jQuery Parsing using the HTML5 defer property
/* if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
		if ( strpos( $url, 'flow-flow' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
} */

if ( ! function_exists( 'drumroll_scripts' ) ) :
	function drumroll_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/dist/foundation.css', array(), '2.6.1', 'all' );
		
		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// register scripts
		wp_register_script( 'header-scripts', get_template_directory_uri() . '/assets/javascript/header-scripts.js', array('jquery'), '1.0.0', false );
		if ( true == get_theme_mod( 'sr_toggle', true ) ) {
			wp_register_script( 'scroll-reveal', get_template_directory_uri() . '/assets/javascript/originals/scrollreveal.min.js', array('jquery'), '1.0.0', true );
		}
		if (is_page_template( 'page-templates/resources.php' )) {
			wp_register_script( 'holmes', get_template_directory_uri() . '/assets/javascript/originals/holmes.min.js', array('jquery'), '1.0.0', true );
		}
		wp_register_script( 'footer-scripts', get_template_directory_uri() . '/assets/javascript/dist/footer_scripts.js', array('jquery'), '1.0.0', true );
		wp_register_script( 'snap-svg', get_template_directory_uri() . '/assets/javascript/originals/snap.svg-min.js', array('jquery'), '1.0.0', true );
		
		
		// enqueue scripts
		wp_enqueue_script('header-scripts');
		wp_enqueue_script('scroll-reveal');
		if (is_page_template( 'page-templates/resources.php' )) {
			wp_enqueue_script('holmes');
		}
		wp_enqueue_script('footer-scripts');
		wp_enqueue_script('snap-svg');

	}

	add_action( 'wp_enqueue_scripts', 'drumroll_scripts' );
endif;
