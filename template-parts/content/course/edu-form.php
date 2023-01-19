<?php
/**
 * The template for displaying education forms for single course page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get information about education forms from a meta field.
$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
if ( $edu_forms ) {
	echo '<h2>' . esc_html__( 'Education form', 'msutm-main-theme' ) . '</h2>';
	echo '<div class="row">';
	foreach ( $edu_forms as $edu_form ) {
		// Get education form's display name by its label.
		$edu_form_name = get_edu_form( $edu_form['crb_edu_form_name'] );
		if ( $edu_form_name ) {
			// Get places count and education price from subfields.
			echo '<div class="col-xs-12 col-md-' . 12 / count( $edu_forms ) . '">';
			echo '<h3>' . esc_html( $edu_form_name ) . '</h3>';
			echo '<p>' . esc_html__( 'Places available', 'msutm-main-theme' ) . ': ';
			echo $edu_form['crb_places'] ? esc_html( $edu_form['crb_places'] ) : '0';
			echo '<br>';
			echo esc_html__( 'Course price', 'msutm-main-theme' ) . ': ';
			echo $edu_form['crb_price'] ? esc_html( $edu_form['crb_price'] ) : '0';
			echo '</p>';
			echo '</div>';
		}
	}
	echo '</div>';
}
