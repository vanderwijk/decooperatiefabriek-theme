<?php

/**
 *
Template Name: Deelnemers
*/
?>

<?php get_header(); global $clients_meta; $quotes = array(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<a id="button-bg" href="<?php echo get_permalink(138); ?>"><span class="button button-orange">Ook een miniMaster organiseren</br> voor uw klanten?</span></a>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="participant-list" class="participant-page">
				<?php $participants = new WP_query('showposts=-1&orderby=date&ordery=DESC&post_type=participants');
					if ( $participants->have_posts() ) : while ($participants->have_posts()) : $participants->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php $meta = get_post_meta(get_the_ID(), $partners_meta->get_the_id(), TRUE); ?>
						<div class="participant grid-12">
							<div class="participant-info grid-4 alpha">
								<?php the_post_thumbnail('member_thumb'); ?>
								<h4><?php the_title(); ?></h4>																        
								<p class="title">
									<?php if($meta['title']) { echo $meta['title']; } ?>
								</p>
							</div>
							<div class="participant-container grid-8 omega">
								<?php the_content(); ?>
							</div>
						</div>
					<?php } ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
	
	</div>
</div>

<?php get_footer(); ?>