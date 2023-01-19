<?php
/**
 * Template displayed if no content found
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

?>
<h2><?php esc_html_e( 'Nothing Found', 'msutm-main-theme' ); ?></h2>
<?php
if ( is_search() ) {
	?>
	<p><?php esc_html_e( 'Please, try again.', 'msutm-main-theme' ); ?></p>    
	<?php
} else {
	?>
	<p><?php esc_html_e( 'Using site search form might help.', 'msutm-main-theme' ); ?></p>
	<?php
}
// Display site search template.
get_template_part( 'template-parts/content/search-form' );
