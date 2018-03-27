<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */
register_nav_menus(array(
	'main-menu'  => 'Main Menu',
	'footer-menu'  => 'Footer Menu',
	'fullscreen-menu'  => 'Full Screen Menu',
));

/**
 * Desktop navigation - Main Menu
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'drumroll_main_menu' ) ) {
	function drumroll_main_menu() {
		wp_nav_menu( array(
			'container'      => false,
			'menu_class'     => 'dropdown menu slimmenu',
			'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
			'theme_location' => 'main-menu',
			'depth'          => 3,
			'fallback_cb'    => false,
		));
	}
}
if ( ! function_exists( 'drumroll_footer_menu' ) ) {
	function drumroll_footer_menu() {
		wp_nav_menu( array(
			'container'      => false,
			'menu_class'     => 'menu',
			'items_wrap'     => '<ul id="%1$s" class="%2$s footer-menu">%3$s</ul>',
			'theme_location' => 'footer-menu',
			'depth'          => 3,
			'fallback_cb'    => false,
		));
	}
}
if ( ! function_exists( 'drumroll_fullscreen_menu' ) ) {
	function drumroll_fullscreen_menu() {
		wp_nav_menu( array(
			'container'      => false,
			'menu_class'     => 'menu',
			'items_wrap'     => '<ul id="%1$s" class="%2$s fullscreen-menu">%3$s</ul>',
			'theme_location' => 'fullscreen-menu',
			'depth'          => 3,
			'fallback_cb'    => false,
		));
	}
}