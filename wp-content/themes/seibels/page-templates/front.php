<?php
/*
Template Name: Front
*/
get_header(); ?>

<div id="page" role="main">

	<?php // get_template_part('template-parts/video'); ?>

<div class="cd-radial-slider-wrapper">
		<ul class="cd-radial-slider" data-radius1="0" data-radius2="1364" data-centerx1="700" data-centerx2="700">
	
		<?php $i = 1; ?>
			<?php if( have_rows('slides') ):
				while ( have_rows('slides') ) : the_row(); ?>

				<?php
				$radius = 0;
				if ($i == 1) { 
					$class = 'visible';
					$radius = 1364;
				} else if ($i == 2) {
					$class = 'next-slide';
				} else if ($i == 3) {
					$class = 'prev-slide';
				}
				?>
				
			<li class="<?php echo $class; ?>">
				<div class="svg-wrapper">
					<svg viewBox="0 0 1440 850">
						<defs>
							<clipPath id="cd-image-<?php echo $i; ?>">
								<circle id="cd-circle-<?php echo $i; ?>" cx="700" cy="400" r="<?php echo $radius; ?>"/>
							</clipPath>
						</defs>
						
						<?php $image = wp_get_attachment_image_src(get_sub_field('slide'), 'featured-home'); ?>
						<image height='850px' width="1440px" clip-path="url(#cd-image-<?php echo $i; ?>)" xlink:href="<?php echo $image[0]; ?>"></image>
					</svg>
				</div> <!-- .svg-wrapper -->
			</li>

				<?php $i++; ?>
							
				<?php endwhile;
			endif; ?>

		</ul> <!-- .cd-radial-slider -->
		
		<div class="slider-overlay">
	   		<div class="grid-container">
	   			<div class="grid-x">
	   				<div class="large-12 cell">
		   				<div style="display:table;width:100%;height:100%;">
		   					<div style="display:table-cell;vertical-align:middle;">
			   				    <?php if(get_field('feature_content')): ?>
			   				    	<?php $content_i = 1; ?>
			   				    	<?php $pause = 1000; ?>
			   				    	<?php while(has_sub_field('feature_content')): ?>
			   				    		<div class="feature-content fc-<?php echo $content_i; ?>">
				   							<h1 class="typist"></h1>
				   							<p class="transition"><?php echo get_sub_field('description'); ?></p>
			   				    		</div>
			   				    		<script>
				   							jQuery( document ).ready(function() {
				   								jQuery('.fc-<?php echo $content_i; ?> .typist')
				   									.typist({ speed: 12, cursor: false })
				   									.typistPause(<?php echo $pause; ?>)
				   									.typistAdd('<?php echo get_sub_field('title'); ?>');
				   								
				   								setTimeout(function(){ 
					   								jQuery('.fc-<?php echo $content_i; ?> p').addClass('fade-in');
					   							}, <?php echo $pause; ?>);
				   							});
				   						</script>
				   						<?php
					   					$content_i++;
					   					if ($pause == 1000) {
						   					$pause += 3000;
					   					} else {
						   					$pause += 4000;
						   				}
					   					?>
			   				    	<?php endwhile; ?>
			   				    <?php endif; ?>
		   				  	</div>
		   				</div>
	   				</div>
	   			</div>
	   		</div>
	   		<div class="slider-scroll text-center">
		   		Best-in-Class Services<br />
		   		<?php get_template_part('assets/images/down', 'triangle.svg'); ?>
	   		</div>
	   		<script>
		   		jQuery( ".slider-scroll" ).on( "click", function() {
		   			jQuery('html, body').animate({ scrollTop: jQuery('#home-blocks').offset().top - 70}, 500);
		   		});
		   	</script>
		</div> <!-- slider-overlay -->

	</div> <!-- .cd-radial-slider-wrapper -->

	
	<section id="home-blocks" role="main">
		<div class="grid-container">
	   		<div class="grid-x">
	   			<div class="large-12 cell text-center">
	   				<h2><?php echo get_field('home_blocks_title'); ?></h2>
	   			</div>
	   			<?php if(get_field('home_blocks')): ?>
	   				<?php while(has_sub_field('home_blocks')): ?>
	   					<?php $slug = sanitize_title(get_sub_field('title')); ?>
		   				<div class="large-6 medium-6 cell text-center">
			   				<a class="home-block text-center <?php echo $slug; ?>" href="<?php echo get_sub_field('link'); ?>">
	   							<?php echo file_get_contents(get_sub_field('icon')); ?>
	   							<h3><?php echo get_sub_field('title'); ?></h3>
	   							<p><?php echo get_sub_field('paragraph'); ?></p>
			   				</a>
		   				</div>
	   				<?php endwhile; ?>
	   			<?php endif; ?>
	   			<script>
	   			jQuery(document).ready(function(){
	   				jQuery('.home-block').matchHeight({byRow:false});
	   			});
	   			</script>
	   		</div>
		</div>	
	</section>
	
	<section id="approach">
		<div class="grid-container">
	   		<div class="grid-x">
	   			<div class="large-12 cell text-center">
		   			<h2><?php echo get_field('approach_title'); ?></h2>
		   			<p><?php echo get_field('approach_paragraph'); ?></p>
		   			<div class="button ghost reverse"><a href="<?php echo get_field('approach_title'); ?>">Our Approach</a></div>
	   			</div>
	   		</div>
		</div>		
	</section>

	<section id="technology">
		<div class="grid-container">
	   		<div class="grid-x">
	   			<div class="large-12 cell text-center">
		   			<h2><?php echo get_field('technology_title'); ?></h2>
		   			<h3><?php echo get_field('technology_subtitle'); ?></h3>
	   			</div>
		   		<?php if(get_field('technology_logos')): ?>
		   			<?php while(has_sub_field('technology_logos')): ?>
		   				<div class="large-3 medium-6 cell text-center">
			   				<div class="logo-container">
			   					<div style="display:table;width:100%;height:100%;">
			   					  <div style="display:table-cell;vertical-align:middle;">
			   					    <div style="text-align:center;"><?php echo file_get_contents(get_sub_field('logo')); ?></div>
			   					  </div>
			   					</div>
			   				</div>
		   				</div>
		   			<?php endwhile; ?>
		   		<?php endif; ?>
	   		</div>
		</div>		
	</section>
	
	<section id="convo">
		<div class="bg-overlay"  style="background-image: url(<?php echo get_field('convo_background_image'); ?>);"></div>
		<div class="grid-container">
	   		<div class="grid-x">		
		   		<div class="large-6 medium-6 cell convo-title">
		   			<h2><?php echo get_field('convo_title'); ?></h2>
		   			<div class="button yellow"><a href="<?php echo get_field('convo_link'); ?>">Start a Conversation</a></div>
		   		</div>
		   		<div class="large-6 medium-6 cell convo-quote">
		   			<p><?php echo get_field('convo_quote'); ?></p>
		   			<p class="convo-name"><span><?php echo get_field('convo_quote_name'); ?></span><br />
		   			<?php echo get_field('convo_quote_title'); ?></p>
		   		</div>
	   		</div>
		</div>
	</section> <!-- #convo -->

</div> <!-- #page -->

<script>
jQuery(document).ready(function($){
	
	jQuery('.logo-container').matchHeight({byRow:false});
	
	//set slider animation parameters
	var duration = 1000,
		epsilon = (1000 / 60 / duration) / 4,
		customMinaAnimation = bezier(.42,.03,.77,.63, epsilon);

	//define a radialSlider object
	var radialSlider = function(element) {
		this.element = element;
		this.slider = this.element.find('.cd-radial-slider');
		this.slides = this.slider.children('li');
		this.slidesNumber = this.slides.length;
		this.visibleIndex = 0;
		this.nextVisible = 1;
		this.prevVisible = this.slidesNumber - 1;
		this.navigation = this.element.find('.cd-radial-slider-navigation');
		this.animating = false;
		this.mask = this.element.find('.cd-round-mask');
		this.leftMask = this.mask.find('mask').eq(0);
		this.rightMask = this.mask.find('mask').eq(1);
		this.bindEvents();
	} 

	radialSlider.prototype.bindEvents = function() {
		var self = this;

		//update visible slide when clicking the navigation round elements
		function advance_slide() {
			if( !self.animating ) {
				self.animating =  true;
				//update radialSlider index properties
				self.updateIndexes('next');
				//show new slide
				self.updateSlides('next');
			}
			setTimeout( advance_slide, 4000 );
		};
		setTimeout( advance_slide, 4000 );
	}

	radialSlider.prototype.updateIndexes = function(direction) {
		if(  direction == 'next' ) {
			this.prevVisible = this.visibleIndex;
			this.visibleIndex = this.nextVisible;
			this.nextVisible = ( this.nextVisible + 1 < this.slidesNumber) ? this.nextVisible + 1 : 0;
		} else {
			this.nextVisible = this.visibleIndex;
			this.visibleIndex = this.prevVisible;
			this.prevVisible = ( this.prevVisible > 0 ) ? this.prevVisible - 1 : this.slidesNumber - 1;
		}
	}

	radialSlider.prototype.updateSlides = function(direction) {
		var self = this;

		//store the clipPath elements which need to be animated/updated
		var clipPathVisible = Snap('#'+this.slides.eq(this.visibleIndex).find('circle').attr('id')),
			clipPathPrev = Snap('#'+this.slides.eq(this.prevVisible).find('circle').attr('id')),
			clipPathNext = Snap('#'+this.slides.eq(this.nextVisible).find('circle').attr('id'));

		var radius1 = this.slider.data('radius1'),
			radius2 = this.slider.data('radius2'),
			centerx = ( direction == 'next' ) ? this.slider.data('centerx2') : this.slider.data('centerx1');

		this.slides.eq(this.visibleIndex).addClass('is-animating').removeClass('next-slide prev-slide');

		if( direction == 'next' ) {
			//animate slide content
			this.slides.eq(this.visibleIndex).addClass('content-reveal-left');
			this.slides.eq(this.prevVisible).addClass('content-hide-left');
			//mask slide image to reveal navigation round element
			this.slides.eq(this.visibleIndex).find('image').attr('style', 'mask: url(#'+this.leftMask.attr('id')+')');

			//animate slider navigation round element
			clipPathNext.attr({
				'r': radius1,
				'cx': self.slider.data('centerx2'),
			});
			this.slides.eq(this.nextVisible).addClass('next-slide move-up');
			this.slides.filter('.prev-slide').addClass('scale-down');
		} else {
			//animate slide content
			this.slides.eq(this.visibleIndex).addClass('content-reveal-right');
			this.slides.eq(this.nextVisible).addClass('content-hide-right');
			//mask slide image to reveal navigation round element
			this.slides.eq(this.visibleIndex).find('image').attr('style', 'mask: url(#'+this.rightMask.attr('id')+')');

			//animate slider navigation round element
			clipPathPrev.attr({
				'r': radius1,
				'cx': this.slider.data('centerx1'),
			});
			this.slides.eq(this.prevVisible).addClass('prev-slide move-up');
			this.slides.filter('.next-slide').addClass('scale-down');
		}

		// reveal new slide image - animate clipPath element
		clipPathVisible.attr({
			'r': radius1,
			'cx': centerx,
		}).animate({'r': radius2}, duration, customMinaAnimation, function(){

			if( direction == 'next' ) {
				self.slides.filter('.prev-slide').removeClass('prev-slide scale-down');
				clipPathPrev.attr({
					'r': radius1,
					'cx': self.slider.data('centerx1'),
				});
				self.slides.eq(self.prevVisible).removeClass('visible').addClass('prev-slide');
			} else {
				self.slides.filter('.next-slide').removeClass('next-slide scale-down');
				clipPathNext.attr({
					'r': radius1,
					'cx': self.slider.data('centerx2'),
				});
				self.slides.eq(self.nextVisible).removeClass('visible').addClass('next-slide');
			}
			self.slides.eq(self.visibleIndex).removeClass('is-animating').addClass('visible').find('image').removeAttr('style');
			self.slides.filter('.move-up').removeClass('move-up');

			setTimeout(function(){
				self.slides.eq(self.visibleIndex).removeClass('content-reveal-left content-reveal-right');
				self.slides.eq(self.prevVisible).removeClass('content-hide-left content-hide-right');
				self.slides.eq(self.nextVisible).removeClass('content-hide-left content-hide-right');
				self.animating =  false;
			}, 100);
		});	
	}

	//initialize the radial slider
	$('.cd-radial-slider-wrapper').each(function(){
		new radialSlider($(this));
	});

	/*
		convert a cubic bezier value to a custom mina easing
		http://stackoverflow.com/questions/25265197/how-to-convert-a-cubic-bezier-value-to-a-custom-mina-easing-snap-svg
	*/
	function bezier(x1, y1, x2, y2, epsilon){
		//https://github.com/arian/cubic-bezier
		var curveX = function(t){
			var v = 1 - t;
			return 3 * v * v * t * x1 + 3 * v * t * t * x2 + t * t * t;
		};

		var curveY = function(t){
			var v = 1 - t;
			return 3 * v * v * t * y1 + 3 * v * t * t * y2 + t * t * t;
		};

		var derivativeCurveX = function(t){
			var v = 1 - t;
			return 3 * (2 * (t - 1) * t + v * v) * x1 + 3 * (- t * t * t + 2 * v * t) * x2;
		};

		return function(t){

			var x = t, t0, t1, t2, x2, d2, i;

			// First try a few iterations of Newton's method -- normally very fast.
			for (t2 = x, i = 0; i < 8; i++){
				x2 = curveX(t2) - x;
				if (Math.abs(x2) < epsilon) return curveY(t2);
				d2 = derivativeCurveX(t2);
				if (Math.abs(d2) < 1e-6) break;
				t2 = t2 - x2 / d2;
			}

			t0 = 0, t1 = 1, t2 = x;

			if (t2 < t0) return curveY(t0);
			if (t2 > t1) return curveY(t1);

			// Fallback to the bisection method for reliability.
			while (t0 < t1){
				x2 = curveX(t2);
				if (Math.abs(x2 - x) < epsilon) return curveY(t2);
				if (x > x2) t0 = t2;
				else t1 = t2;
				t2 = (t1 - t0) * .5 + t0;
			}

			// Failure
			return curveY(t2);

		};
	};
});
</script>

<?php get_footer(); ?>