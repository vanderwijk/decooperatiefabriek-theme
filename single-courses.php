<?php get_header();
	global $course_meta; $meta = get_post_meta(get_the_ID(), $course_meta->get_the_id(), TRUE);
	global $course_reference_meta; $meta_r = get_post_meta(get_the_ID(), $course_reference_meta->get_the_id(), TRUE);
?>

		<section id="slider">
			<div class="container-12">
				<div class="slider-container grid-12">
				<div id="slider-images">
						<?php get_template_part('slider'); ?>
					</div>
				</div>
			</div>
		</section>
		
		<section id="container">
			<div class="container-12 s-right">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-9">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<?php if (!empty($meta['extra_content'])) { ?>
							<div id="course-info">
								<p><bold class="header-bold"><?php echo $meta['extra_title']; ?></bold></p>
								<?php echo apply_filters( 'the_content', $meta['extra_content']); ?>
							</div>
						<?php }
						if($meta_r['referentie']) { ?>
							<h4>Referenties</h4>
							<div id="references">
								<?php // loop a set of field groups
								foreach ($meta_r['referentie'] as $reference)
								{
									if($reference['referentie_active']) {
										?>
										<div class="reference grid-9 alpha">
											<p class="reference-content">"<?php echo $reference['referentie_content']; ?>"</p>
											<p class="reference-name"><?php echo $reference['referentie_naam']; ?></p>
										</div>
										<?php
									}
								}
							?></div><?php
						} ?>	
						<h4>Andere programma's</h4>
						<?php get_template_part('other-courses'); ?>
					</div>
				<?php endwhile; endif;?>
				<?php get_sidebar('courses'); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>
