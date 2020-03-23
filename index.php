<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-9">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<?php get_sidebar(); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>