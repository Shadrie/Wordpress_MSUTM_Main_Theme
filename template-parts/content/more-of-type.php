<?php
/**
 * Template shows additional carousels of all posts' categories
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$cat_list = get_the_category();
if ( $cat_list ) {
	echo '<div class="lead">' . esc_html( __( 'More articles', 'msutm-main-theme' ) ) . '</div>';
	// Display carousel with latest articles for each category, as multiple categories might be set.
	foreach ( $cat_list as $current_cat ) {
		echo '<div class="my-3">';
		get_template_part(
			'template-parts/content/carousel-container',
			null,
			array(
				'cat_id' => $current_cat->term_id,
			)
		);
		echo '</div>';
	}
}
