<?php
/*
Template Name: Accounting Services
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="accounting-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">	
		   	   <?php echo get_field('intro'); ?>
	   	   </div>
		</div>
	</div>
</section>

<section class="accounting-services">
	<div class="grid-container fluid">
		<div class="grid-x">
			<?php if(get_field('services')): ?>
				<?php while(has_sub_field('services')): ?>
			 		<div class="large-4 medium-4 cell accounting-service-cell text-center">
			 			<div class="accounting-service">
			 				<div class="accounting-title">
				 				<h2><?php echo get_sub_field('title'); ?></h2> 
			 				</div>
			 				<?php echo get_sub_field('content'); ?>
			 			</div>
			 		</div>
			 	<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/services-benefits'); ?>

<?php get_footer(); ?>