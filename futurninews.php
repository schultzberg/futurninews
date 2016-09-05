<?php defined( 'ABSPATH' ) or die( 'No nooo noono nonoo no......no!' ); ?>

<?php
/*
Plugin Name: Futurninews
Description: A supersmooth plugin for writing newsletters 
Version:     1.5
Author:      Viktor Schultzberg
Author URI:  http://viktorschultzberg.se
*/



/*
*  ************************
*  FUTURNINEWS PLUGIN SETUP
*  ************************
*  register custom post type
*/ 


function newsletter_cpt() {
	$labels = array(
		'name'					=> __( 'Futurninews',  'futurninews_plugin' ),
		'singular_name'			=> __( 'Futurninews', 'futurninews_plugin' ),
		'menu_name'				=> __( 'Futurninews', 'futurninews_plugin' ),
		'name_admin_bar'		=> __( 'Futurninews', 'futurninews_plugin' ),
		'add_new'				=> __( 'Add new', 'futurninews_plugin' ),
		'add_new_item'			=> __( 'Add New Newsletter' ),
		'edit_item'				=> __( 'Edit Newsletter' ),
		'view_item'				=> __( 'View Newsletter' ),
		'all_items'				=> __( 'All Newsletter' ),
		'search_items'			=> __( 'Search Newsletter' ),
		'parent_item_colon'		=> __( 'Parent Newsletter:' ),
		'not_found' 			=> __( 'No newsletter found.' ),
		'not_found_in_trash'	=> __( 'No newsletter found in Trash.' )
	);

	$args = array(
		'labels'				=> $labels,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'menu_position'			=> 25,
		'supports'				=> array( 'title', 'editor')
	);

	register_post_type('futurninews', $args);
}

add_action( 'init', 'newsletter_cpt' );


/*
*  *******************
*  FUTURNINEWS METABOX
*  *******************
*/ 

/* 
* add box: 
*/
function add_futurninews_metabox(){
	add_meta_box( 
		'futurninews_metabox', 
		__( 'Create newsletter', 'futurninews_plugin' ), 
		'build_futurninews_metabox', 
		'futurninews', 
		'side', 
		'low'
	);
}
add_action( 'add_meta_boxes_futurninews','add_futurninews_metabox');

/*
* Add WYSIWYG-editor:
*/
function register_meta_boxen() {
	add_meta_box("wysiwyg-editor-2", "Second Column", "second_column_box",
	"futurninews", "normal", "high");    
}
add_action('admin_menu', 'register_meta_boxen');

function second_column_box() {
    echo <<<EOT
    <script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#tinymce").addClass("mceEditor");
    if ( typeof( tinyMCE ) == "object" &&
         typeof( tinyMCE.execCommand ) == "function" ) {
        tinyMCE.execCommand("mceAddControl", false, "tinymce");
    }
});
</script>
    <textarea id="tinymce" name="tinymce"></textarea>
EOT;
}

/* 
* add input fields for metabox 
*/
function build_futurninews_metabox( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'futurninews_metabox_nonce' );

	$current_header = get_post_meta( $post->ID, '_futu_header', true);
	$current_content = get_post_meta( $post->ID, '_futu_content', true);
	$current_header = get_post_meta( $post->ID, '_futu_footer', true);


	?>
	<div class="inside">

		<h3><?php _e( 'Header', 'futurninews_plugin' ); ?></h3>
		<p>
			<input type="text" name="header" value="<?= $current_header ?>" />
		</p>

		<h3><?php _e( 'Content', 'futurninews_plugin' ); ?></h3>
		<p>
			<textarea name="content" rows="5" cols="30"> <?= $current_content ?> </textarea>
		</p>

		<h3><?php _e( 'Footer', 'futurninews_plugin' ); ?></h3>
		<p>
			<input type="text" name="footer" value="<?= $current_footer ?>" />
		</p>
	</div>
<?php
}


/* 
* Store data from fields 
*/

function save_metabox_data( $post_id ) {
	// verify the futurninews nonce 
	if ( !isset( $_POST['futurninews_metabox_nonce'] ) || !wp_verify_nonce( $_POST['futurninews_metabox_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave ???
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	//
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	// store data:
	if ( isset( $_REQUEST['current_header'] ) ) {
		update_post_meta( $post_id, '_futu_header', sanitize_text_field( $_POST['header'] ) );
	}

	if ( isset( $_REQUEST['current_content'] ) ) {
		update_post_meta( $post_id, '_futu_content', sanitize_text_field( $_POST['content'] ) );
	}

	if ( isset( $_REQUEST['current_footer'] ) ) {
		update_post_meta( $post_id, '_futu_footer', sanitize_text_field( $_POST['footer'] ) );
	}
}

add_action( 'save_post_futurninews', 'save_metabox_data', 10, 2 );


/*
HEADER
-header

CONTENT
-hero
-heading
-text
-image
FOOTER

-footer
-social
*/


?>