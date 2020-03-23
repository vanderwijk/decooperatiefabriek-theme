<?php

/**
 *
Template Name: Klanten
*/
?>

<?php get_header(); global $clients_meta; $quotes = array(); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12 intro">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif;?>
				<ul id="client-list" class="client-page">
				<?php
						$post_type = 'clients';
						$tax = 'company';
						$tax_terms = get_terms($tax,'hide_empty=1&order=DESC&orderby=menu_order');
						global $clients_meta;
						
						if ($tax_terms) {
						  foreach ($tax_terms  as $tax_term) {
						    $args=array(
						      'post_type' => $post_type,
						      "$tax" => $tax_term->slug,
						      'post_status' => 'publish',
						      'posts_per_page' => -1,
						      'caller_get_posts'=> 1,
						    );
							
						    $my_query = null;
						    $my_query = new WP_Query($args);
						    if( $my_query->have_posts() ) {
						      get_client_header($tax_term, $tax_terms);
						      while ($my_query->have_posts()) : $my_query->the_post(); ?>
						        <?php $meta = get_post_meta(get_the_ID(), $clients_meta->get_the_id(), TRUE); ?>
						        	<div class="client grid-12">
						        		<div class="client-info grid-4 alpha">
							        		<?php if(has_post_thumbnail()) {	
								        			the_post_thumbnail('member_thumb');
								        		  } else {
								        		  	?> <img src="<?php echo replacement_img('member_thumb'); ?>"/>
								        		  <?php } ?>
							        		<h4><?php the_title(); ?></h4>																        
							        		<p class="title">
							        			<?php if($meta['title']) { echo $meta['title']; } ?>
							        		</p>
							        	</div>
						        		<div class="client-container grid-8 omega">
						        			<?php the_content(); ?>
						        		</div>
						        	</div>
						        <?php
						      endwhile;
						    }
						    wp_reset_query();
						  }
						  
						}
					?>
			</div>
		</div>
	</section>
	
	</div>
</div>

<?php get_footer(); ?>