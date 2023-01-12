<?php
/**
 * Custom post type for storing information about courses and assigning it to corresponding taxonomies
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
function course_register() {
	$labels = array(
		'name'               => __( 'Courses', 'msutm-main-theme' ),
		'singular_name'      => __( 'Course', 'msutm-main-theme' ),
		'add_new'            => __( 'Add new', 'msutm-main-theme' ),
		'add_new_item'       => __( 'Add new course', 'msutm-main-theme' ),
		'edit_item'          => __( 'Edit course', 'msutm-main-theme' ),
		'new_item'           => __( 'New course', 'msutm-main-theme' ),
		'view_item'          => __( 'Open course card', 'msutm-main-theme' ),
		'search_items'       => __( 'Search course card', 'msutm-main-theme' ),
		'not_found'          => __( 'Nothing found', 'msutm-main-theme' ),
		'not_found_in_trash' => __( 'Nothing found in the thrash', 'msutm-main-theme' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-admin-multisite',
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 9,
		'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		'show_in_rest'       => true,
		'has_archive'        => true,
	);
	register_post_type( 'course', $args );
}
add_action( 'init', 'course_register' );

/** Register educational level taxonomy */
register_taxonomy(
	'edu_level',
	array( 'course' ),
	array(
		'hierarchical'   => true,
		'label'          => __( 'Educational levels', 'msutm-main-theme' ),
		'singular_label' => __( 'Educational level', 'msutm-main-theme' ),
		'query_var'      => true,
		'rewrite'        => true,
		'show_in_rest'   => true,
	)
);
