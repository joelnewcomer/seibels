<?php
/*
Template Name: Policy Services
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="policy-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">	
		   	   <?php echo get_field('intro'); ?>
	   	   </div>
		   <div class="large-12 cell policy-services text-center">
		    <?php if(get_field('services')): ?>
		    	<?php while(has_sub_field('services')): ?>
		    		<?php $slug = sanitize_title(get_sub_field('title')); ?>
		    		<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
		    		<a href="#<?php echo $slug; ?>" class="policy-scroll" style="background-image: url(<?php echo $image[0]; ?>);">
		    			<div class="policy-overlay"></div>
		    			<div class="policy-title">
		    				<?php echo get_sub_field('title'); ?>
		    			</div>
		    		</a>
		    	<?php endwhile; ?>
		    <?php endif; ?>
		   </div> <!-- policy-services -->
		</div>
	</div>
</section> <!-- policy-intro -->

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('a.policy-scroll').click(function(e) {
	        e.preventDefault();
            var target = jQuery(this.hash);
            if (target.length == 0) target = jQuery('a[name="' + this.hash.substr(1) + '"]');
            if (target.length == 0) target = jQuery('html');
            jQuery('html, body').animate({ scrollTop: target.offset().top - 70}, 500);
            return false;
        });
    });
</script>

<?php if(get_field('services')): ?>
	<?php while(has_sub_field('services')): ?>
		<?php $slug = sanitize_title(get_sub_field('title')); ?>
		<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
		<section class="policy-section" id="<?php echo $slug; ?>">
			<div class="policy-header text-center" style="background-image: url(<?php echo $image[0]; ?>);">
				<div class="policy-overlay"></div>
			   	<h2><?php echo get_sub_field('title'); ?></h2>			
			</div>
			<div class="policy-content">
				<div class="grid-container">
				   <div class="grid-x">
				   	   <div class="large-12 cell">
							<?php echo get_sub_field('content'); ?>
				   	   </div>
				   </div>
				</div>

				<?php if(get_sub_field('supported_processes')): ?>
					<div class="grid-container">
					   <div class="grid-x">
					   	   <div class="large-12 cell text-center">	
						   	   <div class="supported-processes">
						   	   	<h3><?php echo get_sub_field('supported_processes_title'); ?></h3>
						   	   	<?php while(has_sub_field('supported_processes')): ?>
						   	   		<div class="supported-process text-center">
						   	   			<?php echo file_get_contents(get_sub_field('icon')); ?><br />
						   	   			<p><?php echo get_sub_field('title'); ?></p>
						   	   		</div>
						   	   	<?php endwhile; ?>
						   	   </div>
					   	   </div>
					   </div>
					</div>
				<?php endif; ?>
			
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>

<section class="services-benefits">
	<div class="bg-overlay"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="large-6 medium-6 cell benefits-content">	
				<h2><?php the_title(); ?> Benefits</h2>
				<?php echo get_field('benefits_content'); ?>
			</div>
			<div class="large-6 medium-6 cell benefits-quote">
				<p class="quote"><?php echo get_field('benefits_quote'); ?></p>
		   		<p class="quote-name"><span>From an Agent</span></p>
		   		<div class="button"><a href="<?php echo get_permalink(get_theme_mod( 'contact_page' )); ?>">Start a Conversation</a></div>
			</div>
		</div>
	</div>
</section> <!-- services-benefits -->


<?php get_footer(); ?>