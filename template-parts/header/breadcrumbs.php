<?php
/**
 * Breadcrumbs template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

if ( ! is_front_page() && ! is_404() ) { ?>
	<!-- Breadcrumbs: begin -->
	<nav aria-label="breadcrumb">
		<div class="container-fluid bg-dark border-top border-secondary">
			<ol class="breadcrumb pt-1 pb-2 mb-0">
				<?php msutm_breadcrumbs(); ?>
			</ol>
		</div>
	</nav>
	<!-- Breadcrumbs: end -->
<?php } ?>
