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
<div class="error-404 not-found">           
	<img src="/wp-content/themes/msutm-main-theme/images/404.png">               
	<div class="col-lg-7 page-content">
		<h2 class="page-title mt30"><?php esc_html_e( 'Page not found!', 'msutm-main-theme' ); ?></h2>
		<p><?php esc_html_e( 'Unfortunately, page is not found (it might be in developement state). Please, make sure URL is corrent or use site search form.', 'msutm-main-theme' ); ?></p>
	</div><!-- .page-content -->                            
	<?php get_template_part( 'template-parts/content/search-form' ); ?> 
</div><!-- .error-404 .not-found -->
<?php
get_footer();
