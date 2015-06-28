<?php

/*
 Template Name:About University
*/

 get_header();
?>
	<div class="container">
		<main class="site-main" role="main">

			<?php while( have_posts() ) : the_post(); ?>

				<article>
					<header>
							<figure class="post-figure">
								<?php if ( has_post_thumbnail() ) : the_post_thumbnail('full',array('class' => 'post-thumbnail')); endif; ?>
							</figure>
					<?php endwhile;?>
					<?php /*
						<div class="row">

							<div class="col-md-12">
								<?php

								      $args = array(
								      	'category_name' => 'about-univ',
								      	'post_type' => 'post',
								      	'order' => 'ASC',
								      	'order_by' => 'title',
								      	'posts_per_page' => -1);

								     $query = new WP_Query($args);

								     if( $query->have_posts() ) : while($query->have_posts() ) : $query->the_post(); 
								?>
									<div class="col-md-4 flat-box">
										<a href="<?php the_permalink(); ?>" class="post-anchor">
											<h3><?php the_title(); ?></h3>
										</a>
									</div>
								</a>
								<?php //End While ... Loop ?>
								<?php endwhile; ?>
								<?php // Begin Post Empty Handler ?>
								<?php else: ?>
									<div class="col-md-3 flat-box">
										<h3>Sorry No posts are here.Create About-Univ Cat & Add exactly 12 posts here.</h3>
									</div>
								<?php //End If ... ?>
								<?php endif; ?>
								<?php //Reset WP_Query() Post Data ?>
								<?php $query->wp_reset_postdata(); ?>
							</div>
							
						</div>
						*/ ?>
						<section>
						<?php while( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
						</section>
						<footer>
							<?php edit_post_link(__('Edit This')); ?>
						</footer>
					</header>
				</article>

				<?php

					if (comments_open() || get_comments_nunber() ) : comments_template(); endif; 
				?>

		</main>
	</div>

<?php 

get_footer(); 

?>