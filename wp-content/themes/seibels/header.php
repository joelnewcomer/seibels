<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */
?>

<!doctype html>
<html class="no-js no-svg" <?php html_tag_schema(); ?> <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php wp_head(); ?>
		
		<!-- Polyfills to make various versions of IE play nicer -->
		<script>
			jQuery( document ).ready(function() {
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/respond.min.js', ['ie7', 'ie8']);
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/nwmatcher-1.3.4.min.js', ['ie7', 'ie8']);
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/selectivizr-min.js', ['ie7', 'ie8']);
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/html5shiv.min.js', ['ie7', 'ie8', 'ie9']);
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/css3-multi-column.min.js', ['ie7', 'ie8', 'ie9']);
				conditionizr.polyfill('<?php echo get_template_directory_uri(); ?>/assets/javascript/polyfills/flexibility.js', ['ie8', 'ie9']);
				conditionizr.config({
					tests: {
						'ie7': ['class'],
						'ie8': ['class'],
						'ie9': ['class'],
					}
				});
			})
		</script>

	</head>
	<body <?php body_class(); ?>>
		<?php get_template_part('template-parts/preloader'); ?>
		<a class="skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'drumroll' ); ?></a>
		<div class="header-wrapper match-header">
			<header id="masthead" class="site-header match-header"  role="banner">
				<nav id="site-navigation" class="main-navigation top-bar grid-container" role="navigation">
					<div class="top-bar-left">
						<?php get_template_part('template-parts/site-logo','link'); ?>
					</div> <!-- top-bar-left -->
					<div class="top-bar-right hide-for-print">
						<?php drumroll_main_menu(); ?>
						<a href="#" class="menu" aria-controls="site-navigation"><?php get_template_part('assets/images/hamburger.svg'); ?> <?php _e( 'More', 'drumroll' ); ?></a>
						<div class="icon-wrapper">
							<?php
							// WooCommerce Cart Icon
							if (is_woocommerce_activated()) {
								get_template_part('template-parts/cart-icon');
							}
							// Search Icon
							get_template_part('assets/images/search.svg');
							?>
						</div> <!-- icon-wrapper -->
					</div> <!-- top-bar-right -->
				</nav> <!-- #site-navigation -->
			</header> <!-- #masthead -->
		</div> <!-- header-wrapper -->
		
		<main id="content" class="container" tabindex="-1">