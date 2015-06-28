<?php

/*

Template Name:Staff Page

*/

get_header();

?>

<div class="container margin-152">
	<main class="site-main" role="main">
		<ul class="inner-filter hidden-xs">
			<li><a href="#">All</a></li>
			<li><a href="#">A</a></li>
			<li><a href="#">B</a></li>
			<li><a href="#">C</a></li>
			<li><a href="#">D</a></li>
			<li><a href="#">E</a></li>
			<li><a href="#">F</a></li>
			<li><a href="#">G</a></li>
			<li><a href="#">H</a></li>
			<li><a href="#">I</a></li>
			<li><a href="#">J</a></li>
			<li><a href="#">K</a></li>
			<li><a href="#">L</a></li>
			<li><a href="#">M</a></li>
			<li><a href="#">N</a></li>
			<li><a href="#">O</a></li>
			<li><a href="#">P</a></li>
			<li><a href="#">Q</a></li>
			<li><a href="#">R</a></li>
			<li><a href="#">S</a></li>
			<li><a href="#">T</a></li>
			<li><a href="#">U</a></li>
			<li><a href="#">V</a></li>
			<li><a href="#">W</a></li>
			<li><a href="#">X</a></li>
			<li><a href="#">Y</a></li>
			<li><a href="#">Z</a></li>
		</ul>

			<div class="row">
			<?php

				$args = array('category_name' => 'staff');
				$staff = new WP_Query($args);

			?>

			<?php while ( $staff->have_posts() ) : $staff->the_post(); ?>
				

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
	</main>
</div>
<?php get_footer(); ?>