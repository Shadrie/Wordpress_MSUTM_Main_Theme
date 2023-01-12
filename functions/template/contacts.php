<?php
/**
 * Retrieving and outputing contacts
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
 * Retrieve contacts of given post.
 *
 * @param int $post_id Employee or department post ID.
 */
function get_contacts( $post_id ) {
	ob_start();
	$address = carbon_get_post_meta( $post_id, 'crb_address' );
	if ( $address ) {
		echo '<div class="contact-item-with-icon mb0">
			<i class="contact-icon icon-map-point"></i>'
			. wp_kses_post( $address ) .
		'</div>';
	}
	$phone = carbon_get_post_meta( $post_id, 'crb_phone' );
	if ( $phone ) {
		echo '<div class="contact-item-with-icon mb0">
			<i class="contact-icon icon-phone"></i>'
			. wp_kses_post( $phone ) .
		'</div>';

	}
	$emails = carbon_get_post_meta( $post_id, 'crb_emails' );
	if ( $emails ) {
		echo '<div class="contact-item-with-icon mb0">
			<i class="contact-icon icon-at"></i>';
		foreach ( $emails as $email ) {
			echo '<a href="mailto:' . esc_html( $email['crb_email'] ) . '">'
				. esc_html( $email['crb_email'] ) .
			'</a><br>';
		}
		echo '</div>';
	}
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}
