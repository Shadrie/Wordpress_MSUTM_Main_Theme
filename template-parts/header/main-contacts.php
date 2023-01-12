<?php
/**
 * Header contacts template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$main_phone   = carbon_get_theme_option( 'crb_main_phone' );
$main_email   = carbon_get_theme_option( 'crb_main_email' );
$main_address = carbon_get_theme_option( 'crb_main_address' );
?>
<div class="header-top hidden-xs">
	<div class="container header-top-content justify-content-between">
		<div class="phone header-top-item text-left">   
			<?php
			if ( isset( $main_phone ) && ( ! empty( $main_phone ) ) ) {
				echo '<i class="icon-phone"></i>' . wp_kses_post( $main_phone );
			}
			?>
		</div>         
		<div class="location header-top-item text-left">
			<?php
			if ( isset( $main_address ) && ( ! empty( $main_address ) ) ) {
				echo '<i class="icon-map-point"></i>' . wp_kses_post( $main_address );
			}
			?>
		</div>
		<div class="header-top-item text-left">
		<?php
		if ( isset( $main_email ) && ( ! empty( $main_email ) ) ) {
			echo '<i class="icon-at"></i><a href="mailto:' . esc_html( $main_email ) . '">' . esc_html( $main_email ) . '</a>';
		}
		?>
		</div>
	</div>
</div>
