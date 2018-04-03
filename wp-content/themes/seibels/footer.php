<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */
?>
	</main> <!-- .container -->
				
	<footer id="footer" role="contentinfo">
		<div class="main-footer">
			<div class="grid-container">
				<div class="grid-x">
					<div class="large-4 medium-4 cell copyright small-text-center">						
						<?php get_template_part('template-parts/site-logo','link'); ?>
						<div class="address">
							<?php get_template_part('template-parts/locations'); ?>
						</div> <!-- address -->
						<?php get_template_part('template-parts/social'); ?>
						<p class="copyright">&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?>.  <span class="no-break"><?php _e( 'All rights reserved.', 'textdomain' ); ?></span></p>
					</div>
					<div class="large-8 medium-8 cell hide-for-print text-center footer-resources">
						<h3 class="resources-header">Insights & Resources</h3>
						<div class="footer-icons">
							<a class="footer-icon" href="<?php echo get_site_url(); ?>/news-events">
								<span class="transition">News & Events</span>
								<div class="footer-svg">
									<?php get_template_part('assets/images/news', 'icon.svg'); ?>
								</div>
							</a>
							<a class="footer-icon" href="<?php echo get_site_url(); ?>/video-library">
								<span class="transition">Video Library</span>
								<div class="footer-svg">
									<?php get_template_part('assets/images/video', 'icon.svg'); ?>
								</div>
							</a>
							<a class="footer-icon" href="<?php echo get_site_url(); ?>/white-papers">
								<span class="transition">White Papers</span>
								<div class="footer-svg">
									<?php get_template_part('assets/images/whitepaper', 'icon.svg'); ?>
								</div>
							</a>							
						</div>
						<h3 class="subscribe-header">Subscribe to our mailing list</h3>
						<?php get_template_part('template-parts/subscribe-form'); ?>
					</div>
				</div> <!-- grid-x -->
			</div> <!-- grid-container -->
		</div> <!-- main-footer -->
		<div class="sub-footer">
			<div class="grid-container">
				<div class="grid-x">
					<div class="large-7 medium-7 cell hide-on-print small-text-center">
						<?php drumroll_footer_menu(); ?>
					</div>
					<div class="large-5 medium-5 cell drum hide-on-print text-right small-text-center">
						<a href="http://www.drumcreative.com" target="_blank"><?php _e( 'Web Design by: Drum Creative' ); ?></a>
					</div>					
				</div> <!-- grid-x -->
			</div> <!-- grid-container -->			
		</div> <!-- sub-footer -->
	</footer>
	
	<?php // get_template_part( 'template-parts/search-modal' ); ?>
	<a class="cd-top"><?php _e( 'Top', 'textdomain' ); ?></a>

<?php wp_footer(); ?>

</body>
</html>