
                            <?php
                        $newsitems = get_posts(array(
                            'post_type' => 'contribution',
                            'posts_per_page' => 4
                        ));
                        ?>

                        <?php if( $newsitems ): ?>
                        <h4 id="latestNewsTitle">Latest News</h4>
                        <ul class="latestNews">
                        <?php foreach( $newsitems as $newsitem ): ?>


                            <?php $title = get_the_title( $newsitem->ID );
                            $trimmedTitle = wp_trim_words( $title, $num_words = 5, $more = '...' );?>
                            <li><a href="<?php echo get_the_permalink( $newsitem->ID ); ?>">
                            <?php if ( has_post_thumbnail($newsitem->ID) ) {
                            echo get_the_post_thumbnail($newsitem->ID, array( 50, 50));
                            } else { ?>
                            <img width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/library/images/featured.png" class="defaultImg wp-post-image" alt="<?php the_title(); ?>"/>
                            <?php }
                            echo '<h6>' . $trimmedTitle . '</h6>';?>
                            </a></li>

<?php endforeach; ?>

</div>
<?php endif; ?>

