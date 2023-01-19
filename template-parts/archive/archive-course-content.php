<?php
/**
 * The template for displaying courses archives query content
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$the_query = new WP_Query( $args['q_args'] );
if ( $the_query->have_posts() ) {
	echo '<div class="row">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$course_thumbnail = get_the_post_thumbnail() ? ' style="background-image: url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) . ')";' : '';
		echo '<div class="col-md-6 col-lg-4 d-flex flex-column mb-4">
		<div class="course-item bg-center flex-fill"' . wp_kses_post( $course_thumbnail ) . '>
		<div class="bg-dark-opacity text-light h-100 p-3">';
		the_title( '<div class="fw-bold fs-4 mb-3">', '</div>' );
		$edu_info_list = '';
		$edu_levels    = get_the_terms( get_the_ID(), 'edu_level' );
		if ( $edu_levels ) {
			foreach ( $edu_levels as $edu_level ) {
				$edu_level_name = $edu_level->name;
				if ( ! empty( $edu_level_list ) ) {
					$edu_info_list .= ', ';
				}
				$edu_info_list .= $edu_level_name;
			}
		}
		$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
		if ( $edu_forms ) {
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
		echo '</div></div>';
		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="bg-dark d-block text-light text-uppercase fs-5 fw-light p-3">'
		. esc_html__( 'View course ', 'msutm-main-theme' ) .
		'<i class="icon-caret right"></i></a>';
		echo '</div>';
	}
	echo '</div>';
	get_template_part( 'template-parts/content/pagination', null, array( 'the_query' => $the_query ) );
} else {
	get_template_part( 'template-parts/content/content', 'none' );
}
wp_reset_postdata();
