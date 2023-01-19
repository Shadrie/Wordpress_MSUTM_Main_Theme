<?php
/**
 * The template for displaying contacts on single department page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get contacts from meta field.
$contacts = get_contacts( get_the_ID() );
if ( isset( $contacts ) && ( ! empty( $contacts ) ) ) {
	echo '<h2>' . esc_html__( 'Contacts', 'msutm-main-theme' ) . '</h2>';
	echo wp_kses_post( $contacts );
}
