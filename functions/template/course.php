<?php
/**
 * Retrieving and outputing information related to courses
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
 * Get education form name from its select field value.
 *
 * @param string $edu_form_value Education form select field value.
 */
function get_edu_form( $edu_form_value ) {
	global $edu_form_values;
	return $edu_form_values[ $edu_form_value ] ?? '';
}

/**
 * Get exam name from its select field value.
 *
 * @param string $exam_value Exam select field value.
 */
function get_exam( $exam_value ) {
	global $edu_exam_values;
	return $edu_exam_values[ $exam_value ] ?? '';
}
