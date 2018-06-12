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
		   	   <h2><span class="ppt-tab-choice active" data-tab="people">People.<span class="tab-indicator-wrap"><span class="tab-indicator"></span></span></span> <span class="ppt-tab-choice" data-tab="process">Process.<span class="tab-indicator-wrap"><span class="tab-indicator"></span></span></span> <span class="ppt-tab-choice" data-tab="tech">Technology.<span class="tab-indicator-wrap"><span class="tab-indicator"></span></span></span></h2>
	   	   </div>
		</div>
	</div>	
</section>

<div class="ppt-tabs">
	
	<section class="people active transition">
		<div class="grid-container">
			<div class="grid-x">
		   	   <div class="large-6 medium-6 cell">
			   	   <h2>People</h2>
			   	   <?php echo get_field('people_content'); ?>
		   	   </div>
			</div>
		</div>		
	</section>
	<section class="process transition">
		<div class="grid-container">
			<div class="grid-x">
		   	   <div class="large-6 medium-6 cell">
			   	   <h2>Process</h2>
			   	   <?php echo get_field('process_content'); ?>
		   	   </div>
			</div>
		</div>		
	</section>
	<section class="tech transition">
		<div class="grid-container">
			<div class="grid-x">
		   	   <div class="large-6 medium-6 cell">
			   	   <h2>Technology</h2>
			   	   <?php echo get_field('tech_content'); ?>
		   	   </div>
			</div>
		</div>		
	</section>
</div>

<script>
jQuery(document).ready(function(){
	jQuery('.ppt-tabs section').matchHeight({byRow:false});
});
jQuery(document).on( "click", ".ppt-tab-choice", function() {
	jQuery(".ppt-tab-choice").removeClass('active');
	jQuery(this).addClass('active');
	var tab = jQuery(this).data('tab');
	jQuery(".ppt-tabs section").removeClass('active');
	jQuery(".ppt-tabs section." + tab).addClass('active');
});
</script>

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