<?php
/*
Plugin Name: Futurninews
Description: A supersmooth plugin for writing newsletters 
Version:     1.5
Author:      Viktor Schultzberg
Author URI:  http://viktorschultzberg.se
*/

defined( 'ABSPATH' ) or die( 'No nooo noono nonoo no......no!' );

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
		'public'				=> true,
		'has_archive'			=> true,
		'hierarchical'			=> true,
		'rewrite'				=> array( 'slug' => 'news', 'with_front' => false ),
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'menu_position'			=> 25,
		'capability_type'		=> 'post',
		'supports'				=> false
	);
	register_post_type('futurninews', $args);
}
add_action( 'init', 'newsletter_cpt' );

/* Adds heading to the Futurninews columns */
function add_futurninews_columns($cols){
	return array(
		'cb' 		=> '<input type="checkbox" />;',
		'title' 	=> 'Title',
		'heading'	=> 'Heading',
		'date'		=> 'Date'
	);
}

function futurninews_col($col, $post_id) {
	switch ($col) {
		case 'heading' :
			get_the_term_list( $post_id , '' , '' , ',' , '' );
		break;
	}
}
add_filter('manage_futurninews_posts_columns', 'add_futurninews_columns');
add_action('manage_futurninews_post_custom_column', 'futurninews_columns', 10, 2);

/* get single-template from plugin */
function load_newsletter_template($template) {
    global $post;

    // Is this a futurninews post?
    if ($post->post_type == "futurninews"){

        $plugin_path = plugin_dir_path( __FILE__ );

        $template_name = 'single-newsletter.php';

        // checks if there is a single template in themefolder, or it doesn't exist in the plugin
        if($template === get_stylesheet_directory() . '/' . $template_name
            || !file_exists($plugin_path . $template_name)) {

            // returns "single.php" or "single-my-custom-post-type.php" from theme directory.
            return $template;
        }

        // If not, return futurninews custom post type template.
        return $plugin_path . $template_name;
    }

    //This is not futurninews, do nothing with $template
    return $template;
}
add_filter('single_template', 'load_newsletter_template');


function remove_menu(){
	remove_menu_page('index.php');
	remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'edit.php' );                   //Posts
	remove_menu_page( 'upload.php' );                 //Media
	remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'plugins.php' );                //Plugins
	remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page( 'options-general.php' );        //Settings
}
add_action('admin_menu', 'remove_menu');


?>