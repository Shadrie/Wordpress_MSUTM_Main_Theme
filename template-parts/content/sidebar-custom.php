<?php
/**
 * Sidebar custom post type template. DIsplays a list of custom post types
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get a list of post types which are public, not WordPress built-in and have archive pages.
$args              = array(
	'public'      => true,
	'_builtin'    => false,
	'has_archive' => true,
);
$custom_post_types = get_post_types( $args, 'objects' );
if ( isset( $custom_post_types ) && ( ! empty( $custom_post_types ) ) ) {
	?>
	<!-- Sidebar: begin -->
	<div id="sidebar" class="col-sm-4">
		<?php
		foreach ( $custom_post_types as $cpt ) {
			$cpt_link = get_post_type_archive_link( $cpt->name );
			// Get all taxonomies for a post type.
			$custom_tax = get_object_taxonomies( $cpt->name, 'objects' );
			if ( $custom_tax ) {
				// Get all taxonomy terms.
				$custom_terms = get_terms( array_column( $custom_tax, 'name' ) );
				if ( $custom_terms ) {
					// If taxonomy has terms, display accordion layout with custom post type as a list item and terms list as its child.
					echo wp_kses_post( accordion_with_child_output_begin( $cpt_link, $cpt->label, $cpt->name ) );
					echo wp_kses_post( accordion_container_output_begin( $cpt->name ) );
					foreach ( $custom_terms as $custom_term ) {
						$custom_term_link = get_term_link( $custom_term );
						echo wp_kses_post( accordion_no_child_output_begin( $custom_term_link, $custom_term->name ) );
						echo wp_kses_post( accordion_output_end() );
					}
					echo wp_kses_post( accordion_container_output_end() );
				} else {
					// If taxonomy doesn't have terms, display custom post type as a list item.
					echo wp_kses_post( accordion_no_child_output_begin( $cpt_link, $cpt->label ) );
				}
				echo wp_kses_post( accordion_output_end() );
			} else {
				// If custom post type has no taxonomies assignedm display it as a list item.
				echo wp_kses_post( accordion_no_child_output_begin( $cpt_link, $cpt->label ) );
				echo wp_kses_post( accordion_output_end() );
			}
		}
		?>
	</div>
	<!-- Sidebar: end -->
	<?php
}

