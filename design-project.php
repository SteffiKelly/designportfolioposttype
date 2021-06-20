<?php
/**
* Plugin Name:   Design Project Post Type
* Plugin URI:    https://github.com/SteffiKelly/designportfolioposttype
* Description:   Adds design portfolio custom post type
* Version:       1.0
* Author:        Steffi Kelly
* Author URI:    https://steffikelly.com
* Text Domain: sk21
* Domain Path: /languages
*/

function sk21_create_design_post_type() {
	$labels = array(
		'name' => __( 'Design Projects', 'sk21' ),
		'singular_name' => __( 'Design Project', 'sk21' ),
		'add_new' => __( 'New Design Project', 'sk21' ),
		'add_new_item' => __( 'Add New Design Project', 'sk21' ),
		'edit_item' => __( 'Edit Design Project', 'sk21' ),
		'new_item' => __( 'New Design Project', 'sk21' ),
		'view_item' => __( 'View Design Project', 'sk21' ),
		'search_items' => __( 'Search Design Projects', 'sk21' ),
		'not_found' =>  __( 'No Design Projects Found', 'sk21' ),
		'not_found_in_trash' => __( 'No Design Projects found in Trash', 'sk21' ),
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
add_action( 'init', 'sk21_create_design_post_type' );

function sk21_register_service_taxonomy() {

  $labels = array(
		'name'              => __( 'Services', 'sk21' ),
		'singular_name'     => __( 'Service', 'sk21' ),
		'search_items'      => __( 'Search Services', 'sk21' ),
		'all_items'         => __( 'All Services', 'sk21' ),
		'edit_item'         => __( 'Edit Services', 'sk21' ),
		'update_item'       => __( 'Update Services', 'sk21' ),
		'add_new_item'      => __( 'Add New Services', 'sk21' ),
		'new_item_name'     => __( 'New Service Name', 'sk21' ),
		'menu_name'         => __( 'Services', 'sk21' ),
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
add_action( 'init', 'sk21_register_service_taxonomy' );

function sk21_add_categories_to_design_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'sk21_add_categories_to_design_pages' );

/**********************************************************************************
sk21_design_project_i18n - registers text domain for i18n
**********************************************************************************/
function sk21_design_project_i18n() {

	load_plugin_textdomain( 'sk21', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'sk21_design_project_i18n' );

?>
