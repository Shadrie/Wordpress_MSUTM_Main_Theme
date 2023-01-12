<?php
/**
 * The template for single item on archive pages
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$p_type = get_post_type( get_the_ID() );
switch ( $p_type ) {
	case 'post':
		get_template_part( 'template-parts/archive/single-post' );
		break;
	default:
		get_template_part( 'template-parts/archive/single-default' );
		break;
}
