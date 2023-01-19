<?php
/**
 * Default template for single item on archive pages
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Retrieve information about post type and taxonomy terms to display later.
$obj           = get_post_type_object( $post->post_type );
$cur_post_type = $obj->labels->singular_name ?? '';
$taxes         = get_post_taxonomies( $post );
$term_list     = array();
if ( $taxes ) {
	$term_list = wp_get_object_terms( $post->ID, $taxes[0], array( 'fields' => 'names' ) );
}
$term_string = '';
if ( $term_list ) {
	foreach ( $term_list as $cur_term ) {
		if ( ! ( empty( $term_string ) ) ) {
			$term_string .= ', '; }
		$term_string .= $cur_term;
	}
}
?>	  
<div class="my-2">
	<div class="fw-lighter">
	</div>
	<div class="fs-4 fw-bolder">
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">
			<?php echo esc_html( get_the_title( $post->ID ) ); // Post title in a link. ?>
		</a>
	</div>
	<div>
		<?php
		// Post excerpt (OR trimmed content, if unset) as a preview text.
		echo esc_html( get_the_excerpt() );
		?>
	</div>
	<div class="fw-lighter">
		<?php
		// Display post type and taxonomy terms.
		$term_string = ( isset( $term_string ) && ( ! empty( $term_string ) ) ) ? ' | ' . $term_string : '';
		echo esc_html( $cur_post_type ) . esc_html( $term_string ) . ' | ' . esc_html( get_the_date( 'j F Y H:i' ) );
		?>
	</div>
</div>
