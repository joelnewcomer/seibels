<?php
/*
Template Name: Community Engagement
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="community-header about-header">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>Community Engagement</h2>
	   	   </div>
		</div>
	</div>	
</section>

<section class="community-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">
		   	   <?php echo get_field('main_content'); ?>
		   	   <div class="community-links text-center">
			   	   <?php if(get_field('links')): ?>
			   	   	<?php while(has_sub_field('links')): ?>
			   	   		<a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('title'); ?></a>
			   	   	<?php endwhile; ?>
			   	   <?php endif; ?>
		   	   </div>
	   	   </div>			
		</div>
	</div>
</section>

<?php get_footer(); ?>