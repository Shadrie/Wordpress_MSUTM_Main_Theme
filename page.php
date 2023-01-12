<?php
/**
 * The template for displaying pages
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header();
$current = get_the_ID();
switch ( $current ) {
	default:
		while ( have_posts() ) {
			the_post();
			the_content();
		}
}
get_footer();
