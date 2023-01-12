<?php
/**
 * Site logo, name, description display template
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
<div class="header-content">
	<div class="row row-inline row-middle header-row">
		<div class="col-sm-12 col-md-6">
		<?php if ( has_custom_logo() ) { ?>
			<div id="logo">
				<div class="site-logo d-flex flex-row align-items-center">
					<?php the_custom_logo(); ?>
					<div class="site-name mx-3" ><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="col-md-3 col-sm-6 d-flex align-items-center hidden-xs">
			<div class="site-slogan"><span style="font-style: italic;"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></span></div>
		</div>
		<div class="col-md-3 col-sm-6 hidden-xs">
		<?php
		$btn_link  = carbon_get_theme_option( 'crb_main_button_link' );
		$btn_title = carbon_get_theme_option( 'crb_main_button_text' );
		if ( isset( $btn_link ) && isset( $btn_title ) && ( ! empty( $btn_link ) ) && ( ! empty( $btn_title ) ) ) {
			echo '<a class="btn btn-primary btn-block" href="' . esc_url( $btn_link ) . '" target="_blank">
				<span class="inside"><b>' . esc_html( $btn_title ) . '</b></span>
			</a>';
		}
		?>
		</div>
	</div>
</div>
