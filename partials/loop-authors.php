<div class="large-12 medium-12 small-12 columns">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

		<header class="article-header">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php get_template_part( 'partials/content', 'byline' ); ?>
		</header> <!-- end article header -->

		<section class="entry-content" itemprop="articleBody">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>

            <?php $content = get_the_content();
            $trimContent = wp_trim_words( $content, $num_words = 50, $more = null );
            echo $trimContent;?>

		</section> <!-- end article section -->

		<footer class="article-footer">
	    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
		</footer> <!-- end article footer -->

	</article> <!-- end article -->
<hr>
<?php endwhile; ?>

<?php joints_page_navi(); ?>

<?php else : ?>

<?php endif; ?>
</div>

