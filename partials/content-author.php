<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$role = get_user_role($curauth->ID);
?>

<div class="author small-12 columns">


		<div class="authorInfo large-12 medium-12 small-12 columns" itemscope itemtype="http://schema.org/Person">
            <div class="authorAvatar">

          <?php echo get_avatar( $curauth->user_email, '80' ); ?>
        </div>



            <h2 itemprop="name" class="authorName"><?php echo $curauth->display_name; ?></h2>
            <?php
            if ($curauth->jobTitle) {
                echo '<span itemprop="jobTitle">' . esc_html($curauth->jobTitle) . '</span>';
            }?>
              <?php
            if ($curauth->organisation) {
                echo '<span itemprop="organization">' . esc_html($curauth->organisation) . '</span>';
            }?>
            <?php
            if ($curauth->rc11Role) {
               echo "<span itemprop='member' id='member'>" . esc_html($curauth->rc11Role) . "</span>";
            }?>

			<p class="authorDescription"><?php echo esc_html($curauth->description); ?></ p>
			<p class="socialIcons">


<ul id="singleAuthor">
	<?php
	$email = $curauth->user_email;
	if($email != '')
	{
		printf('<li><a href="mailto:' . sanitize_email($email) . '" itemprop="email" aria-label="Hit enter to open your email client to contact ' . $curauth->display_name . '" target="_blank"><i class="fi-mail"></i> Email</a></li>');
	}

	$twitter = $curauth->twitter;
	if($twitter != '')
	{
		printf('<li><a href="%s" aria-label="Hit enter to visit the Twitter profile of ' . $curauth->display_name . '" target="_blank">%s</a></li>', esc_url($twitter), '<i class="fi-social-twitter"></i> Twitter');
	}

	$linkedin = $curauth->linkedin;
	if($linkedin != '')
	{
		printf('<li><a href="%s" aria-label="Hit enter to visit the Linkedin profile of ' . $curauth->display_name . '" target="_blank">%s</a></li>', esc_url($linkedin), '<i class="fi-social-linkedin"></i> LinkedIn');
	}
?>
</ul>
</p>

            </ p>

		</div>


<hr>

<h2 class="authorPosts">Contributions by <?php echo $curauth->display_name; ?></h2>

<?php get_template_part( 'partials/loop', 'authors' ); ?>
