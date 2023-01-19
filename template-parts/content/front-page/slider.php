<?php
/**
 * Front page slider template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get slider from meta field.
$slider = carbon_get_the_post_meta( 'crb_main_slider' );
if ( $slider ) {
	?>
	<div class="main-slider promo-carousel a-carousel owl-carousel owl-theme">
	<?php
	foreach ( $slider as $slide ) {
		// Get slider image, text and link from subfields.
		?>
		<div class="promo-item">
			<div class="position-relative">
				<div class="promo-item-photo" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $slide['crb_main_slider_image'], '' ) ); ?>);">
					<?php
					if ( $slide['crb_main_slider_text'] ) {
						?>
						<div class="promo-item-title text-light fs-4 fw-bolder p-3"><?php echo esc_html( $slide['crb_main_slider_text'] ); ?></div>
					<?php } ?>
				</div>
			</div>
			<a class="bg-dark d-block text-light text-uppercase fs-5 fw-light p-3"
			<?php
			if ( $slide['crb_main_slider_url'] ) {
				echo 'href="' . esc_url( $slide['crb_main_slider_url'] ) . '" target="_blank"';
			}
			?>
			><?php esc_html_e( 'Read more', 'msutm-main-theme' ); ?> <i class="icon-caret right"></i>
			</a>
		</div>
	<?php } ?>      
	</div>
	<?php
}
