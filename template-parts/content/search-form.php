<?php
/**
 * Search form template
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
<div class="search-form-none">
	<div class="col-lg-7">   
		<div class="row mt50 mb50">
			<form class="form-search-404" role="search" method="get" id="searchform" action="<?php echo esc_url( get_site_url() ); ?>">   
				<div class="input-with-icon-left">
					<label>
						<i class="icon-search input-icon"></i>
						<input type="text" value="" class="form-control subscribe-input" placeholder="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" title="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" name="s" id="s">
					</label>
				</div> 
				<button type="submit" id="searchsubmit" class="btn btn-primary"><span class="inside"><?php esc_html_e( 'Search', 'msutm-main-theme' ); ?></span></button>
			</form>   
		</div>
	</div>
	<div>
		<a href="<?php echo esc_url( get_site_url() ); ?>" class="btn btn-mini">
			<span class="inside">
				<?php esc_html_e( 'Front page', 'msutm-main-theme' ); ?>	
				<i class="icon-next"></i>
			</span>
		</a>
	</div>   
</div>
