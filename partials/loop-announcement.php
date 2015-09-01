<article id="post-<?php the_ID(); ?>" class="large-8 medium-8 small-12 columns" role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'partials/content', 'byline' ); ?>
         <?php edit_post_link('Edit Content', '', ''); ?>
    </header> <!-- end article header -->

    <section class="contribution-details" itemprop="articleBody">


		<?php

        $conference = get_field('conference_name');
        if($conference) {
        echo '<span><strong>Conference/Meeting - </strong>' . $conference . '</span>';
        }

        $employer = get_field('institution');
        if($employer) {
        echo '<span><strong>Employer - </strong>' . $employer . '</span>';
        }

        $price = get_field('price');
        if($price) {
        echo '<span><strong>Price - </strong>' . $price . '</span>';
        }

        $date = DateTime::createFromFormat('Ymd', get_field('date'));
        if($date) {
        echo '<span><strong>Start Date -</strong> ' . $date->format('F d, Y') . '</span>' ;
        }

        $enddate = DateTime::createFromFormat('Ymd', get_field('end_date'));
        if($enddate) {
        echo '<span><strong>End Date -</strong> ' . $enddate->format('F d, Y') . '</span>' ;
        }

        $deadline = DateTime::createFromFormat('Ymd', get_field('deadline_date'));
        $deadlineTime = get_field('deadline_time');
        if($deadlineTime) {
            $dead_time = ' / ' . $deadlineTime;
        }
        if($deadline) {
        echo '<span><strong>Deadline -</strong> ' . $deadline->format('F d, Y') . $dead_time . '</span>';
        }

        $content = '<div class="entry-content">' . get_the_content() . '</div>';
        echo $content;

        $more = get_field('more_information');
        if($more) {
        echo  '<a id="moreInfo" href="' . $more . '" target="_blank">Follow this link for further details</a>';
        }

?>
	</section> <!-- end article section -->

	<footer class="article-footer">


</footer> <!-- end article footer -->



</article> <!-- end article -->

<div id="contactDetails" class="large-4 medium-4 small-12 columns">
    <?php the_post_thumbnail('medium'); ?>
    <?php

        $authorEmail = get_field('author_email');
        if($authorEmail) {
        echo '<h4>Contact Details</h4><span>E: <a href="mailto:' . $authorEmail . '" target="_blank">Email the author</a></span>';
        }
        $website = get_field('website');
        if($website) {
        echo '<a href="' . $website . '" target="_blank">View the author website</a></span>';
        }



        $name = get_field('name');
        if($name) {
        echo '<h4>Contact Details</h4><span>' . $name . '</span>';
        }

        $email = get_field('email');
        if($email) {
        echo '<span>E: <a href="mailto:' . $email . '" target="_blank">Email ' . $name . '</a></span>';
        }

        $phone = get_field('phone');
        if($phone) {
        echo '<span>T: ' . $phone . '</span>';
        }

?>
    <?php

        $address = get_field('address');
        if($address) {
        echo '<h4>Address</h4><p>' . $address . '</p>';
        }

        $location = get_field('google_map');
        if($location) {
        echo '<h4>Map</h4>';

?>
    <a href="http://maps.google.co.uk/maps/place/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>/@<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>,15z" target="_blank" title="View map full screen" class="show-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"></a>

                             <a href="geo:<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>;u=35" class="hide-for-large-only"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x300&scale=2&maptype=roadmap
          &markers=color:green%7C<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"></a>
    <?php } ;?>
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
        echo '<div id="pubDetails"><h4>Publication Details</h4>' . $authors . ' ' . $yearPub . '<em>' . $title . '</em>, ' . $placePub . $publisher . '</div>';
        }

        if($pubType === 'Book Chapter') {
        echo "<div id='pubDetails'><h4>Publication Details</h4>" . $authors . ", " . $yearPub . "'" .  $title . "', " . $eds . "<em>" .  $bookName . "</em>, " . $placePub . $publisher . $pageNos . "</div>";
        }

        if($pubType === 'Journal') {
        echo  '<div id="pubDetails"><h4>Publication Details</h4>' . $authors . $yearPub . '<em>' . $title . '</em>. ' . $journal . '. ' . $volume . $issue . $journalNos . '</div>';
        }

         if($pubType === 'Report') {
        echo  '<div id="pubDetails"><h4>Publication Details</h4>' . $authors . ' ' . $yearPub . '<em>' . $title . '</em>, ' . $placePub . $publisher . '</div>';
        }?>
</div>

