		<div class="slider-wrapper">
			<?php 

				$args = array(
					'post_type' => 'slide'
					);

				$the_query = new WP_Query($args);

			?>
			<?php if($the_query->have_posts() ) : while ($the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item slide-wrapper">
					<section class="slider-content">
						<div class="row">
							<div class="col-md-12" style="padding:0;">
								<figure>
									<?php if(has_post_thumbnail()) { the_post_thumbnail('full'); } ?>
								</figure>
							</div>
						</div>
					</section>
					
			</div>
			<?php endwhile;endif; ?>
			<?php wp_reset_postdata(); ?>
		</div><!-- .slider-wrapper -->

			<script type="text/javascript">
				$(document).ready(function() {
					$('.slider-wrapper').owlCarousel({
						center: true,
						autoHeight: true,
						items: 1,
						nav: true,
						navText: ["<i class='fa fa-chevron-left fa-3x'></i>","<i class='fa fa-chevron-right fa-3x'></i>"],
					});
				});
			</script>