<div class="large-8 medium-8 small-12 columns">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

		<header class="article-header">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php get_template_part( 'partials/content', 'byline' ); ?>

		</header> <!-- end article header -->

		<section class="entry-content contribution-details" itemprop="articleBody">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
            	<?php

        $conference = get_field('conference_name');
        if($conference) {
        echo '<span><strong>Conference/Meeting - </strong>' . $conference . '</span>';
        }

        $employer = get_field('institution');
        if ($employer && is_post_type_archive( ))
         {
        echo '<span><strong>Employer - </strong>' . $employer . '</span>';
        }

        $price = get_field('price');
        if($price) {
        echo '<span><strong>Price - </strong>' . $price . '</span>';
        }

        $date = DateTime::createFromFormat('Ymd', get_field('date'));
        if($date) {
        echo '<span><strong>Date -</strong> ' . $date->format('F d, Y') . '</span>' ;
        }

       $deadline = DateTime::createFromFormat('Ymd', get_field('deadline_date'));
        $deadlineTime = get_field('deadline_time');
        if($deadlineTime) {
            $dead_time = ' / ' . $deadlineTime;
        }
        if($deadline) {
        echo '<span><strong>Deadline -</strong> ' . $deadline->format('F d, Y') . $dead_time . '</span>';
        }

         $authors = get_field('authors');
        if($authors) {
        echo '<span><em>' . $authors . '</em></span>';
        }

        $content = get_the_content();
            $trimContent = wp_trim_words( $content, $num_words = 50, $more = null );
			echo $trimContent;

            ?>

		</section> <!-- end article section -->

		<footer class="article-footer">
        <?php
 $pubType = get_field('publication_type');
        $authors = get_field('authors');
        $editors = get_field('editors');
        if ($editors) {
        $eds = ' in ' . get_field('editors') . ' (Eds) ';
        }
        $bookName = get_field('book_name');
        $yearPub = ' (' . get_field('year_of_publication') . ').';
        $placePub = get_field('place_of_publication') . ': ';
        $publisher = get_field('publisher');
        $journal = get_field('journal_name');
        $volume = get_field('volume');
        $issue = '(' . get_field('issue') . ')';
        $pageNumbers = get_field('page_numbers');
        if ($pageNumbers) {
        $pageNos = ', pp.' . $pageNumbers;
        }
        $journalNos = ':' . get_field('page_numbers');
        $title = get_the_title();

        if($pubType === 'Book') {
        echo '<div id="pubDetails">' . $authors . ' ' . $yearPub . '<em>' . $title . '</em>, ' . $placePub . $publisher . '</div>';
        }

        if($pubType === 'Book Chapter') {
        echo "<div id='pubDetails'>" . $authors . ", " . $yearPub . "'" .  $title . "', " . $eds . "<em>" .  $bookName . "</em>, " . $placePub . $publisher . $pageNos . "</div>";
        }

        if($pubType === 'Journal') {
        echo  '<div id="pubDetails">' . $authors . $yearPub . '<em>' . $title . '</em>. ' . $journal . '. ' . $volume . $issue . $journalNos . '</div>';
        }

         if($pubType === 'Report') {
        echo  '<div id="pubDetails">' . $authors . ' ' . $yearPub . '<em>' . $title . '</em>, ' . $placePub . $publisher . '</div>';
        }?>
		</footer> <!-- end article footer -->

	</article> <!-- end article -->
<hr>
<?php endwhile; ?>

<?php joints_page_navi(); ?>

<?php else : ?>
	<?php get_template_part( 'partials/content', 'missing' ); ?>
<?php endif; ?>
</div>
<div class="large-4 medium-4 small-12 columns">
    <?php get_sidebar(); ?>
</div>

