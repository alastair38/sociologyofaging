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

				<div id="inner-content">

				    <div class="large-8 medium-12 columns" role="main">

						<?php get_template_part( 'partials/loop', 'home' ); ?>

            </div>

            <div class="large-4 medium-12 columns" role="main">

							<aside id="homeAside">

                        <?php get_template_part( 'partials/content', 'latestnews' ); ?>

                        <?php $page4 = get_page_by_title( 'RC11 Communications' );
                        $page5 = get_page_by_title( 'News + Articles' );
?>
								<!-- <ul id="homeSideLinks">
                            <li><a href="<?php echo get_page_link($page4->ID); ?>"><?php echo get_the_title($page4->ID);?></a></li>
                            <li><a href="<?php echo get_page_link($page5->ID); ?>"><?php echo get_the_title($page5->ID);?></a></li>
                            <li><a href="<?php echo get_post_type_archive_link( 'announcement' ); ?>">Member Announcements</a></li>
        				</ul> -->

              </aside>

    				</div> <!-- end #main -->
						
						

    		</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
			
			<?php if(is_front_page()):
				if(function_exists('get_field')):
  
				$twitter_profile = get_field('twitter_profile', 'option')	;
				if($twitter_profile):
				?>
			
			<aside class="twitter-widget large-12 columns">
				<a class="twitter-timeline" data-width="800" data-height="1200" href="https://twitter.com/<?php echo $twitter_profile ;?>?ref_src=twsrc%5Etfw">Tweets by <?php echo $twitter_profile ;?></a> 
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</aside>
			
		<?php 
				endif;
			endif;
		endif;
		?>

<?php get_footer(); ?>
