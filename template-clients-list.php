<?php

/**
 *
Template Name: Klanten - Lijst
*/
?>

<?php get_header(); global $clients_meta; $quotes = array(); ?>
		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="client-list" class="client-page grid-5">
				<?php $clients = new WP_query('showposts=-1&orderby=title&order=ASC&post_type=clients');
					if ( $clients->have_posts() ) : while ($clients->have_posts()) : $clients->the_post();
						global $repeating_textareas;
						if(isset($repeating_textareas)){
						?>  <?php
							$meta = $repeating_textareas->the_meta();
							$i = 0;
							if(isset($meta['repeating_textareas'])) {
								?><li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><img src="<?php bloginfo('template_url'); ?>/images/readmore-arrow.png" alt="<?php the_title(); ?>" /></li><?php
							} else {
								?><li class="off"><?php the_title(); ?><img src="<?php bloginfo('template_url'); ?>/images/readmore-arrow.png" alt="<?php the_title(); ?>" /></li><?php
							}
						} ?>
				<?php endwhile; endif; ?>
				</ul>
				<ul id="client-reference" class="grid-7">

					<?php $references = new WP_query('showposts=-1&orderby=title&order=ASC&post_type=clients');
						if ( $references->have_posts() ) : while ($references->have_posts()) : $references->the_post();

						global $repeating_textareas;
						if(isset($repeating_textareas)){
						?>  <?php
							$meta = $repeating_textareas->the_meta();
							$i = 0;
							if(isset($meta['repeating_textareas'])) {
								foreach($meta['repeating_textareas'] as $area){
								if($area['active'] && !empty($area['textarea'])) {
								?>
								<li class="client">
									<div class="client-info grid-2 alpha">
										<?php if($area['imgurl']) {
											$img = get_attachment_id_from_url($area['imgurl']);
											echo '<a href="'. get_permalink() .'">';
											echo wp_get_attachment_image($img, 'small_client_thumb', 0, array('class' => 'round-corners'));
											echo '</a>';
										 } ?>
									</div>
									<div class="grid-5 omega">
										<a href="<?php echo get_permalink(); ?>"><h4><?php echo $area['title']; ?></h4></a>
										<p class="title">
											<?php if($area['function']) { echo $area['function']; } ?>
										</p>
									</div>
									<div class="client-container grid-5 omega">
										<p><?php echo wp_trim_words($area['textarea'], 25, '.. <br><a href="'. get_permalink() .'">Lees meer</a>'); ?></p>
									</div>
								</li>
						<?php }
							}
						  }
						} ?>


					<?php endwhile; endif; ?>

				</ul>
			</div>
		</div>
	</section>

	</div>
</div>

<?php get_footer(); ?>
