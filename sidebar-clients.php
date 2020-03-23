<?php
	$dcf_settings = get_option( "dcf_theme_settings" );
	
	$children = "";
  	$titlenamer = "Klanten";
	$subposts = wp_get_recent_posts( 'numberposts=6&orderby=desc&order=date&post_type=clients&post_status=publish' );
	$currentID = get_the_ID();
	foreach ($subposts as $recentpost) {
		$newclass = "";
		if($currentID == $recentpost['ID']) { $newclass = "current-post-item"; }
		$children .= '<li class="'. $newclass .'" ><a href="'. get_permalink($recentpost['ID']) . '">'. $recentpost['post_title'] . '</a></li>';
	 }
  ?><div class="grid-3"><?php
  if (!empty($children)) { ?>
		<aside id="sidebar">
		  <h3><?php if(isset($titlelink)) { ?><a href="<?php echo $titlelink; ?>" title="<?php echo $titlenamer; ?>"><?php } echo $titlenamer; if(isset($titlelink)) { ?></a> <?php } ?></h3>
		  <ul>
			  <?php echo $children; ?>
		  </ul>
		</aside>
<?php } ?>
	<aside id="sidebar" class="sidebar-right">
	  <h3><?php echo $dcf_settings['dcf_sidebar_title']; ?></h3>
	  <p><?php echo $dcf_settings['dcf_sidebar_content']; ?></p>
	  <a href="<?php echo $dcf_settings['dcf_sidebar_button_link']; ?>">
	  	<span class="button button-orange">
	  		<?php echo $dcf_settings['dcf_sidebar_button']; ?>
	  	</span>
	  </a>
	</aside>
</div>