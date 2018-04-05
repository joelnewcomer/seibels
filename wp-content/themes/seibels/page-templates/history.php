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

<section class="timeline">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>See how it all began</h2>
	   	   </div>			
		</div>
	</div>
	<div class="timeline-container">
		<div class="timeline-slider">
			<?php if(get_field('timeline')): ?>
				<?php while(has_sub_field('timeline')): ?>
					<div class="year-container">
						<?php echo get_sub_field('year'); ?>
						<div class="year-modal">
							<?php echo get_sub_field('sub_field_2'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			
		});
	</script>
</section>

<?php get_footer(); ?>