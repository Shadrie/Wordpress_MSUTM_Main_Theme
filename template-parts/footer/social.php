<?php
/**
 * Social links
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

$socials = carbon_get_theme_option( 'crb_social' );
if ( isset( $socials ) && ( ! empty( $socials ) ) ) {
	?> 
		<h5><?php esc_html_e( 'Our socials', 'msutm-main-theme' ); ?></h5>
		<ul class="social">
			<?php
			foreach ( $socials as $social ) {
				echo '<li>
					<a href="' . esc_url( $social['crb_social_link'] ) . '">
						<i class="icon-picture" style="background-image: url(' . esc_url( $social['crb_social_icon'] ) . ');"></i>
					</a>
				</li>';
			}
			?>
		</ul>
	<?php
}
