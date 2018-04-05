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
			<!-- If this is a child of the About page then show the About menu -->
			<?php
			if (is_ancestor(get_theme_mod( 'about_page' ))) { ?>
				<div class="about-menu">
					<?php
					$args = array(
						'post_type' => 'page',
						'post_parent' => get_theme_mod( 'about_page' ),
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php
						$active = '';
						$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
						if (strpos($url,get_the_permalink()) !== false) {
							$active = 'active';
						}	
						?>
						<a href="<?php the_permalink(); ?>" class="<?php echo $active; ?> <?php echo sanitize_title(get_the_title()); ?>">
							<div style="display:table;width:100%;height:100%;">
							  <div style="display:table-cell;vertical-align:middle;">
							    <div style="text-align:center;"><?php the_title(); ?></div>
							  </div>
							</div>
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div> <!-- about-menu -->
			<?php } ?>
		</div> <!-- grid-container -->
	</div> <!-- featured-container -->