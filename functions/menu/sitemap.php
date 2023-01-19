<?php
/**
 * Sitemap
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/**
 * Generates pseudo-sitemap from pages and prints it as a formatted list
 */
function print_sitemap() {
	// Only using 2 levels of navigation to prevent excessive information display (as children will we displayed on parent's pages either way).
	$sitemap = wp_list_pages(
		array(
			'title_li' => '',
			'child_of' => 0,
			'depth'    => '2',
			'echo'     => 0,
		)
	);
	if ( $sitemap ) {
		echo '<ul class="sitemap list-unstyled">'
			. wp_kses_post( $sitemap ) .
		'</ul>';
	}
}
