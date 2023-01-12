<?php
/**
 * Contacts settings for employees and departments
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

Container::make( 'post_meta', __( 'Contacts', 'msutm-main-theme' ) )
->where( 'post_type', '=', 'employee' )
->or_where( 'post_type', '=', 'department' )
->add_fields(
	array(
		Field::make( 'textarea', 'crb_address', __( 'Address', 'msutm-main-theme' ) ),
		Field::make( 'textarea', 'crb_phone', __( 'Phone', 'msutm-main-theme' ) )
			->set_attribute( 'placeholder', '(***) ***-**-**, ...' ),
		Field::make( 'complex', 'crb_emails', __( 'Email', 'msutm-main-theme' ) )
		->set_layout( 'tabbed-horizontal' )
		->add_fields(
			array(
				Field::make( 'text', 'crb_email', __( 'Email', 'msutm-main-theme' ) )
				->set_attribute( 'placeholder', '*@*.*' )
				->set_attribute( 'type', 'email' ),
			)
		),
	)
);
