	<div class="featured-menu news-menu">
		<?php
		$args = array(
			'post_type' => 'page',
			'post_parent' => 581,
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
						<div style="text-align:center;">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
			</a>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
			
			<?php if (is_super_admin()) : ?>
			<a href="<?php echo get_site_url(); ?>/newsletters" class="<?php echo $active; ?> newsletters">
				<div style="display:table;width:100%;height:100%;">
				  <div style="display:table-cell;vertical-align:middle;">
				    <div style="text-align:center;">Newsletter</div>
				  </div>
				</div>
			</a>
			<?php endif; ?>
		
	</div> <!-- news-menu -->