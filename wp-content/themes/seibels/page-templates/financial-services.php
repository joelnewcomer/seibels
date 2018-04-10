<?php
/*
Template Name: Financial Services
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="financial-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">	
		   	   <?php echo get_field('intro'); ?>
	   	   </div>
		   <div class="large-12 cell text-center">
			   <h2>Services Include:</h2>
		   </div>
		</div>
	</div>
	<div class="grid-container financial-services-container">
		<div class="grid-x">
		    <?php if(get_field('services')): ?>
		    	<?php while(has_sub_field('services')): ?>
		    		<?php
			    	$title = get_sub_field('title');
			    	$slug = sanitize_title($title);
			    	?>
		    		<?php $link = get_sub_field('link'); ?>
		    		<div class="large-4 medium-4 small-6 cell financial-service-cell text-center <?php echo $slug; ?>">
			    		<?php if ($link != '') : ?>
			    			<a href="<?php echo $link ?>" class="financial-service">
						<?php else : ?>
							<div class="financial-service">
				    	<?php endif; ?>
				    	<?php echo file_get_contents(get_sub_field('image')); ?><br />
			    		<?php echo $title; ?>
		    			<?php if ($link != '') : ?>
			    			</a>
						<?php else : ?>
							</div>
				    	<?php endif; ?>
		    		</div>
		    	<?php endwhile; ?>
		    <?php endif; ?>
		</div>
	</div>
	<div class="grid-container tech-intro">
		<div class="grid-x">
			<div class="large-12 cell">
				<?php echo get_field('technology_intro'); ?>
				<div class="tech-logos text-center">
					<?php if(get_field('technology_logos')): ?>
						<?php while(has_sub_field('technology_logos')): ?>
							<?php echo file_get_contents(get_sub_field('logo')); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div> <!-- tech-logos -->
				<div class="tech-video text-center">
					<?php echo get_field('technology_video'); ?>
				</div>
			</div>
			<div class="large-12 cell text-center">
				<div class="button ghost"><a href="<?php echo get_field('doc_management_link'); ?>">Document Management</a></div>
			</div>
		</div>
	</div>
</section> <!-- financial-intro -->


<?php get_template_part('template-parts/services-benefits'); ?>


<?php get_footer(); ?>