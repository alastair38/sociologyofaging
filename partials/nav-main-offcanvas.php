<div class="large-12 columns show-for-large-up">
	<div class="fixed contain-to-grid">

		<nav class="top-bar" role="navigation" data-topbar>


 <h1 class="site-title"><i class="fi-torsos-all"></i><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>


			<section class="top-bar-section">
				<?php joints_main_nav(); ?>

			</section>
		</nav>
	</div>
</div>

<!-- This is the nav that will show for mobile/small devices -->
<div class="large-12 columns show-for-medium-down">
	<div class="fixed contain-to-grid">
		<nav class="tab-bar">
			<section class="middle tab-bar-section">
				<h1 class="title"><i class="fi-torsos-all"></i><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
			</section>
			<section class="left-small">
				<a href="#navigation" class="left-off-canvas-toggle menu-icon" aria-label="navigation menu" ><span></span></a>
			</section>
		</nav>
	</div>
</div>

<aside class="left-off-canvas-menu show-for-medium-down" role="navigation" id="navigation">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_main_nav(); ?>
	</ul>
     <?php if ( is_user_logged_in() ) {?>
		<ul class="off-canvas-list">
		<li><label>User Menu</label></li>
     <?php joints_footer_links(); ?>
    </ul>

                            <?php };?>

</aside>

<a class="exit-off-canvas"></a>
