<?php
/**
 * The template for displaying single employee type post
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
while ( have_posts() ) {
	the_post();
	the_title( '<h1 class="d-none">', '</h1>' );
	$employee_id = get_the_ID();
	employee_template( $employee_id, employee_posts( $employee_id ) );
	the_content();
}
get_footer();
