<?php
/*===================================
=             Plugins               =
===================================*/

// 1. Shortcode Empty Paragraph Fix 0.2 - https://wordpress.org/plugins/shortcode-empty-paragraph-fix/
// 2. WP Comment Humility 0.1.0 - https://wordpress.org/plugins/wp-comment-humility/


// Shortcode Empty Paragraph Fix 0.2 - https://wordpress.org/plugins/shortcode-empty-paragraph-fix/
function shortcode_empty_paragraph_fix( $content ) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr( $content, $array );
    return $content;
}
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );


/**
 * Plugin Name: WP Comment Humility
 * Plugin URI:  https://wordpress.org/plugins/wp-comment-humility/
 * Description: Move the "Comments" menu underneath "Posts"
 * Author:      John James Jacoby
 * Version:     0.1.0
 * Author URI:  https://profiles.wordpress.org/johnjamesjacoby/
 * License:     GPL v2 or later
 */


// Actions
add_action( 'admin_menu',             '_wp_comment_humility' );
add_action( 'admin_head-comment.php', '_wp_comment_humility_modify_admin_menu_highlight' );

function _wp_comment_humility() {

	// Look for
	$comments_menu = _wp_comment_humility_get_menu_index_by_slug( 'edit-comments.php' );

	// No comments
	if ( false !== $comments_menu ) {

		// Unset top level menu
		unset( $GLOBALS['menu'][ $comments_menu ], $GLOBALS['submenu'][ 'edit-comments.php' ] );

		// Move comments to underneath "Posts"
		$awaiting_mod = wp_count_comments();
		$awaiting_mod = $awaiting_mod->moderated;
		$GLOBALS['submenu']['edit.php'][9] = array( sprintf( __( 'Comments %s' ), "<span class='awaiting-mod count-{$awaiting_mod}'><span class='pending-count'>" . number_format_i18n( $awaiting_mod ) . '</span></span>' ), 'edit_posts', 'edit-comments.php' );
	}
}

function _wp_comment_humility_get_menu_index_by_slug( $location = '' ) {
	foreach ( $GLOBALS['menu'] as $index => $menu_item ) {
		if ( $location === $menu_item[2] ) {
			return $index;
		}
	}
	return false;
}

function _wp_comment_humility_modify_admin_menu_highlight() {
	$GLOBALS['plugin_page']  = 'edit.php';
}
?>