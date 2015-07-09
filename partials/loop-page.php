<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>"  class="large-8 medium-8 small-12 columns" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

	    <section class="entry-content" itemprop="articleBody">
            <?php the_post_thumbnail('full');?>
		    <?php the_content(); ?>
		    <?php wp_link_pages(); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">

		</footer> <!-- end article footer -->


	</article> <!-- end article -->

<?php endwhile; endif; ?>

<div class="large-4 medium-4 small-12 columns">
    <?php get_sidebar(); ?>
</div>

