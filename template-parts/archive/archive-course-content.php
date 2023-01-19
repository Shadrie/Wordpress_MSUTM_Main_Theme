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
		// A single course item with a post thumbnail image as a background.
		$course_thumbnail = get_the_post_thumbnail() ? ' style="background-image: url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) . ')";' : '';
		echo '<div class="col-md-6 col-lg-4 d-flex flex-column mb-4">
		<div class="course-item bg-center flex-fill"' . wp_kses_post( $course_thumbnail ) . '>
		<div class="bg-dark-opacity text-light h-100 p-3">';
		the_title( '<div class="fw-bold fs-4 mb-3">', '</div>' );
		// Retrieve and display course's education levels and forms from terms and meta fields.
		get_template_part( 'template-parts/content/course/edu-info' );
		echo '</div></div>';
		// A link for a course's single page.
		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="bg-dark d-block text-light text-uppercase fs-5 fw-light p-3">'
		. esc_html__( 'View course ', 'msutm-main-theme' ) .
		'<i class="icon-caret right"></i></a>';
		echo '</div>';
	}
	echo '</div>';
	// Display pagination for a new query.
	get_template_part( 'template-parts/content/pagination', null, array( 'the_query' => $the_query ) );
} else {
	// Specific template if no content found.
	get_template_part( 'template-parts/content/content', 'none' );
}
wp_reset_postdata();
