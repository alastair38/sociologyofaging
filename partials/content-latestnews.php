
<?php
                        $newsitems = get_posts(array(
                            'post_type' => array('post'),
                            'posts_per_page' => 3
                        ));
                        ?>

                        <?php if( $newsitems ): ?>
                        <h4 id="latestNewsTitle">Latest News</h4>
                        <ul class="latestNews">
                        <?php foreach( $newsitems as $newsitem ): ?>


                            <?php $title = get_the_title( $newsitem->ID );
                            $trimmedTitle = wp_trim_words( $title, $num_words = 5, $more = '...' );?>
                            <li><a href="<?php echo get_the_permalink( $newsitem->ID ); ?>">
                            <?php 
                            if(is_front_page(  )): ?>
                            <img width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/library/images/featured.png" class="defaultImg wp-post-image" alt="<?php the_title(); ?>"/>
                            <?php endif;
                            
                            echo '<h6>' . $trimmedTitle . '</h6>';
                            
                            ?>
                            </a></li>

                        <?php endforeach; ?>
                        
                      

                        </ul>
                        <?php endif; ?>
                        <div class="latest-newsletter">
                        <h4>Our Latest newsletter</h4>
                        <?php echo do_shortcode('[mailpoet_archive limit="1"]');?>
                        </div>

