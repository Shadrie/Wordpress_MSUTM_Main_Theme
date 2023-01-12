<?php
/**
 * Functions used to enqueue custom css and js files, adding them to <head> and <footer> section
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
 * Function used to enqueue custom js
 */
function load_my_scripts() {
	wp_register_script(
		'jqueryafter',
		get_template_directory_uri() . '/js/jquery-after.js',
		array( 'jquery' ),
		'1.0',
		'true'
	);
	wp_register_script(
		'bootstrap',
		get_template_directory_uri() . '/js/bootstrap.min.js',
		array( 'jquery', 'jqueryafter' ),
		'1.0',
		'true'
	);
	wp_register_script(
		'owl',
		get_template_directory_uri() . '/js/owl.carousel.min.js',
		array( 'jquery', 'jqueryafter' ),
		'1.0',
		'true'
	);
	wp_register_script(
		'fancybox',
		get_template_directory_uri() . '/js/jquery.fancybox.min.js',
		array( 'jquery', 'jqueryafter' ),
		'1.0',
		'true'
	);
	wp_register_script(
		'spincrement',
		get_template_directory_uri() . '/js/jquery.spincrement.min.js',
		array( 'jquery', 'jqueryafter' ),
		'1.0',
		'true'
	);
	wp_register_script(
		'script',
		get_template_directory_uri() . '/js/script.js',
		array( 'jquery', 'jqueryafter', 'owl', 'fancybox' ),
		'1.0',
		'true'
	);
	wp_enqueue_script( 'jqueryafter' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'owl' );
	wp_enqueue_script( 'fancybox' );
	wp_enqueue_script( 'spincrement' );
	wp_enqueue_script( 'script' );
}
add_action( 'wp_enqueue_scripts', 'load_my_scripts' );

/**
 * Function used to enqueue custom css
 */
function load_my_styles() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0' );
	wp_enqueue_style( 'glyphter', get_template_directory_uri() . '/css/Glyphter.css', array(), '1.0' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0' );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.0' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '1.0' );
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'load_my_styles' );
