<?php
/*
Template Name: History
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="history-header about-header">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>History of Seibels</h2>
	   	   </div>
		</div>
	</div>	
</section>

<section class="timeline-section">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>See how it all began</h2>
	   	   </div>			
		</div>
	</div>
	<div class="timeline-container">
		<div class="timeline-slider transition">
			<?php $i = 0; ?>
			<?php if(get_field('timeline')): ?>
				<?php while(has_sub_field('timeline')): ?>
					<div class="year-container <?php if ($i == 0) { echo 'active'; } ?>" data-index="<?php echo $i; ?>">
						<?php echo get_sub_field('year'); ?>
						<div class="year-modal">
							<div class="modal-photo-container">
								<div class="close-button">&times;</div>
								<?php echo wp_get_attachment_image(get_sub_field('photo'), 'large'); ?>
							</div>
							<h3><?php echo get_sub_field('year'); ?></h3>
							<?php echo get_sub_field('year_pp'); ?>
						</div>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="tl-nav-container text-center">
		<div id="tl-left" class="tl-nav active"><?php get_template_part('assets/images/left', 'chevron.svg'); ?></div> click to explore 
		<div id="tl-right" class="tl-nav"><?php get_template_part('assets/images/right', 'chevron.svg'); ?></div>
	</div>
	<script>
		var tlSlider = jQuery('.timeline-slider');
		var tlPosition; // Define timeline slider position variable
		var tlModalPosition; // Define timeline modal position variable
		var tlActive = 0; // Active history item index
		var tlRadius = 78; // Radius of timeline item circle
		var tlWidth = 304; // Width of timeline item (includes circle and line);
		var tlItemCount = jQuery('.timeline-slider > div').length; // Number of history items in timeline
		jQuery(".tl-nav-container").on( "click", "#tl-left.active", function(tlPosition) {
			tlActive+= 1;
			tlRecalc();
			tlNavActive();
		});
		jQuery(".tl-nav-container").on( "click", "#tl-right.active", function(tlPosition) {
			tlActive-= 1;
			tlRecalc();
			tlNavActive();
		});
		
		// Recalculate timeline position when browser is resized.
		jQuery(document).load(jQuery(window).bind("resize", tlRecalc));
		
		// Set timeline position.
		function tlRecalc() {
			var tlPosition = ((tlActive * tlWidth) + tlRadius);
			tlSlider.css("left", 'calc(50% - ' + tlPosition + 'px)');
		}
		
		// Set slider nav items active or inactive based on number of items in timeline.
		function tlNavActive() {
			if (tlActive == (tlItemCount - 1)) {
				jQuery("#tl-left").removeClass('active');
			} else {
				jQuery("#tl-left").addClass('active');
			}
			if (tlActive == 0) {
				jQuery("#tl-right").removeClass('active');
			} else {
				jQuery("#tl-right").addClass('active');
			}						
		}
		
		// Timeline modal functionality
		jQuery(".timeline-container").on( "click", ".year-container", function(tlPosition) {
			tlActive = jQuery(this).data('index');
			tlRecalc();
			tlNavActive();
			jQuery(this).children('.year-modal').fadeToggle();
			jQuery('.year-container').not(this).each(function(){
				jQuery(this).children('.year-modal').fadeOut();			
			});
		});			
	</script>
</section>

<?php get_footer(); ?>