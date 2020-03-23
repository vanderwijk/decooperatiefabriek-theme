<?php
	$dcf_settings = get_option( "dcf_theme_settings" );
	$children = "";
  	if(get_post_type() == 'post') {
	  	$titlenamer = "Nieuws";
	  	$subposts = wp_get_recent_posts( 'numberposts=5&orderby=desc&order=date&post_type=post&post_status=publish' );
	  	$currentID = get_the_ID();
	  	foreach ($subposts as $recentpost) {
	  		$newclass = "";
			if($currentID == $recentpost['ID']) { $newclass = "current-post-item"; }
			$children .= '<li class="'. $newclass .'" ><a href="'. get_permalink($recentpost['ID']) . '">'. $recentpost['post_title'] . '</a></li>';
	  	}
  		
    } else {
	  if($post->post_parent) {
	  	$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
	  	$titlenamer = get_the_title($post->post_parent);
	  	$titlelink = get_permalink($post->post_parent);
	  } else {
	  	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	  	$titlenamer = get_the_title($post->ID);
	  } 
  }
  ?><div class="grid-3"><?php
  if (!empty($children)) { ?>
		<aside id="sidebar">
		  <h3><?php echo $titlenamer; ?></h3>
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