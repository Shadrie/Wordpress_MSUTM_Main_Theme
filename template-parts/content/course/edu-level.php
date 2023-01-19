<?php
/**
 * The template for displaying education level for single course page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get information about education levels from post's taxonomy terms.
$edu_levels = get_the_terms( get_the_ID(), 'edu_level' );
if ( $edu_levels ) {
	$edu_info_list = '';
	echo '<h2>' . esc_html__( 'Education level', 'msutm-main-theme' ) . '</h2>';
	foreach ( $edu_levels as $edu_level ) {
		$edu_level_name = $edu_level->name;
		if ( ! empty( $edu_level_list ) ) {
			$edu_info_list .= ', ';
		}
		$edu_info_list .= $edu_level_name;
	}
	echo '<p>' . esc_html( $edu_info_list ) . '</p>';
}
