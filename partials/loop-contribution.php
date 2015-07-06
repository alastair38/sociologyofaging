<article id="post-<?php the_ID(); ?>" class="large-8 medium-8 small-12 columns" role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'partials/content', 'byline' ); ?>
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
        echo '<span><strong>Date -</strong> ' . $date->format('F d, Y') . '</span>' ;
        }

        $deadline = DateTime::createFromFormat('Ymd', get_field('deadline_date'));
        $dead_time = get_field('deadline_time');
        if($deadline) {
        echo '<span><strong>Deadline -</strong> ' . $deadline->format('F d, Y');
        }
        if($dead_time) {
        echo ' / ' . $dead_time . '</span>' ;
        }

        $price = get_field('price');
        if($price) {
        echo '<label>Price:</label>' . $price ;
        }

        $authors = get_field('authors');
        if($authors) {
        echo  $authors ;
        }

        the_content();

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
</div>

