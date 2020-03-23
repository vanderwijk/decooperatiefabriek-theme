<?php 
		$attachments = get_posts( array(
			'post_type' => 'attachment',
			'posts_per_page' => -1,
			'post_parent' => $post->ID,
			'exclude'     => get_post_thumbnail_id(),
			'order' => 'DESC',
			'orderby' => 'menu_order'
		) );

		if ( $attachments && !is_singular( 'courses' ) ) {
			?>
			   <div class="flexslider">
			   <ul class="slides">
			    <?php
				foreach ( $attachments as $attachment ) {
					$imgfull = wp_get_attachment_image_src( $attachment->ID, 'slider' );
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					$title = $attachment->post_title;
					if(!$alt) { $alt = $title; }
					echo '<li><img src="'.$imgfull[0].'" alt="'.$alt.'" /></li>';
				}
			?></ul></div><?php
		} else {
			if(has_post_thumbnail()) {
				the_post_thumbnail('slider');
			} else {
			?> <img src="<?php echo get_template_directory_uri() . '/images/slider-sample.png'; ?>" alt="De Coöperatiefabriek" /> <?php
			}
		}
?>