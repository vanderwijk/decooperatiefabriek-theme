<?php

/* Template Name: Homepage */

?>
<?php get_header(); ?>
<?php global $home_meta; $meta = get_post_meta(get_the_ID(), $home_meta->get_the_id(), TRUE); ?>

<section id="slider" class="slider">
	<div class="container-12">
		<div class="slider-container grid-12">
			<img id="logo" src="<?php echo bloginfo('template_directory'); ?>/images/decooperatiefabriek.png" alt="De Coöperatie Fabriek" />
			<div id="slider-images">
				<img id="slider-top" src="<?php echo bloginfo('template_directory'); ?>/images/slider-top.png" alt="De Coöperatie Fabriek" />
				<div id="slider-content">
					<?php $dcf_settings = get_option( "dcf_theme_settings" ); ?>
					<?php if( $dcf_settings['dcf_slider_title'] ) { ?> <h1><?php echo $dcf_settings['dcf_slider_title']; ?></h1> <?php } ?>
					<?php if($dcf_settings['dcf_slider_subtitle']) { ?><p class="slidersub"><?php echo $dcf_settings['dcf_slider_subtitle']; ?></p><?php } ?>
					<?php if($dcf_settings['dcf_slider_button_1']) { ?><a href="<?php echo $dcf_settings['dcf_slider_button_1_link']; ?>"><span class="button button-orange"><?php echo $dcf_settings['dcf_slider_button_1_title']; ?></span></a><?php } ?>
					<?php if($dcf_settings['dcf_slider_button_2']) { ?><a href="<?php echo $dcf_settings['dcf_slider_button_2_link']; ?>"><span class="button button-orange"><?php echo $dcf_settings['dcf_slider_button_2_title']; ?></span></a><?php } ?>
				</div>
				<?php get_template_part('slider'); ?>
			</div>
		</div>
	</div>
</section>

<section class="call-to-action" style="display: none;">
	<div class="container-12">
		<div class="grid-12">
			<a href="/programma/online-kennissessies-ondernemen-in-een-nieuwe-werkelijkheid/">Nieuwe online kennissessies voor ondernemers: Ondernemen in een nieuwe werkelijkheid</a>
		</div>
	</div>
</section>

<section id="intro" class="intro">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="container-12" style="margin-bottom: 65px;">
		<div class="grid-12" style="border-bottom: none; padding-bottom: 0;">
			<h1 class="intro-h1"><?php echo $meta['title']; ?></h1>
		</div>
		<div class="grid-6">
			<?php the_content(); ?>
			<a href="<?php echo $meta['link']; ?>" class="readmore">Lees verder</a>
		</div>
		<div class="grid-6">
			<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
			<div class="embed-container">
				<iframe src="//player.vimeo.com/video/185665424" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</div>
		</div>
	</div>

	<div class="container-12">
		<div class="grid-12" style="border-bottom: none; padding-bottom: 0;">
			<h1 class="intro-h1"><?php echo $meta['video_title']; ?></h1>
		</div>
		<div class="grid-12">
			<?php echo apply_filters( 'the_content', $meta['video_content']); ?>
		</div>
		<div class="grid-6" style="display:none;">
			<a href="/videos-van-rabobanken/" class="video-thumbnail">
				<img src="/wp-content/themes/decooperatiefabriek-theme/images/video-thumbnail.jpg" alt="Video afspelen">
				<img class="icon-play" src="/wp-content/themes/decooperatiefabriek-theme/images/play-circle.svg" alt="Video afspelen">
			</a>
		</div>
	</div>

	<div class="container-12">
		<div class="grid-12" style="border-bottom: none; padding-bottom: 0;">
			<div class="share">
				<p>delen:</p>
				<div class="addthis_toolbox addthis_default_style addthis_20x20_style">
					<a class="addthis_button_facebook"></a><a class="addthis_button_linkedin"></a>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; endif;?>
</section>

<section style="display: none;">
	<div class="container-12">
		<div class="grid-12 reviews customers">
		<h2>Wat onze klanten zeggen:</h2>
		<?php
		// Get the recent posts
		$q = 'post_type=review&review_category=customers&orderby=rand&showposts=-1';
		query_posts( $q );
		while ( have_posts() ) : the_post(); ?>
			<div class="review hreview">
				<span class="item">
					<span class="fn">De Cooperatie Fabriek</span>
				</span>
				<span class="rating">5</span>
				<div class="description"><?php the_content(); ?></div>
				<?php $avatar = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				$avatar_url = $avatar['0']; ?>
				<span class="reviewer" <?php if ( $avatar_url ) { ?> style="background-image: url( '<?php echo $avatar_url; ?> ');"<?php } ?>><?php the_title(); ?></span>
			</div>
		<?php endwhile;
		wp_reset_query(); ?>
		</div>
	</div>
</section>

<section>
	<div class="container-12">
		<div class="grid-12 reviews participants">
		<h2>Wat onze deelnemers zeggen:</h2>
		<?php
		// Get the recent posts
		$q = 'post_type=review&review_category=participants&orderby=rand&showposts=-1';
		query_posts( $q );
		while ( have_posts() ) : the_post(); ?>
			<div class="review hreview">
				<span class="item">
					<span class="fn">De Cooperatie Fabriek</span>
				</span>
				<span class="rating">5</span>
				<div class="description"><?php the_content(); ?></div>
				<?php 
				$avatar = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				if ( is_array($avatar) ) {
					$avatar_url = $avatar['0']; 
				} ?>
				<span class="reviewer" <?php if ( $avatar_url ) { ?> style="background-image: url( '<?php echo $avatar_url; ?> ');"<?php } ?>><?php the_title(); ?></span>
			</div>
		<?php endwhile;
		wp_reset_query(); ?>
		</div>
	</div>
</section>

<section id="courses">
	<div class="container-12">
		<div class="grid-12">
			<h2>Programma's</h2>
			<a class="readmore courses-more" href="<?php echo get_permalink(78); ?>">Bekijk alle programma's</a>
		</div>
		<div class="course-carousel"><!-- course-carousel -->
			<div class="pagination" id="carousel-pag"></div>
			<ul id="course-list">
			<?php	$courses = new WP_query( array(
				'posts_per_page' => -1,
				'order' => 'DESC',
				'orderby' => 'menu_order',
				'post_type' => 'courses'
			));
			if ( $courses -> have_posts() ) : while ( $courses -> have_posts() ) : $courses -> the_post();
				global $course_meta;
				$meta_c = get_post_meta( get_the_ID(), $course_meta -> get_the_id(), TRUE );
				if ( isset( $meta_c['extra_active'] ) && $meta_c['extra_active'] == '1' ) { ?>
					<li class="course grid-6">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('thumbnail', array('class' => 'course-thumb responsive'));
							} else {
								?><img class="course-thumb" src="<?php echo replacement_img('course_thumb'); ?>" alt="<?php the_title(); ?>" /><?php
							} ?>
						</a>
						<div class="course-info">
							<a href="<?php the_permalink(); ?>" class="course-header"><?php the_title(); ?></a>
							<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
							<img src="<?php echo bloginfo('template_directory') . '/images/readmore-arrow.png'; ?>" alt="Lees verder" />
						</div>
					</li>
			<?php }; endwhile; endif; ?>

			</ul>
		</div>
	</div>

</section>

<section id="newsletter">
	<div class="container-12">
		<div class="newsletter-container grid-12">
			<div class="grid-7">
				<?php if( $dcf_settings['dcf_newsletter'] ) { ?><p><?php echo $dcf_settings['dcf_newsletter']; ?></p> <?php } ?>
				<a class="newsletter_small" href="<?php echo get_permalink(894); ?>">Of bekijk hier het archief</a>
			</div>
			<div class="grid-4 subscribe">
				<?php gravity_form(2, false, false, false, '', true); ?>
			</div>
		</div>
	</div>
</section>

<section id="news" class="section-news" style="display: none;">
	<div class="container-12 news">
		<div class="grid-12">
			<h2>Actueel</h2>
		</div>
		<div class="actueel grid-6">
			<?php $dcf_settings = get_option( "dcf_theme_settings" );
			if ( $dcf_settings['dcf_home_video'] ) { ?>
			<div class="actueel-movie">
				<?php if ( $dcf_settings['dcf_home_video_link']) :
					$shortcode = '[embed width="460"]'.$dcf_settings['dcf_home_video_link'].'[/embed]';
					global $wp_embed;
					echo $wp_embed ->	run_shortcode($shortcode);
				endif; ?>
			</div><?php
			} else {
				$news = new WP_query( 'showposts=-1&order=DESC&orderby=date&post_type=post&post_status=publish&cat=1' );
				if ( $news -> have_posts() ) : while ( $news -> have_posts() ) : $news -> the_post();
				if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php echo the_post_thumbnail('home_news', array('class' => 'img-stroke responsive')); ?>
					</a>
					<?php break;
				}
				endwhile; endif;
				$wp_query = null;
				//$wp_query = $temp;
				wp_reset_query();
			} ?>
		</div>
		<div class="news-container grid-6">
			<ul>
				<?php $news = new WP_query('showposts=4&order=DESC&orderby=date&post_type=post&post_status=publish&cat=1');
				if ( $news->have_posts() ) : while ($news->have_posts()) : $news->the_post(); ?>
				<li>
					<div class="grid-2">
						<p class="date"><?php echo get_the_date('l j F Y'); ?></p>
					</div>
					<div class="grid-3">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</li>
			<?php endwhile; endif;
			$wp_query = null; wp_reset_query(); ?>
			</ul>
			<a href="<?php echo get_permalink(159); ?>" class="readmore">Meer nieuws</a>
		</div>
	</div>
</section>

</div>
</div>

<?php get_footer(); ?>
