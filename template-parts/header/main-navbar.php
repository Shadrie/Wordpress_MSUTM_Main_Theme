<?php
/**
 * Main navbar template
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
<div class="nav-content">
	<div class="container">
		<div class="main-nav">
			<div class="nav-toggle a-toggle-nav">
				<div class="stick stick-1"></div>
				<div class="stick stick-2"></div>
				<div class="stick stick-3"></div>
			</div>
		</div>  
		<div class="search-form hidden-xs">
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" title="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" name="s" id="s" class="form-control search-input" />
				<button class="search-btn" type="submit" id="searchsubmit"><i class="icon-search"></i></button>
			</form>
			<a class="search-btn a-toggle-search"><i class="icon-search"></i></a>
		</div>				
		<?php print_navbar( 'menu-1' ); ?>
	</div>
</div>
