<?php
/**
 * The template for displaying information about course (education level and forms) for archive course page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$edu_info_list = '';
// Get information about education levels from post's taxonomy terms.
$edu_levels = get_the_terms( get_the_ID(), 'edu_level' );
if ( $edu_levels ) {
	foreach ( $edu_levels as $edu_level ) {
		$edu_level_name = $edu_level->name;
		if ( ! empty( $edu_level_list ) ) {
			$edu_info_list .= ', ';
		}
		$edu_info_list .= $edu_level_name;
	}
}
// Get information about education forms from a meta field.
$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
if ( $edu_forms ) {
	// If education levels were set, need to divide them from education forms.
	if ( isset( $edu_info_list ) ) {
		$edu_info_list .= ' | ';
	}
	$edu_form_list = '';
	foreach ( $edu_forms as $edu_form ) {
		$edu_form_name = get_edu_form( $edu_form['crb_edu_form_name'] );
		if ( $edu_form_name ) {
			if ( ! empty( $edu_form_list ) ) {
				$edu_form_list .= ', ';
			}
			$edu_form_list .= $edu_form_name;
		}
	}
	$edu_info_list .= $edu_form_list;
}
echo '<div class="text-uppercase">' . esc_html( $edu_info_list ) . '</div>';
