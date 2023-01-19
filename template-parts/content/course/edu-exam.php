<?php
/**
 * The template for displaying exams for single course page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get information about exams from a meta field.
$exams = carbon_get_the_post_meta( 'crb_exams' );
if ( $exams ) {
	echo '<h2>' . esc_html__( 'Minimum exam score', 'msutm-main-theme' ) . '</h2>';
	echo '<p>';
	foreach ( $exams as $exam ) {
		// Get exam name end score from subfields.
		if ( $exam['crb_exam_select'] && $exam['crb_exam_score'] ) {
			echo esc_html( get_exam( $exam['crb_exam_select'] ) ) . ': ' . esc_html( $exam['crb_exam_score'] ) . '<br>';
		}
	}
	echo '</p>';
}
