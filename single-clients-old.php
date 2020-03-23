<?php get_header(); global $clients_meta; $meta = get_post_meta(get_the_ID(), $clients_meta->get_the_id(), TRUE); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-9">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php if($meta['quote_content']) {
							?><h4 class="quote-title">Klant aan het woord</h4>
							<div class="client-quote">
								<div class="client-info">
									<?php if($meta['quote_imgurl']) {
									?><img class="img-stroke" src="<?php echo $meta['quote_imgurl']; ?>"/>
									<?php } ?>
									<p class="quote-name">
										<?php echo $meta['quote_name']; ?>
									</p>
									<p class="quote-title">
										<?php echo $meta['quote_title']; ?>
									</p>
								</div>
								<p class="quote-info">
									"<?php echo $meta['quote_content']; ?>"
								</p>
							</div>
						<?php } ?>
					</div>
				<?php endwhile; endif;?>
				<?php get_sidebar('clients'); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>