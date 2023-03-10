<?php
/**
 * Retrieving information about employee
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
 * Find all occurencies of employee in deraptments and print them.
 *
 * @param int $employee_id Employee post ID.
 */
function employee_posts( $employee_id ) {
	ob_start();
	$args      = array(
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'post_type'      => 'department',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'meta_query'     => array(
			array(
				'key'     => 'crb_employee_list/crb_employee_relation',
				'value'   => $employee_id,
				'compare' => 'LIKE',
			),
		),
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		echo '<div>';
		echo '<div class="fw-bolder">' . esc_html__( 'Employee posts', 'msutm-main-theme' ) . ':</div>';
		while ( $the_query->have_posts() ) {
			echo '<div>';
			$the_query->the_post();
			$employee_list = carbon_get_the_post_meta( 'crb_employee_list' );
			// Traverse further into employee array to filter an inner field consisting of employee IDs.
			$employee_posts = array_filter(
				$employee_list,
				function( $outer ) use ( $employee_id ) {
					return array_filter(
						$outer['crb_employee_relation'],
						function( $inner ) use ( $employee_id ) {
							return strval( $employee_id ) === $inner['id'];
						}
					);
				}
			);
			$posts_count    = 0;
			foreach ( $employee_posts as $employee_post ) {
				if ( $posts_count > 0 ) {
					echo ', ';
				}
				echo esc_html( $employee_post['crb_employee_post'] );
				++$posts_count;
			}
			echo ' - <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
			echo '</div>';
		}
		echo '</div>';
	}
	wp_reset_postdata();
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

/**
 * Find all occurencies of employee in courses and print them.
 *
 * @param int $employee_id Employee post ID.
 */
function employee_courses( $employee_id ) {
	ob_start();
	$args      = array(
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'post_type'      => 'course',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'meta_query'     => array(
			array(
				'key'     => 'crb_employee_course',
				'value'   => $employee_id,
				'compare' => 'LIKE',
			),
		),
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		echo '<h3>' . esc_html__( 'Employee courses', 'msutm-main-theme' ) . ':</h3>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo '<p><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></p>';
		}
	}
	wp_reset_postdata();
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

/**
 * Display single employee card template (name, posts and contacts)
 *
 * @param int    $employee_id Employee post id.
 * @param string $employee_posts String of employee posts.
 * We can't generate posts from employee id, because on employee single posts and archives we will need full list of posts with links to departments, while on department pages we only need posts related to this department.
 */
function employee_template( $employee_id, $employee_posts ) {
	$employee_thumbnail = get_the_post_thumbnail_url( $employee_id, 'medium' ) ? get_the_post_thumbnail_url( $employee_id, 'medium' ) : '';
	$employee_img       = $employee_thumbnail ? '<div class="col-sm-6 col-md-3 col-lg-2 me-sm-5">
		<div class="employee-img bg-center" style="background-image: url(' . esc_url( $employee_thumbnail ) . ');"></div>
	</div>' : '';
	echo '<div class="employee-item d-flex border border-light shadow p-3 my-3">
		' . wp_kses_post( $employee_img ) . '
		<div class="col">
			<a href="' . esc_url( get_the_permalink( $employee_id ) ) . '" class="fs-3">'
				. esc_html( get_the_title( $employee_id ) ) .
			'</a>
			<div class="row mt-3">
				<div class="col-xs-12 col-md-6">' . wp_kses_post( $employee_posts ) . '</div>
				<div class="col-xs-12 col-md-6">' . wp_kses_post( get_contacts( $employee_id ) ) . '</div>
			</div>
		</div>
	</div>';
}
