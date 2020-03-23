<?php

/**
 *
Template Name: Blog
*/
?>

<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
				<div class="grid-9">
					<h1><?php the_title(); ?></h1>
					<?php
					    $pagenum = $wp_query->query_vars;
					    $pagenum = $pagenum['paged'];
					    
					    if (empty($pagenum)) {
						$pagenum = 1;
					    }				
					    query_posts('showposts=4&paged='.$pagenum.'&order=DESC&post_type=post');
						if ( have_posts() ) : while (have_posts()) : the_post(); ?>
						<article>
							<div class="info">
								<div class="date">
									<span class="day"><?php echo get_the_date('d'); ?></span>
									<span class="month"><?php echo get_the_date('M') ?></span>
									<span class="year"><?php echo get_the_date('Y'); ?></span>
								</div>
							</div>
							<div class="post">
								<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) { 
								      the_post_thumbnail('blog', array('class' => 'responsive img-stroke'));
									    } ?>
								</a>
								<h2><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
								<a href="<?php echo get_permalink(); ?>" class="readmore">Lees verder</a>
							</div>
						</article>
					<?php endwhile; endif;
					if(function_exists('wp_pagenavi')) {
					   ?><div id="blog-navi"><hr><?php wp_pagenavi();?></div><?php
					} ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>