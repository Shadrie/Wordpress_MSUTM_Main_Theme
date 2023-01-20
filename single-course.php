<?php
/**
 * The template for displaying single course type post
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header(); ?>
<div class="row my-3">
	<div class="col">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1 class="mb-3">', '</h1>' );
		// Display information about education levels, forms and exams from meta fields.
		get_template_part( 'template-parts/content/course/edu-level' );
		get_template_part( 'template-parts/content/course/edu-form' );
		get_template_part( 'template-parts/content/course/edu-exam' );
		get_template_part( 'template-parts/content/course/employee-list' );
		the_content();
	}
	?>
	</div>
	<?php
	// Display sidebar for custom post types.
	get_template_part( 'template-parts/content/sidebar', 'custom' );
	?>
</div>
<?php
get_footer();
