<?php
/**
 * Custom post type for storing information about employees
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
function employee_register() {
	$labels = array(
		'name'               => __( 'Employees', 'msutm-main-theme' ),
		'singular_name'      => __( 'Employee', 'msutm-main-theme' ),
		'add_new'            => __( 'Add new', 'msutm-main-theme' ),
		'add_new_item'       => __( 'Add new employee', 'msutm-main-theme' ),
		'edit_item'          => __( 'Edit employee', 'msutm-main-theme' ),
		'new_item'           => __( 'New employee', 'msutm-main-theme' ),
		'view_item'          => __( 'Open employee card', 'msutm-main-theme' ),
		'search_items'       => __( 'Search employee card', 'msutm-main-theme' ),
		'not_found'          => __( 'Nothing found', 'msutm-main-theme' ),
		'not_found_in_trash' => __( 'Nothing found in the trash', 'msutm-main-theme' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-businessman',
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		'show_in_rest'       => true,
		'has_archive'        => true,
	);
	register_post_type( 'employee', $args );
}
add_action( 'init', 'employee_register' );
