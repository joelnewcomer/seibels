<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage DrumRoll
 * @since DrumRoll 1.0.0
 */
get_header();

$image_id = get_post_thumbnail_id(get_option('page_for_posts'));
// Default Featured Image
if ($image_id == null) {
	$image_id = get_theme_mod( 'default_featured' );
}
?>

<script>
jQuery( document ).ready(function() {
	jQuery.featherlight.prototype.beforeOpen = function(event) {
		if(!jQuery(event.target).hasClass('photo')) {
			window.open = jQuery(event.target).attr('href');
			return false;
		}
	}	
});
</script>

<div id="single-post" role="main">

<div class="featured-container has-menu">
	<div class="featured-image-container">
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
	</div>
	<?php get_template_part('template-parts/news','menu'); ?>
</div> <!-- featured-container -->

	
	<div class="single-container newsletter-container">
		<div class="grid-container entry-content">
			<div class="grid-x grid-padding-x" data-featherlight-gallery data-featherlight-filter="a.photo">
				
				<div class="large-12 cell text-center nl-title">
					<h2>SEIBELS SPOTLIGHT</h2>
					<h3><?php the_title(); ?></h3>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php if(get_field('newsletter')): ?>
						<?php while(has_sub_field('newsletter')): ?>
							<?php
							// Title
							$title = get_sub_field('title');
							$count = 1;
							$title = preg_replace('/\*/', '<strong>', $title, $count); // will replace first '*'
							$title = preg_replace('/\*/', '</strong>', $title);    // will replace all others
							
							// Height/Width
							$block_width = get_sub_field('width');
							$block_height = get_sub_field('height');
							$width = 'large-4 medium-4';
							$height = '';
							if ($block_width == 'two_thirds') {
								$width = 'large-8 medium-8';
							}
							if ($block_height == 'tall') {
								$height = 'tall';
							}
							if ($block_width == 'third' && $block_height == 'normal') {
								$image_size = 'nl-third';
							}
							if ($block_width == 'two_thirds' && $block_height == 'normal') {
								$image_size = 'nl-two-thirds';
							}
							if ($block_width == 'third' && $block_height == 'tall') {
								$image_size = 'nl-third-tall';
							}
							if ($block_width == 'two_thirds' && $block_height == 'tall') {
								$image_size = 'nl-two-thirds-tall';
							}
													

							// Image & Link
							$image_id = get_sub_field('image');
							$no_photo = '';
							$photo = '';
							if ($image_id == '') {
								$no_photo = 'no-photo';
								$photo = '';
							} else {
								$image_src = wp_get_attachment_image_src($image_id, $image_size);
								$image_src_large = wp_get_attachment_image_src($image_id, 'large');
								$photo = 'style="background-image: url(' . $image_src[0] . ');"';
							}
							
							$link = get_sub_field('link');
							$has_link = false;
							if ($link != '') {
								$has_link = true;
							}
							$no_link = '';
							if ($image_id == '' && !$has_link) {
								$no_link = ' no-link';
							}
							?>
							<div class="<?php echo $width; ?> <?php echo $height; ?> cell nl-block <?php echo $no_photo; ?><?php echo $no_link; ?>">
								<div class="nl-block-inner" <?php echo $photo; ?>>
									<?php if ($has_link) : ?>
										<a href="<?php echo $link; ?>">
									<?php elseif ($image_id != '') : ?>
										<a class="photo" href="<?php echo $image_src_large[0]; ?>">
											
											
									<?php endif; ?>
									<div class="nl-overlay">
											<div style="display:table;width:100%;height:100%;">
											  <div style="display:table-cell;vertical-align:middle;">
											    <div style="text-align:center;"><?php echo $title; ?></div>
											  </div>
											</div>										
									</div>
									<?php if ($has_link) : ?>
										<div class="nl-hover nl-read-more text-center transition">
											<div style="display:table;width:100%;height:100%;">
											  <div style="display:table-cell;vertical-align:middle;">
											    <div style="text-align:center;">Read More</div>
											  </div>
											</div>
										</div>
									<?php elseif ($image_id != '') : ?>
										<div class="nl-hover nl-zoom text-center transition photo">
											<div style="display:table;width:100%;height:100%;">
											  <div style="display:table-cell;vertical-align:middle;">
											    <div style="text-align:center;"><?php get_template_part('assets/images/zoom', 'icon.svg'); ?></div>
											  </div>
											</div>
										</div>
									<?php endif; ?>
									
									<?php if ($has_link || $image_id != '') : ?>
									</a>
									<?php endif; ?>
								</div> <!-- nl-block-inner -->
							</div> <!-- nl-block -->
						<?php endwhile; ?>
					<?php endif; ?>
				
				<?php endwhile;?>
			</div>
		</div> <!-- grid-container -->
	</div> <!-- single-container -->
</div> <!-- #single-post -->
<?php get_footer(); ?>