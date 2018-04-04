<?php
/*
Template Name: Financial Services
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="claims-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">	
		   	   <?php echo get_field('intro'); ?>
	   	   </div>
		   <div class="large-12 cell text-center">
			   <h2>Services Include:</h2>
		   </div>
		    <?php if(get_field('services')): ?>
		    	<?php while(has_sub_field('services')): ?>
		    		<?php
			    	$image = wp_get_attachment_image_src(get_sub_field('image'), 'medium');
			    	$link = get_sub_field('link');
		    		?>
		    		<div class="large-4 medium-4 small-6 cell claims-service-cell">
			    		<?php if ($link != '') : ?>
			    			<a href="<?php echo $link ?>" class="claims-service" style="background-image: url(<?php echo $image[0]; ?>);">
						<?php else : ?>
							<div class="claims-service" style="background-image: url(<?php echo $image[0]; ?>);">
				    	<?php endif; ?>
			    			<div class="claims-service-overlay"></div>
			    			<div class="claims-table" style="display:table;width:100%;height:100%;">
			    			  <div style="display:table-cell;vertical-align:middle;">
			    			    <div style="text-align:center;"><?php echo get_sub_field('title'); ?></div>
			    			  </div>
			    			</div>
			    			<?php if ($link != '') : ?>
			    				<div class="faux-button white">Read More</div>
			    			<?php endif; ?>
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
</section> <!-- claims-intro -->


<?php get_template_part('template-parts/services-benefits'); ?>


<?php get_footer(); ?>