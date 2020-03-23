<?php
/*----------------------------------------------------------------------------------------------

[Table of contents]

1. Defaults
2. Typekit
3. Replacement image
4. Google analytics
5. Client page header

----------------------------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------------------------
[Defaults]
----------------------------------------------------------------------------------------------*/

/* Custom image size */
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'course_small', 172, 135, true ); //(cropped)
	add_image_size( 'home_news', 422, 211, true ); //(cropped)
	add_image_size( 'member_thumb', 224, 222, true ); //(cropped)
	add_image_size( 'team_thumb', 207, 207, true ); //(cropped)
	add_image_size( 'client_thumb', 160, 160, true ); //(cropped)
	add_image_size( 'small_client_thumb', 100, 100, true ); //(cropped)
	add_image_size( 'attach_size', 80, 80, true ); //(cropped)
	add_image_size( 'quote_small', 102, 102, true); //(cropped)
	add_image_size( 'slider', 940, 300, true ); //(cropped)
	add_image_size( 'blog', 600, 200, false );
}

/* Menu */
add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
	register_nav_menu('top menu', __('Standaard menu'));
	register_nav_menu('footer menu', __('Footer menu'));
	register_nav_menu('copyright menu', __('Copyright menu'));
}

/* Javascript */
add_action('wp_enqueue_scripts', 'init_script');
function init_script() {
	wp_register_style( 'rwdgrid', get_template_directory_uri() . '/css/rwdgrid.css');
	wp_enqueue_style( 'rwdgrid' ); 
	wp_register_script( 'fredsel', get_template_directory_uri().'/js/jquery.carouFredSel-6.2.1-packed.js');
	wp_register_script( 'touchswipe', get_template_directory_uri().'/js/jquery.touchSwipe.min.js');
	wp_register_script( 'fitvids', get_template_directory_uri().'/js/jquery.fitvids.js');
	wp_register_script( 'selectivizr', get_template_directory_uri().'/js/selectivizr-min.js');
	wp_register_script( 'quicksearch', get_template_directory_uri().'/js/jquery.quicksearch.js');
	wp_register_script( 'slider', get_template_directory_uri().'/js/jquery.flexslider-min.js');
	wp_register_script( 'mediaquery', get_template_directory_uri().'/js/respond.min.js');
	wp_enqueue_script( 'init', get_template_directory_uri().'/js/init.js', array('jquery', 'fredsel', 'touchswipe', 'fitvids', 'selectivizr', 'quicksearch', 'slider', 'mediaquery'));
}

add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance


function dcf_sidebars() {
	
	$args = array(
		'id'            => 'footer-sidebar',
		'name'          => __( 'Footer Sidebar', 'text_domain' ),
		'description'   => __( 'Staat in de footer', 'text_domain' ),
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'before_widget' => '<div class="grid-3 footer-item"><div class="widget %2$s">',
		'after_widget'  => '</div></div>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'dcf_sidebars' );

function embed_defaults($embed_size){
    if( is_single() ){ // If displaying a single post
        $embed_size['width'] = 700; // Adjust values to your needs
        $embed_size['height'] = 400;
    }
     
    return $embed_size; // Return new size
}
add_filter('embed_defaults', 'embed_defaults');

add_filter('body_class','extra_class_names');
function extra_class_names($classes) {
	if(!is_front_page()) {
		$classes[] = 'sub';
	}
	return $classes;
}

function dcf_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'dcf_excerpt_more');

function custom_image_sizes_add_settings($sizes) {
	   $extraImageSizes = array('quote_small' => __('Quote klein'));
	   $sizes = array_merge($sizes, $extraImageSizes);
       return $sizes;
}
add_filter('image_size_names_choose', 'custom_image_sizes_add_settings');

add_filter( 'request', 'empty_request_filter' );
function empty_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

function dcf_login_logo() {
    echo '<style type="text/css">'.
             'h1 a { width: 223px!important; height: 200px!important; background-image:url('.get_bloginfo( 'template_directory' ).'/images/decooperatiefabriek.png) !important; background-size: 223px 200px!important; margin:-40px 0 20px 50px!important }'.
         '</style>';
}
add_action( 'login_head', 'dcf_login_logo' );

function dcf_login_url() {
    return home_url( '/' );
}
add_filter( 'login_headerurl', 'dcf_login_url' );

function dcf_login_title() {
    return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'dcf_login_title' );

function get_taxonomies_terms_id($post, $category) {
	$terms = get_the_terms( $post->ID, $category );
	$returnTax = "";
	if ( !empty( $terms ) ) {
		$out = array();
		foreach ( $terms as $term ) {
			$returnTax .= $term->slug . '';
		}
	}
	return $returnTax;
}

function add_image_class($class){
	$class .= ' img-stroke';
	return $class;
}
add_filter('get_image_tag_class','add_image_class');

function remove_admin_comments(){
 
	if ( function_exists('remove_menu_page') ) {
		remove_menu_page('edit-comments.php');
		//remove_menu_page('tools.php');
		//remove_menu_page('edit.php');
	}
	
}
add_action('admin_menu', 'remove_admin_comments'); // Add our function to the admin_menu action

function get_attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}

function change_mime_icon($icon, $mime = null, $post_id = null){
    $icon = str_replace(get_bloginfo('wpurl').'/wp-includes/images/crystal/', WP_CONTENT_URL . '/themes/decooperatiefabriek/images/icons/', $icon);
    return $icon;
}
//add_filter('wp_mime_type_icon', 'change_mime_icon');


/*----------------------------------------------------------------------------------------------
[Typekit]
----------------------------------------------------------------------------------------------*/

//add_action( 'wp_enqueue_scripts', 'embed_typekit_fonts' );
 
if ( !function_exists( 'embed_typekit_fonts' ) ) {
	function embed_typekit_fonts() {
		if ( !is_admin() ) {
			wp_enqueue_script( 'load_kit' , '//use.typekit.com/cil2lyv.js', array('jquery') );
		}
	}
}

/*----------------------------------------------------------------------------------------------
[Replacement Image]
----------------------------------------------------------------------------------------------*/

function replacement_img($size) {
	switch ($size) {
		case "course_thumb":
			$img = get_template_directory_uri(). '/images/course-sample.png';
			return $img;
		break;
		case "course_small":
			$img = get_template_directory_uri(). '/images/course-small-sample.png';
			return $img;
		break;
		case "member_thumb":
			$img = get_template_directory_uri(). '/images/member-sample.png';
			return $img;
		break;
	}
}

/*----------------------------------------------------------------------------------------------
[Google Analytics]
----------------------------------------------------------------------------------------------*/

function google_analytics_tracking_code(){

	?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19548230-6', 'auto');
  ga('send', 'pageview');

</script>

<?php
}
add_action('wp_head', 'google_analytics_tracking_code');

/*----------------------------------------------------------------------------------------------
[Client page header]
----------------------------------------------------------------------------------------------*/

function get_client_header($current_tax, $tax_terms) {
	?>
	<div class="company">
		<div class="company_head grid-12">
			<?php
			//list the taxonomy
			$i=0; // counter for printing separator bars
			?> <div class="companies"> <?php
			foreach ($tax_terms as $tax_term) {
			    $wpq = array ('taxonomy'=>$tax,'term'=>$tax_term->slug);
			    $query = new WP_Query ($wpq);
				if($current_tax != $tax_term) {
					echo "<a href=\"#".$tax_term->slug."\">".$tax_term->name."</a>";
				} else {
					echo "<h2 id=\"".$tax_term->slug."\">" . $tax_term->name . "</h2>";
				}
				// output separator bar if not last item in list
				if ( $i < count($tax_terms)-1 ) {
					echo " | " ;
			    }
				$i++;
			}
			?>
		</div>
	</div><?php
}

/*----------------------------------------------------------------------------------------------
[Gravity forms placeholder]
----------------------------------------------------------------------------------------------*/

/* Add a custom field to the field editor (See editor screenshot) */
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);

function my_standard_settings($position, $form_id){

// Create settings on position 25 (right after Field Label)

if($position == 25){
?>
		
<li class="admin_label_setting field_setting" style="display: list-item; ">
<label for="field_placeholder">Placeholder Text

<!-- Tooltip to help users understand what this field does -->
<a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
			
</label>
		
<input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
		
</li>
<?php
}
}

/* Now we execute some javascript technicalitites for the field to load correctly */

add_action("gform_editor_js", "my_gform_editor_js");

function my_gform_editor_js(){
?>
<script>
//binding to the load field settings event to initialize the checkbox
jQuery(document).bind("gform_load_field_settings", function(event, field, form){
jQuery("#field_placeholder").val(field["placeholder"]);
});
</script>

<?php
}

/* We use jQuery to read the placeholder value and inject it to its field */

add_action('gform_enqueue_scripts',"my_gform_enqueue_scripts", 10, 2);

function my_gform_enqueue_scripts($form, $is_ajax=false){
?>
<script>

jQuery(function(){
<?php

/* Go through each one of the form fields */

foreach($form['fields'] as $i=>$field){

/* Check if the field has an assigned placeholder */
			
if(isset($field['placeholder']) && !empty($field['placeholder'])){
				
/* If a placeholder text exists, inject it as a new property to the field using jQuery */
				
?>
				
jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
				
<?php
}
}
?>
});
</script>
<?php
}

?>