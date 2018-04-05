<?php
/*
Template Name: Our Approach
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="approach-header about-header">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2><strong>People.</strong> Process. Technology.</h2>
	   	   </div>
		</div>
	</div>	
</section>

<section class="people">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-6 medium-6 cell">
		   	   <h2>People</h2>
		   	   <?php echo get_field('people_content'); ?>
	   	   </div>
		</div>
	</div>		
</section>

<section class="mission-values">
	<div class="grid-container">
		<div class="grid-x">
	   	   	<div class="large-4 medium-4 cell small-text-center mission">
		   		<h2>Mission</h2>
		   		<p><?php echo get_field('mission_pp'); ?></p>
	   	   	</div>
	   	   	<div class="large-4 medium-4 cell">
		   		<div class="mission-graphic-container">
					<img class="mission-graphic" src=" <?php echo get_template_directory_uri(); ?>/assets/images/mission-graphic.png" alt="Mission Graphic">
					<img class="mission-graphic-people" src=" <?php echo get_template_directory_uri(); ?>/assets/images/mission-graphic-people.png" alt="Mission Graphic People">
		   		</div>
			</div>
			<div class="large-4 medium-4 cell text-right small-text-center core-values">
				<h2>Core Values</h2>
				<p>Transparency<br />
					Collaboration<br />
					Respect<br />
					Accountability
				</p>
			</div>
		</div>
	</div>
	<script>
		jQuery(window).scroll(function() {
			// higher is slower
			var speed = 10000;
			var theta = (jQuery(window).scrollTop() / speed * 360);
			jQuery('img.mission-graphic').css({ transform: 'rotate(' + theta + 'rad) scale(1.35)' });
		});
	</script>
</section>

<section class="partnerships">
	<div class="grid-container">
		<div class="grid-x">
			<div class="large-12 cell text-center">
				<h2>Partnerships</h2>
			</div>
			<div class="large-12 cell">	
				<?php echo get_field('partnerships_content'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>