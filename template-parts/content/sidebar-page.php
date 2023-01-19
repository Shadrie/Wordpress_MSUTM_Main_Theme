<?php
/**
 * Sidebar page template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Display a list of pages which have current page as a parent with accordion layout using custom walker.
$args    = array(
	'post_type' => 'page',
	'child_of'  => get_the_ID(),
	'depth'     => '2',
	'title_li'  => '',
	'orderby'   => 'menu_order',
	'walker'    => new Accordion_Walker(),
);
$sidebar = get_pages( $args );
if ( $sidebar ) { ?>
	<!-- Sidebar: begin -->
	<div id="sidebar" class="col-sm-4">
		<?php wp_list_pages( $args ); ?>
	</div>
	<!-- Sidebar: end -->
	<?php
}
