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
<!-- Navbar: begin -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<div class="logo-block d-flex flex-nowrap align-items-center">
		<button class="navbar-toggler d-block me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSiteMap" aria-controls="navbarSiteMap" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'msutm-main-theme' ); ?>">
			<span class="navbar-toggler-icon icon-log-in"></span>
		</button>
		<div class="navbar-brand">
			<?php get_template_part( 'template-parts/header/site-branding' ); ?>
		</div>
		<div class="d-flex flex-fill justify-content-end">
			<button class="navbar-toggler d-block ms-3 d-lg-none" type="button" data-bs-toggle="modal" data-bs-target="#modalSearch" aria-controls="modalSearch" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle search', 'msutm-main-theme' ); ?>">
				<span class="navbar-toggler-icon icon-search"></span>
			</button>
			<button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'msutm-main-theme' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
</div>
		<div class="collapse navbar-collapse flex-column align-items-end" id="navbarMain">
			<div class="d-none d-lg-flex text-nowrap">
				<?php get_template_part( 'template-parts/header/additional-navbar' ); ?>
			</div>
			<div class="navbar-nav d-flex flex-row">
				<?php print_navbar( 'menu-1' ); ?>
				<div class="nav-item ms-3 d-none d-lg-flex">
					<a href="#modalSearch" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalSearch">
						<i class="icon-search"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- Navbar: end -->
<!-- Site Map: begin -->
<div class="collapse" id="navbarSiteMap">
	<div class="border-top border-secondary bg-dark p-4">
		<h5 class="text-white h4"><?php esc_html_e( 'Site Map', 'msutm-main-theme' ); ?></h5>
		<span class="text-muted"><?php print_sitemap(); ?></span>
	</div>
</div>
<!-- Site Map: end -->
<!-- Modal search: start -->
<div class="modal fade" id="modalSearch" tabindex="-1" aria-labelledby="modalSearchLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalSearchLabel"><?php esc_html_e( 'Search', 'msutm-main-theme' ); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_html_e( 'Close', 'msutm-main-theme' ); ?>"></button>
			</div>
			<div class="modal-body">
				<form class="d-flex flex-column" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" placeholder="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" title="<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>" name="s" id="s" class="form-control search-input" />
					<button class="btn btn-dark btn-outline-secondary mt-3" data-bs-dismiss="modal" type="submit" id="searchsubmit">
						<?php esc_html_e( 'Search', 'msutm-main-theme' ); ?>
					</button>
				</form>
			</div>	
		</div>
	</div>
</div>
<!-- Modal search: end -->
