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
					<div class="large-4 medium-4 small-6 cell team-member-cell">
						<div class="team-member">
							<div class="small-team-photo gray">
								<?php echo wp_get_attachment_image(get_sub_field('small_photo'), 'full'); ?>
							</div>
							<h3><?php echo get_sub_field('name'); ?></h3>
							<p class="team-title"><?php echo get_sub_field('title'); ?></p>
							<div class="team-overlay transition">
								<div class="grid-container">
									<div class="grid-x">
										<div class="large-12 cell">
											<div class="team-overlay-inner small-text-center">						
												<div class="small-team-photo">
													<?php echo wp_get_attachment_image(get_sub_field('small_photo'), 'full'); ?>
												</div>
												<h3><?php echo get_sub_field('name'); ?></h3>
												<p class="team-title"><?php echo get_sub_field('title'); ?></p>
												<div class="bio">
													<?php echo get_sub_field('bio'); ?>
												</div> <!-- bio -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
	   	   </div>			
		</div>
	</div>
	<script>
		jQuery("div.team-member").on( "click", function() {
			jQuery(this).toggleClass('active');
		});
	</script>
</section>

<?php get_footer(); ?>