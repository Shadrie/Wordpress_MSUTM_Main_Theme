<?php
/**
 * The template for displaying archive for education level taxonomy
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
<?php
global $wp_query;
global $edu_form_values;
global $edu_exam_values;
$search_string = filter_input( INPUT_GET, 'search' );
the_archive_title( '<h1 class="my-3">', '</h1>' );
?>
<div class="row my-3">
	<div id="sidebar" class="col-sm-4 col-md-3 col-lg-2">
		<form id="filter">
			<?php
			filter_checkbox( 'Form', 'edu_form', $edu_form_values );
			filter_checkbox( 'Exam', 'edu_exam', $edu_exam_values );
			?>
			<div class="form-group my-2">
				<input type="text" class="form-control" id="searchStr" name="searchStr" value="<?php echo esc_html( $search_string ); ?>"></input>
			</div>
			<div>
				<button id="sendRequest" class="btn btn-dark btn-outline-secondary w-100" type="submit"><?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?></button>
			</div>
		</form>
	</div>
	<div id="result" class="col">
		<div id="main">
		<?php
		$meta_query    = filter_meta_query( array( 'edu_form', 'edu_exam' ) );
		$args          = $wp_query->query_vars;
		$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args['page']  = 1;
		if ( isset( $search_string ) ) {
			$args['s'] = $search_string;
		}
		if ( isset( $meta_query ) ) {
			$args['meta_query'] = $meta_query;
		}
		get_template_part( 'template-parts/archive/archive-course-content', null, array( 'q_args' => $args ) );
		?>
		</div>
	</div>
</div>
<?php
get_footer();
