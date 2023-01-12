<?php
/**
 * Useful links
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

echo '<h5>' . esc_html__( 'Useful links', 'msutm-main-theme' ) . '</h5>';
wp_nav_menu(
	array(
		'theme_location' => 'footer',
		'menu_class'     => 'footer-nav',
	)
);
