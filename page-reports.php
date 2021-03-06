    <?php
/*
Template Name: Reports Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

				    <div id="main" class="large-12 columns first" role="main">



					   <?php
                        $presreports = get_posts(array(
                            'post_type' => 'report',
                            'posts_per_page' => 2,
                            'report_author' => 'president'
                        ));
                        ?>

                        <?php if( $presreports ): ?>
                        <?php $count = 0; ?>
                        <div class="large-8 medium-8 small-12 columns">
                        <h1  id="taxHeader">President Reports</h1>
                        <?php foreach( $presreports as $presreport ): ?>

                        <article class="">
                            <?php $title = get_the_title( $presreport->ID );?>
                            <h2><a href="<?php echo get_the_permalink( $presreport->ID ); ?>">
                            <?php echo $title; ?></a></h2>
                            <?php $author = $presreport->post_author;
                            $authorName = get_the_author_meta ( 'display_name', $author );
                            $date = get_the_date('F d, Y', $presreport->ID);
                            print "<p>Contributed by ${authorName} on ${date}</p>";?>


                            <?php echo get_the_post_thumbnail($presreport->ID, 'full');?>

                            <?php $content = $presreport->post_content;
                            $trimContent = wp_trim_words( $content, $num_words = 50, $more = null );
                            echo $trimContent;?>

                        </article>
                        <hr>

<?php endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

                             <?php
                        $secreports = get_posts(array(
                            'post_type' => 'report',
                            'posts_per_page' => 2,
                            'report_author' => 'secretary'
                        ));
                        ?>

                        <?php if( $secreports ): ?>

                        <h1  id="taxHeader">Secretary Reports</h1>
                        <?php foreach( $secreports as $secreport ): ?>
                        <article class="">
                            <?php $title = get_the_title( $secreport->ID );?>
                            <h2><a href="<?php echo get_the_permalink( $secreport->ID ); ?>">
                            <?php echo $title; ?></a></h2>
                            <?php $author = $secreport->post_author;
                            $authorName = get_the_author_meta ( 'display_name', $author );
                            $date = get_the_date('F d, Y', $secreport->ID);
                            print "<p>Contributed by ${authorName} on ${date}</p>";?>

                            <?php echo get_the_post_thumbnail($secreport->ID, 'full');?>

                            <?php $content = $secreport->post_content;
                            $trimContent = wp_trim_words( $content, $num_words = 50, $more = null );
                            echo $trimContent;?>
                       </article>
                        <hr>

<?php endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>





				    </div> <!-- end #main -->

	<div class="large-4 medium-4 small-12 columns">
    <?php get_sidebar(); ?>



</div>


				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
