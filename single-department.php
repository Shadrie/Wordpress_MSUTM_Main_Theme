<?php
/**
 * The template for displaying single department type post
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
?>
<div class="row my-3">
	<div class="col">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1>', '</h1>' );
		// Display a list of employees from meta fields.
		get_template_part( 'template-parts/content/department/employee-list' );
		the_content();
		// Display department contacts from meta fields.
		get_template_part( 'template-parts/content/department/contacts' );
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
