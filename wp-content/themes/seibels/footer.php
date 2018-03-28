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
						<p>&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?>.  <span class="no-break"><?php _e( 'All rights reserved.', 'textdomain' ); ?></span></p>
					</div>
					<div class="large-8 medium-8 cell hide-for-print small-text-center">
						<h3>Insights & Resources</h3>
						<?php get_template_part('template-parts/subscribe-form'); ?>
					</div>
				</div> <!-- grid-x -->
			</div> <!-- grid-container -->
		</div> <!-- main-footer -->
		<div class="sub-footer">
			<div class="grid-container">
				<div class="grid-x">
					<div class="large-7 medium-7 cell drum hide-on-print small-text-center">
						<?php drumroll_footer_menu(); ?>
					</div>
					<div class="large-5 medium-5 cell drum hide-on-print text-right small-text-center">
						<a href="http://www.drumcreative.com" target="_blank"><?php _e( 'Web Design by: Drum Creative' ); ?></a>
					</div>					
				</div> <!-- grid-x -->
			</div> <!-- grid-container -->			
		</div> <!-- sub-footer -->
	</footer>
	
	<?php get_template_part( 'template-parts/search-modal' ); ?>
	<a class="cd-top"><?php _e( 'Top', 'textdomain' ); ?></a>

<?php wp_footer(); ?>

</body>
</html>