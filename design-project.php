<?php
/**
* Plugin Name:   Design Project Post Type
* Plugin URI:    https://steffikelly.com
* Description:   Adds a widget for a call to action box
* Version:       1.0
* Author:        Steffi Kelly
* Author URI:    https://steffikelly.com
* Text Domain: wpmu
* Domain Path: /languages
*/

function wpmu_create_post_type() {
	$labels = array(
		'name' => __( 'Design Projects', 'wpmu' ),
		'singular_name' => __( 'Design Project', 'wpmu' ),
		'add_new' => __( 'New Design Project', 'wpmu' ),
		'add_new_item' => __( 'Add New Design Project', 'wpmu' ),
		'edit_item' => __( 'Edit Design Project', 'wpmu' ),
		'new_item' => __( 'New Design Project', 'wpmu' ),
		'view_item' => __( 'View Design Project', 'wpmu' ),
		'search_items' => __( 'Search Design Projects', 'wpmu' ),
		'not_found' =>  __( 'No Design Projects Found', 'wpmu' ),
		'not_found_in_trash' => __( 'No Design Projects found in Trash', 'wpmu' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'design-project' ),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array( 'post_tag', 'category'),
	);
	register_post_type( 'design-project', $args );
}
add_action( 'init', 'wpmu_create_post_type' );

function wpmu_register_taxonomy() {

  $labels = array(
		'name'              => __( 'Services', 'wpmu' ),
		'singular_name'     => __( 'Service', 'wpmu' ),
		'search_items'      => __( 'Search Services', 'wpmu' ),
		'all_items'         => __( 'All Services', 'wpmu' ),
		'edit_item'         => __( 'Edit Services', 'wpmu' ),
		'update_item'       => __( 'Update Services', 'wpmu' ),
		'add_new_item'      => __( 'Add New Services', 'wpmu' ),
		'new_item_name'     => __( 'New Service Name', 'wpmu' ),
		'menu_name'         => __( 'Services', 'wpmu' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'services' ),
		'show_admin_column' => true
	);

	register_taxonomy( 'service', array( 'post', 'design-project' ), $args);

}
add_action( 'init', 'wpmu_register_taxonomy' );

function wpmu_add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'wpmu_add_categories_to_pages' );

/**********************************************************************************
wpmu_design_project_i18n - registers text domain for i18n
**********************************************************************************/
function wpmu_design_project_i18n() {

	load_plugin_textdomain( 'wpmu', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'wpmu_design_project_i18n' );

?>
