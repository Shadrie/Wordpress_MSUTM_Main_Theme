<?php
/**
 * Gutenberg block editor custom blocks
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'custom-block', __( 'Slider', 'msutm-main-theme' ) )
	->set_icon( 'format-gallery' )
	->add_fields(
		array(
			Field::make( 'checkbox', 'crb_show_content', __( 'Show title', 'msutm-main-theme' ) )
					->set_option_value( '1' ),
			Field::make( 'media_gallery', 'crb_media_gallery', __( 'Slider', 'msutm-main-theme' ) )
					->set_type( array( 'image' ) ),
		)
	)
	->set_render_callback(
		function ( $fields ) {
			?>
				<div class="promo-carousel article-carousel owl-carousel owl-theme nav-none">
				<?php
				foreach ( $fields['crb_media_gallery'] as $img ) {
					?>
					<div class="promo-item">
						<a href="<?php echo esc_url( wp_get_attachment_image_src( $img, 'full' )[0] ); ?>" data-fancybox>
							<div class="promo-item-photo bg-center" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_src( $img, 'large' )[0] ); ?>);"></div>
							<?php
							if ( $fields['crb_show_content'] ) {
								?>
								<div class="promo-item-title text-light p-3">
									<?php echo esc_html( get_the_title( $img ) ); ?>
								</div>
							<?php } ?>
						</a>    
					</div>
					<?php
				}
				?>
				</div>
			<?php
		}
	);
Block::make( 'file-block', __( 'File list', 'msutm-main-theme' ) )
	->set_icon( 'list-view' )
	->add_fields(
		array(
			Field::make( 'media_gallery', 'crb_file_gallery', __( 'File list', 'msutm-main-theme' ) ),
		)
	)
	->set_render_callback(
		function ( $fields ) {
			echo wp_kses_post( get_filelist_data( $fields['crb_file_gallery'] ) );
		}
	);
Block::make( 'tinymce_block', __( 'TinyMCE', 'msutm-main-theme' ) )
	->set_icon( 'list-view' )
	->add_fields(
		array(
			Field::make( 'rich_text', 'crb_tinymce_block', __( 'Editor', 'msutm-main-theme' ) ),
		)
	)
	->set_render_callback(
		function ( $fields ) {
			echo wp_kses_post( apply_filters( 'the_content', $fields['crb_tinymce_block'] ) );
		}
	);
