<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="main" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">
			<h1 class="home-page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

	  <section class="entry-content" itemprop="articleBody">

		    <?php the_content(); ?>
		    <?php wp_link_pages(); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">

		</footer> <!-- end article footer -->

		<ul id="homeLinks">
		    <?php
				$page1 = get_page_by_title( 'Committee' );
				$page2 = get_page_by_title( 'About' );
				$page3 = get_page_by_title( 'RC11 Communications' );
				?>

			<li class="large-4 medium-4 small-12 columns"><a href="<?php echo get_page_link($page2->ID); ?>"><?php echo get_the_title($page2->ID);?></a></li>
			<li class="large-4 medium-4 small-12 columns"><a href="<?php echo get_page_link($page1->ID); ?>"><?php echo get_the_title($page1->ID);?></a></li>
			<li class="large-4 medium-4 small-12 columns"><a href="<?php echo get_term_link( 'latest', 'conference_category' ); ?> ">Events</a></li>

		</ul>

			<?php $alertContent = get_field('alert_content');
			$infoLink = get_field('info_link');
			if($alertContent) {
			echo '<a class="small-12 columns alert small expanded button" href="' . $infoLink . '" target="_blank">' . $alertContent . '</a>';
			}?>

</article> <!-- end article -->

<?php endwhile; endif; ?>
