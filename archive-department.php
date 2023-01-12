<?php
/**
 * The template for displaying archive pages
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
the_archive_title( '<h1 class="page-title">', '</h1>' );
echo term_description();
echo '<div class="accordion">';
?>
<?php
if ( have_posts() ) {
	$args = array(
		'post_type' => 'staff_unit',
		'title_li'  => '',
		'orderby'   => 'menu_order',
		'walker'    => new Accordion_Walker(),
	);
	wp_list_pages( $args );
	echo '</div>';
} else {
	get_template_part( 'template-parts/content/content', 'none' );
}
get_footer();
