<?php
/*
Template Name: Executive Team
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="team-header about-header">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>Executive Team</h2>
	   	   </div>
		</div>
	</div>	
</section>

<section class="team">
	<div class="grid-container">
		<div class="grid-x">
			<?php if(get_field('team')): ?>
				<?php while(has_sub_field('team')): ?>
					<div class="large-4 cell team-member">
						<?php echo get_sub_field('photo'); ?>
						<?php echo get_sub_field('name'); ?>
						<?php echo get_sub_field('title'); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
	   	   
	   	   </div>			
		</div>
	</div>
</section>

<?php get_footer(); ?>