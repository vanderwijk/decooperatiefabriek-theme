<?php get_header();
	global $team_meta; $meta = get_post_meta(get_the_ID(), $team_meta->get_the_id(), TRUE);
?>
		
		<section id="container">
			<div class="container-12 s-right">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-9">
						<h1><?php the_title(); ?></h1>
						<p class="title"><?php echo $meta['team_teacher']; ?></p>
						<?php the_content(); ?>
						<?php if($meta['extra_content']) { ?>
							<div id="course-info">
								<p><bold class="header-bold"><?php echo $meta['extra_title']; ?></bold></p>
								<?php echo apply_filters( 'the_content', $meta['extra_content']); ?>
							</div>
						<?php } ?>
					</div>
				<?php endwhile; endif;?>
				<?php get_sidebar('team'); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>