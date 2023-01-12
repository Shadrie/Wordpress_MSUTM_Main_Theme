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
 * Generates sitemap from pages and prints it as a formatted list
 */
function print_sitemap() {
	$sitemap = wp_list_pages(
		array(
			'title_li' => '',
			'child_of' => 0,
			'depth'    => '2',
			'echo'     => 0,
		)
	);
	if ( $sitemap ) {
		echo '<div>
				<ul class="pagelist" id="accordionMenu">'
					. wp_kses_post( $sitemap ) .
				'</ul>
			</div>';
	}
}
