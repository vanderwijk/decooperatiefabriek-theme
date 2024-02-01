<!DOCTYPE HTML>
<html lang="nl-NL" xml:lang="nl-NL">
<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta content="initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
	
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-544763275feecae7" async="async"></script>
</head>

<body <?php body_class() ?> >
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M3GLZ6T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<?php $dcf_settings = get_option( "dcf_theme_settings" ); ?>
<div id="wrapper">	
	<div id="content">
	
		<section id="top">
			<div class="container-12">
				<div class="grid-12">
					<div id="top-search">
						<?php get_search_form(); ?>
					</div>
					<div class="social">
						<?php if($dcf_settings['dcf_contact_linkedin']) { ?>
							<a target="_blank" href="<?php echo $dcf_settings['dcf_contact_linkedin']; ?>">
								<span class="linkedin"></span>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		
		<header>
			<div class="container-12">
			<?php if(!is_front_page()) { ?>
				<div id="logo-container" class="grid-3">
					<a href="<?php echo site_url(); ?>" title="De Coöperatie Fabriek"><img src="<?php echo bloginfo('template_directory'); ?>/images/decooperatiefabriek-small.png" alt="De De Coöperatie Fabriek" /></a>
				</div>
				<div class="grid-9">
			<?php } else { ?>
				<div class="grid-12">
			<?php } ?>
					<a class="toggleMenu" href="#">Menu</a>
					<?php wp_nav_menu( array('theme_location' => 'top menu', 'items_wrap' => '<nav class="nav"><ul>%3$s</ul></nav>', 'container' => '')); ?>
				</div>
			</div>
		</header>
