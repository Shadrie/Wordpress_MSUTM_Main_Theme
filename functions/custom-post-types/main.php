<?php
/**
 * Theme custom post types initialization and changes to base WordPress post types
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Extra support for base WordPress post types.
add_post_type_support( 'post', 'page-attributes' );
add_post_type_support( 'page', 'excerpt' );

// Courses custom post type.
require 'course.php';

// Staff custom post type.
require 'employee.php';

// Staff units custom post type.
require 'department.php';
