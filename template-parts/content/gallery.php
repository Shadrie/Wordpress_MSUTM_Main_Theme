<?php
/**
 * Gallery template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get gallery items from meta field.
$gallery = carbon_get_the_post_meta( 'crb_main_gallery' );
if ( isset( $gallery ) && ( ! empty( $gallery ) ) ) {
	?>
	<div class="overflow-visible my-3">
		<div class="container">
			<div class="a-carousel-photo-wide owl-carousel owl-theme nav-none">
			<?php
			foreach ( $gallery as $picture ) {
				echo '<a href="' . esc_url( wp_get_attachment_image_src( $picture, 'full' )[0] ) . '" data-fancybox="gallery-student">
					<div class="gallery-item bg-center" style="background-image: url(' . esc_url( wp_get_attachment_image_src( $picture, 'large' )[0] ) . ');"></div>
				</a>';
			}
			?>
			</div>
		</div>
	</div>
	<?php
}
?>
