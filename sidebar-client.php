<?php global $clients_meta; $meta = get_post_meta(get_the_ID(), $clients_meta->get_the_id(), TRUE); ?>
<?php if($meta) { ?>
	<aside id="sidebar" class="sidebar-right client-sidebar">
			<h3>Informatie</h3>
			<?php if(isset($meta['website'])){ ?><a target="_blank" href="<?php echo $meta['website']; ?>">Website</a><?php }
			if(isset($meta['phone'])){ ?><p><?php echo $meta['phone']; ?></p><?php }
			if(isset($meta['mail'])){ ?><a href="mailto:<?php echo $meta['mail']; ?>"><?php echo $meta['mail']; ?></a><?php }
			if(isset($meta['extra_info'])){ ?><p><?php echo $meta['extra_info']; ?></p><?php }?>
	</aside>
<?php } ?>