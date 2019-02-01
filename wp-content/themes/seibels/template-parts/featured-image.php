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
$has_menu = '';
if (is_ancestor(get_theme_mod( 'about_page' )) || is_ancestor(581)) {
	$has_menu = 'has-menu';
}

$size = 'featured';
$header_class = 'blog-header';
if (is_page_template('page-templates/page-no-nav.php')) {
	$size = 'no-nav-featured';
	$header_class = 'no-nav-header';
}
?>


	<div class="featured-container <?php echo $has_menu; ?>">
		<div class="featured-image-container">
			<?php echo wp_get_attachment_image($image_id, $size); ?>
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
						<div class="<?php echo $header_class; ?> single-header text-center">
							<div style="display:table;width:100%;height:100%;">
								<div style="display:table-cell;vertical-align:middle;">
							    	<div style="text-align:center;">
								    	<?php if ($icon != '') : ?>
								    		<?php echo file_get_contents($icon); ?>
										<?php endif; ?>
								    	<?php if (is_ancestor(get_theme_mod( 'about_page' ))) : ?>  	 
											<h1 class="entry-title single-title-ul">About & Culture</h1> 
								    	<?php else : ?>
								    		<h1 class="entry-title single-title-ul"><?php the_title(); ?></h1>
								    	<?php endif; ?>
								    	
								    	<!-- Show search form on Resources page -->
								    	<?php
									    if (is_page_template( 'page-templates/resources.php' )) {
									    	get_template_part('template-parts/search','resources');	
								    	}
										?>
							    	</div>
								</div>
							</div>
						</div> <!-- blog-header -->
					</div> <!-- overlay -->
				</div> <!-- blog-landing-featured -->
			</div> <!-- grid-container -->
		</div> <!-- featured-image-container -->
			<!-- If this is a child of the About page then show the About menu -->
			<?php
			if (is_ancestor(get_theme_mod( 'about_page' ))) { ?>
				<div class="featured-menu about-menu">
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
			
			<?php
			if (is_ancestor(581)) {
				get_template_part('template-parts/news','menu');
			}
			?>
		
	</div> <!-- featured-container -->