<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

				    <div id="main" class="small-12 columns first" role="main">

					    <?php if (is_category()) { ?>
						    <h1 id="taxHeader">
							    <span>Articles posted in </span> <?php single_cat_title(); ?>
					    	</h1>

					    <?php } elseif (is_tag()) { ?>
						    <h1>
							    <span>Tagged:</span> <?php single_tag_title(); ?>
						    </h1>

					    <?php } elseif (is_author()) {
					    	global $post;
					    	$author_id = $post->post_author;
					    ?>
                        <?php get_template_part( 'partials/content', 'author' ); ?>

					    <?php } elseif (is_post_type_archive('contributions')) { ?>
						    <h1 id="taxHeader">
	    						<span>Member Contributions</span>
						    </h1>

		    			<?php } elseif (is_post_type_archive('report')) { ?>
			    		    <h1 id="taxHeader">
				    	    	<span>President + Secretary Reports</span>
					        </h1>

                        <?php } elseif (is_post_type_archive('contribution')) { ?>
			    		    <h1 id="taxHeader">
				    	    	<span>Member Contributions</span>
					        </h1>

					    <?php } elseif (is_tax('report_author')) { ?>
					        <h1 id="taxHeader">
					    	    <span>Member Contributions Posted To </span>
                                <?php $the_tax = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                                            echo $the_tax->name;
                                            ?>
					        </h1>

                         <?php } elseif (is_tax('contribution_type')) { ?>
					        <h1 id="taxHeader">
					    	    <span>Member Contributions Posted To </span>
                                <?php $the_tax = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                                            echo $the_tax->name;
                                            ?>
					        </h1>

					    <?php } ?>
					    	<!-- To see additional archive styles, visit the /partials directory -->
					    	<?php get_template_part( 'partials/loop', 'archive' ); ?>

    				</div> <!-- end #main -->


                </div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
