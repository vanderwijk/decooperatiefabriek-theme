<?php $dcf_settings = get_option( "dcf_theme_settings" ); ?>
<div class="grid-3">
	<aside id="sidebar" class="sidebar-right">
	  <h3><?php echo $dcf_settings['dcf_sidebar_title']; ?></h3>
	  <p><?php echo $dcf_settings['dcf_sidebar_content']; ?></p>
	  <a href="<?php echo $dcf_settings['dcf_sidebar_button_link']; ?>">
	  	<span class="button button-orange">
	  		<?php echo $dcf_settings['dcf_sidebar_button']; ?>
	  	</span>
	  </a>
	</aside>
	<?php if ( is_single( 1032 ) ) { ?>
	<aside id="sidebar" class="sidebar-right">
		<?php echo do_shortcode( '[content_block id=2268]' ); ?>
	</aside>
	<?php } ?>
</div>