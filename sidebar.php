<div id="sidebar1" class="sidebar columns" role="complementary">




   <?php $postType = get_post_type( $post );

    if ($postType === report || is_page( 'RC11 Communications') || is_tax('report_author') ) {
                        $presreports = get_posts(array(
                            'post_type' => 'report',
                            'report_author' => 'president'

                        ));
        echo '<h4>All President Reports</h4>';
         foreach( $presreports as $presreport ): ?>
                            <?php $title = get_the_title( $presreport->ID );?>
                            <a href="<?php echo get_the_permalink( $presreport->ID ); ?>">
                            <?php echo $title; ?></a>
         <?php endforeach;
        $secreports = get_posts(array(
                            'post_type' => 'report',
                            'report_author' => 'secretary'

                        ));
        echo '<h4>All Secretary Reports</h4>';
         foreach( $secreports as $secreport ): ?>
                            <?php $title = get_the_title( $secreport->ID );?>
                            <a href="<?php echo get_the_permalink( $secreport->ID ); ?>">
                            <?php echo $title; ?></a>
         <?php endforeach;
    }
    ?>

    <?php $postType = get_post_type( $post );

    if ($postType === announcement || is_tax('contribution_type') ) {
        wp_list_categories( 'taxonomy=contribution_type&hide_empty=1&title_li=<h4>All Announcements</h4>' );
    }
    ?>

     <?php $postType = get_post_type( $post );

    if ($postType === conference || is_tax('conference_category') ) {
        echo '<li class="categories"><h4>All Conferences</h4><ul><li><a href="' . get_post_type_archive_link( 'conference' ) . '"> Conference Archive</a></li></ul></li>';
    }
    ?>

    <?php $postType = get_post_type( $post );

    if ($postType === post || is_tax('category') ) {
        get_template_part( 'partials/content', 'latestnews' );
        wp_list_categories( 'taxonomy=category&hide_empty=1&title_li=<h4>All News and Articles</h4>' );
    }
    ?>

<?php get_search_form( ); ?>
</div>
