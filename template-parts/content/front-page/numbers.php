<?php
/**
 * University in numbers
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get university numbers from meta field.
$number_list = carbon_get_the_post_meta( 'crb_uni_numbers' );
if ( isset( $number_list ) && ( ! empty( $number_list ) ) ) {
	?>
	<div class="container-fluid mt-5">
		<h2 class="text-uppercase mb-4"><?php esc_html_e( 'University in numbers', 'msutm-main-theme' ); ?></h2>
	</div>
	<?php
	// Retrieve background image, if set in meta field. Otherwise, gray background will be displayed.
	$uni_numbers_img = carbon_get_the_post_meta( 'crb_uni_numbers_bg' );
	$uni_numbers_bg  = ( isset( $uni_numbers_img ) && ( ! empty( $uni_numbers_img ) ) ) ? ' style=background-image:url(' . wp_get_attachment_image_url( $uni_numbers_img, 'full' ) . ');' : '';
	?>
	<div class="bg-center bg-secondary text-light container-fluid"<?php echo esc_attr( $uni_numbers_bg ); ?>> 
		<div class="row bg-dark-opacity py-5">
			<?php
			foreach ( $number_list as $number ) {
				// Get number and label from a subfields. 'statistic-item-value' class is required for numbers animation display.
				?>
				<div class="col-md-3 col-xs-6 my-5">
					<div class="text-center">
						<div class="statistic-item-value fs-1 fw-bolder"><?php echo esc_html( $number['crb_uni_number'] ); ?></div>
						<div class="fs-4"><?php echo esc_html( $number['crb_uni_number_option'] ); ?></div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}
