<?php
/**
 * The template for displaying a list of employees on single department page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get employee list from meta field.
$employee_list = carbon_get_the_post_meta( 'crb_employee_list' );
$employee_arr  = array();
foreach ( $employee_list as $employee_post ) {
	// Store information about each employee in an array.
	// Key: employee's post ID.
	// Value: employee's posts list as a string.
	foreach ( $employee_post['crb_employee_relation'] as $employee ) {
		if ( array_key_exists( $employee['id'], $employee_arr ) ) {
			$employee_arr[ $employee['id'] ] .= ', ' . $employee_post['crb_employee_post'];
		} else {
			$employee_arr[ $employee['id'] ] = $employee_post['crb_employee_post'];
		}
	}
}
// Display each employee from an array with a template.
foreach ( $employee_arr as $employee_id => $employee_posts ) {
	employee_template( $employee_id, $employee_posts );
}
