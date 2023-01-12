<?php
/**
 * Sliding menu template
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
<div class="main-nav-dropdown">
	<div class="container">
		<div class="ornament-menu"></div>
		<div class="ornament-menu-centent">
			<div class="main-nav-dropdown-header hidden-xs">
				<div class="row row-inline row-middle">
					<div class="col-sm-1 hidden-xs">
						<div class="nav-toggle a-toggle-nav">
							<div class="stick stick-1"></div>
							<div class="stick stick-2"></div>
							<div class="stick stick-3"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="hidden-sm hidden-md hidden-lg">
				<div class="main-nav-dropdown-header special-mobile-header">
					<div class="row row-inline row-middle">                   
						<div class="col-xs-12">
							<div class="search-form opened">
								<form role="search" autocomplete="off" method="get" id="searchform_mobile" class="searchform" action="<?php echo esc_url( get_site_url() ); ?>">
									<input type="text" value="" placeholder="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" title="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" name="s" id="smobile" class="form-control search-input">
									<button class="search-btn" type="submit" id="searchsubmit_mobile"><i class="icon-search"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>    
			</div>          
			<!--menu start-->    
			<?php print_sitemap(); ?>
			<!--menu end--> 
		</div>
	</div>
</div> <!-- /end .main-nav-dropdown -->
