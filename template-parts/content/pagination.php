<?php
/**
 * The template for displaying pagination links on archive pages
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

if ( ! isset( $args['the_query'] ) ) {
	global $wp_query;
	$the_query = $wp_query;
} else {
	$the_query = $args['the_query'];
}
$big = 999999999;
echo '<div class="pagination">';
$page_list = paginate_links(
	array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'prev_text' => '<<',
		'next_text' => '>>',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $the_query->max_num_pages,
		'type'      => 'array',
	)
);
if ( is_array( $page_list ) ) {
	foreach ( $page_list as $cur_page ) {
		echo wp_kses_post( $cur_page );
	}
}
echo '</div>';
