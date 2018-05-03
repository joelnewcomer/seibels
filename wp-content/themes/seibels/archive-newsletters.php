<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */
get_header(); ?>

<div class="featured-container has-menu">
	<?php
	$image_id = get_post_thumbnail_id(get_option('page_for_posts'));
	// Default Featured Image
	if ($image_id == null) {
		$image_id = get_theme_mod( 'default_featured' );
	}
	?>
		<div class="featured-image blog-landing-featured">
			<?php echo wp_get_attachment_image($image_id,'featured'); ?>
			<div class="overlay">
					<div class="blog-header single-header text-center">
						<div style="display:table;width:100%;height:100%;">
							<div style="display:table-cell;vertical-align:middle;">
						    	<div style="text-align:center;">
							    	<header>
							    		<h1 class="entry-title">News & Events</h1>
							    	</header>
						    	</div>
							</div>
						</div>
					</div> <!-- blog-header -->
			</div> <!-- overlay -->
		</div> <!-- blog-landing-featured -->
			<?php get_template_part('template-parts/news','menu'); ?>
</div> <!-- featured-container -->

<div id="page" role="main" class="blog-grid newsletter-container">
	<div class="grid-container">
    	<div class="grid-wrapper">
		    <div class="blog-content-header">
		        <div class="large-12 cell text-center nl-title nl-archive-title">
			        <h2>Our Newsletters</h2>
		        </div>	    
		    </div>
        	<article class="grid-x grid-margin-x clear">
	        	<div class="large-12 cell text-center">
        		<?php if ( have_posts() ) : ?>
	    		    <?php while ( have_posts() ) : the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="nl-archive-block">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('nl-third'); ?>
							<?php endif; ?>
							<div class="nl-overlay">
								<div style="display:table;width:100%;height:100%;">
								  <div style="display:table-cell;vertical-align:middle;">
								    <div style="text-align:center;"><h3><?php the_title(); ?></h3></div>
								  </div>
								</div>								
							</div> <!-- blog-card-content -->
						</a>
					<?php endwhile; ?>
        		<?php else : ?>
        		    <?php get_template_part( 'template-parts/content', 'none' ); ?>
        		<?php endif; // End have_posts() check. ?>
        		
        		<?php
	    	    // Pagination - library/foundation.php
	    	    drumroll_pagination();
	    	    ?>
	        	</div>
        	</article>
	    </div> <!-- grid-wrapper -->
    </div> <!-- grid-container -->
</div> <!-- #page blog-grid -->

<?php get_footer();
