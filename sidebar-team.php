<?php global $team_meta; $meta = get_post_meta(get_the_ID(), $team_meta->get_the_id(), TRUE); $dcf_settings = get_option( "dcf_theme_settings" ); ?>

<div class="grid-3">
	<aside id="team-sidebar">
		<?php the_post_thumbnail('team_thumb', array('class' => 'img-stroke responsive')); ?>
	</aside>
	<aside id="sidebar" class="sidebar-right team-info">
	  <h3>Contactinformatie</h3>
	  <span class="name"><?php the_title(); ?></span>
	  <?php 
	  //for ($i = 0; $i < count($meta); $i++) {
	  foreach ($meta as $key => $value) {
	  	
	  //print_r($key);
	  //print_r($meta);
	  	//switch ($meta[$i]) {
	  	switch ($key) {
	  		case 'team_phone':
	  			?><span>Tel: <?php echo $meta['team_phone']; ?></span><?php
	  		break;
	  		case 'team_mail':
	  			?><span>E-mail: <a href="mailto:<?php echo $meta['team_mail']; ?>"><?php echo $meta['team_mail']; ?></a></span><?php
	  		break;
	  		case 'team_linkedin';
	  			?><a target="_blank" href="<?php echo $meta['team_linkedin']; ?>">
	  				  <span class="team-contact linkedin">
	  				  </span>
	  			</a><?php
	  		break;
	  		case 'team_twitter';
	  			?><a target="_blank" href="http://www.twitter.com/<?php echo $meta['team_twitter']; ?>">
	  				  <span class="team-contact twitter">
	  				  </span>
	  			</a><?php
	  		break;
	  	}
	  } ?>
	  <div class="clear"></div>
	</aside>
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