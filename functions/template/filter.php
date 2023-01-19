<?php
/**
 * Filter feature for archive pages
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
 * Enqueue filter script and pass WordPress AJAX url
 */
function filter_script() {
	wp_register_script(
		'filter',
		get_template_directory_uri() . '/js/filter.js',
		array( 'jquery', 'jqueryafter' ),
		'1.0',
		'true'
	);
	wp_localize_script(
		'filter',
		'changeurl',
		array(
			'ajaxurl'   => site_url() . '/wp-admin/admin-ajax.php',
			'search'    => __( 'Search', 'msutm-main-theme' ),
			'searching' => __( 'Searching...', 'msutm-main-theme' ),
		)
	);
	wp_enqueue_script( 'filter' );
}
add_action( 'wp_enqueue_scripts', 'filter_script' );

/**
 * AJAX handler for changeurl function
 */
function changeurl_ajax_handler() {
	die;
}
add_action( 'wp_ajax_changeurl', 'changeurl_ajax_handler' );
add_action( 'wp_ajax_nopriv_changeurl', 'changeurl_ajax_handler' );

/**
 * Short and full name dependencies for filter feature.
 * Short names are used in forms. Full names are stored in the database.
 *
 * @param string $short_name Short name.
 */
function get_full_name( $short_name ) {
	$full_names             = array();
	$full_names['edu_form'] = 'crb_edu_form_list/crb_edu_form_name';
	$full_names['edu_exam'] = 'crb_exams/crb_exam_select';
	$full_names['edu_lvl']  = 'edu_level';
	return $full_names[ $short_name ] ?? '';
}

/**
 * Print the group of checkboxes given the data.
 *
 * @param string $title Title of checkbox group (optional).
 * @param string $field Name of checkbox group.
 * @param array  $values Values of checkboxes ([key] => [value] array).
 */
function filter_checkbox( $title = '', $field, $values ) {
	if ( isset( $title ) ) {
		echo '<div class="lead">' . esc_html( $title ) . '</div>';
	}
	if ( isset( $field ) && isset( $values ) ) {
		// Get URL parameter corresponding to $field argument.
		$selected = filter_input( INPUT_GET, $field );
		foreach ( $values as $key => $value ) {
			echo '<div class="form-check ps-0">
				<label>
					<input type="checkbox" id="' . esc_attr( $key ) . '" name="' . esc_attr( $field ) . '" value="' . esc_attr( $key ) . '"';
			if ( isset( $selected ) && str_contains( $selected, $key ) ) {
				// If current option matches URL parameter, set checkbox as checked.
				echo ' checked';
			}
			echo '>
					' . esc_html( $value ) . '
				</label>
			</div>';
		}
	}
}

/**
 * Generates meta_query parameter for WP_Query object from given fields and external variables from URL.
 *
 * @param array $meta_fields Array of meta fields to be filtered.
 */
function filter_meta_query( $meta_fields ) {
	$meta_array = array();
	foreach ( $meta_fields as $meta_field ) {
		// Searching value in URL parameters.
		$selected = filter_input( INPUT_GET, $meta_field );
		if ( isset( $selected ) ) {
			$meta_array[] = array(
				array(
					'key'     => get_full_name( $meta_field ),
					'value'   => $selected,
					'compare' => 'IN',
				),
			);
		}
	}
	return $meta_array;
}

/**
 * Generates tax_query parameter for WP_Query object from given fields and external variables from URL.
 *
 * @param array $tax_fields Array of taxonomy fields to be filtered.
 */
function filter_tax_query( $tax_fields ) {
	$tax_array = array();
	foreach ( $tax_fields as $tax_field ) {
		// Searching value in URL parameters.
		$selected = filter_input( INPUT_GET, $tax_field );
		if ( isset( $selected ) ) {
			$selected_array = explode( ',', $selected );
			$tax_array[]    = array(
				'relation' => 'AND',
				array(
					'taxonomy' => get_full_name( $tax_field ),
					'terms'    => $selected_array,
					'field'    => 'slug',
				),
			);
		}
	}
	return $tax_array;
}
