					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns show-for-large-up">
                         <?php if ( is_user_logged_in() ) {?>
								<nav id="footerfix" role="navigation">

                                      <section class="bottom-bar-section">

                <?php joints_footer_links(); ?>
			</section>
		    				</nav>

                            <?php };?>
		    			</div>
			        <div class="large-12 medium-12 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<!-- all js scripts are loaded in library/joints.php -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
