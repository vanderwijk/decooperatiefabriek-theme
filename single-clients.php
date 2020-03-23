<?php get_header(); ?>

		<section id="slider">
			<div class="container-12">
				<div class="slider-container grid-12">
				<div id="slider-images">
						<?php if(has_post_thumbnail()) {
							the_post_thumbnail('slider');
						} else {
						?> <img src="<?php echo get_template_directory_uri() . '/images/rabobank.png'; ?>" alt="<?php the_title(); ?>" /> <?php
						} ?>
					</div>
				</div>
			</div>
		</section>
		
		<section id="container">
			<div class="container-12 s-right">
					<div class="grid-12">
						<h1><?php the_title(); ?></h1>
						<?php
						global $repeating_textareas;
						if(isset($repeating_textareas)){
						?> <div id="references"> <?php
							$meta = $repeating_textareas->the_meta();
							$i = 0;
							if(isset($meta['repeating_textareas'])) {
								foreach($meta['repeating_textareas'] as $area){
								?>
								<div class="client">
									<div class="client-info grid-2 alpha">
										<?php if($area['imgurl']) {
											$img = get_attachment_id_from_url($area['imgurl']);
											echo wp_get_attachment_image($img, 'small_client_thumb', 0, array('class' => 'round-corners'));
										 } ?>
									</div>
									<div class="grid-10 omega">
										<h4><?php echo $area['title']; ?></h4>
										<p class="title">
											<?php if($area['function']) { echo $area['function']; } ?>
										</p>
									</div>
									<div class="client-container grid-10 omega">
										<p><?php echo $area['textarea']; ?></p>
									</div>
								</div>
						<?php 
							}
						  }
						  ?></div><?php
						} ?>	
					</div>
					<div class="grid-3" id="client-side">
						<?php get_sidebar('client'); ?>
					</div>
					<div class="grid-9">
							<?php
							$connected = new WP_Query( array(
							  'connected_type' => 'clients_to_courses',
							  'connected_items' => $post,
							  'nopaging' => true,
							) );
							
							// Display connected pages
							if ( $connected->have_posts() ) :
							?>
							<h4>Gevolgde miniMasters</h4>
							<ul id="other-course-list">
							<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								<li class="course grid-4 <?php if($i==0) { ?>alpha<?php } ?>">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) { 
										      the_post_thumbnail('course_small', array('class' => 'course_small'));
										    } else {
										    	?><img class="course-thumb" src="<?php echo replacement_img('course_small'); ?>" /><?php
										    } ?>
									</a>
									<div class="course-info">
										<a href="<?php the_permalink(); ?>" class="course-header"><?php the_title(); ?></a>
										<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></a>
									</div>
								</li>
							<?php endwhile; ?>
							</ul>
							
							<?php 
							// Prevent weirdness
							wp_reset_postdata();
							
							endif;
							?>
					</div>
					<div class="grid-6">
						<?php
						  $attachments = new Attachments( 'clients_attachments', $post->ID );
						?>
						<?php if( $attachments->exist() ) : ?>
						  <h4>Bijlagen</h4>
						  <ul id="attachment-list">
						    <?php while( $attachment = $attachments->get() ) : ?>
						      <li class="grid-8 alpha">
						      	<a target="_blank" href="<?php echo $attachments->url(); ?>">
						      	<?php if($attachments->type() == 'application') {
							      	?><img src="<?php echo bloginfo('template_directory'); ?>/images/icons/document.png" /><?php
						      	} else {
							    	echo $attachments->image('attach_size');
						      	}
						      	?>
						      	<?php echo $attachments->field('title'); ?></a></br>
						      	<span class="attachment-description"><?php echo $attachments->field('description'); ?></span>
						      </li>
						    <?php endwhile; ?>
						  </ul>
						<?php endif; ?>
					</div>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>