<?php
/**
 * The template for displaying a list of employees on single course page
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
$employee_list = carbon_get_the_post_meta( 'crb_employee_course' );
if ( isset( $employee_list ) && ( ! empty( $employee_list ) ) ) {
	echo '<h2>' . esc_html__( 'Teachers', 'msutm-main-theme' ) . '</h2>';
	foreach ( $employee_list as $employee ) {
		// Display information about each employee with a template by their ID.
		employee_template( $employee['id'], employee_posts( $employee['id'] ) );
	}
}
