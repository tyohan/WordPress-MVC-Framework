<div class="clear"></div>
					</div>
				</div>
			</div>
			<div id="footer">
				<div class="container">
                                    <div class="span-8 footer-widget">
                                        <?php dynamic_sidebar('FooterLeft');?>
                                       
                                    </div>
                                    <div class="span-8 footer-widget">
                                        <?php dynamic_sidebar('FooterCenter');?>
                                    </div>
                                    <div class="span-8 last footer-widget">
                                         <?php dynamic_sidebar('FooterRight');?>
                                    </div>

				</div>
			</div>
		</div>
                <?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
	</body>
</html>


