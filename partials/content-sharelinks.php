<?php
$find = array("&");
$replace = array("and");
$string = get_the_title();
?>
<ul class="share-links columns">

	<li><a href="https://twitter.com/intent/tweet?url=<?php echo wp_get_shortlink(); ?>&via=&text=<?php the_title(); ?>" title="Share on Twitter" target="_blank"><i class="fi-social-twitter"></i></a></li>

	<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo wp_get_shortlink(); ?>&title=<?php the_title(); ?>&summary=<?php echo wp_filter_nohtml_kses( $content );?>&source=sociologyofaging.org" title="Share on Linkedin" target="_blank"><i class="fi-social-linkedin"></i></a></li>

	<li><a href="mailto:?subject=I wanted to share this post with you <?php echo str_replace($find, $replace, $string); ?>&body=<?php echo wp_get_shortlink();?>" title="Email to a friend/colleague" target="_blank"><i class="fi-mail"></i></a> </li>

	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink() ?>" title="Share on Facebook" target="_blank"><i class="fi-social-facebook"></i></a> </li>

</ul>
