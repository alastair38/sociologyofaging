<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

					<div id="main" class="large-12 medium-12 small-12 columns first" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					    	<?php get_template_part( 'partials/loop', 'announcement' ); ?>

					    <?php endwhile; else : ?>

					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>

					</div> <!-- end #main -->



				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
