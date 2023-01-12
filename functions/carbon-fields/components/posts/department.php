<?php
/**
 * Deparment post type settings
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

Container::make( 'post_meta', __( 'Department info', 'msutm-main-theme' ) )
->where( 'post_type', '=', 'department' )
->add_fields(
	array(
		Field::make( 'complex', 'crb_employee_list', __( 'Employee_list', 'msutm-main-theme' ) )
			->set_help_text( __( 'First set employee will be used as department head', 'msutm-main-theme' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(
					Field::make( 'text', 'crb_employee_post', __( 'Post', 'msutm-main-theme' ) ),
					Field::make( 'association', 'crb_employee_relation', __( 'Employee', 'msutm-main-theme' ) )
					->set_help_text( __( 'Select multiple employees with the same post in one field', 'msutm-main-theme' ) )
					->set_types(
						array(
							array(
								'type'      => 'post',
								'post_type' => 'employee',
							),
						)
					),
				)
			),
	)
);
