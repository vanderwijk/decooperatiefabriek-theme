<?php

/**
 *
Template Name: Pagina met video
*/
?>

<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-1">
						<nav class="post-navigation">
							<?php previous_post_link('%link'); ?> 
						</nav>
					</div>
					<div class="grid-10">
						<h1><?php the_title(); ?></h1>
						<?php if(has_post_thumbnail()) {
							echo the_post_thumbnail('sidebar-img', array('class' => 'img-stroke lead-img responsive'));
						} ?>
						<?php the_content(); ?>
					</div>
					<div class="grid-1">
						<nav class="post-navigation">
							<?php next_post_link('%link'); ?> 
						</nav>
					</div>
				<?php endwhile; endif;?>
					<div class="grid-12">
						<div class="share">
							<p>Deel deze video:</p>
							<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
								<a class="addthis_button_linkedin"></a>
								<a class="addthis_button_facebook"></a>								
								<a class="addthis_button_pinterest_share"></a>
								<?php // <a class="addthis_counter addthis_bubble_style"></a> ?>
							</div>
						</div>
					</div>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>