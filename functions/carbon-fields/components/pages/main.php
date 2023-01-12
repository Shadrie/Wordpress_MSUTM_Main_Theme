<?php
/**
 * Front page meta fields
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

global $glyphter;

Container::make( 'post_meta', __( 'Front page options', 'msutm-main-theme' ) )
	->where( 'post_id', '=', get_option( 'page_on_front' ) )
	->add_tab(
		__( 'General', 'msutm-main-theme' ),
		array(
			Field::make( 'text', 'crb_main_video', __( 'Video link', 'msutm-main-theme' ) ),
			Field::make( 'complex', 'crb_uni_numbers', __( 'University in numbers', 'msutm-main-theme' ) )
				->set_max( 4 )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'text', 'crb_uni_number', __( 'Number', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_uni_number_option', __( 'Option', 'msutm-main-theme' ) ),
					)
				)
				->set_header_template(
					'<% if (crb_uni_number && crb_uni_number_option) { %>
						<%- crb_uni_number %> <%- crb_uni_number_option %>
					<% } %>'
				),
		)
	)
	->add_tab(
		__( 'Slider', 'msutm-main-theme' ),
		array(
			Field::make( 'complex', 'crb_main_slider', __( 'Slider', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'image', 'crb_main_slider_image', __( 'Image', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_main_slider_text', __( 'Text (optional)', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_main_slider_url', __( 'Link (optional)', 'msutm-main-theme' ) ),
					)
				),
		)
	)
	->add_tab(
		__( 'Advantages', 'msutm-main-theme' ),
		array(
			Field::make( 'complex', 'crb_advantage', __( 'Advantages', 'msutm-main-theme' ) )
				->set_max( 4 )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'radio_image', 'crb_advantage_icon', __( 'Advantage icon', 'msutm-main-theme' ) )
							->add_options( $glyphter )
							->set_classes( 'glyphter' ),
						Field::make( 'color', 'crb_advantage_color', __( 'Color', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_advantage_text', __( 'Title', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_advantage_url', __( 'Link', 'msutm-main-theme' ) ),
					)
				),
		)
	)
	->add_tab(
		__( 'Featured', 'msutm-main-theme' ),
		array(
			Field::make( 'association', 'crb_featured_cat', __( 'Featured articles', 'msutm-main-theme' ) )
				->set_help_text( __( 'Articles displayed on the right side of slider. Leave blank to use full-width slider.', 'msutm-main-theme' ) )
				->set_max( 9 )
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'post',
						),
					)
				),
			Field::make( 'complex', 'crb_main_service', __( 'Services', 'msutm-main-theme' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields(
					array(
						Field::make( 'radio_image', 'crb_main_service_icon', __( 'Service icon', 'msutm-main-theme' ) )
							->add_options( $glyphter )
							->set_classes( 'glyphter' ),
						Field::make( 'color', 'crb_main_service_color', __( 'Color', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_main_service_text', __( 'Title', 'msutm-main-theme' ) ),
						Field::make( 'textarea', 'crb_main_service_desc', __( 'Description', 'msutm-main-theme' ) ),
						Field::make( 'text', 'crb_main_service_url', __( 'Link', 'msutm-main-theme' ) ),
					)
				),
		)
	)
	->add_tab(
		__( 'Gallery', 'msutm-main-theme' ),
		array(
			Field::make( 'media_gallery', 'crb_main_gallery', __( 'Gallery', 'msutm-main-theme' ) )
				->set_duplicates_allowed( false )
				->set_type( array( 'image' ) ),
		)
	);

