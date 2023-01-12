<?php
/**
 * Update values used in Carbon Fields from theme options
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/**
 * Returns modified version on preset value if it was set in theme options
 *
 * @param string $cf_name Carbon field name. Must be a complex field with _label and _value subfields.
 * @param array  $default Value used if unset.
 */
function modify_value_from_theme_option( $cf_name, $default ) {
	$out   = array();
	$theme = carbon_get_theme_option( $cf_name );
	if ( isset( $theme ) && ( ! empty( $theme ) ) ) {
		$edu_count = count( $theme );
		for ( $i = 0; $i < $edu_count; $i++ ) {
			$out[ $theme[ $i ][ $cf_name . '_value' ] ] = $theme[ $i ][ $cf_name . '_label' ];
		}
	} else {
		$out = $default;
	}
	return $out;
}

global $edu_form_values;
global $edu_exam_values;
$edu_form_values = modify_value_from_theme_option( 'crb_edu_forms', $edu_form_values );
$edu_exam_values = modify_value_from_theme_option( 'crb_edu_exams', $edu_exam_values );
