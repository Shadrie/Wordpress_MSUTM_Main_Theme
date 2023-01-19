<?php
/**
 * Main contacts
 * PHP version 8.1
 *
 * Displays the closing <div id="content"> and <footer> section
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

echo '<h5>' . esc_html__( 'Contact us', 'msutm-main-theme' ) . '</h5>';
// Get contacts from Theme Options.
$main_phone   = carbon_get_theme_option( 'crb_main_phone' );
$main_email   = carbon_get_theme_option( 'crb_main_email' );
$main_address = carbon_get_theme_option( 'crb_main_address' );
?>
<div class="d-flex">
	<?php
	if ( isset( $main_phone ) && ( ! empty( $main_phone ) ) ) {
		echo '<div class="me-2"><i class="icon-phone"></i></div>' . wp_kses_post( $main_phone );
	}
	?>
</div>
<div class="d-flex">
	<?php
	if ( isset( $main_address ) && ( ! empty( $main_address ) ) ) {
		echo '<div class="me-2"><i class="icon-map-point"></i></div>' . wp_kses_post( $main_address );
	}
	?>
</div>
<div class="d-flex">
	<?php
	if ( isset( $main_email ) && ( ! empty( $main_email ) ) ) {
		echo '<div class="me-2"><i class="icon-at"></i></div><a href="mailto:' . esc_html( $main_email ) . '">' . esc_html( $main_email ) . '</a>';
	}
	?>
</div>
