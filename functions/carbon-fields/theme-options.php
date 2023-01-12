<?php
/**
 * Carbon fields theme options
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
use Carbon_Fields\Field\Complex_Field;

Container::make( 'theme_options', 'Theme Options' )
	->add_tab(
		__( 'Main', 'msutm-main-theme' ),
		array(
			Field::make( 'html', 'crb_main_text' )
				->set_html( __( 'The setting will apply for contacts and button in header and footer.', 'msutm-main-theme' ) ),
			Field::make( 'textarea', 'crb_main_phone', __( 'Main phone', 'msutm-main-theme' ) )
				->set_attribute( 'placeholder', '(***) ***-**-**, ...' ),
			Field::make( 'text', 'crb_main_email', __( 'Main email', 'msutm-main-theme' ) )
				->set_attribute( 'placeholder', '*@*.*' )
				->set_attribute( 'type', 'email' ),
			Field::make( 'textarea', 'crb_main_address', __( 'Main address', 'msutm-main-theme' ) ),
			Field::make( 'text', 'crb_main_button_text', __( 'Main button text', 'msutm-main-theme' ) )
				->set_width( 50 ),
			Field::make( 'text', 'crb_main_button_link', __( 'Main button link', 'msutm-main-theme' ) )
				->set_width( 50 ),
			Field::make( 'text', 'crb_payment', __( 'Payment link', 'msutm-main-theme' ) ),
			Field::make( 'checkbox', 'crb_allow_login_signup', 'Allow Log in & Sign Up' )
				->set_help_text( __( 'You need to manually allow Sign Ups in WordPress settings', 'msutm-main-theme' ) )
				->set_option_value( '1' ),
			Field::make( 'complex', 'crb_social', __( 'Social link(s)', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'text', 'crb_social_name', __( 'Title', 'msutm-main-theme' ) )
							->set_required(),
						Field::make( 'image', 'crb_social_icon', __( 'Icon', 'msutm-main-theme' ) )
							->set_required()
							->set_value_type( 'url' ),
						Field::make( 'text', 'crb_social_link', __( 'Link', 'msutm-main-theme' ) )
							->set_required(),
					)
				)
				->set_header_template(
					'<% if (crb_social_name) { %>
						<%- crb_social_name %>
					<% } %>'
				),
		)
	)
	->add_tab(
		__( 'Front page', 'msutm-main-theme' ),
		array(
			Field::make( 'association', 'crb_category_list', __( 'Category list', 'msutm-main-theme' ) )
				->set_help_text( __( 'Categories displayed below slider', 'msutm-main-theme' ) )
				->set_types(
					array(
						array(
							'type'     => 'term',
							'taxonomy' => 'category',
						),
					)
				),
		)
	)
	->add_tab(
		__( 'Templates', 'msutm-main-theme' ),
		array(
			Field::make( 'html', 'crb_templates_text' )
				->set_html( __( 'Select pages associated with certain templates. This will automatically add custom fields and apply layout templates to chosen pages.', 'msutm-main-theme' ) ),
			Field::make( 'association', 'crb_about_pages', __( 'About page(s)', 'msutm-main-theme' ) )
			->set_types(
				array(
					array(
						'type'      => 'post',
						'post_type' => 'page',
					),
				)
			),
			Field::make( 'association', 'crb_history_pages', __( 'History page(s)', 'msutm-main-theme' ) )
			->set_types(
				array(
					array(
						'type'      => 'post',
						'post_type' => 'page',
					),
				)
			),
			Field::make( 'association', 'crb_entrant_pages', __( 'Entrant page(s)', 'msutm-main-theme' ) )
			->set_types(
				array(
					array(
						'type'      => 'post',
						'post_type' => 'page',
					),
				)
			),
			Field::make( 'association', 'crb_students_pages', __( 'Students page(s)', 'msutm-main-theme' ) )
			->set_types(
				array(
					array(
						'type'      => 'post',
						'post_type' => 'page',
					),
				)
			),
		)
	)
	->add_tab(
		__( 'Education', 'msutm-main-theme' ),
		array(
			Field::make( 'complex', 'crb_edu_forms', __( 'Educational forms', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'text', 'crb_edu_forms_label', __( 'Label', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_edu_forms_value', __( 'Value', 'msutm-main-theme' ) ),
					)
				),
			Field::make( 'complex', 'crb_edu_exams', __( 'Exam list', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'text', 'crb_edu_exams_label', __( 'Label', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_edu_exams_value', __( 'Value', 'msutm-main-theme' ) ),
					)
				),
		)
	)
	->add_tab(
		__( 'Partners', 'msutm-main-theme' ),
		array(
			Field::make( 'complex', 'crb_partners', __( 'Partners', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'image', 'crb_partners_image', __( 'Image', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_partners_url', __( 'Link', 'msutm-main-theme' ) ),
					)
				),
		)
	);
