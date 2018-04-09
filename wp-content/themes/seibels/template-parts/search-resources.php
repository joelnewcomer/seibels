								    	<div class="search-and-cats">
											<!-- Search -->
											<form role="search" method="get" id="blog-search" class="search-resources" action="<?php echo home_url( '/' ); ?>">
												<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Resources', 'drumroll' ); ?>">
												<input type="submit" class="search" id="searchsubmit" value="">
											</form>
									    	</div>
													<script>	
		// Holmes
		jQuery( document ).ready(function() {
			var h = holmes({
				// queryselector for the input
				input: '#s',
				// queryselector for element to search in
				find: '.search-cell',
				// (optional) text to show when no results
				placeholder: 'No resources found.',
				class: {
				  // (optional) class to add to matched elements
				  visible: 'visible',
				  // (optional) class to add to non-matched elements
				  hidden: 'hidden'
				},
				// (optional) if true, this will refresh the content every search
				dynamic: false,
				// (optional) in case you don't want to wait for DOMContentLoaded before starting Holmes:
				instant: true,
				// (optional) if you want to start searching after a certain amount of characters are typed
				minCharacters: 0,
				onInput: removeTitles,
			});
			
			function removeTitles(input) {
				if (input != '') {
					jQuery('#content > section').each(function(i){
						if (!jQuery(this).find('.search-cell.visible').length) {
							jQuery(this).fadeOut();
						} else {
							jQuery(this).fadeIn();
						}
					});
				} else {
					jQuery('#content > section').fadeIn();	
				}
				jQuery('a.scroll').each(function(i){
					var target = jQuery(jQuery(this).attr('href'));
					if (!jQuery(target).parent().find('.search-cell.visible').length) {
						jQuery(this).addClass('disabled');
					} else {
						jQuery(this).removeClass('disabled');
					}
				});				
			}
		

		});

		
		</script>