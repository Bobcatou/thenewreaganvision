<?php
/*----------------------------------*/
/* Custom Posts Options				*/
/*----------------------------------*/

add_action('admin_menu', 'wpzoom_options_box');

function wpzoom_options_box() {
	add_meta_box('wpzoom_post_template', 'Post Options', 'wpzoom_post_options', 'post', 'side', 'high');
}

add_action('save_post', 'custom_add_save');

function custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
	  $postID = $parent_id;
	}
	
	if ($_POST['save'] || $_POST['publish']) {
		if ($_POST['wpzoom_post_template']) {
			update_custom_meta($postID, $_POST['wpzoom_post_template'], 'wpzoom_post_template');
		}
		update_custom_meta($postID, $_POST['wpzoom_post_embed_code'], 'wpzoom_post_embed_code');
	}
}

function update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
		// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
	
}

// Regular Posts Options
function wpzoom_post_options() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
				<label for="wpzoom_post_embed_code" >Video Embed Code:</label><br />
				<textarea style="height: 100px; width: 250px;" name="wpzoom_post_embed_code" id="wpzoom_post_embed_code"><?php echo get_post_meta($post->ID, 'wpzoom_post_embed_code', true); ?></textarea>
				<label for="wpzoom_post_embed_code" ><em>Example:</em><br/><br/><code>&lt;iframe title=&quot;YouTube video player&quot; width=&quot;460&quot; height=&quot;260&quot; src=&quot;http://www.youtube.com/embed/R55e-uHQna0?hd=1&amp;wmode=transparent&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;</code></label><br /><br />
				<span class="description">This video will be shown in custom widgets and special locations of the theme.</span>
			</p>
  		</div>
	</fieldset>
	<?php
	}
?>
<?php
$wpzoom_featured_fields = array(
	array(
		"name"		=> "wpzoom_is_featured",
		"label"		=> "Feature this Post",
		"type"		=> "checkbox"
	),	// checkbox
	
	);

function wpzoom_featured_meta( $post_data, $meta_info ) {
	global $post, $wpzoom_featured_fields;
	echo '<div class="wpzoom_panel"><input type="hidden" name="wpzoom_featured_metaes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	foreach( $wpzoom_featured_fields as $o ){
		$val = get_post_meta( $post->ID, $o['name'], true );
		echo '<p>';

		switch ( $o['type'] ){
			case "checkbox":
				$isChecked = ( $val == 1 ? 'checked="checked"' : '' ); // we store checked checkboxes as 1
				echo '<input type="checkbox" name="' . $o['name'] . '" id="' . $o['name'] . '" ' . $isChecked . ' /> <label for="wpzoom_is_featured" >' . $o['label'] . '</label>';
			break; // checkbox

			case "text":
				default:
				echo '<input type="text" name="' . $o['name'] . '" id="' . $o['name'] . '" value="' . $val . '" placeholder="' . $o['label'] . '" />';
			break; // text & default

			 
		}// switch

	}// foreach
	echo '</div>';
?>

<style type="text/css" media="screen">
	.wpzoom_panel input[type="text"],
	.wpzoom_panel textarea {
		width:100%;
	}
	.wpzoom_panel .desc {
		text-align:right;
	}
 
</style>

<?php 
}

function wpzoom_create_featured_meta() {
	if ( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'wpzoom_featured_meta', 'Feature this Post?', 'wpzoom_featured_meta', 'post', 'side', 'high' );
	}
}

function wpzoom_save_featured_meta( $post_id ) {

	global $post, $post_id, $wpzoom_featured_fields;
	if ( in_array( $_REQUEST['post_type'], array('page') ) ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {return $post_id;}
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) {return $post_id;}
	}

	foreach($wpzoom_featured_fields as $o){
		if ( !wp_verify_nonce( $_REQUEST['wpzoom_featured_metaes_nonce'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		switch ($o['type']){
			case "checkbox":
				update_post_meta( $post_id, $o['name'], isset( $_REQUEST[$o['name']] ) );
			break;
			default:
				update_post_meta($post_id, $o['name'], $_REQUEST[$o['name']]);
			break;
		}
	}
}
add_action( 'admin_menu', 'wpzoom_create_featured_meta' );  
add_action( 'save_post', 'wpzoom_save_featured_meta' );