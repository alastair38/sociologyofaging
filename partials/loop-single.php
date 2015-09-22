<article id="post-<?php the_ID(); ?>" class="large-8 medium-8 small-12 columns" role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'partials/content', 'byline' ); ?>
         <?php edit_post_link('Edit Content', '', ''); ?>
    </header> <!-- end article header -->

    <section class="contribution-details" itemprop="articleBody">


<?php

        $authors = get_field('authors');
        if($authors) {
        echo '<span><em>' . $authors . '</em></span>';
        }?>

        <div class="entry-content">
           <?php the_content();?>
        </div>

        <?php

        $file = get_field('upload_one');

        if( $file ):

        $url = $file['url'];
        $title = $file['title'];
        ?>

	     <a id="moreInfo" href="<?php echo $url; ?>" target="_blank" title="<?php echo $title; ?>">Download More Information</a>
         <?php endif; ?>
         <?php

        $fileB = get_field('upload_two');

        if( $fileB ):

        $urlB = $fileB['url'];
        $titleB = $fileB['title'];
       ?>
	   <a id="moreInfo" href="<?php echo $urlB; ?>" target="_blank" title="<?php echo $titleB; ?>">Download Further Information</a>
       <?php endif; ?>

	</section> <!-- end article section -->

</article> <!-- end article -->

<div id="contactDetails" class="large-4 medium-4 small-12 columns">
    <?php the_post_thumbnail('medium');?>

    <?php

        $authorEmail = get_field('author_email');
        if($authorEmail) {
        echo '<h4>Contact Details</h4><span>E: <a href="mailto:' . $authorEmail . '" target="_blank">Email the author</a></span>';
        }
        $website = get_field('website');
        if($website) {
        echo '<span><a href="' . $website . '" target="_blank">View the author\'s website</a></span>';
        }
        get_search_form( );
        echo '<hr>';
        get_template_part( 'partials/content', 'latestnews' );?>
</div>



