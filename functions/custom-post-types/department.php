<?php
/**
 * Custom post type for storing information about departments and assigning it to corresponding taxonomies
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/** Register post type */
function department_register() {
	$labels = array(
		'name'               => __( 'Departments', 'msutm-main-theme' ),
		'singular_name'      => __( 'Department', 'msutm-main-theme' ),
		'add_new'            => __( 'Add new', 'msutm-main-theme' ),
		'add_new_item'       => __( 'Add new department', 'msutm-main-theme' ),
		'edit_item'          => __( 'Edit department', 'msutm-main-theme' ),
		'new_item'           => __( 'New department', 'msutm-main-theme' ),
		'view_item'          => __( 'Open department card', 'msutm-main-theme' ),
		'search_items'       => __( 'Search department card', 'msutm-main-theme' ),
		'not_found'          => __( 'Nothing found', 'msutm-main-theme' ),
		'not_found_in_trash' => __( 'Nothing found in the trash', 'msutm-main-theme' ),
		'parent_item_colon'  => __( 'Parent', 'msutm-main-theme' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-networking',
		'rewrite'            => true,
		'capability_type'    => 'post',
		'menu_position'      => 12,
		'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'hierarchical'       => true,
		'has_archive'        => true,
	);
	register_post_type( 'department', $args );
}
add_action( 'init', 'department_register' );

/** Register unit group taxonomy */
register_taxonomy(
	'department_type',
	array( 'department' ),
	array(
		'hierarchical'   => true,
		'label'          => __( 'Department types', 'msutm-main-theme' ),
		'singular_label' => __( 'Department type', 'msutm-main-theme' ),
		'rewrite'        => true,
		'show_in_rest'   => true,
	)
);
