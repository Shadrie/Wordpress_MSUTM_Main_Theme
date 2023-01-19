<?php
/**
 * The template for displaying pages
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
	while ( have_posts() ) {
		the_post();
		?>
		<div class="row my-3">
			<div class="col">
				<?php
				the_title( '<h1 class="mb-3">', '</h1>' );
				the_content();
				?>
			</div>
			<?php
			// Display sidebar for the page post type.
			get_template_part( 'template-parts/content/sidebar', 'page' );
			?>
		</div>
		<?php
	}
}
get_footer();
