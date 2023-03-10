<?php
/**
 * Taxonomy term settings
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

Container::make( 'term_meta', __( 'Term settings', 'msutm-main-theme' ) )
	->add_fields(
		array(
			Field::make( 'radio_image', 'crb_term_icon', __( 'Term icon', 'msutm-main-theme' ) )
			->add_options( $glyphter )
			->set_classes( 'glyphter' ),
		)
	);
