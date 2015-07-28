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

			<div id="content" style="background:url('<?php echo $thumb_url[0];?>') no-repeat; background-size: 100% 100%;">



				<div id="inner-content" class="">

				    <div class="large-8 medium-12 columns" role="main">

						<?php get_template_part( 'partials/loop', 'home' ); ?>


                    </div>

                        <div class="large-4 medium-12 columns" role="main">

						<aside id="homeAside">

                        <?php get_template_part( 'partials/content', 'latestnews' ); ?>

                        <?php $page4 = get_page_by_title( 'RC-11 Reports' );
                        $page5 = get_page_by_title( 'News + Articles' );
?>
<ul id="homeSideLinks">
                            <li><a href="<?php echo get_page_link($page4->ID); ?>"><?php echo 'President + Secretary Reports';?></a></li>
                            <li><a href="<?php echo get_page_link($page5->ID); ?>"><?php echo get_the_title($page5->ID);?></a></li>
                            <li><a href="<?php echo get_post_type_archive_link( 'announcement' ); ?>">Member Announcements</a></li>
        </ul>


                        </aside>

    				</div> <!-- end #main -->

    </div> <!-- end #main -->



				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
