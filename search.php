<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
					<div class="grid-9">
						<div id="search">
					<?php if ( have_posts() ) : ?>
		
						<h1><?php printf( __( 'Zoekresultaten voor: %s', 'noud' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="result">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							    <?php the_excerpt(); ?>
							    <a href="<?php the_permalink(); ?>" class="readmore">Lees verder</a>
							</div>
							<hr>
						<?php endwhile; ?>
					<?php else : ?>						
							<h1><?php _e( 'Zoekresultaten', 'dcf' ); ?></h1>
							<p><?php _e( 'Er zijn geen overeenkomstige resultaten gevonden!', 'dcf' ); ?></p>
					<?php endif; ?>
		
						</div><!-- #search -->
					</div>
				<?php get_sidebar(); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>