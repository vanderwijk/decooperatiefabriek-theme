<?php

/**
 * Template Name: Sitemap
*/
?>

<?php get_header(); ?>

		<section id="container">
			<div class="container-12">
					<div class="grid-12">
									<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<h1><?php the_title(); ?></h1>
										<?php endwhile; endif;?>
						
						<h4 id="pages">Pagina's</h2>
						<hr>
							<ul>
							<?php
							// Add pages you'd like to exclude in the exclude here
							wp_list_pages(
							  array(
							    'exclude' => '',
							    'title_li' => '',
							  )
							);
							?>
						</ul>
						<br/>
						<h4 id="posts">Blog</h2>
						<hr>
						<ul>
							<?php
							// Add categories you'd like to exclude in the exclude here
							$cats = get_categories('exclude=');
							foreach ($cats as $cat) {
							  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
							  while(have_posts()) {
							    the_post();
							    $category = get_the_category();
							    // Only display a post link once, even if it's in multiple categories
							    if ($category[0]->cat_ID == $cat->cat_ID) {
							      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
							    }
							  }
							  echo "</li>";
							}
							?>
						</ul>
						<br/>
						<?php foreach( get_post_types( array('public' => true, 'publicly_queryable' => true) ) as $post_type ) {
						  if ( in_array( $post_type, array('post','page','attachment') ) )
						    continue;
						
						  $pt = get_post_type_object( $post_type );
						
						  echo '<h4>'.$pt->labels->name.'</h4>';
						  echo '<hr>';
						  echo '<ul>';
						
						  query_posts('post_type='.$post_type.'&posts_per_page=-1');
						  while( have_posts() ) {
						    the_post();
						    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
						  }
						
						  echo '</ul>';
						  echo '<br/>';
						} ?>
					</div>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>