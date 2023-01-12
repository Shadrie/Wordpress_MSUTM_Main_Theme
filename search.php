<?php
/**
 * The template for displaying search result pages
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
if ( have_posts() ) {
	?>
	<h1>
		<?php
		echo esc_html__( 'Search results for: ', 'msutm-main-theme' ) . get_search_query();
		?>
	</h1>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/archive/single-default' );
	}
	get_template_part( 'template-parts/content/pagination' );
} else {
	get_template_part( 'template-parts/content/content', 'none' );
}
get_footer();
