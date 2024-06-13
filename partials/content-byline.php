<?php $postType = get_post_type( $post );
$user_role = get_the_author_meta( 'roles' );
$type = get_the_term_list($post->ID, 'contribution_type');
?>

<p class="byline">
    <em>


	Contributed on <?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?>. 
    <?php if(!$type): echo 'Posted in ' . get_the_category_list(', ');
    
endif;?>
    <?php if ($postType === 'announcement' || 'post') {
    echo get_the_term_list( $post->ID, 'contribution_type', 'Posted in ', ', ' );
    }
    if ($postType === 'report') {
    echo get_the_term_list( $post->ID, 'report_author', 'Posted in ', ', ' );
    }
?>
    </em>

    <?php
    $link = get_post_type_archive_link( $postType );
    ?>

</p>
<?php get_template_part( 'partials/content', 'sharelinks' ); ?>
