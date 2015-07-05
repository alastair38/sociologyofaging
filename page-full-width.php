<?php
/*
Template Name: Full Width (No Sidebar)
*/
?>

<?php get_header(); ?>
<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

			<div id="content" style="background:url('<?php echo $thumb_url[0];?>') no-repeat;">



				<div id="inner-content" class="">

				    <div class="large-8 medium-12 columns" role="main">

						<?php get_template_part( 'partials/loop', 'home' ); ?>


                    </div>

                        <div class="large-4 medium-12 columns" role="main">

						<aside>

                        <?php get_template_part( 'partials/content', 'latestnews' ); ?>

                        </aside>

    				</div> <!-- end #main -->

    </div> <!-- end #main -->



				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
