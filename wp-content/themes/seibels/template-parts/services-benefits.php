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
		   		<div class="button"><a href="<?php echo get_permalink(get_theme_mod( 'contact_page' )); ?>"><span>Start a Conversation</span></a></div>
			</div>
		</div>
	</div>
</section> <!-- services-benefits -->