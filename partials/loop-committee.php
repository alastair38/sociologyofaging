<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
		<header class="article-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->
        <section class="entry-content" itemprop="articleBody">
		    <?php the_content(); ?>
		    <?php wp_link_pages(); ?>
		</section> <!-- end article section -->
</article>

<?php endwhile; endif; ?>

<?php

$args = array(
    'orderby' => 'rc11Role',
    'order' => 'DESC',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'rc11Role',
			'value'   => 'President',
			'compare' => '='
		),
        array(
			'key'     => 'rc11Role',
			'value'   => 'Vice President',
			'compare' => '='
		)
	)
 );
$wp_user_query = new WP_User_Query( $args );



// Get the results
$authors = $wp_user_query->get_results();

// Check for results
if (!empty($authors)) {
    // loop trough each author
    foreach ($authors as $author)
    {
        // get all the user's data
        $author_info = get_userdata($author->ID);
        $organisation = get_user_meta($author->ID, 'organisation', true);
        $jobTitle = get_user_meta($author->ID, 'jobTitle', true);
        $rc11Role = get_user_meta($author->ID, 'rc11Role', true);
        echo '<div class="author large-3 medium-6 small-12 columns end"><div class="authorInfo" itemscope itemtype="http://schema.org/Person"><h2 itemprop="name" class="authorName"><a href="' .get_author_posts_url( $author->ID ). '"> '.$author_info->display_name.'</a></h2><div class="authorAvatar">' . get_avatar( $author_info->user_email, '80' ) . '</div><span itemprop="jobTitle">' . $jobTitle . '</span><span itemprop="organization">' . $organisation . '</span><span itemprop="member" class="member">' . $rc11Role . '</span><span class="profileLink"><a href="' .get_author_posts_url( $author->ID ). '"  aria-label="Click or hit enter to view the full profile of ' .$author_info->display_name. '">View Profile</a></span></div></div>';
    }
} else {
}?>

<?php

$args = array(
    'orderby' => 'rc11Role',
    'order' => 'DESC',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'rc11Role',
			'value'   => 'Secretary',
			'compare' => '='
		),
        array(
			'key'     => 'rc11Role',
			'value'   => 'Treasurer',
			'compare' => '='
		)
	)
 );
$wp_user_query = new WP_User_Query( $args );



// Get the results
$authors = $wp_user_query->get_results();

// Check for results
if (!empty($authors)) {
    // loop trough each author
    foreach ($authors as $author)
    {
        // get all the user's data
        $author_info = get_userdata($author->ID);
        $organisation = get_user_meta($author->ID, 'organisation', true);
        $jobTitle = get_user_meta($author->ID, 'jobTitle', true);
        $rc11Role = get_user_meta($author->ID, 'rc11Role', true);
        echo '<div class="author large-3 medium-6 small-12 columns end"><div class="authorInfo"><h2 class="authorName"><a href="' .get_author_posts_url( $author->ID ). '"> '.$author_info->display_name.'</a></h2><div class="authorAvatar">' . get_avatar( $author_info->user_email, '80' ) . '</div><span>' . $jobTitle . '</span><span>' . $organisation . '</span><span class="member">' . $rc11Role . '</span><span class="profileLink"><a href="' .get_author_posts_url( $author->ID ). '">View Profile</a></span></div></div>';
    }
} else {
}?>

<?php

$args = array(
    'orderby' => 'rc11Role',
    'order' => 'ASC',
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key'     => 'rc11Role',
			'value'   => 'Newsletter Editor',
			'compare' => '='
		),
        array(
			'key'     => 'rc11Role',
			'value'   => 'Committee Member',
			'compare' => '='
		)
	)
 );
$wp_user_query = new WP_User_Query( $args );



// Get the results
$authors = $wp_user_query->get_results();

// Check for results
if (!empty($authors)) {
    // loop trough each author
    foreach ($authors as $author)
    {
        // get all the user's data
        $author_info = get_userdata($author->ID);
        $organisation = get_user_meta($author->ID, 'organisation', true);
        $jobTitle = get_user_meta($author->ID, 'jobTitle', true);
        $rc11Role = get_user_meta($author->ID, 'rc11Role', true);
        echo '<div class="author large-3 medium-6 small-12 columns end"><div class="authorInfo"><h2 class="authorName"><a href="' .get_author_posts_url( $author->ID ). '"> '.$author_info->display_name.'</a></h2><div class="authorAvatar">' . get_avatar( $author_info->user_email, '80' ) . '</div><span>' . $jobTitle . '</span><span>' . $organisation . '</span><span class="member">' . $rc11Role . '</span><span class="profileLink"><a href="' .get_author_posts_url( $author->ID ). '">View Profile</a></span></div></div>';
    }
} else {
}?>


		</div>
	</div>




