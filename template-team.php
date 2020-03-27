<?php

/**
 * Template Name: Team
*/
?>

<?php get_header(); 
	global $team_meta;
?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<?php get_template_part('searchform', 'team'); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="member-list" class="member-page">	
				<?php
				    $pagenum = $wp_query->query_vars;
				    $pagenum = $pagenum['paged'];
				    
				    if (empty($pagenum)) {
					$pagenum = 1;
				    }				
				    query_posts('showposts=-1&paged='.$pagenum.'&order=DESC&post_type=team');
					if ( have_posts() ) : while (have_posts()) : the_post(); ?>
					<?php $meta = get_post_meta(get_the_ID(), $team_meta->get_the_id(), TRUE); ?>
					<?php if(has_post_thumbnail()) { ?>
						<li class="member grid-3">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('member_thumb', array('class' => 'member-thumb responsive')); ?>
								<div class="member-overlay">
									<span>Meer info</span>
								</div>
							</a>
							<div class="member-info">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<p class="title"><?php echo $meta['team_teacher']; ?></p>
							</div>
						</li>
					<?php } ?>
				<?php endwhile; else: {
					?><div class="grid-12"><p>Helaas zijn er geen teamleden gevonden.</p></div><?php
				}; endif; ?>
				<nav class="nav-single grid-12">
					<?php posts_nav_link('', ' ', ' '); ?>
				</nav>
				
			</div>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>