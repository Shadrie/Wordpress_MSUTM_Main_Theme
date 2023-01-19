<?php
/**
 * Custom page walker class Accordion_Walker
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
 * Accordion_Walker extends WordPress Walker_Page class to create list of pages using bootstrap accordion component instead of a <ul> list.
 * Can be used in wp_list_pages().
 */
class Accordion_Walker extends Walker_Page {

	/**
	 * Declaring private variable to use in Accordion_Walker functions.
	 *
	 * @var WP_Post $cur_page Current page object.
	 */
	private $cur_page;

	/**
	 * Function overloading from Walker_Page class.
	 * Outputs the beginning of the current level in the tree before elements are output.
	 *
	 * @param string $output Generated output, passed by reference.
	 * @param int    $depth Depth of page.
	 * @param array  $args An array of arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$page_id = $this->cur_page->ID;
		$output .= accordion_container_output_begin( $page_id );
	}

	/**
	 * Function overloading from Walker_Page class.
	 * Outputs the ending of the current level in the tree before elements are output.
	 *
	 * @param string $output Generated output, passed by reference.
	 * @param int    $depth Depth of page.
	 * @param array  $args An array of arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= accordion_container_output_end();
	}

	/**
	 * Function overloading from Walker_Page class.
	 * Outputs the beginning of the current element in the tree.
	 *
	 * @param string  $output Generated output, passed by reference.
	 * @param WP_Page $page Current page object.
	 * @param int     $depth Depth of page.
	 * @param array   $args An array of arguments.
	 * @param int     $current_page ID of the current page.
	 */
	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
		$this->cur_page   = $page;
		$page->post_title = $page->post_title ? $page->post_title : $page->ID . ' (no title)';
		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$output .= accordion_with_child_output_begin( get_permalink( $page->ID ), $page->post_title, $page->ID );
		} else {
			$output .= accordion_no_child_output_begin( get_permalink( $page->ID ), $page->post_title );
		}
	}

	/**
	 * Function overloading from Walker_Page class.
	 * Outputs the endining of the current element in the tree.
	 *
	 * @param string  $output Generated output, passed by reference.
	 * @param WP_Page $data_object Current page object.
	 * @param int     $depth Depth of page.
	 * @param array   $args An array of arguments.
	 */
	public function end_el( &$output, $data_object, $depth = 0, $args = array() ) {
		$output .= accordion_output_end();
	}
}
