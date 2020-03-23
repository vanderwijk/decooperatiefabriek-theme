<footer>
			<div class="container-12 footer-top">

					<?php
						if(is_active_sidebar('footer-sidebar')){
							dynamic_sidebar('footer-sidebar');
						}
					?>

			</div>
			<div class="footer-bottom">
				<div class="container-12">
					<div class="grid-12">
						<div id="copy">
							<p>&copy; 2014 - <?php echo date("Y"); ?> de Coöperatie Fabriek</p>
						</div>
						<div id="footer-logo-container">
							<img id="footer-logo" src="<?php echo bloginfo('template_directory'); ?>/images/footer-logo.png" alt="De Coöperatiefabriek" />
						</div>
						<div id="footer-nav-container">
							<?php wp_nav_menu( array('theme_location' => 'copyright menu', 'items_wrap' => '<nav id="footer-nav"><ul>%3$s</ul></nav>', 'container' => '')); ?>
						</div>
					</div>	
				</div>
			</div>
	</footer>
	
	<?php wp_footer() ?>
</body>
</html>