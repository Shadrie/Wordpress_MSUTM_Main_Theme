<?php
/**
 * The template for displaying single department type post
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header();
?>
<div class="row my-3">
	<div class="col">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1>', '</h1>' );
		$employee_list = carbon_get_the_post_meta( 'crb_employee_list' );
		$employee_arr  = array();
		foreach ( $employee_list as $employee_post ) {
			foreach ( $employee_post['crb_employee_relation'] as $employee ) {
				if ( array_key_exists( $employee['id'], $employee_arr ) ) {
					$employee_arr[ $employee['id'] ] .= ', ' . $employee_post['crb_employee_post'];
				} else {
					$employee_arr[ $employee['id'] ] = $employee_post['crb_employee_post'];
				}
			}
		}
		foreach ( $employee_arr as $employee_id => $employee_posts ) {
			employee_template( $employee_id, $employee_posts );
		}
		the_content();
		$contacts = get_contacts( get_the_ID() );
		if ( isset( $contacts ) && ( ! empty( $contacts ) ) ) {
			echo '<h2>Contacts</h2>';
			echo wp_kses_post( $contacts );
		}
	}
	?>
	</div>
	<?php get_template_part( 'template-parts/content/sidebar', 'custom' ); ?>
</div>
<?php
get_footer();
