<?php
/**
 * The template for displaying single employee type post
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
while ( have_posts() ) {
	the_post(); ?>
	<div class="row my-3">
		<div class="col">
			<?php
			the_title( '<h1 class="d-none">', '</h1>' );
			// Display information about employee by their ID with a template.
			$employee_id = get_the_ID();
			employee_template( $employee_id, employee_posts( $employee_id ) );
			echo wp_kses_post( employee_courses( $employee_id ) );
			the_content();
			?>
		</div>
		<?php
		// Display sidebar for custom post types.
		get_template_part( 'template-parts/content/sidebar', 'custom' );
		?>
	</div>
	<?php
}
get_footer();
