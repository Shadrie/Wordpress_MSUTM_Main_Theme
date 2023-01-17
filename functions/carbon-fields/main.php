<?php
/**
 * Carbon fields plugin main settings
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Values used in Carbon Fields.
require 'values.php';

/**
 * Hook all carbon fields used in the current theme
 */
function crb_attach_theme_options() {

	// Theme options.
	include 'theme-options.php';

	// Modify values from theme options.
	include 'modify-values.php';

	// Gutenberg blocks.
	include 'components/block-editor/block-editor.php';

	// Front page settings.
	include 'components/pages/main.php';

	// Course post type settings.
	include 'components/posts/course.php';

	// Employee post type settings.
	include 'components/posts/employee.php';

	// Department post type settings.
	include 'components/posts/department.php';

	// Contacts block.
	include 'components/posts/contacts.php';

	// Taxonomy term settings.
	include 'components/terms/main.php';
}
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
