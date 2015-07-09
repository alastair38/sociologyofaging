<div id="sidebar1" class="sidebar columns" role="complementary">

     <?php get_template_part( 'partials/content', 'latestnews' ); ?>



    <?php
    //GET CHILD PAGES IF THERE ARE ANY
    $children = get_pages('child_of='.$post->ID);

    //GET PARENT PAGE IF THERE IS ONE
    $parent = $post->post_parent;

    if($parent){
    echo '<ul id="pageLinks" class="small-12 columns end" role="article" itemscope itemtype="http://schema.org/WebPage"><h4>Related Pages</h4>';
    echo '<li class="previousMeetings"><a href="' . get_page_link( $parent ) . '">' . get_the_title( $parent ) . '</a></li>';
	$mypages = get_pages( array( 'child_of' => $parent, 'exclude' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

	foreach( $mypages as $page ) {

	?>

            <li class="previousMeetings"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>


<?php }
    echo '</ul>';
}
?>

   <?php $postType = get_post_type( $post );

    if ($postType === report || is_page( 'Reports') || is_tax('report_author') ) {
        wp_list_categories( 'taxonomy=report_author&title_li=<h4>All Reports</h4>' );
    }
    ?>

    <?php $postType = get_post_type( $post );

    if ($postType === contribution || is_tax('contribution_type') ) {
        wp_list_categories( 'taxonomy=contribution_type&hide_empty=1&title_li=<h4>All Contributions</h4>' );
    }
    ?>

    <?php $postType = get_post_type( $post );

    if ($postType === post || is_tax('category') ) {
        wp_list_categories( 'taxonomy=category&hide_empty=1&title_li=<h4>All News and Articles</h4>' );
    }
    ?>

</div>
