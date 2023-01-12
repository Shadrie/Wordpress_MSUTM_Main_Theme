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

$entrant_pages = carbon_get_theme_option( 'crb_entrant_pages' );
if ( isset( $entrant_pages ) && ( ! empty( $entrant_pages ) ) ) {
	$entrant_pages_id = array_column( $entrant_pages, 'id' );
	Container::make( 'post_meta', __( 'Navigation', 'msutm-main-theme' ) )
	->where( 'post_id', 'IN', $entrant_pages_id )
	->add_fields(
		array(
			Field::make( 'rich_text', 'crb_for_abitur', __( 'Entrants', 'msutm-main-theme' ) )
				->set_width( 50 ),
			Field::make( 'rich_text', 'crb_for_school', __( 'School', 'msutm-main-theme' ) )
				->set_width( 50 ),
		)
	);
}
