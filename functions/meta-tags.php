<?php
/**
 * Functions used for retrieving and displaying meta tags on current post
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
 * Function for generating 'description' meta tag information:
 * 1. From custom fields (if set)
 * 2. From post content (if set)
 * 3. From site description
 */
function get_meta_description() {
	global $post;
	$desc_meta = carbon_get_the_post_meta( 'crb_desc_meta' );
	if ( ! $desc_meta ) {
		if ( ( has_excerpt( $post ) ) || ( isset( $post->post_content ) && ( '' !== $post->post_content ) ) ) {
			$desc_meta = get_the_excerpt();
		} else {
			$desc_meta = get_bloginfo( 'description' );
		}
	}
	return $desc_meta;
}

/**
 * Function for generating 'article:section' meta tags for category posts
 */
function get_meta_article_section() {
	$cat_list = get_the_category();
	$out      = array();
	foreach ( $cat_list as $cat_single ) {
		$array[] = $cat_single->name;
	}
	return $out;
}

/**
 * Function for adding meta tags in <head> section
 */
function print_meta_tag() {
	$desc_meta = get_meta_description();
	if ( $desc_meta ) {
		echo '<meta name="description" content="' . esc_attr( $desc_meta ) . '"/>';
	}
	if ( is_singular( 'post' ) ) {
		$cat_names = get_meta_article_section();
		if ( $cat_names ) {
			foreach ( $cat_names as $cat_name ) {
				echo '<meta property="article:section" content="' . esc_attr( $cat_name ) . '"/>';

			}
		}
	}
}
add_action( 'wp_head', 'print_meta_tag' );
