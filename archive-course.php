<?php
/**
 * The template for displaying archive for course type post
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
global $wp_query;
global $edu_form_values;
global $edu_exam_values;
$search_string = filter_input( INPUT_GET, 'search' );
?>
<form id="filter">
	<?php
	filter_checkbox( 'Level', 'edu_lvl', array_column( get_terms( array( 'taxonomy' => 'edu_level' ) ), 'name', 'slug' ) );
	filter_checkbox( 'Form', 'edu_form', $edu_form_values );
	filter_checkbox( 'Exam', 'edu_exam', $edu_exam_values );
	?>
	<input type="text" id="searchStr" name="searchStr" value="<?php echo esc_html( $search_string ); ?>"></input>
	<div>
	<button class="sendRequest" type="submit"><?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?></button>
	</div>
</form>  
<div id="result">
	<div id="main">
	<?php
	$meta_query    = filter_meta_query( array( 'edu_form', 'edu_exam' ) );
	$tax_query     = filter_tax_query( array( 'edu_lvl' ) );
	$args          = $wp_query->query_vars;
	$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args['page']  = 1;
	if ( isset( $search_string ) ) {
		$args['s'] = $search_string;
	}
	if ( isset( $meta_query ) ) {
		$args['meta_query'] = $meta_query;
	}
	if ( isset( $tax_query ) ) {
		$args['tax_query'] = $tax_query;
	}
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div>';
		the_title( '<a href="' . esc_url( get_the_permalink() ) . '">', '</a>' );
		$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
		if ( $edu_forms ) {
			echo '<div>';
			foreach ( $edu_forms as $edu_form ) {
				$edu_form_name = get_edu_form( $edu_form['crb_edu_form_name'] );
				if ( $edu_form_name ) {
					echo '<div>' . esc_html( $edu_form_name ) . '</div>';
				}
			}
			echo '</div>';
		}
		$exams = carbon_get_the_post_meta( 'crb_exams' );
		if ( $exams ) {
			foreach ( $exams as $exam ) {
				if ( $exam['crb_exam_select'] && $exam['crb_exam_score'] ) {
					echo '<div>' . esc_html( get_exam( $exam['crb_exam_select'] ) ) . ': ' . esc_html( $exam['crb_exam_score'] ) . '</div>';
				}
			}
		}
		echo '</div>';
	}
	get_template_part( 'template-parts/content/pagination', null, array( 'the_query' => $the_query ) );
	wp_reset_postdata();
	?>
	</div>  
</div>
<?php
get_footer();
