<?php if (have_posts()) : while (have_posts()) : the_post();
?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

	    <section class="entry-content" itemprop="articleBody">
            <?php the_content();?>
		    <?php wp_link_pages(); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">

		</footer> <!-- end article footer -->



	</article> <!-- end article -->

<ul id="pageLinks">

<?php
	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

	foreach( $mypages as $page ) {

	?>



            <li class="previousMeetings large-6 medium-6 small-12 columns end" role="article" itemscope itemtype="http://schema.org/WebPage"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>


<?php }

?>


<?php endwhile; endif; ?>
</ul>
