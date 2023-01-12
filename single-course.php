<?php
/**
 * The template for displaying single course type post
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header();
while ( have_posts() ) {
	the_post();
	the_title( '<h1>', '</h1>' );
	$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
	if ( $edu_forms ) {
		echo '<div class="row">';
		foreach ( $edu_forms as $edu_form ) {
			$edu_form_name = get_edu_form( $edu_form['crb_edu_form_name'] );
			if ( $edu_form_name ) {
				echo '<div class="col-xs-12 col-md-' . 12 / count( $edu_forms ) . '">';
				echo '<h2>' . esc_html( $edu_form_name ) . '</h2>';
				echo '<p>Places available: ';
				echo $edu_form['crb_places'] ? esc_html( $edu_form['crb_places'] ) : '0';
				echo '</p>';
				echo '<p>Course price: ';
				echo $edu_form['crb_price'] ? esc_html( $edu_form['crb_price'] ) : '0';
				echo '</p>';
				echo '</div>';
			}
		}
		echo '</div>';
	}
	$exams = carbon_get_the_post_meta( 'crb_exams' );
	if ( $exams ) {
		echo '<h2>Minimum exam score</h2>';
		foreach ( $exams as $exam ) {
			if ( $exam['crb_exam_select'] && $exam['crb_exam_score'] ) {
				echo '<p>' . esc_html( get_exam( $exam['crb_exam_select'] ) ) . ': ' . esc_html( $exam['crb_exam_score'] ) . '</p>';
			}
		}
	}
	the_content();
}
get_footer();
