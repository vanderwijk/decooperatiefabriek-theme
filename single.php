<?php

/**
 *
Template Name: Pagina met sidebar
*/
?>

<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-9">
						<h1><?php the_title(); ?></h1>
						<?php if(has_post_thumbnail()) {
							echo the_post_thumbnail('sidebar-img', array('class' => 'img-stroke lead-img responsive'));
						} ?>
						<?php the_content(); ?>
						<div class="share">
							<p>Deel dit bericht:</p>
							<div class="addthis_sharing_toolbox"></div>
						</div>
					</div>
				<?php endwhile; endif;?>
				<?php get_sidebar(); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>