<?php
/**
 * Functions for displaying file lists in templates
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/**
 * Function for retrieving data from a list of media file items and preparing it for output
 *
 * @param array $filelist Array of media file items' IDs.
 */
function get_filelist_data( $filelist ) {
	ob_start();?>
	<div class="file-list">
	<?php
	foreach ( $filelist as $doc ) {
		$type = get_post_mime_type( $doc );
		if ( $type ) {
			$icon = 'file';
			switch ( $type ) {
				case 'application/vnd.ms-excel':
				case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
				case 'application/vnd.ms-excel.sheet.macroEnabled.12':
				case 'application/vnd.ms-excel.sheet.binary.macroEnabled.12':
				case 'application/vnd.openxmlformats-officedocument.spreadsheetml.template':
				case 'application/vnd.ms-excel.template.macroEnabled.12':
				case 'application/vnd.ms-excel.addin.macroEnabled.12':
				case 'application/vnd.oasis.opendocument.spreadsheet':
					$icon = 'icon-xlsx';
					break;
				case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
				case 'application/vnd.ms-powerpoint.presentation.macroEnabled.12':
				case 'application/vnd.openxmlformats-officedocument.presentationml.slideshow':
				case 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12':
				case 'application/vnd.openxmlformats-officedocument.presentationml.template':
				case 'application/vnd.ms-powerpoint.template.macroEnabled.12':
				case 'application/vnd.ms-powerpoint.addin.macroEnabled.12':
				case 'application/vnd.openxmlformats-officedocument.presentationml.slide':
				case 'application/vnd.ms-powerpoint.slide.macroEnabled.12':
					$icon = 'icon-ppt';
					break;
				case 'application/pdf':
					$icon = 'icon-pdf';
					break;
				default:
					$icon = 'icon-doc';
			}
			?>
			<div class="file-item">
				<div class="file-item-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
				<div class="file-item-title">
					<a target="_blank" href="<?php echo esc_url( wp_get_attachment_url( $doc ) ); ?>"><?php the_title( $doc ); ?></a>
					<?php echo wp_kses_post( get_ecp_data( $doc ) ); ?>
				</div> 
				<div class="file-item-descr"><?php echo esc_html( size_format( filesize( get_attached_file( $doc ) ), 2 ) ); ?></div>
			</div>
			<?php
		}
	}
	?>
	</div> 
	<?php
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}

/**
 * Function retrieves information about electronic signature and prints it as icon with tooltip
 *
 * @param int $mediafile Media library file ID.
 */
function get_ecp_data( $mediafile ) {
	$ecp_data = '';
	if ( carbon_get_the_post_meta( $mediafile, 'carbon_has_ecp' ) ) {
		$tooltip   = '';
		$ecp_owner = carbon_get_the_post_meta( $mediafile, 'carbon_ecp_owner' );
		$ecp_key   = carbon_get_the_post_meta( $mediafile, 'carbon_ecp_key' );
		$ecp_date  = carbon_get_the_post_meta( $mediafile, 'carbon_ecp_date' );
		$tooltip   =
			esc_attr_e( 'Document signed with electronic signature&#10;Owner: ', 'msutm-main-theme' )
			. $ecp_owner
			. esc_attr_e( '&#10;Unique key: ', 'msutm-main-theme' )
			. $ecp_key
			. esc_attr_e( '&#10;Signed at: ', 'msutm-main-theme' )
			. $ecp_date;
		$ecp_data  =
			'<div class="wrapper-tooltip-ecp">
				<img class="icon-tooltip-ecp" src="/wp-content/themes/new-mgutm/img/signature.png" alt="" title="' . $tooltip . '">
			</div>';
	}
	return $ecp_data;
}
