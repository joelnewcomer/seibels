<?php
/**
 * The template for displaying column contents
 *
 * @subpackage DrumStarter
 * @since DrumStarter 1.0
 */

$tabs_counter = 1;
$row_counter = 1;
$background = "";

// Function to output animation classes or script
function drum_animate($column, $row, $script = false) {
	// Check to see if Scroll Reveal is toggled on/off and never run scroll reveal on the first section on a page.
	if ( true == get_theme_mod( 'sr_toggle', true ) && $row != 1) {
		$animate = get_sub_field('column_' . $column . '_animation_animate');
		if ($animate) {
			$animate_class = 'sr' . $row;
			$effect = get_sub_field('column_' . $column . '_animation_effect');
			$origin = get_sub_field('column_' . $column . '_animation_direction');
			$duration = get_sub_field('column_' . $column . '_animation_duration');
			$delay = get_sub_field('column_' . $column . '_animation_delay');
			$scale = 0;
			$rotate = 0;
			if ($effect == 'zoom-in') {
				$scale = 0.7;
			}  
			if ($effect == 'zoom-out') {
				$scale = 1.5;
			}
			if ($effect == 'rotate') {
				$rotate = 180;
			}
			if ($script) : ?>
			<script>
				jQuery( window ).load(function() {
					sr.reveal('.<?php echo $animate_class; ?>', { origin: '<?php echo $origin; ?>', duration: <?php echo $duration; ?>, delay: <?php echo $delay; ?>, rotate: { x: 0, y: 0, z: <?php echo $rotate; ?> }, scale: <?php echo $scale; ?>  });
				});
			</script>
			<?php endif; ?>
		<?php
		} else {
			$animate_class = 'sr';
		}
		if (!$script) {
			return $animate_class;
		}
	}
}


// check if the flexible content field has rows of data
if( have_rows('content') ):
     // loop through the rows of data
    while ( have_rows('content') ) : the_row();
    	
    	// Set up section variables, parallax, classes, and id
	    $section_header = get_sub_field('section_header');
	    $section_classes = '';
	    $section_id = '';
	    $section_parallax = '';
	    if (get_sub_field('advanced')) {
	    	if (get_sub_field('parallax') && get_sub_field("parallax_image") != '') {
		    	$section_classes .= 'parallax-window';
		    	$section_parallax = 'data-paroller-factor="0.5" style="background: url(' . wp_get_attachment_image_url(get_sub_field("parallax_image"), "full") . '"';
	    	} else {
		    	$section_classes = get_sub_field('background_color');
	    	}
			$section_id = get_sub_field('section_id');
			if ($section_id != null) { 
				$section_id = 'id="' . $section_id . '"' ;
			} 
			$is_white_text = get_sub_field('white_text');
			if ($is_white_text) {
				$section_classes .= ' white-text';
			}
        } else {
	    	$section_classes = 'default-background';
			$section_id = '';
        }
        $section_classes .= ' section-' . $row_counter;
        
        
        if( get_row_layout() == 'one_column' ): ?>
			<!-- One Column -->
        	<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>" <?php echo $section_parallax; ?>>
	        	<div class="grid-container">
    	    		<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
						   <div class="large-12 cell text-center">
						   	<h2><?php echo $section_header; ?></h2>
						   </div>
						<?php endif; ?>
	        			<div class="large-12 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('one_column'); ?>
						</div>
    	    		</div> <!-- grid-x -->
	        	</div> <!-- grid-container -->
	        	<?php echo drum_animate('1', $row_counter, true); ?>
			</section>

        
        <?php elseif( get_row_layout() == 'two_columns' ): ?>
        	<!-- Two Columns -->
        	<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>" <?php echo $section_parallax; ?>>
	        	<div class="grid-container">
		    		<div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>			        		
	        			<div class="large-6 medium-6 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('column_1'); ?>
	        				<?php echo drum_animate('1', $row_counter, true); ?>
	        			</div>
	        			<div class="large-6 medium-6 cell entry-content <?php echo drum_animate('2', $row_counter); ?>">
	        				<?php echo get_sub_field('column_2'); ?>
	        				<?php echo drum_animate('2', $row_counter, true); ?>
	        			</div>
		    		</div> <!-- grid-x -->
	        	</div> <!-- grid-container -->
        	</section>

        <?php elseif( get_row_layout() == 'three_columns' ): ?>
			 <!-- Three Columns -->
			<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>">
				<div class="grid-container">
					<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>						
	        			<div class="large-4 medium-4 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('column_1'); ?>
	        				<?php echo drum_animate('1', $row_counter, true); ?>
	        			</div>
	        			<div class="large-4 medium-4 cell entry-content <?php echo drum_animate('2', $row_counter); ?>">
	        				<?php echo get_sub_field('column_2'); ?>
	        				<?php echo drum_animate('2', $row_counter, true); ?>
	        			</div>
	        			<div class="large-4 medium-4 cell entry-content <?php echo drum_animate('3', $row_counter); ?>">
	        				<?php echo get_sub_field('column_3'); ?>
	        				<?php echo drum_animate('3', $row_counter, true); ?>
	        			</div>
					</div> <!-- grid-x -->
				</div> <!-- grid-container -->
			</section>
			
        <?php elseif( get_row_layout() == 'four_columns' ): ?>
        	<!-- Four Columns -->
        	<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>">
	        	<div class="grid-container">
		        	<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>			        	
	        			<div class="large-3 medium-3 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('column_1'); ?>
	        				<?php echo drum_animate('1', $row_counter, true); ?>
	        			</div>
	        			<div class="large-3 medium-3 cell entry-content <?php echo drum_animate('2', $row_counter); ?>">
	        				<?php echo get_sub_field('column_2'); ?>
	        				<?php echo drum_animate('2', $row_counter, true); ?>
	        			</div>
	        			<div class="large-3 medium-3 cell entry-content <?php echo drum_animate('3', $row_counter); ?>">
	        				<?php echo get_sub_field('column_3'); ?>
	        				<?php echo drum_animate('3', $row_counter, true); ?>
	        			</div>
	        			<div class="large-3 medium-3 cell entry-content <?php echo drum_animate('4', $row_counter); ?>">
	        				<?php echo get_sub_field('column_4'); ?>
	        				<?php echo drum_animate('4', $row_counter, true); ?>
	        			</div>
		        	</div> <!-- grid-x -->
	        	</div> <!-- grid-container -->
        	</section>
        	
        <?php elseif( get_row_layout() == 'right_sidebar' ): ?>
			<!-- Right Sidebar -->
        	<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>">
	        	<div class="grid-container">
		        	<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>			        	
	        			<div class="large-8 medium-8 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('wide_column'); ?>
	        				<?php echo drum_animate('1', $row_counter, true); ?>
	        			</div>
	        			<div class="large-4 medium-4 cell entry-content <?php echo drum_animate('2', $row_counter); ?>">
	        				<?php echo get_sub_field('narrow_column'); ?>
	        				<?php echo drum_animate('2', $row_counter, true); ?>
	        			</div>
		        	</div> <!-- grid-x -->
	        	</div> <!-- grid-container -->
        	</section>
        	
        <?php elseif( get_row_layout() == 'left_sidebar' ): ?>
			<!-- Left Sidebar -->
			<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>">
				<div class="grid-container">
					<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>						
	        			<div class="large-4 medium-4 cell entry-content <?php echo drum_animate('1', $row_counter); ?>">
	        				<?php echo get_sub_field('narrow_column'); ?>
	        				<?php echo drum_animate('1', $row_counter, true); ?>
	        			</div>
	        			<div class="large-8 medium-8 cell entry-content <?php echo drum_animate('2', $row_counter); ?>">
	        				<?php echo get_sub_field('wide_column'); ?>
	        				<?php echo drum_animate('2', $row_counter, true); ?>
	        			</div>
					</div> <!-- grid-x -->
				</div> <!-- grid-container -->
			</section>
		
						
        <?php elseif( get_row_layout() == 'tabs' ): ?>
        	<!-- Tabs/Accordion -->
        	<?php $type = get_sub_field('type'); ?>
			<section <?php echo $section_id; ?> class="<?php echo $section_classes; ?>">
				<div class="grid-container">
					<div div class="grid-x grid-padding-x">
						<?php if ($section_header != null) : ?>
							<div class="large-12 cell text-center">
								<h2><?php echo $section_header; ?></h2>
							</div>
						<?php endif; ?>						
	        			<div class="large-12 cell <?php echo drum_animate('1', $row_counter); ?>">
		        			<div class="tabs-container">
		        				<div id="tabs-<?php echo $tabs_counter; ?>">
								<?php if(get_sub_field('tabs')): ?>
									<ul class="resp-tabs-list tabs-<?php echo $tabs_counter; ?>">
									<?php while(has_sub_field('tabs')): ?>
										<li><?php the_sub_field('tab_title'); ?><?php get_template_part('assets/images/acc', 'arrow.svg'); ?></li>
									<?php endwhile; ?>
									</ul> <!-- resp-tabs-list -->
									<div class="resp-tabs-container tabs-<?php echo $tabs_counter; ?>">
									<?php while(has_sub_field('tabs')): ?>
										<div><div class="tab-content-inner entry-content"><?php the_sub_field('tab_content'); ?></div></div>
									<?php endwhile; ?>
									</div> <!-- resp-tabs-container -->
								<?php endif; ?>
		        				</div>  <!-- tabs -->
		        			</div> <!-- tabs-container -->
		        			<script>
			    		    	jQuery( document ).ready(function() {
			    		    		jQuery('#tabs-<?php echo $tabs_counter; ?>').easyResponsiveTabs({
				    		    		type: '<?php echo $type; ?>',
										tabidentify: 'tabs-<?php echo $tabs_counter; ?>', // The tab groups identifier
        							});
			    		    	});
			    		    </script>
			    		    <?php echo drum_animate('1', $row_counter, true); ?>
	        			</div> <!-- columns -->
					</div> <!-- grid-x -->
				</div> <!-- grid-container -->
			</section> <!-- sr -->
			<?php $tabs_counter++; ?>
        <?php endif;
	    $row_counter++;
    endwhile;
endif;
?>