<?php

/**
 *
Template Name: Programma's - voor uw klanten
*/
?>

<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="course-list" class="courses-page">	
				<?php
				    $pagenum = $wp_query->query_vars;
				    $pagenum = $pagenum['paged'];
				    
				    if (empty($pagenum)) {
					$pagenum = 1;
				    }				
				    query_posts(array(
				    	'showposts' => 8,
				    	'paged' => $pagenum,
				    	'order' => 'ASC',
				    	'post_type' => 'courses',
				    	'tax_query' => array( array(
					    		'taxonomy' => 'categorie',
					    		'field' => 'id',
					    		'terms' => 6
					    	)
				    	)
				    ));
					if ( have_posts() ) : while (have_posts()) : the_post(); ?>
					<li class="course grid-6">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) { 
							      the_post_thumbnail('thumbnail', array('class' => 'course-thumb'));
							    } else {
							    	?><img class="course-thumb" src="<?php echo replacement_img('course_thumb'); ?>" /><?php
							    } ?>
						</a>
						<div class="course-info">
							<a href="<?php the_permalink(); ?>" class="course-header"><?php the_title(); ?></a>
							<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
							<img src="<?php echo bloginfo('template_directory') . '/images/readmore-arrow.png'; ?>" />
						</div>
					</li>
				<?php endwhile; endif;
				if(function_exists('wp_pagenavi')) {
				   ?><div class="grid-12"><hr><?php wp_pagenavi();?></div><?php
				} ?>
			</div>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>