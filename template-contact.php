<?php

/**
 *
Template Name: Contact
*/
?>

<?php get_header(); $dcf_settings = get_option( "dcf_theme_settings" ); 
	$adres = str_replace(array("\n","\r"), "", $dcf_settings['dcf_adres']); ?>

		<section id="container">
			<div class="container-12">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="grid-12">
						<h1><?php the_title(); ?></h1>
						<?php if(isset($adres)) {
							//echo do_shortcode('[tb_google_map address="'. $adres .'" maptype="roadmap" zoom="13" height="250"]');
						} ?>
						<?php the_content(); ?>
					</div>
					<div class="grid-6">
						<?php echo do_shortcode('[gravityform id="1" name="Contactformulier" ajax="true"]'); ?>
					</div>
					<div class="grid-6">
						<div id="contact-slogan">
							<h2><?php echo $dcf_settings['dcf_contact_slogan']; ?></h2>
						</div>
						<div id="contact-social">
							<h4>Contactinformatie</h4>
							<?php  if($dcf_settings['dcf_contact_linkedin']) { ?>
								  <a target="_blank" href="<?php echo $dcf_settings['dcf_contact_linkedin']; ?>">
									  <span class="team-contact linkedin">
									  </span>
									  <p>De Coöperatie Fabriek</p>
								  </a>
							<?php } ?>
						</div>
						<div id="contact-address">
							<h4>De Coöperatie Fabriek</h4>								
							<?php echo apply_filters( 'the_content', stripcslashes($dcf_settings['dcf_contact_address'])); ?>
						</div>
					</div>
				<?php endwhile; endif;?>
			</div>
		</section>
	
	</div>
</div>

<?php get_footer(); ?>