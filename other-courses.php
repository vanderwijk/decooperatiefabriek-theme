<ul id="other-course-list">
	<?php global $post; $cats = get_taxonomies_terms_id($post, 'categorie'); ?>
	<?php $courses = new WP_query(array(
		'posts_per_page' => 2,
		'order' => 'ASC',
		'orderby' => 'rand',
		'post_type' => 'courses',
		'post__not_in' => array($post->ID),
		'categorie' => $cats
	)); $i = 0;
		if ( $courses->have_posts() ) : while ($courses->have_posts()) : $courses->the_post(); ?>
		<li class="course grid-4 <?php if($i==0) { ?>alpha<?php } ?>">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) { 
				      the_post_thumbnail('course_small', array('class' => 'course_small'));
				    } else {
				    	?><img class="course-thumb" src="<?php echo replacement_img('course_small'); ?>" /><?php
				    } ?>
			</a>
			<div class="course-info">
				<a href="<?php the_permalink(); ?>" class="course-header"><?php the_title(); ?></a>
				<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></a>
			</div>
		</li>
	<?php $i++; endwhile; endif; ?>
</ul>