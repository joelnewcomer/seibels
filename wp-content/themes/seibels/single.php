<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage DrumRoll
 * @since DrumRoll 1.0.0
 */
get_header();

$image_id = get_post_thumbnail_id();
// Default Featured Image
if ($image_id == null || get_field('featured_not_in_header')) {
	$image_id = get_theme_mod( 'default_featured' );
}
?>

<div id="single-post" role="main">

	<div class="featured-container hide-for-print">	
			<div class="featured-image blog-landing-featured">
				<?php echo wp_get_attachment_image($image_id,'featured'); ?>
				<div class="overlay">
					<div class="blog-header single-header text-center">
						<div style="display:table;width:100%;height:100%;">
							<div style="display:table-cell;vertical-align:middle;">
						    	<div style="text-align:center;">
							    	<header>
							    		<h1 class="entry-title single-title-ul"><?php the_title(); ?></h1>
							    		<div class="single-cats-container">
							    			<?php
								    		global $post;
								    		$args = array(
												'fields' => 'all'  
								    		);
								    		$cats = wp_get_post_categories($post->ID, $args);
								    		foreach ($cats as $cat) {
											    echo '<a class="header-cat" href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
								    		}
							    			?>
							    		</div>
							    	</header>
						    	</div>
							</div>
						</div>
					</div> <!-- blog-header -->
				</div> <!-- overlay -->
			</div> <!-- blog-landing-featured -->
	</div> <!-- featured-container -->
	
	<div class="single-container">
				<section class="breadcrumbs">
					<div class="grid-container">
						<div class="large-12 cell">
							<?php
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
							}
							?>
						</div>
					</div>
				</section>		
		<div class="grid-container entry-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="main-content large-12 cell" <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<?php drum_entry_meta(); ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'drumroll' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php comments_template(); ?>
			</article>
		<?php endwhile;?>
		
		</div> <!-- row -->
	</div> <!-- single-container -->
</div> <!-- #single-post -->
<?php get_footer(); ?>