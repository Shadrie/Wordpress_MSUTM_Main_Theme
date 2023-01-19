<?php
/**
 * The template for displaying 404 pages (not found)
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
<div class="text-center mb-3">           
	<img src="/wp-content/themes/msutm-main-theme/images/404.png" class="mb-2">
	<h1><?php esc_html_e( 'Page not found!', 'msutm-main-theme' ); ?></h1>
	<p><?php esc_html_e( 'Unfortunately, page is not found (it might be in developement state). Please, make sure URL is corrent or use site search form.', 'msutm-main-theme' ); ?></p>                         
	<?php get_template_part( 'template-parts/content/search-form' ); ?> 
</div>
<?php
get_footer();
