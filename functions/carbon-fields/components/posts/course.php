<?php
/**
 * Course post type settings
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

global $edu_form_values;
global $edu_exam_values;

Container::make( 'post_meta', __( 'Course info', 'msutm-main-theme' ) )
->where( 'post_type', '=', 'course' )
->add_fields(
	array(
		Field::make( 'complex', 'crb_edu_form_list', __( 'Education form', 'msutm-main-theme' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(
					Field::make( 'select', 'crb_edu_form_name', __( 'Education form', 'msutm-main-theme' ) )
						->set_options( $edu_form_values ),
					Field::make( 'text', 'crb_places', __( 'Course places', 'msutm-main-theme' ) ),
					Field::make( 'text', 'crb_price', __( 'Course price', 'msutm-main-theme' ) ),
				)
			),
		Field::make( 'complex', 'crb_exams', __( 'Exams', 'msutm-main-theme' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(
					Field::make( 'select', 'crb_exam_select', __( 'Exam name', 'msutm-main-theme' ) )
						->set_options( $edu_exam_values ),
					Field::make( 'text', 'crb_exam_score', __( 'Exam score', 'msutm-main-theme' ) ),
				)
			),
	)
);
