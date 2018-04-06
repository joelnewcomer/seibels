<?php
/*
Template Name: Careers
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="careers-header about-header">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell text-center">
		   	   <h2>Careers</h2>
	   	   </div>
		</div>
	</div>	
</section>

<section class="careers-intro">
	<div class="grid-container">
		<div class="grid-x">
	   	   <div class="large-12 cell">
		   	   <?php echo get_field('careers_intro'); ?>
			   <div class="owl-carousel owl-theme">
			   		<?php 
			   		$images = get_field('photo_carousel');
			   		$size = 'medium'; // (thumbnail, medium, large, full or custom size)
			   		
			   		if( $images ): ?>
			   		        <?php foreach( $images as $image ): ?>
			   		            <div class="item">
			   		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			   		            </div>
			   		        <?php endforeach; ?>
			   		<?php endif; ?>			   	   
			   	   
		   	   </div>
	   	   </div>			
		</div>
	</div>
	<script>
	jQuery( document ).ready(function() {	
		jQuery('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    dots:false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:3
		        }
		    }
		})	
	});	
	</script>
</section>

<section class="benefits">
	<div class="grid-container">
		<div class="grid-x">
	   		<div class="large-12 cell">
		   	   <?php echo get_field('benefits_content'); ?>
	   		</div>
		</div>
	</div>	
</section> <!-- benefits -->

<section class="life">
	<div class="grid-container">
		<div class="grid-x text-center">
	   		<div class="large-12 cell text-center">
		   		<h2>Life at Seibels</h2>
	   		</div>
	   		<div class="life-charts">
		   		<?php if(get_field('life')): ?>
		   			<?php while(has_sub_field('life')): ?>
		   				<?php
			   			$stat_text = get_sub_field('stat_text');
			   			$show_percent = true;
			   			$boomers = false;
			   			if (strpos($stat_text, 'authors') !== false) {
				   			$show_percent = false;
				   		}
			   			if (strpos($stat_text, 'Baby Boomers') !== false) {
				   			$boomers = true;
				   		}
			   			?>
		   					
		   				
		   				  <div class="single-chart">
		   				  	<svg viewbox="0 0 36 36" class="circular-chart blue" overflow="visible">
		   				  	  <path class="circle-bg"
		   				  	    d="M18 2.0845
		   				  	      a 15.9155 15.9155 0 0 1 0 31.831
		   				  	      a 15.9155 15.9155 0 0 1 0 -31.831"
		   				  	  />
		   				  	  <path class="circle"
		   				  	    stroke-dasharray="<?php echo get_sub_field('stat_percentage'); ?>, 100"
		   				  	    d="M18 2.0845
		   				  	      a 15.9155 15.9155 0 0 1 0 31.831
		   				  	      a 15.9155 15.9155 0 0 1 0 -31.831"
		   				  	  />
		   				  	</svg>
		   				  		<div class="chart-text">
			   				  		<div style="display:table;width:100%;height:100%;">
			   				  		  <div style="display:table-cell;vertical-align:middle;">
			   				  		    <div style="text-align:center;">
				   				  		    <span class="stat-percentage"><?php echo get_sub_field('stat_percentage'); ?></span>
				   				  		    <?php if ($show_percent) : ?>
				   				  		    	<span class="percent-symbol">%</span><br />
				   				  		    <?php endif; ?>
				   				  		     <?php echo get_sub_field('stat_text'); ?>
				   				  		     <?php if ($boomers) : ?>
				   				  		     	<br /><span class="stat-percentage boomers">49</span><span class="percent-symbol">%</span>
				   				  		    	Generation<br />X, Y, Z
				   				  		    	<?php endif; ?>
				   				  		    </div>
			   				  		  </div>
			   				  		</div>
			   				  		
		   				  		</div>
		   				  	</div>
		   				
		   			<?php endwhile; ?>
		   		<?php endif; ?>
	   		</div> <!-- life-charts -->
		   	<div class="large-12 cell">
			   	<?php echo get_field('life_content'); ?>
	   		</div>
		</div>
	</div>		
	<script>
		jQuery( document ).ready(function() {
			setTimeout(function(){
				jQuery('.life-charts').bind('inview', function (event, visible) {
					if (visible == true) {
						setTimeout(function(){
							jQuery(".circle").addClass('in-view');
						}, 500);	
					} else {
						jQuery(".circle").removeClass('in-view');
  					}
				});
			}, 1000);
		});
</script>
</section> <!-- life -->




<section class="continued-ed">
	<div class="grid-container">
		<div class="grid-x">
	   		<div class="large-12 cell">
		   		<?php echo get_field('continued_ed'); ?>
	   		</div>
		</div>
	</div>	
</section> <!-- continued-ed -->

<?php get_footer(); ?>