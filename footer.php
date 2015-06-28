<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Project Pegasus
 */
?>

	</div><!-- #content -->

	<?php if ( is_home() ) { ?>
	<div class="row site-testimonial" id="test">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-12 item">
					<blockquote>
						<p>This is an awesome university.</p>
					</blockquote>
					<div class="professor">
							
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="site-info">
			<span class="footer-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/newLogo.png" />
				<h3>Dr.MGR <br/>Educational & Research Institute <br/> University</h3> 
		</div><!-- .site-info -->
	</div><!-- .container -->	
	</footer><!-- #colophon -->
	<div class="footer-nav">
		<span class="footer-copyright">
			<p>Copyright &copy; 2015 | Dr.MGR Educational & Research Institute University</p>
		</span>
	</div>
</div><!-- #page -->

<script type="text/javascript">
	$(document).ready(function() {
		$('#test').owlCarousel({
			items : 1,
			center : true
		});
	});

</script>

<?php wp_footer(); ?>

</body>
</html>
