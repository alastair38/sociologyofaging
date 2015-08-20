<div id="sidebar1" class="sidebar columns" role="complementary">

     <?php get_template_part( 'partials/content', 'latestnews' ); ?>


   <?php $postType = get_post_type( $post );

    if ($postType === report || is_page( 'Reports') || is_tax('report_author') ) {
        wp_list_categories( 'taxonomy=report_author&title_li=<h4>All Reports</h4>' );
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
        wp_list_categories( 'taxonomy=category&hide_empty=1&title_li=<h4>All News and Articles</h4>' );
    }
    ?>

<?php get_search_form( ); ?>
</div>
