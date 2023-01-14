<?php
/**
 * Additional navbar template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

wp_nav_menu(
	array(
		'theme_location' => 'menu-2',
		'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
		'item_class'     => 'nav-item',
		'link_class'     => 'nav-link',
	)
);
?>
<div class="navbar-nav me-auto mb-2 mb-lg-0">
	<?php
	$payment = carbon_get_theme_option( 'crb_payment' );
	if ( isset( $payment ) && ( ! empty( $payment ) ) ) {
		?>
		<div class="nav-item d-flex align-items-center">
			<a class="nav-link" href="<?php echo esc_url( $payment ); ?>">
				<i class="icon-card me-2"></i>
				<?php esc_html_e( 'Payment', 'msutm-main-theme' ); ?>
			</a>
		</div>
		<?php
	}
	$allow_login_signup = carbon_get_theme_option( 'crb_allow_login_signup' );
	if ( isset( $allow_login_signup ) && ( ! empty( $allow_login_signup ) ) ) {
		?>
		<div class="nav-item d-flex align-items-center">
			<a class="nav-link" href="<?php echo esc_url( wp_login_url() ); ?>">
				<i class="icon-log-in me-2"></i>
				<?php esc_html_e( 'Log in', 'msutm-main-theme' ); ?>
			</a> 
			/ 
			<a class="nav-link" href="<?php echo esc_url( site_url( '/wp-login.php?action=register&redirect_to=' . get_permalink() ) ); ?>">
				<?php esc_html_e( 'Sign up', 'msutm-main-theme' ); ?>
			</a>
		</div>
		<?php
	}
	?>
</div>
