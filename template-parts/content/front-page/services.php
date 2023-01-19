<?php
/**
 * University services
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get service list from meta field.
$service_list = carbon_get_the_post_meta( 'crb_main_service' );
if ( $service_list ) {
	?>
	<div class="mt-5">
		<div class="service-carousel a-carousel-4 owl-carousel owl-theme control-centered">
			<?php
			foreach ( $service_list as $service ) {
				// Get service icon, title, description and link from subfields.
				?>
				<a href="<?php echo esc_url( $service['crb_main_service_url'] ); ?>" class="service-item bg-light-hover d-flex flex-column p-4 h-100">
					<div class="service-item-icon">
						<i class="icon-<?php echo esc_attr( $service['crb_main_service_icon'] ); ?>"></i>
					</div>
					<?php
					if ( $service['crb_main_service_text'] ) {
						?>
						<div class="service-item-title fs-3 fw-bolder"><?php echo esc_html( $service['crb_main_service_text'] ); ?></div>
						<?php
					}
					if ( $service['crb_main_service_desc'] ) {
						?>
						<div class="service-item-desc"><?php echo esc_html( $service['crb_main_service_desc'] ); ?></div>
					<?php } ?>
				</a>
			<?php } ?>
		</div>
	</div>
<?php } ?>
