<?php
// Blog featured Image
if (is_home() && get_option('page_for_posts') ) {
	$title = get_the_title(get_option('page_for_posts'));
	$image_id = get_the_post_thumbnail_id(get_option('page_for_posts'));
// Standard Featured Image
} else {
	$title = get_the_title();
	$image_id = get_post_thumbnail_id();
}
// Default Featured Image
if ($image_id == null) {
	$image_id = get_theme_mod( 'default_featured' );
}

$icon = get_field('icon');
?>


	<div class="featured-container">
		<?php echo wp_get_attachment_image($image_id, 'featured'); ?>
		<div class="grid-container no-padding">
			<div class="featured-image blog-landing-featured">
				<div class="overlay">
					<?php if (is_single()) : ?>
					<section class="breadcrumbs">
						<div class="grid-container">
							<div class="large-12 cell">
								<?php
								if ( function_exists('yoast_breadcrumb') ) {
									yoast_breadcrumb('<p id="breadcrumbs">','</p>');
								}
								?>
							</div>
						</div> <!-- grid-container -->
					</section>
					<?php endif; ?>
					<div class="blog-header single-header text-center">
						<div style="display:table;width:100%;height:100%;">
							<div style="display:table-cell;vertical-align:middle;">
						    	<div style="text-align:center;">
							    	<?php if ($icon != '') : ?>
							    		<?php echo file_get_contents($icon); ?>
									<?php endif; ?>
							    	<h1 class="entry-title single-title-ul"><?php the_title(); ?></h1>
						    	</div>
							</div>
						</div>
					</div> <!-- blog-header -->
				</div> <!-- overlay -->
			</div> <!-- blog-landing-featured -->
		</div> <!-- row -->
	</div> <!-- featured-container -->