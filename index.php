<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Project Pegasus
 */

get_header(); ?>
	
	<?php
	//Call Header Slider Here
	require 'inc/slider.php'; ?>

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

			<div class="site-events">
				<div class="row">
					<div class="col-md-3 event-capstone">
						<h2>University News & Events</h2>
						<p>Click For More Info &rarr;</p>
					</div>
					<?php /*Start the WP_Query Loop for Events */ ?>
					<div class="event-carousel">
					<?php

						$args = array(
							'post_type' => 'event'
							);
						$query = new WP_Query($args);

						if($query->have_posts()) : while($query->have_posts()) : $query->the_post()
					?>
					<a href="<?php the_permalink(); ?>">
					<div class="col-md-3 event-entry item">
						<h2><?php the_title(); ?></h2>
						<p><?php the_content(); ?></p>
					</div>
					</a>
					<?php
						endwhile;
					?>
					</div>
					<?php
						else:
					?>
					<div class="col-md-3 event-entry">
						<h2>Sorry!</h2>
						<p>No Events are scheduled.</p>
					</div>
					<?php
						endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php /*
			<!-- Channel Navigation !-->
			<div class="channel-nav">
				<?php
						$args =  array('theme_location' => 'channel',
										'container' => false,
										'menu_class' => 'channel-menu',
										'echo' => true
										 );
				?>
				<?php wp_nav_menu($args); ?>
			</div><!-- .channel-nav -->
			*/ ?>


		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */?>

			<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				

				<div class="col-md-4 margin-152">
					<div class="single-post-entry">
						<figure class="effect-apollo">
							<?php if( has_post_thumbnail() ) { the_post_thumbnail('full'); }?>
							<figcaption>
								<h2><?php the_title(); ?></h2>
								<p><?php the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>">View More</a>
							</figcaption>
						</figure>
						
					</div><!-- .site-post-entry -->

				</div>

				<?php endwhile; ?>

			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->
	<script type="text/javascript">
	$(document).ready(function() {
		$('.event-carousel').owlCarousel({
			center: false,
			items: 4,
			loop: true,
			autoplay: true,
			autoplayHoverPause: true,
			autoplayTimeout:3000,
		});
	});
	</script>
<?php get_footer(); ?>
