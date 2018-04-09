<?php
/*
Template Name: Resources
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php // get_template_part( 'template-parts/featured-image-parallax' ); ?>

<section class="pdfs">
	<div class="grid-container">
		<div class="grid-x">  
			<div class="large-12 cell text-center">	
				<h2><?php echo get_field('pdf_title'); ?></h2>
			</div>
			<?php if(get_field('pdfs')): ?>
		   		<?php while(has_sub_field('pdfs')): ?>
			   		<div class="large-4 medium-4 cell text-center">	
		   	   			<?php
			   	   		$pdf_array = get_sub_field('add_pdf');
			   	   		// print_r($pdf_array);
		   	   			?>
		   	   			<a class="pdf" href="<?php echo $pdf_array['url']; ?>">
			   	   			<span class="pdf-thumb">
				   	   			<?php echo get_the_post_thumbnail($pdf_array['ID']); ?>
			   	   			</span>
			   	   			<span class="title"><?php echo $pdf_array['title']; ?></span>
		   	   			</a>
			   		</div>
		   	   	<?php endwhile; ?>
		   	<?php endif; ?>
		</div>
	</div>
</section>

<section class="videos">
	<div class="grid-container">
		<div class="grid-x">
			<div class="large-12 cell text-center">	
				<h2><?php echo get_field('videos_title'); ?></h2>
			</div>
	   	   <div class="large-12 cell video-cell text-center">	
		   	   <?php if(get_field('videos')): ?>
		   	   	<?php while(has_sub_field('videos')): ?>
		   	   		<div class="video">
			   	   		<?php echo get_sub_field('video'); ?>
			   	   		 <span class="title"><?php echo get_sub_field('video_title'); ?></span>
		   	   		</div>
		   	   	<?php endwhile; ?>
		   	   <?php endif; ?>
	   	   </div>
		</div>
	</div>
</section>

<?php get_footer(); ?>