<?php

/**
 *
Template Name: Partners
*/
?>

<?php get_header(); global $partners_meta; $quotes = array(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="client-list" class="client-page">	
				<?php $partners = new WP_query('showposts=-1&orderby=date&ordery=DESC&post_type=partners');
					if ( $partners->have_posts() ) : while ($partners->have_posts()) : $partners->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php $meta = get_post_meta(get_the_ID(), $partners_meta->get_the_id(), TRUE); ?>
						<li class="client grid-3">
							<div class="client-wrapper">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('client_thumb', array('class' => 'client-thumb responsive')); ?>
								</a>
							</div>
						</li>
					<?php } ?>
					<?php if($meta['quote_active']) { array_push($quotes, array($meta['quote_content'], $meta['quote_name'])); } ?>
				<?php endwhile; endif; ?>
				<?php if($quotes) { ?>
					<div class="grid-12">
						<h4 class="quote-title">En dit zeggen ze over ons</h4>
					</div>
					<ul id="quote-list">
						<?php foreach ($quotes as $quote) {
							?>
								<li class="quote grid-4">
									<p class="quote-info">
										<?php echo '"' . $quote[0] . '"' ?>
									</p>
									<p class="quote-name">
										<?php echo $quote[1]; ?>
									</p>
								</li>
							<?php
						} ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</section>
	
	</div>
</div>

<?php get_footer(); ?>